<?php

use App\Http\Controllers\Admin\AboutUsPageController;
use App\Http\Controllers\Admin\AgentListController;
use App\Http\Controllers\Admin\AnnualReportController;
use App\Http\Controllers\Admin\AnnualReportListController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\AwardListController;
use App\Http\Controllers\Admin\BoardCategoryController;
use App\Http\Controllers\Admin\BoardMembersController;
use App\Http\Controllers\Admin\BoardOfDirectorsController;
use App\Http\Controllers\Admin\BranchListController;
use App\Http\Controllers\Admin\BranchLocationController;
use App\Http\Controllers\Admin\CalculatorMotorTariffPriceController;
use App\Http\Controllers\Admin\CeoMdMessageController;
use App\Http\Controllers\Admin\CeoProfileController;
use App\Http\Controllers\Admin\ChairmanAwardListController;
use App\Http\Controllers\Admin\ChairmanMessageController;
use App\Http\Controllers\Admin\ChairmanProfileController;
use App\Http\Controllers\Admin\CircularListController;
use App\Http\Controllers\Admin\CircularPageController;
use App\Http\Controllers\Admin\CitizenCharterController;
use App\Http\Controllers\Admin\ClaimFormListController;
use App\Http\Controllers\Admin\ClaimsFormController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\CodeOfConductController;
use App\Http\Controllers\Admin\CommitteeBoardController;
use App\Http\Controllers\Admin\CommitteeBoardMemberController;
use App\Http\Controllers\Admin\CommitteeNameController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\ComplainFeedbackController;
use App\Http\Controllers\Admin\ComplainFeedbackPageController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CorporateGovernanceController;
use App\Http\Controllers\Admin\CreditRatingController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\DetailsOfShareholdingController;
use App\Http\Controllers\Admin\DetailsOfShareholdingListController;
use App\Http\Controllers\Admin\DirectorReportController;
use App\Http\Controllers\Admin\DirectorReportListController;
use App\Http\Controllers\Admin\DistributionPolicyController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EmployeeListController;
use App\Http\Controllers\Admin\FinancialHighlightController;
use App\Http\Controllers\Admin\FinancialListController;
use App\Http\Controllers\Admin\FinancialYearController;
use App\Http\Controllers\Admin\HomeNoticeController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\InvestorRelationDepartmentController;
use App\Http\Controllers\Admin\InvolvementListController;
use App\Http\Controllers\Admin\ItInfrastructureController;
use App\Http\Controllers\Admin\KycProfileFormController;
use App\Http\Controllers\Admin\LinkWebsiteController;
use App\Http\Controllers\Admin\LinkWebsiteListController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\ManagementMemberController;
use App\Http\Controllers\Admin\ManagementNameController;
use App\Http\Controllers\Admin\MediaImageController;
use App\Http\Controllers\Admin\MediaImageListController;
use App\Http\Controllers\Admin\MediaVideoController;
use App\Http\Controllers\Admin\MediaVideoListController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MissionVisionController;
use App\Http\Controllers\Admin\MujibCornerController;
use App\Http\Controllers\Admin\MujibGalleryController;
use App\Http\Controllers\Admin\MujibVideoListController;
use App\Http\Controllers\Admin\NewsEventController;
use App\Http\Controllers\Admin\NewsEventListController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\NoticeInvestorController;
use App\Http\Controllers\Admin\NoticeInvestorListController;
use App\Http\Controllers\Admin\NoticeListController;
use App\Http\Controllers\Admin\ParticularListController;
use App\Http\Controllers\Admin\PassengerPriceController;
use App\Http\Controllers\Admin\PendingDividendController;
use App\Http\Controllers\Admin\PendingDividendListController;
use App\Http\Controllers\Admin\PriceSensitiveController;
use App\Http\Controllers\Admin\PriceSensitiveListController;
use App\Http\Controllers\Admin\ProposalFormController;
use App\Http\Controllers\Admin\ProposalFormListController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\PublicationListController;
use App\Http\Controllers\Admin\QuarterlyReportController;
use App\Http\Controllers\Admin\QuarterlyReportListController;
use App\Http\Controllers\Admin\SaleBuyDeclarationController;
use App\Http\Controllers\Admin\SaleBuyDeclarationListController;
use App\Http\Controllers\Admin\ShareholdingListController;
use App\Http\Controllers\Admin\ShareholdingPositionController;
use App\Http\Controllers\Admin\ValueAddedStatementController;
use App\Http\Controllers\Admin\ValueAddedStatementListController;
use App\Http\Controllers\ApiOrderController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminForgotPasswordController;
use App\Http\Controllers\Backend\AdminResetPasswordController;
use App\Http\Controllers\Backend\ProductAndServiceManagementController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontendMotorController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PersonalAwardController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleDeclarationController;

