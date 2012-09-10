<?php

require_once dirname(__FILE__) . '/../lib/discussion_topicGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/discussion_topicGeneratorHelper.class.php';

/**
 * discussion_topic actions.
 *
 * @package    ecollegeplus
 * @subpackage discussion_topic
 * @author     Batanayi Matuku
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussion_topicActions extends autoDiscussion_topicActions
{
    protected $discussion_id = "";

    public function executeIndex(sfWebRequest $request)
    {
        $this->discussion_id = $this->getUser()->getMyAttribute('discussion_show_id', null);
        $this->forward404Unless($this->discussion = Doctrine_Core::getTable('Discussion')->find(array($this->discussion_id)), sprintf('Object Course does not exist (%s).', $this->getUser()->getMyAttribute('discussion_show_id', null)));

        // sorting
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
        {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
        }

        // pager
        if ($request->getParameter('page'))
        {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->forward404Unless($this->discussion_topic = $this->getRoute()->getObject());
        $this->getUser()->setMyAttribute('discussion_topic_show_id', $this->discussion_topic->getId());

        $course = $this->discussion_topic->getDiscussion()->getCourseDiscussion()->getCourse();
        if ($course->getId())
        {
            $this->course = $course;
            $this->getUser()->setMyAttribute('course_show_id', $course->getId());
        }
        $this->replyForm = new DiscussionTopicReplyForm();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->forward404Unless($this->discussion = Doctrine_Core::getTable('Discussion')->find(array($this->getUser()->getMyAttribute('discussion_show_id', null))), sprintf('Object does not exist (%s).', $this->getUser()->getMyAttribute('discussion_show_id', null)));
        $this->form = $this->configuration->getForm();
        $this->discussion_topic = $this->form->getObject();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($this->discussion = DiscussionTable::getInstance()->find(array($this->getUser()->getMyAttribute('discussion_show_id', null))), sprintf('Object does not exist (%s).', $this->getUser()->getMyAttribute('discussion_show_id', null)));
        $this->form = $this->configuration->getForm();
        $this->discussion_topic = $this->form->getObject();

        $this->processForm($request, $this->form);
        $this->setTemplate('new');
    }

    public function executeTopics(sfWebRequest $request)
    {
        $this->discussion_id = $this->getUser()->getMyAttribute('discussion_show_id', null);
        $this->forward404Unless($this->discussion = Doctrine_Core::getTable('Discussion')->find(array($this->discussion_id)), sprintf('Object Course does not exist (%s).', $this->getUser()->getMyAttribute('discussion_show_id', null)));

        // sorting
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
        {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
        }

        // pager
        if ($request->getParameter('page'))
        {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();
    }

    protected function buildQuery()
    {
        $tableMethod = $this->configuration->getTableMethod();
        $query = Doctrine_Core::getTable('DiscussionTopic')
            ->createQuery('a')
            ->addWhere("a.discussion_id = ?", $this->discussion_id)
            ->addOrderBy("a.updated_at Desc");

        if ($tableMethod)
        {
            $query = Doctrine_Core::getTable('DiscussionTopic')->$tableMethod($query);
        }

        $this->addSortQuery($query);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
        $query = $event->getReturnValue();

        return $query;
    }

}
