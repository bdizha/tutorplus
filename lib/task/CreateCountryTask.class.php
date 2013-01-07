<?php
class CreateCountryTask extends sfBaseTask {

    /**
     * @see sfTask
     */
    protected function configure() {
        $this->addArguments(array(
            new sfCommandArgument('name', sfCommandArgument::REQUIRED, 'The country name'),
            new sfCommandArgument('code', sfCommandArgument::REQUIRED, 'The country code')
        ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', null),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
        ));

        $this->namespace = 'tutorplus';
        $this->name = 'create-country';
        $this->briefDescription = 'Creates a country';

        $this->detailedDescription = <<<EOF
The [guard:create-user|INFO] task creates a country:

  [./symfony tutorplus:create-country "South Africa" za |INFO]
EOF;
    }

    /**
     * @see sfTask
     */
    protected function execute($arguments = array(), $options = array()) {
        $databaseManager = new sfDatabaseManager($this->configuration);
        
        $country = new Country();
        $country->setName($arguments['name']);
        $country->setCode($arguments['code']);
        $country->save();

        $this->logSection('country', sprintf('Created country "%s"', $arguments['name']));
    }

}