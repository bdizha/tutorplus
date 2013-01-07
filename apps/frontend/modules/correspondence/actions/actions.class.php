<?php

require_once dirname(__FILE__) . '/../lib/correspondenceGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/correspondenceGeneratorHelper.class.php';

/**
 * correspondence actions.
 *
 * @package    tutorplus
 * @subpackage correspondence
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class correspondenceActions extends autoCorrespondenceActions
{

    public function executeAutocomplete(sfWebRequest $request)
    {
        $result = sfGuardUserTable::getInstance()->findByName($request['q'], $this->getUser()->getId(), 100)
            ->toKeyValueArray('id', 'name');
        return $this->renderText(json_encode($result));
    }

    public function executeSuggestions(sfWebRequest $request)
    {
        $correspondent_id = $request['id'];
        $this->correspondence_status = $request['status'];
        if (($correspondent_id != "") && ($this->correspondence_status != "") && $this->correspondence_status != "none")
        {
            $innitiator_type = $this->getUser()->getType();
            if (!is_object($correspondence = CorrespondenceTable::getInstance()->findByInnitiatorAndCorrespondent($correspondent_id, $this->getUser()->getId())))
            {
                $c = new Correspondence();
                $c->setInnitiatorId($this->getUser()->getId());
                $c->setCorrespondentId($correspondent_id);
                $c->setDeterminedType($innitiator_type);
                $c->setStatus($this->correspondence_status);
                $c->save();

                $this->getUser()->setFlash('notice', 'Correspondence request has been sent successfully.');
            }
            else
            {
                $correspondence->setStatus(CorrespondenceTable::CORRESPONDED);
                $correspondence->save();
            }
        }

        $this->correspondence_suggestions = CorrespondenceTable::getInstance()->retrieveSuggestionsByStudentIdAndInnitiatorId(null, $this->getUser()->getStudentId(), $this->getUser()->getId());
    }

    public function executeRequests(sfWebRequest $request)
    {
        $innitiator_id = $request['id'];
        $this->correspondence_status = $request['status'];
        if (($innitiator_id != "") && ($this->correspondence_status != "") && $this->correspondence_status != "none")
        {
            if (is_object($correspondence = CorrespondenceTable::getInstance()->findByInnitiatorAndCorrespondent($innitiator_id, $this->getUser()->getId())))
            {
                $correspondence->setStatus($this->correspondence_status);
                $correspondence->save();

                $this->getUser()->setFlash('notice', 'Correspondence request has been sent successfully.');
            }
        }

        $this->requested_correspondences = CorrespondenceTable::getInstance()->retrieveRequestsByProfileIdAndStatus($this->getUser()->getId());
    }

    public function executeCorrespondents(sfWebRequest $request)
    {
        $this->form = $this->configuration->getForm();
        $this->my_correspondents = CorrespondenceTable::getInstance()->retrieveByInnitiatorAndStatusAndUserTypes($this->getUser()->getId(), "", "", "", "");
    }

    public function executeCorrespond(sfWebRequest $request)
    {
        $correspondent_id = $request->getParameter("correspondent_id");
        $innitiator_type = $this->getUser()->getType();

        if (!is_object($this->correspondence = CorrespondenceTable::getInstance()->findByInnitiatorAndCorrespondent($correspondent_id, $this->getUser()->getId())))
        {
            $this->correspondence = new Correspondence();
            $this->correspondence->setInnitiatorId($this->getUser()->getId());
            $this->correspondence->setCorrespondentId($correspondent_id);
            $this->correspondence->setDeterminedType($innitiator_type);
            $this->correspondence->save();
        }
        else
        {
            $this->correspondence->setStatus(CorrespondenceTable::CORRESPONDED);
            $this->correspondence->save();
        }
    }

    public function executeDecline(sfWebRequest $request)
    {
        $innitiator_id = $request->getParameter("innitiator_id");
        $this->correspondence = CorrespondenceTable::getInstance()->findByCorrespondentAndInnitiator($this->getUser()->getId(), $innitiator_id);

        if (is_object($correspondence))
        {
            $this->correspondence->setStatus(CorrespondenceTable::DECLINED);
            $this->correspondence->save();
        }
    }

    public function executeAccept(sfWebRequest $request)
    {
        $innitiator_id = $request->getParameter("innitiator_id");
        $this->correspondence = CorrespondenceTable::getInstance()->findByCorrespondentAndInnitiator($this->getUser()->getId(), $innitiator_id);

        if (is_object($correspondence))
        {
            $this->correspondence->setStatus(CorrespondenceTable::CORRESPONDED);
            $this->correspondence->save();
        }
    }

}
