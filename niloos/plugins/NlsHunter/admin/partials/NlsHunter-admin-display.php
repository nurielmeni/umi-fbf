<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    NlsHunter
 * @subpackage NlsHunter/admin/partials
 */


?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="NlsHunter_settings" class="wrap">
    <h1>Niloos HunterHRMS Settings Page</h1>

    <form method="POST">
        <section id="email-settings">
            <h2 class="section-title">Email Settings</h2>
            <label for="nlsFromName">From Name</label>
            <input type="text" name="nlsFromName" id="nlsFromName" value="<?= $nlsFromName ?>">
            <br>

            <label for="nlsFromMail">From Mail</label>
            <input type="text" name="nlsFromMail" id="nlsFromMail" value="<?= $nlsFromMail ?>">
            <br>

            <label for="nlsToMail">To Mail</label>
            <input type="text" name="nlsToMail" id="nlsToMail" value="<?= $nlsToMail ?>">
            <br>

            <label for="nlsToMail">Bcc Mail (testing)</label>
            <input type="text" name="nlsBccMail" id="nlsBccMail" value="<?= $nlsBccMail ?>">
            <br>
        </section>

        <section id="api-service-settings">
            <h2 class="section-title">API Service Settings</h2>
            <label for="nlsDirectoryWsdlUrl">Directory WSDL</label>
            <input type="text" name="nlsDirectoryWsdlUrl" id="nlsDirectoryWsdlUrl" value="<?= $nlsDirectoryWsdlUrl ?>">
            <br>

            <label for="nlsCardsWsdlUrl">Cards WSDL</label>
            <input type="text" name="nlsCardsWsdlUrl" id="nlsCardsWsdlUrl" value="<?= $nlsCardsWsdlUrl ?>">
            <br>

            <label for="nlsSecurityWsdlUrl">Security WSDL</label>
            <input type="text" name="nlsSecurityWsdlUrl" id="nlsSecurityWsdlUrl" value="<?= $nlsSecurityWsdlUrl ?>">
            <br>

            <label for="nlsSearchWsdlUrl">Search WSDL</label>
            <input type="text" name="nlsSearchWsdlUrl" id="nlsSearchWsdlUrl" value="<?= $nlsSearchWsdlUrl ?>">
            <br>
        </section>

        <section id="application-settings">
            <h2 class="section-title">Application Settings</h2>
            <label for="nlsNsoftSupplierId">Supplier ID</label>
            <input type="text" name="nlsNsoftSupplierId" id="nlsNsoftSupplierId" value="<?= $nlsNsoftSupplierId ?>">
            <br>
            <label for="nlsNsoftHotJobsSupplierId">Hot Jobs Supplier ID</label>
            <input type="text" name="nlsNsoftHotJobsSupplierId" id="nlsNsoftHotJobsSupplierId" value="<?= $nlsNsoftHotJobsSupplierId ?>">
            <br>
        </section>

        <section id="login-settings">
            <h2 class="section-title">Login Settings</h2>
            <label for="nlsConsumerKey">Consumer</label>
            <input type="text" name="nlsConsumerKey" id="nlsConsumerKey" value="<?= $nlsConsumerKey ?>">
            <br>

            <label for="nlsWebServiceDomain">Domain</label>
            <input type="text" name="nlsWebServiceDomain" id="nlsWebServiceDomain" value="<?= $nlsWebServiceDomain ?>">
            <br>

            <label for="nlsSecurityUsername">Username</label>
            <input type="text" name="nlsSecurityUsername" id="nlsSecurityUsername" value="<?= $nlsSecurityUsername ?>">
            <br>

            <label for="nlsSecurityPassword">Password</label>
            <input type="text" name="nlsSecurityPassword" id="nlsSecurityPassword" value="<?= $nlsSecurityPassword ?>">
            <br>
        </section>

        <section id="job-search-settings">
            <h2 class="section-title">Search Settings</h2>

            <label for="nlsJobsCount">Jobs Count</label>
            <input type="number" name="nlsJobsCount" id="nlsJobsCount" value="<?= $nlsJobsCount ?>">
            <br>
            <label for="nlsHotJobsCount">Hot Jobs Count</label>
            <input type="number" name="nlsHotJobsCount" id="nlsHotJobsCount" value="<?= $nlsHotJobsCount ?>">
            <br>
            <label for="nlsEmployersCount">Employers Count</label>
            <input type="number" name="nlsEmployersCount" id="nlsEmployersCount" value="<?= $nlsEmployersCount ?>">
            <br>
        </section>

        <section id="cache-settings">
            <h2 class="section-title">Cache Settings</h2>

            <label for="nlsFlashCache">Disable Caching</label>
            <input type="checkbox" name="nlsFlashCache" id="nlsFlashCache" value="nlsFlashCache" <?= strlen($nlsFlashCache) > 0 ? 'checked' : '' ?>>
            <br>
            <label for="nlsCacheTime">Cache Time (Minutes)</label>
            <input type="number" name="nlsCacheTime" id="nlsCacheTime" value="<?= $nlsCacheTime ?>">
            <br>
        </section>
        <br>
        <section id="hunter_page_settings">
            <h2 class="section-title">Hunter Page Settings</h2>
            <p>[Shortcodes]</p>
            <?= $this->adminSelectPage(NlsHunter_Admin::NLS_HUNTER_EMPLOYERS_EN, $nlsHunterEmployersEn, 'Home - Hunter Employers Page EN') ?>
            <small>* The page must have the slug <i>[nls_hunter_employers]</i></small>
            <br>
            <?= $this->adminSelectPage(NlsHunter_Admin::NLS_HUNTER_EMPLOYERS_HE, $nlsHunterEmployersHe, 'Home - Hunter Employers Page HE') ?>
            <small>* The page must have the slug <i>[nls_hunter_employers]</i></small>
            <br>
            <hr>

            <?= $this->adminSelectPage(NlsHunter_Admin::NLS_HUNTER_EMPLOYER_DETAILS_EN, $nlsHunterEmployerDetailsEn, 'Hunter Employer details Page EN') ?>
            <small>* The page must have the slug <i>[nls_hunter_employer_details]</i></small>
            <br>
            <?= $this->adminSelectPage(NlsHunter_Admin::NLS_HUNTER_EMPLOYER_DETAILS_HE, $nlsHunterEmployerDetailsHe, 'Hunter Employer details Page HE') ?>
            <small>* The page must have the slug <i>[nls_hunter_employer_details]</i></small>
            <hr>

            <?= $this->adminSelectPage(NlsHunter_Admin::NLS_HUNTER_ALL_JOBS_EN, $nlsHunterAllJobsEn, 'Hunter All Jobs Page EN') ?>
            <small>* The page must have the slug <i>[nls_hunter_all_jobs]</i></small>
            <br>
            <?= $this->adminSelectPage(NlsHunter_Admin::NLS_HUNTER_ALL_JOBS_HE, $nlsHunterAllJobsHe, 'Hunter All Jobs Page HE') ?>
            <small>* The page must have the slug <i>[nls_hunter_all_jobs]</i></small>
            <hr>

            <?= $this->adminSelectPage(NlsHunter_Admin::NLS_HUNTER_JOB_DETAILS_EN, $nlsHunterJobDetailsEn, 'Hunter Job Details Page EN') ?>
            <small>* The page must have the slug <i>[nls_hunter_job_details]</i></small>
            <br>
            <?= $this->adminSelectPage(NlsHunter_Admin::NLS_HUNTER_JOB_DETAILS_HE, $nlsHunterJobDetailsHe, 'Hunter Job Details Page HE') ?>
            <small>* The page must have the slug <i>[nls_hunter_job_details]</i></small>
        </section>

        <input type="submit" value="Save" class="button button-primary button-large">
    </form>
</div>