<?php

/**
 * EmailMessage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ecollegeplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class EmailMessage extends BaseEmailMessage
{

    public function getFromEmails()
    {
        return preg_replace(array("/\[/", "/\]/"), array("<", ">"), parent::get("from_email"));
    }

    public function getHtmlizedBody()
    {
        return "<p>" . str_replace("\n", "</p><p>", html_entity_decode(parent::get("body"))) . "</p>";
    }

    public function getPreviousBody()
    {   
        $body = parent::get("body");
        $createdAt = format_date(parent::get("created_at"), "f");
        $name = parent::getSender()->getName();
        $fromEmail = parent::get("from_email");
        return <<<EOF



------------------------------------------------------------------------------------------------------------
{$createdAt} "{$name}" <{$fromEmail}> wrote:
{$body}

EOF;
    }

}
