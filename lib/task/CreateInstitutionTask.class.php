<?php
class CreateInstitutionTask extends sfBaseTask {

    /**
     * @see sfTask
     */
    protected function configure() {
        $this->addArguments(array(
            new sfCommandArgument('name', sfCommandArgument::REQUIRED, 'The institution name'),
            new sfCommandArgument('abbreviation', sfCommandArgument::REQUIRED, 'The institution abbreviation'),
            new sfCommandArgument('description', sfCommandArgument::REQUIRED, 'The institution description')
        ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', null),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
        ));

        $this->namespace = 'tutorplus';
        $this->name = 'create-institution';
        $this->briefDescription = 'Creates a institution';

        $this->detailedDescription = <<<EOF
The [guard:create-user|INFO] task creates a institution:

  [./symfony tutorplus:create-institution "TutorPlus" TP "TutorPlus is an online open" |INFO]
EOF;
    }

    /**
     * @see sfTask
     */
    protected function execute($arguments = array(), $options = array()) {
        $databaseManager = new sfDatabaseManager($this->configuration);
        
        $institution = new Institution();
        $institution->setName($arguments['name']);
        $institution->setAbbreviation($arguments['abbreviation']);
        $institution->setDescription($arguments['description']);
        $institution->setCountryId(1);
        $institution->save();

        $this->logSection('institution', sprintf('Created institution "%s"', $arguments['name']));
    }

}