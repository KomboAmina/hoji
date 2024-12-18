<?php
namespace Hoji\Setup;

use PDO;

class DatabaseBuilder extends \Hoji\Core\HojiModel{

    public array $dbValues=array();

    public function __construct(array $dbVals=array(
                                                    "dbhost"=>"localhost:6612",
                                                    "dbname"=>"hojidb01",
                                                    "dbuser"=>"root",
                                                    "dbpass"=>"root",
                                                    "dbpass"=>6612
                                                    )){

        parent::__construct();

        $this->dbValues=$dbVals;

    }

    public function createDatabase(string $dbName):bool{

        $conn=new \mysqli($this->dbValues['dbhost'],
                        $this->dbValues['dbuser'],
                        $this->dbValues['dbpass']);

        if($conn->connect_error){

            die("Connection failed: ".$conn->connect_error);

        }

        else{

            $sql="CREATE DATABASE ".$dbName;

            if(!$conn->query($sql)){

                echo "Error creating database: ".$conn->error;

            }

        }

        $conn->close();

        return $this->databaseExists($dbName);

    }

    public function databaseExists(string $checkName):bool{

        $exists=false;

        $conn=new \mysqli($this->dbValues['dbhost'],
                        $this->dbValues['dbuser'],
                        $this->dbValues['dbpass']);

        if($conn->connect_error){

            die("Connection failed: ".$conn->connect_error);

        }

        else{

            $allDBs=array();

            if($result=mysqli_query($conn,"SELECT DATABASE()")){

                while($row=mysqli_fetch_row($result)){

                    $allDBs[]=$row;

                }

                mysqli_free_result($result);

            }

            /**
             * if ($result = mysqli_query($mysqli, "SELECT DATABASE()")) {
            $row = mysqli_fetch_row($result);
            printf("Default database is %s<br />", $row[0]);
            mysqli_free_result($result);
         }
             */

            $exists=in_array($checkName,$allDBs);

            /**
             * $db_list = mysql_list_dbs($connection);

	while ($row = mysql_fetch_array($db_list)) {

		$database_List[] = $row['database'];
	    
	}
             */

            /*
            $result=$conn->query("SHOW TABLES LIKE '".$checkName."'");

            $exists=($result->num_rows>0);
            */

        }

        $conn->close();

        return $exists;

    }

    public function buildDatabase(array $dbValues):void{

        $dbValues=(!empty($dbValues)) ? $dbValues:$this->dbValues;

        $conn=new \mysqli($dbValues['dbhost'],
                        $dbValues['dbuser'],
                        $dbValues['dbpass']);

        if($conn->connect_error){

            die("Connection failed: " . $conn->connect_error);

        }

        else{

            $sql=file_get_contents("src".DS."data".DS."hojibase.sql");

            $dsn="mysql:host=".$dbValues['dbhost'].";dbname=".$dbValues['dbname'].";charset=utf8";

            $newDB=new PDO($dsn, $dbValues['dbuser'], $dbValues['dbpass'],array(PDO::ATTR_PERSISTENT=>true));

            $newDB->exec($sql);

        }

    }

}
