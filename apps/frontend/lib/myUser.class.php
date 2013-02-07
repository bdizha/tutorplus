<?php

class myUser extends sfBasicSecurityUser {

    private $namespace = "ProfileSecurityUser";
    private $profile = null;

    /**
     * Initializes the ProfileSecurityUser object.
     *
     * @param sfEventDispatcher $dispatcher The event dispatcher object
     * @param sfStorage         $storage    The session storage object
     * @param array             $options    An array of options
     */
    public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array()) {
        parent::initialize($dispatcher, $storage, $options);

        if (!$this->isAuthenticated()) {
            // remove profile if timeout
            $this->getAttributeHolder()->removeNamespace('ProfileSecurityUser');
            $this->profile = null;
        }
    }

    /**
     * Returns the referer uri.
     *
     * @param string $default The default uri to return
     *
     * @return string $referer The referer
     */
    public function getReferer($default) {
        $referer = $this->getAttribute('referer', $default);
        $this->getAttributeHolder()->remove('referer');

        return $referer;
    }

    /**
     * Sets the referer.
     *
     * @param string $referer
     */
    public function setReferer($referer) {
        if (!$this->hasAttribute('referer')) {
            $this->setAttribute('referer', $referer);
        }
    }

    /**
     * Returns whether or not the profile has the given credential.
     *
     * @param array  $credentials  The profile credentials
     * @return boolean
     */
    public function hasCredential($credentials) {
        if (empty($credentials)) {
            return true;
        }

        if (!$this->getProfile()) {
            return false;
        }

        if ($this->getProfile()->getIsSuperAdmin()) {
            return true;
        }

        return $this->isInCredentialArray($credentials);
    }

    public function isInCredentialArray($credentials = array()) {
        if (null === $this->credentials) {
            return false;
        }

        foreach ($credentials as $credential) {
            if (in_array($credential, $this->credentials)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns whether or not the profile is a super admin.
     *
     * @return boolean
     */
    public function isSuperAdmin() {
        return $this->getProfile() ? $this->getProfile()->getIsSuperAdmin() : false;
    }

    /**
     * Returns whether or not the profile is anonymous.
     *
     * @return boolean
     */
    public function isAnonymous() {
        return !$this->isAuthenticated();
    }

    /**
     * Signs in the profile on the application.
     *
     * @param Profile         $profile
     * @param boolean             $remember Whether or not to remember the profile
     * @param Doctrine_Connection $con      A Doctrine_Connection object
     */
    public function signIn($profile, $remember = false, $con = null) {
        // save last login
        $profile->setLastLogin(date('Y-m-d H:i:s'));
        $profile->save($con);

        // signin
        $this->setAttribute('profile_id', $profile->getId(), 'ProfileSecurityUser');
        $this->setAuthenticated(true);
        $this->clearCredentials();
        $this->addCredentials($profile->getAllPermissionNames());

        // make sure the this profile has a peer of themselves
        PeerTable::getInstance()->findOrCreateSelfPeerByProfileId($profile->getId());

        // create a default primary discussion group
        $primaryDiscussionGroup = DiscussionGroupTable::getInstance()->findOrCreatePrimaryDiscussionGroupByProfile($profile);

        if ($primaryDiscussionGroup) {
            // create a default primary discussion topic
            DiscussionTopicTable::getInstance()->findOrCreateOneByProfileId($profile->getId(), $primaryDiscussionGroup->getId());
        }

        // should we remember this profile
        if ($remember) {
            $expirationAge = 15 * 24 * 3600;

            // remove old keys
            Doctrine_Core::getTable('ProfileRememberKey')->createQuery()
                ->delete()
                ->where('created_at < ?', date('Y-m-d H:i:s', time() - $expirationAge))
                ->execute();

            // remove other keys from this profile
            Doctrine_Core::getTable('ProfileRememberKey')->createQuery()
                ->delete()
                ->where('profile_id = ?', $profile->getId())
                ->execute();

            // generate new keys
            $key = $this->generateRandomKey();

            // save key
            $rk = new ProfileRememberKey();
            $rk->setRememberKey($key);
            $rk->setProfile($profile);
            $rk->setIpAddress($_SERVER['REMOTE_ADDR']);
            $rk->save($con);

            // make key as a cookie
            $rememberCookie = 'tpRemember';
            sfContext::getInstance()->getResponse()->setCookie($rememberCookie, $key, time() + $expirationAge);
        }
    }

    /**
     * Signs out the profile.
     *
     */
    public function signOut() {
        $this->getAttributeHolder()->removeNamespace('ProfileSecurityUser');
        $this->profile = null;
        $this->clearCredentials();
        $this->setAuthenticated(false);
        $expirationAge = 15 * 24 * 3600;
        $rememberCookie = 'sfRemember';
        sfContext::getInstance()->getResponse()->setCookie($rememberCookie, '', time() - $expirationAge);
    }

    /**
     * Returns a random generated key.
     *
     * @param int $len The key length
     *
     * @return string
     */
    protected function generateRandomKey($len = 20) {
        return base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    /**
     * Returns the related Profile.
     *
     * @return Profile
     */
    public function getProfile() {
        if (!$this->profile && $id = $this->getAttribute('profile_id', null, 'ProfileSecurityUser')) {
            $this->profile = Doctrine_Core::getTable('Profile')->find($id);
        }

        if (is_null($this->profile)) {
            // the profile does not exist anymore in the database
            $this->signOut();

            throw new sfException('The profile does not exist anymore in the database.');
        }

        return $this->profile;
    }

    /**
     * Returns the integer id of the obejct.
     *
     * @return integer
     */
    public function getId() {
        return $this->getMyAttribute("profile_id", null);
    }

    /**
     * Returns the string representation of the object.
     *
     * @return string
     */
    public function __toString() {
        return $this->getProfile()->__toString();
    }

    /**
     * Returns the Profile object's username.
     *
     * @return string
     */
    public function getUsername() {
        return $this->getProfile()->getUsername();
    }

    /**
     * Returns the name(first and last) of the profile
     *
     * @return string
     */
    public function getName() {
        return $this->getProfile()->getName();
    }

    /**
     * Returns the Profile object's email.
     *
     * @return string
     */
    public function getEmail() {
        $profile = $this->getProfile();
        if (is_object($profile)) {
            return $this->getProfile()->getEmail();
        }
        return "";
    }

    /**
     * Sets the profile's password.
     *
     * @param string              $password The password
     * @param Doctrine_Collection $con      A Doctrine_Connection object
     */
    public function setPassword($password, $con = null) {
        $this->getProfile()->setPassword($password);
        $this->getProfile()->save($con);
    }

    /**
     * Returns whether or not the given password is valid.
     *
     * @return boolean
     */
    public function checkPassword($password) {
        return $this->getProfile()->checkPassword($password);
    }

    /**
     * Returns whether or not the profile belongs to the given group.
     *
     * @param string $name The group name
     * 
     * @return boolean
     */
    public function hasGroup($name) {
        return $this->getProfile() ? $this->getProfile()->hasGroup($name) : false;
    }

    /**
     * Returns the profile's groups.
     *
     * @return array|Doctrine_Collection
     */
    public function getGroups() {
        return $this->getProfile() ? $this->getProfile()->getGroups() : array();
    }

    /**
     * Returns the profile's group names.
     *
     * @return array
     */
    public function getGroupNames() {
        return $this->getProfile() ? $this->getProfile()->getGroupNames() : array();
    }

    /**
     * Returns whether or not the profile has the given permission.
     *
     * @param string $name The permission name
     * 
     * @return string
     */
    public function hasPermission($name) {
        return $this->getProfile() ? $this->getProfile()->hasPermission($name) : false;
    }

    /**
     * Returns the Doctrine_Collection of single sfGuardPermission objects.
     *
     * @return Doctrine_Collection
     */
    public function getPermissions() {
        return $this->getProfile()->getPermissions();
    }

    /**
     * Returns the array of permissions names.
     *
     * @return array
     */
    public function getPermissionNames() {
        return $this->getProfile() ? $this->getProfile()->getPermissionNames() : array();
    }

    /**
     * Returns the array of all permissions.
     *
     * @return array
     */
    public function getAllPermissions() {
        return $this->getProfile() ? $this->getProfile()->getAllPermissions() : array();
    }

    /**
     * Returns the array of all permissions names.
     *
     * @return array
     */
    public function getAllPermissionNames() {
        return $this->getProfile() ? $this->getProfile()->getAllPermissionNames() : array();
    }

    /**
     * Adds a group from its name to the current profile.
     *
     * @param string              $name The group name
     * @param Doctrine_Connection $con  A Doctrine_Connection object
     */
    public function addGroupByName($name, $con = null) {
        return $this->getProfile()->addGroupByName($name, $con);
    }

    /**
     * Adds a permission from its name to the current profile.
     *
     * @param string              $name The permission name
     * @param Doctrine_Connection $con  A Doctrine_Connection object
     */
    public function addPermissionByName($name, $con = null) {
        return $this->getProfile()->addPermissionByName($name, $con);
    }

    /**
     * Sets the attribute value
     *
     * @param string $attribute key
     * @param string $attribute value
     */
    public function setMyAttribute($key, $value) {
        $this->setAttribute($key, $value, $this->namespace);
    }

    /**
     * Returns the attribute value
     *
     * @param string $attribute key
     * @param string $attribute value
     */
    public function getMyAttribute($key, $default) {
        $attribute = $this->getAttribute($key, $default, $this->namespace);
        return $attribute;
    }

    public function hasPhoto() {
        return count(sfFinder::type('file')->in(sfConfig::get("sf_web_dir") . "/uploads/users/" . $this->getId())) > 0;
    }

    public function isCurrent($profileId) {
        return $profileId == $this->getId();
    }

}
