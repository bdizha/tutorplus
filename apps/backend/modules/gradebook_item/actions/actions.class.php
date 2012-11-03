<?php

require_once dirname(__FILE__) . '/../lib/gradebook_itemGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/gradebook_itemGeneratorHelper.class.php';

/**
 * gradebook_item actions.
 *
 * @package    tutorplus
 * @subpackage gradebook_item
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gradebook_itemActions extends autoGradebook_itemActions
{

    public function executeIndex(sfWebRequest $request)
    {
        $course_id = $this->getUser()->getMyAttribute('course_show_id', null);
        $this->gradebookId = $this->getUser()->getMyAttribute('gradebook_show_id', null);
        if ($course_id && $this->gradebookId)
        {
            parent::executeIndex($request);
        }
        else
        {
            $this->redirect("@course");
        }
    }

    protected function buildQuery()
    {
        return parent::buildQuery()->addWhere("gradebook_id = ?", $this->gradebookId);
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

        if ($this->getRoute()->getObject()->delete())
        {
            $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
        }

        $this->redirect('@gradebook');
    }

}
