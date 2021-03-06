<?php
require_once ABSPATH . 'wp-content/plugins/NlsHunter/renderFunction.php';
?>
<form class="nls-apply-for-jobs relative z-30 text-primary w-10/12 mx-auto mt-8" name="nls-apply-for-jobs nls-box-shadow">
    <input type="hidden" name="sid" class="sid-hidden-field" value="<?= $model->nlsGetSupplierId() ?>">
    <div class="form-section mt-4">
        <div class="friends-details">
            <div class="form-header text-white">
                <h2 class="form-title"><?= __('My friend details:', 'NlsHunter') ?></h2>
            </div>
            <div class="form-body flex justify-between align-center flex-wrap gap-3">
                <!--  NAME -->
                <?= render('form/nlsInputField', [
                    'wrapperClass' => 'w-full md:w-input-md lg:w-input-lg',
                    'class' => 'py-1 px-2 rounded-md w-full',
                    'name' => 'friend-name',
                    'validators' => ['required'],
                    'placeHolder' => __('Full Name', 'NlsHunter')
                ]) ?>

                <!--  CELL PHONE -->
                <?= render('form/nlsInputField', [
                    'wrapperClass' => 'w-full md:w-input-md lg:w-input-lg',
                    'class' => 'py-1 px-2 rounded-md w-full',
                    'name' => 'friend-cell',
                    'validators' => ['required', 'phone'],
                    'placeHolder' => __('Cell', 'NlsHunter')
                ]) ?>

                <!--  CITY -->
                <?= render('form/nlsInputField', [
                    'wrapperClass' => 'w-full md:w-input-md lg:w-input-lg',
                    'class' => 'py-1 px-2 rounded-md w-full',
                    'name' => 'friend-area',
                    'validators' => ['required'],
                    'placeHolder' => __('Area', 'NlsHunter')
                ]) ?>

                <!-- JOB SELECT -->
                <?= render('form/nlsSelectField', [
                    'wrapperClass' => 'w-full md:w-input-md lg:w-input-lg',
                    'name' => 'friend-job-code',
                    'options' => $jobOptions,
                    'value' => null,
                    'selectWrapClass' => 'w-full',
                    'placeHolder' => __('Job', 'NlsHunter')
                ]) ?>

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
    <div class="form-section mt-4">
        <div class="employee-details">
            <div class="form-header text-white">
                <h2 class="form-title"><?= __('My details:', 'NlsHunter') ?></h2>
            </div>
            <div class="form-body flex justify-between align-center flex-wrap gap-3">
                <!--  EMPLOYEE NAME -->
                <?= render('form/nlsInputField', [
                    'wrapperClass' => 'w-full md:w-input-md lg:w-input-lg',
                    'class' => 'py-1 px-2 rounded-md w-full',
                    'name' => 'employee-name',
                    'validators' => ['required'],
                    'placeHolder' => __('Full Name', 'NlsHunter')
                ]) ?>

                <!-- EMPLOYEE ID -->
                <?= render('form/nlsInputField', [
                    'wrapperClass' => 'w-full md:w-input-md lg:w-input-lg',
                    'class' => 'py-1 px-2 rounded-md w-full',
                    'name' => 'employee-id',
                    'validators' => ['required'],
                    'placeHolder' => __('Employee ID', 'NlsHunter')
                ]) ?>

                <!--  EMAIL -->
                <?= render('form/nlsInputField', [
                    'wrapperClass' => 'w-full md:w-input-md lg:w-input-2lg',
                    'class' => 'py-1 px-2 rounded-md w-full',
                    'name' => 'employee-email',
                    'validators' => ['required email'],
                    'placeHolder' => __('Email', 'NlsHunter')
                ]) ?>

            </div>
            <div class="form-footer flex justify-center items-center">
                <button class="apply-job border-2 py-1 px-12 mt-6 bg-white font-bold rounded-full"><?= __('Send >>', 'NlsHunter') ?></button>
            </div>
            <div class="form-footer">
                <div class="help-block text-white"></div>
            </div>
        </div>
        <!--
        <div class="form-footer">
            <p><?= __('* By the terms', 'NlsHunter') ?></p>
        </div>
        -->
    </div>
</form>