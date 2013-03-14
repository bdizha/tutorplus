<?php

require_once dirname(__FILE__) . '/../lib/tpGradebookScaleGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tpGradebookScaleGeneratorHelper.class.php';
/**
 * tpGradebookScale actions.
 *
 * @package    tutorplus.org
 * @subpackage tpGradebookScale
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tpGradebookScaleActions extends autoTpGradebookScaleActions
{

    public function executeIndex(sfWebRequest $request)
    {
        $course_id = $this->getUser()->getMyAttribute('course_show_id', null);

        $this->gradebook_id = $this->getUser()->getMyAttribute('gradebook_show_id', null);

        if ($course_id && $this->gradebook_id) {
            parent::executeIndex($request);
        } else {
            $this->forward("course", "index");
        }
    }

    protected function buildQuery()
    {
        return parent::buildQuery()->addWhere("gradebook_id = ?", $this->gradebook_id);
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

        if ($this->getRoute()->getObject()->delete()) {
            $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
        }

        $this->redirect('@gradebook');
    }

}
