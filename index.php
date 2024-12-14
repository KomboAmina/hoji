<?php

defined('DS') || define('DS',DIRECTORY_SEPARATOR);

$configFiles=array(
                    "vendor".DS."autoload.php",
                    "src".DS."config".DS."include.php"
                );

$configErrors=array();

foreach($configFiles as $configFile){

    if(file_exists($configFile)){

        include_once $configFile;

    }

    else{

        $configErrors[]="file not found: ".$configFile;

    }

}

if(empty($configErrors)){

    $app=new \Hoji\Core\Hoji();

    if(method_exists($app->view,"load")){

        $app->view->load();

    }

    else{

        echo "<h1>Check the developer site.</h1><p>Hoji\Core\BaseView is missing a load() method.</p>";

    }

}
else{

    echo "<h1>Config Errors:</h1>";

    echo "<ol>";

    foreach($configErrors as $configError){

        echo "<li>".$configError."</li>";

    }

    echo "</ol>";

}
