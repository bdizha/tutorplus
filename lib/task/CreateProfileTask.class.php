<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Create a new user.
 *
 * @package    symfony
 * @subpackage task
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: sfGuardCreateUserTask.class.php 28922 2010-03-31 13:53:45Z noel $
 */
class CreateProfileTask extends sfBaseTask {

    /**
     * @see sfTask
     */
    protected function configure() {
        $this->addArguments(array(
            new sfCommandArgument('email', sfCommandArgument::REQUIRED, 'The email'),
            new sfCommandArgument('username', sfCommandArgument::REQUIRED, 'The username'),
            new sfCommandArgument('password', sfCommandArgument::REQUIRED, 'The password'),
            new sfCommandArgument('first_name', sfCommandArgument::OPTIONAL, 'The first name'),
            new sfCommandArgument('last_name', sfCommandArgument::OPTIONAL, 'The last name'),
        ));

        $this->addOptions(array(
            new sfCommandOption('is-super-admin', null, sfCommandOption::PARAMETER_NONE, 'Whether the user is a super admin', null),
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', null),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
        ));

        $this->namespace = 'tutorplus';
        $this->name = 'create-profile';
        $this->briefDescription = 'Creates a profile';

        $this->detailedDescription = <<<EOF
The [guard:create-user|INFO] task creates a profile:

  [./symfony tutorplus:create-profile batanayi@tutorplus.org batanayi batanayi321 Batanayi Matuku 1|INFO]
EOF;
    }

    /**
     * @see sfTask
     */
    protected function execute($arguments = array(), $options = array()) {
        $databaseManager = new sfDatabaseManager($this->configuration);
        
        $profile = new Profile();
        $profile->setAlgorithm("sha1");
        $profile->setUsername($arguments['username']);
        $profile->setPassword($arguments['password']);
        $profile->setEmail($arguments['email']);
        $profile->setFirstName($arguments['first_name']);
        $profile->setLastName($arguments['last_name']);
        $profile->setIsSuperAdmin($arguments['is-super-admin']);
        $profile->setInstitutionId(1);
        $profile->setDateTimeObject("birth_date", new DateTime());
        $profile->save();

        $this->logSection('profile', sprintf('Created profile "%s"', $arguments['email']));
    }

}