<?php
namespace Hoji\Setup;

class SetupController extends \Hoji\Core\HojiController{

    public object $setupChecker;

    public function __construct($model){

        parent::__construct($model);

        $this->setupChecker=new \Hoji\Core\SetupChecker();

        if(isset($_POST['performsetup'])){

            $this->handlePerformSetup($_POST['performsetup']);

        }

        if($this->setupChecker->setupStep==0 && defined('URL')){

           $this->relocate(URL);

        }

    }

    public function handlePerformSetup(string $methodName):void{

        $methodName=$this->model->formatMethodName($methodName);

        if(method_exists($this,$methodName)){

            $this->$methodName();

        }

    }

    public function setTimeZone():void{

        $url=\Hoji\Core\CurrentURL::getCurrentURL();

        $displacement=\Hoji\Core\Timezones::getTimeZoneDisplacement($_POST['timezone']);

        $basicCreated=$this->model->buildConfigBasicFile($url, $displacement);

        $fileCreated=$this->model->buildHtAccess($_POST['timezone']);

        if($fileCreated && $basicCreated){

            $this->relocate($url."setup/");

        }

        else{

            echo "Files not created.<br />";

        }

    }

    public function setNewDatabase():void{

        $url=\Hoji\Core\CurrentURL::getCurrentURL();

        $dbValues=array(
                        "dbhost"=>$_POST['dbhost'],
                        "dbname"=>$_POST['dbname'],
                        "dbuser"=>$_POST['dbuser'],
                        "dbpass"=>$_POST['dbpass'],
                        "dbport"=>$_POST['dbport']
                    );

        $fileCreated=$this->model->buildConfigDatabaseFile($dbValues);

        if($fileCreated){

            $databaseBuilder=new \Hoji\Setup\DatabaseBuilder($dbValues);

            if(!$databaseBuilder->databaseExists($dbValues['dbname'])){

                $databaseBuilder->createDatabase($dbValues['dbname']);

            }

            $databaseBuilder->buildDatabase($dbValues);

            $this->relocate($url);

        }

        else{

            echo "Database not created.<br />";

        }

    }

}
