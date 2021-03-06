<?php

/**
 * AcademicYear
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tutorplus
 * @subpackage model
 * @author     Batanayi Matuku
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class AcademicYear extends BaseAcademicYear
{
  public function __toString()
  {
    return (string) $this->getYearRange();
  }
  
  public function getYearRange()
  {
    return trim($this->getYearStart().' - '.$this->getYearEnd());
  }
}
