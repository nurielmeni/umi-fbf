<?php
require_once 'Hunter/NlsHelper.php';
require_once ABSPATH . 'wp-content/plugins/NlsHunter/renderFunction.php';

/**
 * Description of class-NlsHunter-modules
 *
 * @author nurielmeni
 */
class NlsHunter_modules
{
    private $model;
    private $attributes;
    private $applicantId;

    public function __construct($model, $version)
    {
        $this->model = $model;
        $this->version = $version;

        $this->attributes = [
            'phone' => ['054-7641456'],
            'fullName' => ['כלכלה כלכלה'],
            'applicantID' => ['55555']
        ];

        $this->applicantId = '826084ab-89b4-4909-b831-bb790a2ede7b';
    }

    private function getHunterAllJobsPageUrl()
    {
        $language = get_bloginfo('language');
        $hunterAllJobsPageId = $language === 'he-IL' ?
            get_option(NlsHunter_Admin::NLS_HUNTER_ALL_JOBS_HE) :
            get_option(NlsHunter_Admin::NLS_HUNTER_ALL_JOBS_EN);
        $hunterAllJobsPageUrl = get_page_link($hunterAllJobsPageId);
        return $hunterAllJobsPageUrl;
    }

    /**
     * Shortcodes Renderers functions
     */
    public function nlsApplicationForm_render()
    {
        if (is_admin()) return '';

        $jobs = $this->model->getJobHunterExecuteNewQuery2();
        if (!$jobs) return '';

        $companyOptions = [
            ['id' => 0, 'value' => 'AVIS'],
            ['id' => 1, 'value' => 'CADILLAC'],
            ['id' => 2, 'value' => 'CHEVROLET'],
            ['id' => 4, 'value' => 'ISUZU'],
        ];

        ob_start();
        echo render('mainImage', [
            'src' => get_template_directory_uri() . '/images/people-transparent-mobile.png'
        ]);

        echo render('job/applicationForm', [
            'jobOptions' => $this->model->listItemsToSelectOptions($jobs['list'], 'JobCode', 'JobTitle'),
            'total' => $jobs['totalHits'],
            'model' => $this->model,
            'companyOptions' => $companyOptions
        ]);

        return ob_get_clean();
    }
}
