<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Create a new user.
 *
 * @package    symfony
 * @subpackage task
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: sfGuardCreateUserTask.class.php 28922 2010-03-31 13:53:45Z noel $
 */
class CreateStudentTask extends sfBaseTask {

    /**
     * @see sfTask
     */
    protected function configure() {
        $this->addArguments(array(
            new sfCommandArgument('email_address', sfCommandArgument::REQUIRED, 'The email address'),
            new sfCommandArgument('username', sfCommandArgument::REQUIRED, 'The username'),
            new sfCommandArgument('password', sfCommandArgument::REQUIRED, 'The password'),
            new sfCommandArgument('first_name', sfCommandArgument::OPTIONAL, 'The first name'),
            new sfCommandArgument('last_name', sfCommandArgument::OPTIONAL, 'The last name'),
        ));

        $this->addOptions(array(
            new sfCommandOption('is-super-admin', null, sfCommandOption::PARAMETER_NONE, 'Whether the user is a super admin', null),
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', null),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
        ));

        $this->namespace = 'tutorplus';
        $this->name = 'create-student';
        $this->briefDescription = 'Creates a student';

        $this->detailedDescription = <<<EOF
The [guard:create-user|INFO] task creates a student:

  [./symfony tutorplus:create-student batanayi@tutorplus.org batanayi password123 Batanayi Matuku|INFO]
EOF;
    }

    /**
     * @see sfTask
     */
    protected function execute($arguments = array(), $options = array()) {
        $databaseManager = new sfDatabaseManager($this->configuration);
        
        $user = new sfGuardUser();
        $user->set('algorithm', 'sha1');
        $user->set('username', $arguments['username']);
        $user->set('password', $arguments['password']);
        $user->set('email_address', $arguments['email_address']);
        $user->set('first_name', $arguments["first_name"]);
        $user->set('last_name', $arguments["last_name"]);
        $user->set('email_address', $arguments["email_address"]);
        $user->set('is_super_admin', $options['is-super-admin']);
        $user->save();

        $student = new Student();
        $student->setStatus(StudentTable::STATUS_REGISTERED);
        $student->setUser($user);
        $student->setDateTimeObject("date_of_birth", new DateTime());
        $student->save();

        $this->logSection('student', sprintf('Created student "%s"', $arguments['email_address']));
    }

}