<?php
$timezones=\Hoji\Core\Timezones::getTimeZones();
$defaultTimeZone=\Hoji\Core\Timezones::getDefaultTimezone();

/**
 * $fileString.="\ndefined('DBHOST') || define('DBHOST','".$dbValues['dbhost']."');\n";

        $fileString.="\ndefined('DBNAME') || define('DBNAME','".$dbValues['dbname']."');\n";

        $fileString.="\ndefined('DBUSER') || define('DBUSER','".$dbValues['dbuser']."');\n";

        $fileString.="\ndefined('DBPASS') || define('DBPASS','".$dbValues['dbpass']."');\n";

        $fileString.="\n defined('DBPORT') || define('DBPORT',".$dbValues['dbport'].");\n";
 */
?><h2>Step 2: Database</h2><hr />
<form method="post" class="row justify-content-center">

    <input type="hidden" name="performsetup" id="performsetup" value="set new database"/>

    <div class="col-sm-12 col-md-4">

        <div class="mb-3">

            <label for="dbhost" class="form-label">Database Host:</label>

            <input type="text" name="dbhost" id="dbhost" value="localhost" class="form-control form-control-lg rounded-2" required/>

        </div>

        <div class="mb-3">

            <label for="dbname" class="form-label">Database:</label>

            <input type="text" name="dbname" id="dbname" value="hojidb01" class="form-control form-control-lg rounded-2" required/>

        </div>

        <div class="mb-3"></div>

    </div>

    <div class="col-sm-12 col-md-4">

        <div class="mb-3">

            <label for="dbuser" class="form-label">Database Username:</label>

            <input type="text" name="dbuser" id="dbuser" value="root" class="form-control form-control-lg rounded-2" required/>

        </div>

        <div class="mb-3">

            <label for="dbpass" class="form-label">Database User Password (Optional):</label>

            <input type="password" name="dbpass" id="dbpass" value="root" class="form-control form-control-lg rounded-2"/>

        </div>

    </div>

    <div class="col-sm-12 col-md-4">

        <div class="mb-3">

            <label for="dbport" class="form-label">Database Port:</label>

            <input type="text" name="dbport" id="dbport" value="3306" class="form-control form-control-lg rounded-2" required/>

        </div>

        <div class="mb-3 d-grid">

            <label class="form-label" for="btnext">Next: Manage your admin profile.</label>

            <button type="submit" id="btnext" class="btn btn-primary rounded-2 btn-lg">Save &rarr;</button>

        </div>

    </div>

</form>