Auth::routes(['register' => false]);

//Route::get('/we', function () {
//    return view('backend.layouts.master');
//});

Route::get('/storage_link', function () {
    Artisan::call('storage:link');
});

Route::prefix(parseLocale())->group(function () {

    Route::get('/privacy-policy', [PrivacyController::class, 'privacyPolicy'])->name('privacyPolicy');
    Route::get('/deletion-policy', [PrivacyController::class, 'deletion_policy'])->name('deletion_policy');
    Route::get('/terms-condition', [PrivacyController::class, 'termsCondition'])->name('termsCondition');

    Route::get('/select', [FrontendController::class, 'select'])->name('select');
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about_us');
    Route::get('/circular', [FrontendController::class, 'circular'])->name('more.circular');
    Route::get('/links', [FrontendController::class, 'links'])->name('more.links');
    Route::get('/kyc-profile-form', [FrontendController::class, 'kycProfileForm'])->name('more.kyc_profile_form');
    Route::get('/proposal-form', [FrontendController::class, 'proposalForm'])->name('more.proposal_form');
    Route::get('/proposal-form-list/{id}', [FrontendController::class, 'proposalFormListDetails'])->name('more.proposal_form_list');
    Route::get('/claims-form', [FrontendController::class, 'claimsForm'])->name('more.claims_form');
    Route::get('/claims-form-details/{id}', [FrontendController::class, 'claimsFormDetails'])->name('more.claims_form_details');
    Route::get('/circular-details/{id}', [FrontendController::class, 'circularDetails'])->name('more.circular_details');
    Route::get('/contact-us', [FrontendController::class, 'contactUS'])->name('contact.us');
    Route::get('/report-complains', [FrontendController::class, 'reportComplains'])->name('report_complains');
    Route::get('/agent-list', [FrontendController::class, 'agentList'])->name('agent_list');
    Route::get('/awards', [FrontendController::class, 'moreAwards'])->name('more.awards');
    Route::get('/news-events', [FrontendController::class, 'moreNewsEvent'])->name('more.news_event');
    Route::get('/news-events-details/{id}', [FrontendController::class, 'newsEventDetails'])->name('news_event_details');
    Route::get('/notices', [FrontendController::class, 'moreNotices'])->name('more.notices');
    Route::get('/notices-details/{id}', [FrontendController::class, 'noticesDetails'])->name('notices_details');
    Route::get('/chairman-profile', [FrontendController::class, 'chairmanProfile'])->name('chairman_profile');
    Route::get('/chairman-message', [FrontendController::class, 'chairmanMessage'])->name('chairman_message');
    Route::get('/ceo-message', [FrontendController::class, 'ceoMessage'])->name('ceo_message');
    Route::get('/ceo-md-message', [FrontendController::class, 'mdMessage'])->name('md_message');
    Route::get('/ceo-profile', [FrontendController::class, 'ceoProfile'])->name('ceo_profile');
    Route::get('/md-profile', [FrontendController::class, 'mdProfile'])->name('md_profile');
    Route::get('/board-of-directors', [FrontendController::class, 'boardOfDirectors'])->name('board_of_directors');
    Route::get('/board-of-directors-profile/{id}', [FrontendController::class, 'bodProfile'])->name('bods_profile');
    Route::get('/management', [FrontendController::class, 'management'])->name('management');
    Route::get('/employee-list', [FrontendController::class, 'employeeList'])->name('employee_list');

    Route::get('/commitees-of-the-board', [FrontendController::class, 'boardCommitees'])->name('commitees_of_the_board');

    Route::get('/audit-commitee', [FrontendController::class, 'auditCommitees'])->name('audit_commitee');
    Route::get('/business-commitee', [FrontendController::class, 'businessCommitees'])->name('business_commitee');
    Route::get('/nr-commitee', [FrontendController::class, 'nrCommitees'])->name('nr_commitee');
    Route::get('/mission-vision', [FrontendController::class, 'missionVission'])->name('mission_vission');
    Route::get('/company-profile', [FrontendController::class, 'companyProfile'])->name('company_profile');
    Route::get('/credit-rating', [FrontendController::class, 'CreditRating'])->name('credit_rating');
    Route::get('/financial-highlights', [ReportController::class, 'financialHighlights'])->name('fi.financial.highlights');
    Route::get('/annual-report', [ReportController::class, 'annualReport'])->name('fi.annual.report');
    Route::get('/annual-report-details/{id}', [ReportController::class, 'annualReportDetails'])->name('fi.annual.report.details');
    Route::get('/quarterly-report', [ReportController::class, 'quarterlyReport'])->name('fi.quarterly.report');
    Route::get('/quarterly-report-details/{id}', [ReportController::class, 'quarterlyReportDetails'])->name('fi.quarterly.report.details');
    Route::get('/value-added-statement', [ReportController::class, 'valueAddedStatement'])->name('fi.value_added_statement');
    Route::get('/value-added-statement-details/{id}', [ReportController::class, 'valueAddedStatementDetails'])->name('fi.value_added_statement_details');
    Route::get('/directors-reports', [SaleDeclarationController::class, 'directorsReports'])->name('ir.directors_reports');
    Route::get('/directors-reports-details/{id}', [SaleDeclarationController::class, 'directorsReportsDetails'])->name('ir.directors_reports_details');
    Route::get('/shareholding-position', [SaleDeclarationController::class, 'shareHoldingPosition'])->name('ir.share-holding.position');
    Route::get('/details-of-shareholding', [SaleDeclarationController::class, 'shareHolding'])->name('ir.share-holding');
    Route::get('/sale-buy-declaration', [SaleDeclarationController::class, 'saleBuy'])->name('ir.sale.buy.declaration');
    Route::get('/dividend-distribution-policy', [SaleDeclarationController::class, 'dividendDistributionPolicy'])->name('ir.dividend_distribution_policy');
    Route::get('/price-sensitive-information', [SaleDeclarationController::class, 'priceSensitive'])->name('ir.price.sensitive.information');
    Route::get('/price-sensitive-information-details/{id}', [SaleDeclarationController::class, 'priceSensitiveDetails'])->name('ir.price.sensitive.information.details');
    Route::get('/unpaid-unclaimed-dividend', [SaleDeclarationController::class, 'unpaidUnclaimedDividend'])->name('ir.unpaid_unclaimed_dividend');
    Route::get('/unpaid-unclaimed-dividend-details/{id}', [SaleDeclarationController::class, 'unpaidUnclaimedDividendDetails'])->name('ir.unpaid_unclaimed_dividend_details');
    Route::get('/notice-to-the-investor', [SaleDeclarationController::class, 'noticeInvestor'])->name('ir.notice_investor');
    Route::get('/notice-investor-details/{id}', [SaleDeclarationController::class, 'investorNoticeDetails'])->name('investor_notice_details');
    Route::get('/code-of-conduct', [SaleDeclarationController::class, 'codeOfConduct'])->name('ir.code_of_conduct');
    Route::get('/investors-relation-department', [SaleDeclarationController::class, 'investorsRelationDepartment'])->name('ir.investors_relation_department');
    Route::get('/corporate-governance', [SaleDeclarationController::class, 'corporateGovernance'])->name('ir.corporate_governance');
    Route::get('/branches', [BranchController::class, 'Branch'])->name('more.branches');
    Route::get('/mujib-corner', [BranchController::class, 'mujibCorner'])->name('more.mujib-corner');

    Route::prefix('/media')->name('media.')->group(function () {
        Route::get('/publications', [MediaController::class, 'publications'])->name('publications');
        Route::get('/publications-details/{id}', [MediaController::class, 'publicationsDetails'])->name('publications_details');
        Route::get('/images', [MediaController::class, 'images'])->name('images');
        Route::get('/videos', [MediaController::class, 'videos'])->name('videos');
        //ajax filter
        Route::get('/sort-publicaitons', [MediaController::class, 'sortPublicaitons'])->name('sort_publicaitons');
        Route::get('/sort-videos', [MediaController::class, 'sortVideos'])->name('sort_videos');
        Route::get('/sort-news-events', [MediaController::class, 'sortNewsEvents'])->name('sort_news_events');
        Route::get('/sort-images', [MediaController::class, 'sortImages'])->name('sort_images');
        //ajax search
        Route::get('/search-publicaitons', [MediaController::class, 'searchPublicaitons'])->name('search_publicaitons');
        Route::get('/search-videos', [MediaController::class, 'searchVideos'])->name('search_videos');
        Route::get('/search-news-events', [MediaController::class, 'searchNewsEvents'])->name('search_news_events');
        Route::get('/search-images', [MediaController::class, 'searchImages'])->name('search_images');
    });

    Route::get('/get_vehicle_type/{id}', [FrontendMotorController::class, 'get_vehicle_type'])->name('get_vehicle_type');
    Route::get('/get_vehicle_type_renewal/{id}/{type_id}', [FrontendMotorController::class, 'get_vehicle_type_renewal'])->name('get_vehicle_type_renewal');
    Route::get('/admin/get_vehicle_type/{id}', [FrontendMotorController::class, 'admin_get_vehicle_type'])->name('admin_get_vehicle_type');
    Route::get('/admin/get_engine_capacity/{id}', [FrontendMotorController::class, 'admin_get_engine_capacity'])->name('admin_get_engine_capacity');
    Route::post('/get_engine_capacity', [FrontendMotorController::class, 'get_engine_capacity'])->name('get_engine_capacity');
    Route::get('/get_engine_capacity_renewal/{id}', [FrontendMotorController::class, 'get_engine_capacity_renewal'])->name('get_engine_capacity_renewal');

    Route::get('/api/get-city-list', [ApiOrderController::class, 'get_city_list'])->name('get_city_list');
    Route::post('/api/place-order', [ApiOrderController::class, 'place_order'])->name('place_order');
    Route::post('/api/place-order', [ApiOrderController::class, 'place_order_draft'])->name('place_order_draft')->middleware('auth:sanctum');

    Route::post('/api/motor-tariff', [FrontendMotorController::class, 'get_motor_tariff'])->name('get_motor_tariff');
    Route::post('/motor-tariff-web', [FrontendMotorController::class, 'get_motor_tariff_web'])->name('get_motor_tariff_web');
    Route::post('/add-one-year', [FrontendMotorController::class, 'add_one_year'])->name('add-one-year');
    Route::get('get-branch-list/{id}', [CmsController::class, 'get_branch_list'])->name('get_branch_list');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::resource('home-notice', HomeNoticeController::class);
    Route::get('cms', [CmsController::class, 'cms'])->name('admin.cms');
    Route::resource('home-page', HomePageController::class);
    Route::get('home-page-edit/section1', [HomePageController::class, 'section_1'])->name('home_page_section_1');
    Route::get('home-page-edit/section2', [HomePageController::class, 'section_2'])->name('home_page_section_2');

    Route::resource('about-us-page', AboutUsPageController::class);
    Route::resource('circular-page', CircularPageController::class);
    Route::resource('circular-list', CircularListController::class);

    Route::get('home-page-edit/section3', [HomePageController::class, 'section_3'])->name('home_page_section_3');
    Route::get('home-page-edit/section4', [HomePageController::class, 'section_4'])->name('home_page_section_4');
    Route::get('home-page-edit/section5', [HomePageController::class, 'section_5'])->name('home_page_section_5');
    Route::get('home-page-edit/section6', [HomePageController::class, 'section_6'])->name('home_page_section_6');
    Route::get('home-page-edit/section7', [HomePageController::class, 'section_7'])->name('home_page_section_7');

    Route::resource('ceo-profile', CeoProfileController::class);
    Route::resource('chairman-message', ChairmanMessageController::class);
    Route::resource('company-profile', CompanyProfileController::class);
    Route::get('company-profile/edit/section1', [CompanyProfileController::class, 'section_1'])->name('company_profile_section_1');
    Route::get('company-profile/edit/section2', [CompanyProfileController::class, 'section_2'])->name('company_profile_section_2');
    Route::get('company-profile/edit/section3', [CompanyProfileController::class, 'section_3'])->name('company_profile_section_3');
    Route::get('company-profile/edit/section4', [CompanyProfileController::class, 'section_4'])->name('company_profile_section_4');
    Route::get('company-profile/edit/section5', [CompanyProfileController::class, 'section_5'])->name('company_profile_section_5');
    Route::get('company-profile/edit/section6', [CompanyProfileController::class, 'section_6'])->name('company_profile_section_6');
    Route::resource('mission-vision', MissionVisionController::class);
    Route::resource('chairman-profile', ChairmanProfileController::class);
    Route::resource('involvement-list', InvolvementListController::class);
    Route::resource('chairman-award-list', ChairmanAwardListController::class);
    Route::resource('board-of-directors', BoardOfDirectorsController::class);
    Route::resource('designation', DesignationController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('board-category', BoardCategoryController::class);
    Route::resource('board-members', BoardMembersController::class);
    Route::resource('management', ManagementController::class);
    Route::resource('management-member', ManagementMemberController::class);
    Route::resource('credit-rating', CreditRatingController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('branch-location', BranchLocationController::class);
    Route::resource('branch-list', BranchListController::class);
    Route::resource('employee-list', EmployeeListController::class);
    Route::resource('agent-list', AgentListController::class);
    Route::resource('committee-board', CommitteeBoardController::class);
    Route::resource('committee-name', CommitteeNameController::class);
    Route::resource('committee-board-member', CommitteeBoardMemberController::class);
    Route::resource('financial-highlight', FinancialHighlightController::class);
    Route::resource('financial-list', FinancialListController::class);
    Route::post('financial-list-update', [FinancialListController::class, 'multiple_update'])->name('financial_list_update');

    Route::resource('particular-list', ParticularListController::class);
    Route::resource('financial-year-list', FinancialYearController::class);

    Route::resource('annual-report', AnnualReportController::class);
    Route::resource('annual-report-list', AnnualReportListController::class);
    Route::resource('quarterly-report', QuarterlyReportController::class);
    Route::resource('quarterly-report-list', QuarterlyReportListController::class);
    Route::resource('value-added-statement', ValueAddedStatementController::class);
    Route::resource('value-added-statement-list', ValueAddedStatementListController::class);
    Route::resource('director-report', DirectorReportController::class);
    Route::resource('director-report-list', DirectorReportListController::class);
    Route::resource('shareholding-position', ShareholdingPositionController::class);
    Route::resource('shareholding-list', ShareholdingListController::class);
    Route::resource('sale-buy-declaration', SaleBuyDeclarationController::class);
    Route::resource('sale-buy-declaration-list', SaleBuyDeclarationListController::class);
    Route::resource('corporate-governance', CorporateGovernanceController::class);
    Route::resource('notice-investor', NoticeInvestorController::class);
    Route::resource('notice-investor-list', NoticeInvestorListController::class);
    Route::resource('price-sensitive', PriceSensitiveController::class);
    Route::resource('price-sensitive-list', PriceSensitiveListController::class);
    Route::resource('distribution-policy', DistributionPolicyController::class);
    Route::resource('pending-dividend', PendingDividendController::class);
    Route::resource('pending-dividend-list', PendingDividendListController::class);
    Route::resource('code-of-conduct', CodeOfConductController::class);
    Route::resource('investor-relation-department', InvestorRelationDepartmentController::class);
    Route::resource('contact-us', ContactUsController::class);
    Route::resource('contact-message', ContactMessageController::class);
    Route::resource('mujib-corner', MujibCornerController::class);
    Route::resource('mujib-gallery', MujibGalleryController::class);
    Route::resource('mujib-video-list', MujibVideoListController::class);
    Route::resource('award', AwardController::class);
    Route::resource('award-list', AwardListController::class);
    Route::resource('publication', PublicationController::class);
    Route::resource('publication-list', PublicationListController::class);
    Route::resource('media-image', MediaImageController::class);
    Route::resource('media-image-list', MediaImageListController::class);
    Route::delete('media-image-list-delete/{id}', [MediaImageListController::class, 'delete_single_image'])->name('media_single_image_delete');
    Route::resource('media-video', MediaVideoController::class);
    Route::resource('media-video-list', MediaVideoListController::class);
    Route::resource('news-event', NewsEventController::class);
    Route::resource('news-event-list', NewsEventListController::class);
    Route::resource('notice', NoticeController::class);
    Route::resource('notice-list', NoticeListController::class);
    Route::resource('menu', MenuController::class);

    Route::resource('proposal-form', ProposalFormController::class);
    Route::resource('proposal-form-list', ProposalFormListController::class);
    Route::resource('claims-form', ClaimsFormController::class);
    Route::resource('claim-form-list', ClaimFormListController::class);
    Route::resource('kyc-profile-form', KycProfileFormController::class);
    Route::resource('link-website', LinkWebsiteController::class);
    Route::resource('link-website-list', LinkWebsiteListController::class);

    Route::get('change-password', [AuthController::class, 'change_password'])->name('change_password');
    Route::post('save-password', [AuthController::class, 'save_password'])->name('save_password');

    Route::resource('passenger-price', PassengerPriceController::class);
    Route::resource('calculator-motor-tariff-price', CalculatorMotorTariffPriceController::class);
    Route::resource('complain-feedback', ComplainFeedbackController::class);

    Route::resource('complain-feedback-page', ComplainFeedbackPageController::class);
    Route::resource('it-infrastructure', ItInfrastructureController::class);
    Route::resource('citizen-charter', CitizenCharterController::class);
    Route::resource('ceo-md-message', CeoMdMessageController::class);

    Route::resource('details-of-shareholding', DetailsOfShareholdingController::class);
    Route::resource('details-of-shareholding-list', DetailsOfShareholdingListController::class);
    Route::resource('management-name', ManagementNameController::class);
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/', [BackendController::class, 'index'])->name('admin_home');
    Route::get('home-page-manage', [BackendController::class, 'homePage'])->name('home_page_manage');
    Route::post('/save-home-header', [BackendController::class, 'saveHomeHeader'])->name('save_home_header');
    Route::get('/manage-home-header', [BackendController::class, 'manageHomeHeader'])->name('manage_home_header');
    Route::get('/edit-home-header/{id}', [BackendController::class, 'editHomeHeader'])->name('edit_home_header');
    Route::post('/update-home-header', [BackendController::class, 'updateHomeHeader'])->name('update_home_header');
    Route::post('/delete-home-header', [BackendController::class, 'deleteHomeHeader'])->name('delete_home_header');

    Route::post('/save-main-menu', [BackendController::class, 'saveMainMenu'])->name('save_main_menu');
    Route::get('/manage-main-menu', [BackendController::class, 'manageMainMenu'])->name('manage_main_menu');
    Route::get('/edit-main-menu/{id}', [BackendController::class, 'editMainMenu'])->name('edit_main_menu');
    Route::post('/update-main-menu', [BackendController::class, 'updateMainMenu'])->name('update_main_menu');
    Route::post('/delete-main-menu', [BackendController::class, 'deleteMainMenu'])->name('delete_main_menu');

    Route::post('/save-header-content', [BackendController::class, 'saveHeaderContent'])->name('save_header_content');
    Route::get('/manage-header-content', [BackendController::class, 'manageHeaderContent'])->name('manage_header_content');
    Route::get('/edit-header-content/{id}', [BackendController::class, 'editHeaderContent'])->name('edit_header_content');
    Route::post('/update-header-content', [BackendController::class, 'updateHeaderContent'])->name('update_header_content');
    Route::post('/delete-header-content', [BackendController::class, 'deleteHeaderContent'])->name('delete_header_content');

    Route::post('/save-card-menu', [BackendController::class, 'saveCardMenu'])->name('save_card_menu');
    Route::get('/manage-card-menu', [BackendController::class, 'manageCardMenu'])->name('manage_card_menu');
    Route::get('/edit-card-menu/{id}', [BackendController::class, 'editCardMenu'])->name('edit_card_menu');
    Route::post('/update-card-menu', [BackendController::class, 'updateCardMenu'])->name('update_card_menu');
    Route::post('/delete-card-menu', [BackendController::class, 'deleteCardMenu'])->name('delete_card_menu');

    Route::post('/save-calculator-feature', [BackendController::class, 'saveCalculatorFeature'])->name('save_calculator_feature');
    Route::get('/manage-calculator-feature', [BackendController::class, 'manageCalculatorFeature'])->name('manage_calculator_feature');
    Route::get('/edit-calculator-feature/{id}', [BackendController::class, 'editCalculatorFeature'])->name('edit_calculator_feature');
    Route::post('/update-calculator-feature', [BackendController::class, 'updateCalculatorFeature'])->name('update_calculator_feature');
    Route::post('/delete-calculator-feature', [BackendController::class, 'deleteCalculatorFeature'])->name('delete_calculator_feature');

    Route::post('/save-work-process', [BackendController::class, 'saveWorkProcess'])->name('save_work_process');
    Route::get('/manage-work-process', [BackendController::class, 'manageWorkProcess'])->name('manage_work_process');
    Route::get('/edit-work-process/{id}', [BackendController::class, 'editWorkProcess'])->name('edit_work_process');
    Route::post('/update-work-process', [BackendController::class, 'updateWorkProcess'])->name('update_work_process');

    Route::post('/save-testimonial-left', [BackendController::class, 'saveTestimonialInfo'])->name('save_testimonial_left');
    Route::get('/manage-testimonial-left', [BackendController::class, 'manageTestimonialInfo'])->name('manage_testimonial_left');
    Route::get('/edit-testimonial-left/{id}', [BackendController::class, 'editTestimonialInfo'])->name('edit_testimonial_left');
    Route::post('/update-testimonial-left', [BackendController::class, 'updateTestimonialInfo'])->name('update_testimonial_left');

    Route::post('/save-testimonial', [BackendController::class, 'saveTestimonial'])->name('save_testimonial');
    Route::get('/manage-testimonial', [BackendController::class, 'manageTestimonial'])->name('manage_testimonial');
    Route::get('/edit-testimonial/{id}', [BackendController::class, 'editTestimonial'])->name('edit_testimonial');
    Route::post('/update-testimonial', [BackendController::class, 'updateTestimonial'])->name('update_testimonial');
    Route::post('/delete-testimonial', [BackendController::class, 'deleteTestimonial'])->name('delete_testimonial');

    Route::post('/save-footer', [BackendController::class, 'savefooter'])->name('save_footer');
    Route::get('/manage-footer', [BackendController::class, 'managefooter'])->name('manage_footer');
    Route::get('/edit-footer/{id}', [BackendController::class, 'editfooter'])->name('edit_footer');
    Route::post('/update-footer', [BackendController::class, 'updatefooter'])->name('update_footer');

    Route::get('/contact-info', [BackendController::class, 'contactInfo'])->name('contact_info');
    Route::post('/save-contact-info', [BackendController::class, 'saveContactInfo'])->name('save_contact_info');
    Route::get('/manage-contact-info', [BackendController::class, 'manageContactInfo'])->name('manage_contact_info');
    Route::get('/edit-contact-info/{id}', [BackendController::class, 'editContactInfo'])->name('edit_contact_info');
    Route::post('/update-contact-info', [BackendController::class, 'updateContactInfo'])->name('update_contact_info');

    Route::get('/claim', [BackendController::class, 'claim'])->name('claim');
    Route::post('/save-claim', [BackendController::class, 'saveclaim'])->name('save_claim');
    Route::get('/manage-claim', [BackendController::class, 'manageclaim'])->name('manage_claim');
    Route::get('/edit-claim/{id}', [BackendController::class, 'editclaim'])->name('edit_claim');
    Route::post('/update-claim', [BackendController::class, 'updateclaim'])->name('update_claim');

    Route::get('/claim-money', [BackendController::class, 'claimMoney'])->name('claim_money');
    Route::post('/save-claim-money', [BackendController::class, 'saveclaimMoney'])->name('save_claim_money');
    Route::get('/manage-claim-money', [BackendController::class, 'manageclaimMoney'])->name('manage_claim_money');
    Route::get('/edit-claim-money/{id}', [BackendController::class, 'editclaimMoney'])->name('edit_claim_money');
    Route::post('/update-claim-money', [BackendController::class, 'updateclaimMoney'])->name('update_claim_money');
    Route::post('/delete-claim-money', [BackendController::class, 'deleteclaimMoney'])->name('delete_claim_money');

    Route::get('/reinsurance', [BackendController::class, 'reinsurance'])->name('reinsurance');
    Route::post('/save-reinsurance', [BackendController::class, 'saveReinsurance'])->name('save_reinsurance');
    Route::get('/manage-reinsurance', [BackendController::class, 'manageReinsurance'])->name('manage_reinsurance');
    Route::get('/edit-reinsurance/{id}', [BackendController::class, 'editReinsurance'])->name('edit_reinsurance');
    Route::post('/update-reinsurance', [BackendController::class, 'updateReinsurance'])->name('update_reinsurance');

    Route::get('/reinsurance-type', [BackendController::class, 'reinsuranceType'])->name('reinsurance_type');
    Route::post('/save-reinsurance-type', [BackendController::class, 'saveReinsuranceType'])->name('save_reinsurance_type');
    Route::get('/manage-reinsurance-type', [BackendController::class, 'manageReinsuranceType'])->name('manage_reinsurance_type');
    Route::get('/edit-reinsurance-type/{id}', [BackendController::class, 'editReinsuranceType'])->name('edit_reinsurance_type');
    Route::post('/update-reinsurance-type', [BackendController::class, 'updateReinsuranceType'])->name('update_reinsurance_type');
    Route::post('/delete-reinsurance-type', [BackendController::class, 'deleteReinsuranceType'])->name('delete_reinsurance_type');

    Route::get('/reinsurance-coverage', [BackendController::class, 'reinsuranceCoverage'])->name('reinsurance_coverage');
    Route::post('/save-reinsurance-coverage', [BackendController::class, 'saveReinsuranceCoverage'])->name('save_reinsurance_coverage');
    Route::get('/manage-reinsurance-coverage', [BackendController::class, 'manageReinsuranceCoverage'])->name('manage_reinsurance_coverage');
    Route::get('/edit-reinsurance-coverage/{id}', [BackendController::class, 'editReinsuranceCoverage'])->name('edit_reinsurance_coverage');
    Route::post('/update-reinsurance-coverage', [BackendController::class, 'updateReinsuranceCoverage'])->name('update_reinsurance_coverage');
    Route::post('/delete-reinsurance-coverage', [BackendController::class, 'deleteReinsuranceCoverage'])->name('delete_reinsurance_coverage');

    Route::get('/reinsurance-broker', [BackendController::class, 'reinsuranceBroker'])->name('reinsurance_broker');
    Route::post('/save-reinsurance-broker', [BackendController::class, 'saveReinsuranceBroker'])->name('save_reinsurance_broker');
    Route::get('/manage-reinsurance-broker', [BackendController::class, 'manageReinsuranceBroker'])->name('manage_reinsurance_broker');
    Route::get('/edit-reinsurance-broker/{id}', [BackendController::class, 'editReinsuranceBroker'])->name('edit_reinsurance_broker');
    Route::post('/update-reinsurance-broker', [BackendController::class, 'updateReinsuranceBroker'])->name('update_reinsurance_broker');
    Route::post('/delete-reinsurance-broker', [BackendController::class, 'deleteReinsuranceBroker'])->name('delete_reinsurance_broker');

    Route::get('/underwriting', [BackendController::class, 'underwriting'])->name('underwriting');
    Route::post('/save-underwriting', [BackendController::class, 'saveUnderwriting'])->name('save_underwriting');
    Route::get('/manage-underwriting', [BackendController::class, 'manageUnderwriting'])->name('manage_underwriting');
    Route::get('/edit-underwriting/{id}', [BackendController::class, 'editUnderwriting'])->name('edit_underwriting');
    Route::post('/update-underwriting', [BackendController::class, 'updateUnderwriting'])->name('update_underwriting');

});

Route::post('/save-contact-message', [BackendController::class, 'getContactMessage'])->name('save_contact_message');
// Route::get('/manage-contact-info', [BackendController::class, 'manageContactInfo'])->name('manage_contact_info');
Route::post('/delete-contact-message', [BackendController::class, 'deleteContactMessage'])->name('delete_contact_message');

Route::post('/save-complain-message', [BackendController::class, 'getComplainMessage'])->name('save_complain_message');
Route::get('/manage-complain-info', [BackendController::class, 'manageComplainInfo'])->name('manage_complain_info');
Route::post('/delete-complain-message', [BackendController::class, 'deleteComplainMessage'])->name('delete_complain_message');

Route::prefix('/admin')->name('admin.auth.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/store-login', [AdminAuthController::class, 'storeLogin'])->name('storeLogin');
    Route::get('/forgot-password', [AdminForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password', [AdminForgotPasswordController::class, 'storeForgotPassword'])->name('storeForgotPassword');

    Route::get('/reset-password/{token}', [AdminResetPasswordController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset-password', [AdminResetPasswordController::class, 'storeForgotPassword'])->name('storeResetPassword');
});

Route::middleware('auth:admin')->prefix('/admin')->name('admin.')->group(function () {

    //admin management
    Route::controller(AdminAuthController::class)->name('auth.')->group(function () {
        Route::get('/admin-list', 'adminList')->name('adminList');
        Route::get('/create-admin', 'createAdmin')->name('createAdmin');
        Route::post('/store-admin', 'storeAdmin')->name('storeAdmin');
        Route::get('/edit-admin/{admin}', 'editAdmin')->name('editAdmin');
        Route::post('/update-admin/{admin}', 'updateAdmin')->name('updateAdmin');
        Route::post('/active-admin/{admin}', 'activeAdmin')->name('activeAdmin');
        Route::post('/inactive-admin/{admin}', 'inactiveAdmin')->name('inactiveAdmin');
        Route::delete('/delete-admin/{admin}', 'deleteAdmin')->name('deleteAdmin');

        // Route::get('/customer-list', 'customerList')->name('customerList');
    });

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('auth.logout');

    Route::prefix('/product-and-service')->name('product_service.')->controller(ProductAndServiceManagementController::class)->group(function () {
        Route::get('/product-services-create', 'servicesCreate')->name('services.create');
        Route::post('/product-services-store', 'servicesStore')->name('services.store');
        Route::get('/product-services-manage', 'index')->name('services.manage');
        Route::get('/product-services-edit/{id}', 'edit')->name('services.edit');
        Route::post('/product-services-update/{id}', 'update')->name('services.update');
        Route::post('/product-services-delete/{id}', 'delete')->name('services.delete');

        Route::get('/product-services-coverage-create', 'coverageCreate')->name('coverage.create');
        Route::post('/product-services-coverage-store', 'coverageStore')->name('coverage.store');
        Route::get('/product-services-coverage-manage', 'coverageIndex')->name('coverage.manage');
        Route::get('/product-services-coverage-edit/{id}', 'coverageEdit')->name('coverage.edit');
        Route::post('/product-services-coverage-update/{id}', 'coverageUpdate')->name('coverage.update');
        Route::post('/product-services-coverage-delete/{id}', 'coverageDelete')->name('coverage.delete');
    });

    Route::prefix('/personal-awards')->name('awards.')->controller(PersonalAwardController::class)->group(function () {
        Route::get('/personal-awards-create', 'create')->name('create');
        Route::post('/personal-awards-store', 'store')->name('store');
        Route::get('/personal-awards-manage', 'index')->name('index');
    });

});
