<?php
namespace Hoji\Setup;

class SetupModel extends \Hoji\Core\HojiModel{

    public function buildConfigDatabaseFile(array $dbValues):bool{

        $fileString="<?php /**Generated ".$this->now."**/\n";

        $fileString.="\ndefined('DBHOST') || define('DBHOST','".$dbValues['dbhost']."');\n";

        $fileString.="\ndefined('DBNAME') || define('DBNAME','".$dbValues['dbname']."');\n";

        $fileString.="\ndefined('DBUSER') || define('DBUSER','".$dbValues['dbuser']."');\n";

        $fileString.="\ndefined('DBPASS') || define('DBPASS','".$dbValues['dbpass']."');\n";

        $fileString.="\ndefined('DBPORT') || define('DBPORT',".$dbValues['dbport'].");\n";

        $file=fopen("src".DS."config".DS."database.php","w");

        fwrite($file,$fileString);

        fclose($file);

        return file_exists("src".DS."config".DS."database.php");

    }

    public function buildConfigBasicFile(string $url, string $timezone):bool{

        $fileString="<?php /**Generated ".$this->now."**/\n";

        $fileString.="\ndefined('URL') || define('URL','".$url."');\n";

        $fileString.="\ndefined('TITLE') || define('TITLE','Hoji');\n";

        $fileString.="\ndefined('APPVERSION') || define('APPVERSION','1.0.0');\n";

        $fileString.="\ndefined('TIMEZONE') || define('TIMEZONE','+3:00');\n";

        $fileString.="\ndefined('PUBLICDIR') || define('PUBLICDIR','public'.DS);\n";

        $fileString.="\ndefined('FILESYSTEMURI') || define('FILESYSTEMURI',URL.'files/');\n";

        $fileString.="\ndefined('DEVURL') || define('DEVURL','https://www.aminakombo.work/');\n";

        $file=fopen("src".DS."config".DS."basic.php","w");

        fwrite($file,$fileString);

        fclose($file);

        return file_exists("src".DS."config".DS."basic.php");

    }

    public function buildHtAccess(string $timezone):bool{

        $fileString="php_value date.timezone '".$timezone."'\n";

        $fileString.="\nRewriteEngine On \n";

        $fileString.="\nRewriteRule ^(calls|files)($|/) - [L]\n";

        $fileString.="\nRewriteRule ^(.*)/(.*)/(.*)/$ index.php?route=$1&action=$2&target=$3 [QSA,L]\n";

        $fileString.="\nRewriteRule ^(.*)/(.*)/$ index.php?route=$1&action=$2 [QSA,L]\n";

        $fileString.="\nRewriteRule ^(.*)/$ index.php?route=$1 [QSA,L]\n";

        $file=fopen(".htaccess","w");

        fwrite($file,$fileString);

        fclose($file);

        return file_exists(".htaccess");

    }

}
