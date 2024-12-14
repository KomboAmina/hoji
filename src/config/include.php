<?php

$configErrors=(isset($configErrors) && is_array($configErrors)) ? $configErrors:array();

$configPrefix=(isset($configPrefix) && !empty($configPrefix)) ? $configPrefix:"src".DS."config".DS;

$incFiles=array("basic.php","database.php");

foreach($incFiles as $incFile){

    $incFile=$configPrefix.$incFile;

    if(file_exists($incFile)){

        include_once $incFile;

    }

    else{

        $file=fopen($incFile,"w") or die("cannot open file: ".$incFile);

        fclose($file);

        $reloc=\Hoji\Core\CurrentURL::getCurrentURL();

        header("Location: ".$reloc);

    }

}
