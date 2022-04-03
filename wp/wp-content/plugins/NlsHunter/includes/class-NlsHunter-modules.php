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
        $jobs = $this->model->getJobHunterExecuteNewQuery2();
        $companies = [
            ['id' => 0, 'name' => 'Company 0'],
            ['id' => 1, 'name' => 'Company 1'],
            ['id' => 2, 'name' => 'Company 2'],
        ];

        ob_start();

        echo render('job/applicationForm', [
            'jobs' => $jobs['list'],
            'total' => $jobs['totalHits'],
            'model' => $this->model,
            'companies' => $companies
        ]);

        return ob_get_clean();
    }
}
