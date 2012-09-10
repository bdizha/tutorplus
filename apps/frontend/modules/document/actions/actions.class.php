<?php

/**
 * document actions.
 *
 * @package    ecollegeplus
 * @subpackage document
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class documentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->documents = Doctrine_Core::getTable('Document')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DocumentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DocumentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($document = Doctrine_Core::getTable('Document')->find(array($request->getParameter('id'))), sprintf('Object document does not exist (%s).', $request->getParameter('id')));
    $this->form = new DocumentForm($document);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($document = Doctrine_Core::getTable('Document')->find(array($request->getParameter('id'))), sprintf('Object document does not exist (%s).', $request->getParameter('id')));
    $this->form = new DocumentForm($document);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($document = Doctrine_Core::getTable('Document')->find(array($request->getParameter('id'))), sprintf('Object document does not exist (%s).', $request->getParameter('id')));
    $document->delete();

    $this->redirect('document/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $document = $form->save();

      $this->redirect('document/edit?id='.$document->getId());
    }
  }
}
