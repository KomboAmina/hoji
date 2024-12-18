<?php
$timezones=\Hoji\Core\Timezones::getTimeZones();
$defaultTimeZone=\Hoji\Core\Timezones::getDefaultTimezone();
?><h2>Step 1 &rarr; Set Your Timezone</h2>
<hr />
<form method="post" class="row justify-content-center">

    <input type="hidden" name="performsetup" id="performsetup" value="set time zone"/>

    <div class="col-sm-12 col-md-8 mb-3">

        <label for="timezone" class="form-label">Timezone:</label>

        <select name="timezone" id="timezone" class="form-select form-select-lg rounded-2">

        <?php foreach($timezones as $label=>$value){?>

            <option value="<?php echo $value;?>"
            <?php if($value==$defaultTimeZone){?>selected<?php }?>><?php echo $label;?></option>

        <?php }?>

        </select>

    </div>

    <div class="col-sm-12 col-md-4 mb-3">

        <div class="d-grid">

            <label class="form-label" for="btnsub">Next: Database Setup</label>

            <button type="submit"
             id="btnsub"
              class="btn btn-primary rounded-2 btn-lg">Save &rarr;</button>

        </div>

    </div>

</form>
