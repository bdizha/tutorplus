<?php

/**
 * DiscussionTypeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DiscussionTypeTable extends Doctrine_Table
{
    
    const TYPE_ASSIGNMENT = 1;
    const TYPE_SUGGESTION = 2;
    const TYPE_QUESTION = 3;
    const TYPE_SHARE = 4;
    const TYPE_DISCUSSION = 5;

    static public $types = array(
        1 => 'Assignment',
        2 => 'Suggestion',
        3 => 'Question',
        4 => 'Share',
        5 => 'Discussion'
    );
    /**
     * Returns an instance of this class.
     *
     * @return object DiscussionTypeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('DiscussionType');
    }
}