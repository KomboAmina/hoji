<?php
namespace Hoji\Core;

defined('DS') || define('DS',DIRECTORY_SEPARATOR);

class SetupChecker{

    public bool $triggerSetup;

    public int $setupStep;

    public function __construct(){

        $this->triggerSetup=$this->checkNeedsSetup();

        $this->setupStep=($this->triggerSetup) ? $this->getSetupStep():0;

    }

    public function checkNeedsSetup():bool{

        /**
         * check htaccess file exists
         * 
         * check src/config/basic.php is empty
         * 
         * check src/config/database.php is empty
         */

        $htAccessFileExists=$this->htAccessFileExists();

        $configBasicFileExists=$this->configFileIsValid("src".DS."config".DS."basic.php");

        $configDatabaseFileExists=$this->configFileIsValid("src".DS."config".DS."database.php");

        return !($htAccessFileExists && $configBasicFileExists && $configDatabaseFileExists);

    }

    protected function htAccessFileExists():bool{

        return file_exists('.htaccess');

    }

    protected function isFileEmpty(string $fileURL):bool{

        clearstatcache($fileURL);

        $fileSize=filesize($fileURL);

        return !$fileSize>0;


    }

    protected function configFileIsValid(string $fileURL):bool{

        $fileExists=file_exists($fileURL);

        $isEmpty=true;

        if($fileExists){

            $isEmpty=$this->isFileEmpty($fileURL);

        }

        return $isEmpty && $fileExists;

    }

    protected function getSetupStep():int{

        $step=0;

        return $step;

    }

}

