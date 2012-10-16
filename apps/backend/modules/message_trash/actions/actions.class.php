<?php

require_once dirname(__FILE__) . '/../lib/message_trashGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/message_trashGeneratorHelper.class.php';

/**
 * message_trash actions.
 *
 * @package    ecollegeplus
 * @subpackage message_trash
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class message_trashActions extends autoMessage_trashActions {

    public function preExecute() {
        $this->totalInboxCount = EmailMessageTable::getInstance()->countInboxByEmail($this->getUser()->getEmail());
        $this->totalDraftsCount = EmailMessageTable::getInstance()->countDraftsByEmail($this->getUser()->getEmail());
        $this->totalSentCount = EmailMessageTable::getInstance()->countSentByEmail($this->getUser()->getEmail());
        $this->totalTrashCount = EmailMessageTable::getInstance()->countTrashByEmail($this->getUser()->getEmail());

        parent::preExecute();
    }

    public function executeTrashTab(sfWebRequest $request) {
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
            $this->setSort(array($request->getParameter('sort', "created_at"), $request->getParameter('sort_type', "desc")));
        }

        // pager
        if ($request->getParameter('page')) {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();

        // determine if there are any results returned for this current pager
        if ($this->pager->getResults()->count() == 0) {
            $this->setPage(1);
            $this->pager = $this->getPager();
        }

        $this->total_inbox_count = EmailMessageTable::getInstance()->countInboxByEmail($this->getUser()->getEmail());
        $this->total_drafts_count = EmailMessageTable::getInstance()->countDraftsByEmail($this->getUser()->getEmail());
        $this->total_sent_count = EmailMessageTable::getInstance()->countSentByEmail($this->getUser()->getEmail());
        $this->total_trash_count = EmailMessageTable::getInstance()->countTrashByEmail($this->getUser()->getEmail());
    }

    protected function buildQuery() {
        $tableMethod = $this->configuration->getTableMethod();
        $query = Doctrine_Core::getTable('EmailMessage')
                ->createQuery('a')
                ->addWhere("from_email like ? OR to_email like ?", array("%{$this->getUser()->getEmail()}%", "%{$this->getUser()->getEmail()}%"))
                ->andWhere("is_trashed = ?", 1);

        if ($tableMethod) {
            $query = Doctrine_Core::getTable('EmailMessage')->$tableMethod($query);
        }

        $this->addSortQuery($query);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
        $query = $event->getReturnValue();

        return $query;
    }

    public function executeBatch(sfWebRequest $request) {
        if (!$ids = $request->getParameter('ids')) {
            die(sprintf('You must at least select one item.'));
        }

        if (!$action = $request->getParameter('batch_action')) {
            die(sprintf('You must select an action to execute on the selected items.'));
        }

        if (!method_exists($this, $method = 'execute' . ucfirst($action))) {
            die(sprintf('You must create a "%s" method for action "%s"', $method, $action));
        }

        $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'EmailMessage'));
        try {
            // validate ids
            $ids = $validator->clean($ids);

            // execute batch
            $this->$method($request);
        } catch (sfValidatorError $e) {
            die(sprintf('A problem occurs when deleting the selected items as some items do not exist anymore.'));
        }

        die("success");
    }

    protected function executeBatchDelete(sfWebRequest $request) {
        $ids = $request->getParameter('ids');

        $records = Doctrine_Query::create()
                ->from('EmailMessage')
                ->whereIn('id', $ids)
                ->execute();

        foreach ($records as $record) {
            $record->delete();
        }

        $this->getUser()->setFlash('notice', 'The selected items have been permanently deleted.');
    }

}
