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
    private $version;

    public function __construct($model, $version)
    {
        $this->model = $model;
        $this->version = $version;
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

    public function nlsHunterJobDetails_render()
    {
        $jobCode = $this->model->queryParam('job-code', null);
        if ($jobCode) {
            $job = $this->model->searchJobByJobCode($jobCode);
        }
        if (!$jobCode || !$job) {
            ob_start();
            echo render('job/jobNotFound', ['jobCode' => $jobCode]);
            return ob_get_clean();
        };

        $employerId = property_exists($job, 'EmployerId') ? $job->EmployerId : null;
        $employer = $this->model->getEmployerProperties($employerId);

        ob_start();

        echo render('job/jobDetails', [
            'job' => $job,
            'employer' => $employer,
            'employerUrl' => $this->model->getHunterEmployerDetailsPageUrl($employerId)
        ]);

        return ob_get_clean();
    }

    public function nlsHunterAllJobs_render()
    {
        $jobs = $this->model->getJobHunterExecuteNewQuery2();

        ob_start();

        echo render('job/jobList', [
            'jobs' => $jobs['list'],
            'total' => $jobs['totalHits'],
            'model' => $this->model,
            'jobDetailsPageUrl' => $this->model->getHunterJobDetailsPageUrl()
        ]);

        return ob_get_clean();
    }
}
