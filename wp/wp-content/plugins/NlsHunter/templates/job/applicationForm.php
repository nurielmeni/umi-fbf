<?php
require_once ABSPATH . 'wp-content/plugins/NlsHunter/renderFunction.php';
$jobOptions = $jobs;
?>
<form class="nls-apply-for-jobs text-white" name="nls-apply-for-jobs nls-box-shadow">
    <input type="hidden" name="sid" class="sid-hidden-field" value="<?= $supplierId ?>">
    <div class="form-section">
        <div class="friends-details">
            <div class="form-header">
                <h2 class="form-title"><?= __('My friend details:', 'NlsHunter') ?></h2>
            </div>
            <div class="form-body flex space-between align-center wrap">
                <span class="remove"></span>
                <!--  NAME -->
                <div class="nls-apply-field">
                    <label for="friend-name--0"><?= __('Full Name', 'NlsHunter') ?></label>
                    <input type="text" id="friend-name--0" name="friend-name[]" validator="required" class="" aria-invalid="false" aria-required="true">
                    <div class="help-block"></div>
                </div>

                <!--  CELL PHONE -->
                <div class="nls-apply-field">
                    <label for="friend-cell--0"><?= __('Cell', 'NlsHunter') ?></label>
                    <input type="tel" id="friend-cell--0" name="friend-cell[]" class="ltr" validator="required phone" aria-invalid="false" aria-required="true">
                    <div class="help-block"></div>
                </div>

                <!--  CITY -->
                <div class="nls-apply-field">
                    <label for="friend-area--0"><?= __('Area', 'NlsHunter') ?></label>
                    <input type="text" id="friend-area--0" name="friend-area[]" aria-invalid="false" aria-required="true">
                    <div class="help-block"></div>
                </div>

                <!-- JOB SELECT -->
                <div class="nls-apply-field  select-wrapper">
                    <label for="friend-job-code--0"><?= __('What job?', 'NlsHunter') ?></label>

                    <select id="friend-job-code--0" name="friend-job-code[]">
                        <?php foreach ($jobs as $job) : ?>
                            <option value="<?= $job['jobCode'] ?>"><?= $job['jobTitle'] ?></option>
                        <?php endforeach ?>
                    </select>

                    <div class="help-block"></div>
                </div>

                <!--  CV FILE 
                <div class="nls-apply-field browse">
                    <label for="friend-cv--0"><span class="text-button add-resume"><?= __('Append CV File', 'NlsHunter') ?></span></label>
                    <input type="file" id="friend-cv--0" name="friend-cv[]" hidden class="ltr" aria-invalid="false" aria-required="true">
                    <div class="help-block"></div>
                </div>
                -->
            </div>
            <div class="form-footer">
            </div>
        </div>
    </div>
    <div class="form-section">
        <div class="employee-details">
            <div class="form-header">
                <h2 class="form-title"><?= __('My details:', 'NlsHunter') ?></h2>
            </div>
            <div class="form-body flex align-center wrap">
                <!--  EMPLOYEE NAME -->
                <div class="nls-apply-field">
                    <label for="employee-name"><?= __('My Name', 'NlsHunter') ?></label>
                    <input type="text" name="employee-name" validator="required" class="" aria-invalid="false" aria-required="true">
                    <div class="help-block"></div>
                </div>

                <!-- EMPLOYEE ID -->
                <div class="nls-apply-field">
                    <label for="employee-id"><?= __('Employee ID', 'NlsHunter') ?></label>
                    <input type="text" name="employee-id" validator="required ISRID" class="ltr" aria-invalid="false" aria-required="true">
                    <div class="help-block"></div>
                </div>

                <!--  EMAIL -->
                <div class="nls-apply-field employee-email">
                    <label for="employee-email"><?= __('Company email', 'NlsHunter') ?></label>
                    <input type="text" name="employee-email" validator="required email" class="ltr text-right" aria-invalid="false" aria-required="true">
                    <div class="help-block"></div>
                </div>

                <!-- Company -->
                <div class="nls-apply-field  select-wrapper">
                    <label for="friend-job-code--0"><?= __('What job?', 'NlsHunter') ?></label>

                    <select id="friend-job-code--0" name="friend-job-code[]">
                        <?php foreach ($companies as $company) : ?>
                            <option value="<?= $company['id'] ?>"><?= $company['name'] ?></option>
                        <?php endforeach ?>
                    </select>

                    <div class="help-block"></div>
                </div>
            </div>
            <div class="form-footer">
            </div>
            <div class="form-footer">
                <div class="help-block"></div>
            </div>
        </div>
        <div class="form-footer">
            <p><?= __('* By the terms', 'NlsHunter') ?></p>
        </div>
    </div>
</form>