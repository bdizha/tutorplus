<?php

/**
 * This class handles all email sendings
 *
 * @package    tutorplus.org
 * @subpackage mailer
 * @author     Fox Matuku
 * 
 */
class tpMailer {

    protected
            $mailer,
            $dispatcher,
            $message,
            $template,
            $values,
            $toEmails,
            $fromEmail,
            $isRendered;

    public function __construct() {
        $this->mailer = sfContext::getInstance()->getMailer();
        $this->dispatcher = sfContext::getInstance()->getEventDispatcher();

        $this->initialize();
    }

    protected function initialize() {
        $this->values = array();
        $this->toEmails = array();
        $this->fromEmail = "";
        $this->isRendered = false;
        $this->message = Swift_Message::newInstance();
    }

    /**
     * Set a template to the mail
     *
     * @param mixed $templateName the template name, or a EmailTemplateInstance
     * @return gfMailer $this
     */
    public function setTemplate($slug) {
        if ($slug instanceof EmailTemplate) {
            $this->template = $slug;
        } elseif (!$this->template = EmailTemplateTable::getInstance()->findOneBySlug($slug)) {
            throw new Exception(sprintf('The %s could not be found!', $slug));
        }

        return $this;
    }

    /**
     * Get the template used to build the mail
     *
     * @return EmailTemplate the template instance
     */
    public function getTemplate() {
        return $this->template;
    }

    /**
     * Set a message manually to the mail
     *
     * @param Swift_Message $message the Swift message
     * @return gfMailer $this
     */
    public function setMessage(Swift_Message $message) {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the Swift message that will be sent
     *
     * @return Swift_Message the message instance
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * Set to emails
     *
     * @param to emails array
     * @return gfMailer $this
     */
    public function setToEmails($toEmails = array()) {
        $this->toEmails = $toEmails;
        return $this;
    }

    /**
     * Get the to emails that will receive the emails
     *
     * @return to emails array
     */
    public function getToEmails() {
        return $this->toEmails;
    }

    /**
     * Set from email
     *
     * @param from email string
     * @return gfMailer $this
     */
    public function setFromEmail($fromEmail = "") {
        $this->fromEmail = $fromEmail;
        return $this;
    }

    /**
     * Get the from email
     *
     * @return from email string
     */
    public function getFromEmail() {
        return $this->fromEmail;
    }

    /**
     * Set a mailer manually
     *
     * @param sfMailer $mailer another mailer
     * @return gfMailer $this
     */
    public function setMailer(sfMailer $mailer) {
        $this->mailer = $mailer;
        return $this;
    }

    /**
     * Get the mailer used
     *
     * @return sfMailer the mailer instance
     */
    public function getMailer() {
        return $this->mailer;
    }

    /**
     * Add values to the mail that will be available in the template
     *
     * @param   mixed   $data   a record, a form or an array
     * @param   string  $prefix a prefix for this data
     * @return  gfMailer  $this
     */
    public function addValues($values) {
        $this->values = array_merge($this->values, $values);
        return $this;
    }

    /**
     * Return values that will be available in the template
     *
     * @return array $values
     */
    public function getValues() {
        return $this->values;
    }

    /**
     * Binds the mail with available data
     * Uses Swift to send it.
     *
     * @return gfMailer $this
     */
    public function send() {
        if (!$this->getTemplate()->get('is_active')) {
            return $this;
        }

        if (!$this->isRendered()) {
            $this->render();
        }

        $eventParams = array(
            'mailer' => $this->getMailer(),
            'message' => $this->getMessage(),
            'template' => $this->getTemplate()
        );
        
        die("testing...");

        $this->getMailer()->send($this->getMessage());

        //$this->dispatcher->notify(new sfEvent($this, 'dm.mail.post_send', $eventParams));

        return $this;
    }

    public function isRendered() {
        return $this->isRendered;
    }

    /**
     * Builds the Swift message inserting vars in templates
     *
     * @return gfMailer $this
     */
    public function render() {
        if (!$this->getTemplate()) {
            throw new gfMailerException('You must call setTemplate() to set a mail template');
        }

        $template = $this->getTemplate();
        $replacements = $this->getReplacements();
        $message = $this->getMessage();
        $body = $this->htmlize(strtr($this->getMailerTemplate(), $replacements));
        
        $toEmail = "Batanayi Matuku <bdizha@gmail.com>";
        
        $toEmails = $this->emailListToArray($toEmail . "," . $this->getToEmails());
        
        $message->setContentType($template->getIsHtml() ? "text/html" : "text/plain")
                ->setSubject(strtr($template->subject, $replacements))
                ->setBody($body)
                ->setFrom($this->emailListToArray($template->getFromEmail()))
                ->setTo($toEmails);

        $this->isRendered = true;

        return $this;
    }

    protected function getReplacements() {
        $replacements = array();
        foreach ($this->getValues() as $key => $value) {
            $replacements[$this->wrapPlacements($key)] = $value;
        }
        return $replacements;
    }

    protected function emailListToArray($emails) {
        $entries = array_unique(array_filter(array_map('trim', explode(',', str_replace("\n", ',', $emails)))));
        $emails = array();
        foreach ($entries as $entry) {
            if (preg_match('/^.+\s<.+>$/', $entry)) {
                $email = preg_replace('/^.+\s<(.+)>$/', '$1', $entry);
                $name = preg_replace('/^(.+)\s<.+$/', '$1', $entry);
                $emails[$email] = $name;
            } else {
                $emails[$entry] = null;
            }
        }

        return $emails;
    }

    protected function wrapPlacements($key) {
        return '##' . $key . '##';
    }

    protected function htmlize($string) {
        return "<p>" . str_replace("\r\n\r\n", "<p></p>", $string) . "</p>";
    }

    public function getMailerTemplate($mailer = null) {
        $template = $this->getTemplate();

        if (!$mailer) {
            $mailer = $file = sfConfig::get('sf_app_dir') . '/templates/mailer.php';
        }

        // render
        ob_start();
        ob_implicit_flush(0);

        // set the template body
        $content = $template->body;

        try {
            require($mailer);
        } catch (Exception $e) {
            // need to end output buffering before throwing the exception #7596
            ob_end_clean();
            throw $e;
        }

        return ob_get_clean();
    }

}
