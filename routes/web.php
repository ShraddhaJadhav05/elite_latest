<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BrokerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Staff_ManageCotroller;
use App\Http\Controllers\staff_leadsController;
use App\Http\Controllers\appoinmentController;
use App\Http\Controllers\enquiresController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\bankController;
use App\Http\Controllers\bank_productController;
use App\Http\Controllers\loanController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\adminbrokerController;
use App\Http\Controllers\loan_applicationsController;
use App\Http\Controllers\documentsController;
use App\Http\Controllers\inernalcommunicationController;
use App\Http\Controllers\notificationmessageController;
use App\Http\Controllers\StaffProfileController;
use App\Http\Controllers\Staffcustomer_leadsController;
use App\Http\Controllers\Staffcustomer_ClientController;

use App\Http\Controllers\BankbranchController;
use App\Http\Controllers\MortgageplanController;
use App\Http\Controllers\ProposalController;





use App\Http\Controllers\CMSController as AdminCMSController;
use App\Http\Controllers\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController as AdminCategoryController;
use App\Http\Controllers\FaqController as AdminFaqController;
use App\Http\Controllers\FrontPageController as AdminFrontPageController;
use App\Http\Controllers\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\ServicesController as AdminServicesController;
use App\Http\Controllers\SEOSMOSettingsController as AdminSEOSMOSettingsController;
use App\Http\Controllers\GeneralSettingsController as AdminGeneralSettingsController;


#######------------client------##########
use App\Http\Controllers\Mortgage\Client\ClientController as UserClientContoller;
use App\Http\Controllers\Mortgage\Client\DocumentsController as ClientDocumentsController;
use App\Http\Controllers\Mortgage\Client\NotificationController as ClientNotificationController;
use App\Http\Controllers\Mortgage\Client\MortgageController as ClientMortgageController;
use App\Http\Controllers\Mortgage\Client\SupportController as ClientSupportController;
use App\Http\Controllers\Mortgage\Client\PrivacyController as ClientPrivacyController;
use App\Http\Controllers\Mortgage\Client\EducationalResourcesController as ClientEducationalResourcesController;


#######------------frontend------##########
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\CMSController;
use App\Http\Controllers\Frontend\MortgageController;
use App\Http\Controllers\Frontend\PartnersController;
Use App\Http\Controllers\Frontend\NewsController;
Use App\Http\Controllers\Frontend\AppointmentController;
Use App\Http\Controllers\Frontend\EnquiryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/ec-admin',[AdminController::class,'login'])->name('login');
Route::get('/ec-admin',[AdminController::class,'login'])->name('ec-admin');
Route::get('/ec-staff',[AdminController::class,'staff_login'])->name('ec-staff');

Route::middleware('auth')->group(function () {
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/reset_password', [ProfileController::class, 'show_reset_password'])->name('show.reset.password');
    Route::post('/update_password', [ProfileController::class, 'update_password'])->name('update.password');

});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {

    // Admin and dashboard routes
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'AdminDestroy'])->name('admin.logout');

    // leads routes
    Route::get('/admin/leads',[LeadController::class,'show_leads'])->name('show.leads');
    Route::get('/admin/leads/second-form',[LeadController::class,'show_leads_second_form'])->name('show.second-form');
    Route::get('/admin/all_leads',[LeadController::class,'all_leads'])->name('all.leads');
    Route::post('/admin/add_leads',[LeadController::class,'add_leads'])->name('add.leads');
    Route::post('/admin/add_coapplicant_form',[LeadController::class,'add_coapplicant_form'])->name('add.coapplicant');
    

    Route::get('/admin/edit_leads/{id}',[LeadController::class,'edit_leads'])->name('edit.leads');
    Route::put('/admin/update_leads/{id}',[LeadController::class,'update_leads'])->name('update.leads');
    Route::get('/admin/delete_leads/{id}',[LeadController::class,'delete_leads'])->name('delete.leads');
    Route::get('/admin/view_leads/{id}',[LeadController::class,'view_leads'])->name('view.leads');

    // authentication for user
    Route::post('check-user-email',[LeadController::class,'check_user_email'])->name('check-user-email');

   

    // Assign lead to client
    Route::post('/admin/assign_lead_to_client',[LeadController::class,'assign_lead_to_client'])->name('assign.lead.client');
    Route::post('/admin/delete_leads_client',[LeadController::class,'delete_leads_client'])->name('delete.lead.from.client');

    // If staff set switch button then category flag also change for admin
    Route::post('/admin/update-category-flag',[LeadController::class,'admin_update_category_flag'])->name('admin.update.category.flag');

    // If staff set switch button then category flag also change for admin
    Route::post('/admin/update-category-flag',[LeadController::class,'admin_update_category_flag'])->name('admin.update.category.flag');

    Route::post('/admin/get-category-flag',[LeadController::class,'admin_get_category_flag'])->name('admin.get.category.flag');

    // Send the credentials of user via mail
    Route::post('leads_credentials',[LeadController::class,'leads_credentials'])->name('leads.credentials');
   
    
    
       // permissions Routes
       Route::get('/admin/all_permissions',[RolesController::class,'all_permissions'])->name('all.permissions');
       Route::get('/admin/permission',[RolesController::class,'show_permission'])->name('show.permissions');
       Route::post('/admin/add_permissions',[RolesController::class,'add_permissions'])->name('add.permissions');
       Route::get('/admin/edit_permission/{id}',[RolesController::class,'edit_permission'])->name('edit.permission');
       Route::put('/admin/update_permission/{id}',[RolesController::class,'update_permission'])->name('update.permission');
       Route::get('/admin/delete_permission/{id}',[RolesController::class,'delete_permission'])->name('delete.permission');
       Route::get('/admin/view_permission/{id}',[RolesController::class,'view_permission'])->name('view.permission');

    //Roles In Permission Routes
    Route::get('/admin/show_roles_in_permission',[RolesController::class,'show_roles_in_permission'])->name('show.roles.permissions');
    Route::post('/role/add_roles_in_permission' ,[RolesController::class,'add_roles_in_permission'])->name('role.permission.store');
    Route::get('/admin/all_roles_in_permission',[RolesController::class,'all_roles_in_permission'])->name('all.roles.permissions');
    Route::get('/admin/edit/edit_roles_in_permission/{id}',[RolesController::class,'edit_roles_in_permission'])->name('edit.roles.permissions');
    Route::post('/admin/update/update_roles_in_permission/{id}',[RolesController::class,'update_roles_in_permission'])->name('update.roles.permissions');
    Route::get('/admin/view_roles_in_permission/{id}',[RolesController::class,'view_roles_in_permission'])->name('view.roles.permissions');
    Route::get('/admin/delete_roles_in_permission/{id}',[RolesController::class,'delete_roles_in_permission'])->name('delete.roles.permissions');
    //Roles Routes

    Route::get('/admin/roles_all',[RolesController::class,'roles_all'])->name('roles.all');
    Route::get('/admin/roles',[RolesController::class,'show_roles'])->name('show.roles');
    Route::post('/admin/add_roles',[RolesController::class,'add_roles'])->name('add.roles');
    Route::get('/admin/edit_roles/{id}',[RolesController::class,'edit_roles'])->name('edit.roles');
    Route::put('/admin/update_roles/{id}',[RolesController::class,'update_roles'])->name('update.roles');
    Route::get('/admin/delete_roles/{id}',[RolesController::class,'delete_roles'])->name('delete.roles');
    Route::get('/admin/view_roles/{id}',[RolesController::class,'view_roles'])->name('view.role');
    
    // User routes
    Route::get('/admin/all_user',[RolesController::class,'all_user'])->name('data.userData');
    Route::get('/admin/user',[RolesController::class,'show_user'])->name('show.user');
    Route::post('/admin/add_user',[RolesController::class,'add_user'])->name('add.user');
    Route::get('/admin/edit_user/{id}',[RolesController::class,'edit_user'])->name('edit.user');
    Route::put('/admin/update_user/{id}',[RolesController::class,'update_user'])->name('update.user');
    Route::get('/admin/delete_user/{id}',[RolesController::class,'delete_user'])->name('delete.user');
    Route::get('/admin/view_user/{id}',[RolesController::class,'view_user'])->name('view.user');

    // Staff Routes
    Route::get('/admin/all_staff',[Staff_ManageCotroller::class,'all_staff'])->name('all.staff');
    Route::get('/admin/staff',[Staff_ManageCotroller::class,'show_staff'])->name('show.show_staff');
    Route::post('/admin/add_staff',[Staff_ManageCotroller::class,'add_staff'])->name('add.staff');
    Route::get('/admin/edit_staff/{id}',[Staff_ManageCotroller::class,'edit_staff'])->name('edit.staff');
    Route::put('/admin/update_staff/{id}',[Staff_ManageCotroller::class,'update_staff'])->name('update.staff');
    Route::get('/admin/delete_staff/{id}',[Staff_ManageCotroller::class,'delete_staff'])->name('delete.staff');

    // check staff email in user table
    Route::post('check-email',[Staff_ManageCotroller::class,'check_email'])->name('check-email');
    Route::get('/admin/view_staff/{id}',[Staff_ManageCotroller::class,'view_staff'])->name('view.staff');

    Route::get('/admin/all_roles',[Staff_ManageCotroller::class,'all_roles'])->name('all.roles');
    

    // user or clients routes
    Route::get('/admin/all_clients',[clientController::class,'all_clients'])->name('all.clients');
    Route::get('/admin/view_client/{id}',[clientController::class,'view_client'])->name('view.client');
    Route::get('/admin/client',[clientController::class,'show_client'])->name('show.show_client');
    Route::post('/admin/add_client',[clientController::class,'add_client'])->name('add.client');
    Route::get('/admin/edit_client/{id}',[clientController::class,'edit_client'])->name('edit.client');
    Route::put('/admin/update_client/{id}',[clientController::class,'update_client'])->name('update.client');
    Route::get('/admin/delete_client/{id}',[clientController::class,'delete_client'])->name('delete.client');
//assign client to staff member
    Route::post('/admin/assignStafff',[clientController::class,'assignStaff'])->name('assignClient.staff');
 


     // broker routes
     Route::get('/admin/all_broker',[adminbrokerController::class,'all_broker'])->name('all.broker');
     Route::get('/admin/view_broker/{id}',[adminbrokerController::class,'view_broker'])->name('view.broker');
    Route::get('/admin/broker',[adminbrokerController::class,'show_broker'])->name('show.show_broker');
    Route::post('/admin/add_broker',[adminbrokerController::class,'add_broker'])->name('add.broker');
    Route::get('/admin/edit_broker/{id}',[adminbrokerController::class,'edit_broker'])->name('edit.broker');
    Route::put('/admin/update_broker/{id}',[adminbrokerController::class,'update_broker'])->name('update.broker');
    Route::get('/admin/delete_broker/{id}',[adminbrokerController::class,'delete_broker'])->name('delete.broker');


    // banks routes
    Route::get('/admin/all_banks',[bankController::class,'all_banks'])->name('all.banks');
    Route::get('/admin/banks',[bankController::class,'show_banks'])->name('show.banks');
    Route::post('/admin/add_banks',[bankController::class,'add_banks'])->name('add.banks');
    Route::get('/admin/view_bank/{id}',[bankController::class,'view_bank'])->name('view.bank');
    Route::get('/admin/edit_bank/{id}',[bankController::class,'edit_bank'])->name('edit.bank');
    Route::put('/admin/update_bank/{id}',[bankController::class,'update_bank'])->name('update.bank');
    Route::get('/admin/delete_bank/{id}',[bankController::class,'delete_bank'])->name('delete.bank');



    // Mortgage plans routes
    Route::get('/admin/all_mortgageplans',[MortgageplanController::class,'all_mortgageplans'])->name('all.mortgageplans');
    Route::get('/admin/mortgageplans',[MortgageplanController::class,'show_mortgageplans'])->name('show.mortgageplans');
    Route::post('/admin/add_mortgageplans',[MortgageplanController::class,'add_mortgageplans'])->name('add.mortgageplans');
    Route::get('/admin/view_mortgageplans/{id}',[MortgageplanController::class,'view_mortgageplans'])->name('view.mortgageplans');
    Route::get('/admin/edit_mortgageplans/{id}',[MortgageplanController::class,'edit_mortgageplans'])->name('edit.mortgageplans');
    Route::post('/admin/update_mortgageplans',[MortgageplanController::class,'update_mortgageplans'])->name('update.mortgageplans');
    Route::get('/admin/delete_mortgageplans/{id}',[MortgageplanController::class,'delete_mortgageplans'])->name('delete.mortgageplans');

    Route::get('/admin/getBranchwiseProduct/{id}',[MortgageplanController::class,'getBranchwiseProduct'])->name('get.branch.product');

    // bank products routes
    Route::get('/admin/all_banks_products',[bank_productController::class,'all_banks_products'])->name('all.banks.products');
    Route::get('/admin/banks_products',[bank_productController::class,'show_banks_products'])->name('show.banks.products');
    Route::post('/admin/add_banks_products',[bank_productController::class,'add_banks_products'])->name('add.banks.products');
    Route::get('/admin/view_bank_product/{id}',[bank_productController::class,'view_bank_product'])->name('view.bank.product');
    Route::get('/admin/edit_bank_products/{id}',[bank_productController::class,'edit_bank_products'])->name('edit.bank.products');
    Route::put('/admin/update_bank_products/{id}',[bank_productController::class,'update_bank_products'])->name('update.bank.products');
    Route::get('/admin/delete_products/{id}',[bank_productController::class,'delete_bank_products'])->name('delete.products');
    Route::get('/admin/getProductDetails/{id}',[MortgageplanController::class,'getProductDetails'])->name('get.product');
    // notification routes
    Route::get('/admin/notification_agents',[notificationController::class,'notification_agents'])->name('all.notification.agents');
    Route::get('/admin/notification_borrowers',[notificationController::class,'notification_borrowers'])->name('all.notification.borrowers');
    Route::get('/admin/notification_types',[notificationController::class,'notification_types'])->name('all.notification.types');

    // Broker notification

    Route::post('/admin/add_broker_notification',[notificationController::class,'add_broker_notification'])->name('add.broker.notification');
    Route::post('/admin/send_all_broker_notification',[notificationController::class,'send_all_broker_notification'])->name('send.all.broker.notification');
    Route::get('/admin/view_broker_notification/{id}',[notificationController::class,'view_broker_notification'])->name('view.broker.notification');
    Route::post('/admin/update_broker_notification/{id}',[notificationController::class,'update_broker_notification'])->name('update.broker.notification');
    Route::get('/admin/delete_notification/{id}',[notificationController::class,'delete_notification'])->name('delete.notification');

    // client notification
    Route::post('/admin/add_client_notification',[notificationController::class,'add_client_notification'])->name('add.client.notification');
    Route::post('/admin/send_all_client_notification',[notificationController::class,'send_all_client_notification'])->name('send.all.client.notification');
    Route::get('/admin/view_client_notification/{id}',[notificationController::class,'view_client_notification'])->name('view.client.notification');
    Route::post('/admin/update_client_notification/{id}',[notificationController::class,'update_client_notification'])->name('update.client.notification');
    Route::get('/admin/delete_client_notification/{id}',[notificationController::class,'delete_client_notification'])->name('delete.client.notification');

    // CMS
    Route::get('/admin/cms/pages',[AdminCMSController::class,'cmsPages'])->name('cms.pages');
    Route::get('/admin/cms/view/aboutus',[AdminCMSController::class,'viewAboutus'])->name('cms.viewAboutus');
    Route::match(['get', 'post'], '/admin/cms/update/aboutus', [AdminCMSController::class,'updateAboutus'])->name('cms.editAboutus');
    Route::get('/admin/cms/view/privacy',[AdminCMSController::class,'viewPrivacyPolicy'])->name('cms.viewPrivacy');
    Route::match(['get', 'post'], '/admin/cms/update/privacy', [AdminCMSController::class,'updatePrivacyPolicy'])->name('cms.editPrivacy');
    Route::get('/admin/cms/view/terms',[AdminCMSController::class,'viewTerms'])->name('cms.viewTerms');
    Route::match(['get', 'post'], '/admin/cms/update/terms', [AdminCMSController::class,'updateTerms'])->name('cms.editTerms');
    Route::get('/admin/cms/view/home/financing',[AdminCMSController::class,'viewHomeFinancing'])->name('cms.viewHomeFinancing');
    Route::match(['get', 'post'], '/admin/cms/update/home/financing', [AdminCMSController::class,'updateHomeFinancing'])->name('cms.editHomeFinancing');
    Route::get('/admin/cms/view/contactus',[AdminCMSController::class,'viewContactUs'])->name('cms.viewContactUs');
    Route::match(['get', 'post'], '/admin/cms/update/contactus', [AdminCMSController::class,'updateContactUs'])->name('cms.editContactUs');
    Route::get('/admin/cms/view/whyus',[AdminCMSController::class,'viewWhyUs'])->name('cms.viewWhyUs');
    Route::match(['get', 'post'], '/admin/cms/update/whyus', [AdminCMSController::class,'updateWhyUs'])->name('cms.editWhyUs');
    Route::get('/admin/cms/view/home',[AdminCMSController::class,'viewHome'])->name('cms.viewHome');
    Route::match(['get', 'post'], '/admin/cms/update/home', [AdminCMSController::class,'updateHome'])->name('cms.editHome');
    Route::get('/admin/cms/view/faq',[AdminCMSController::class,'viewFAQPageData'])->name('cms.viewFAQPageData');
    Route::match(['get', 'post'], '/admin/cms/update/faq', [AdminCMSController::class,'updateFaqFAQPageData'])->name('cms.editFaqFAQPageData');
    Route::get('/admin/cms/view/callback',[AdminCMSController::class,'viewCallBackData'])->name('cms.viewCallBackData');
    Route::match(['get', 'post'], '/admin/cms/update/callback', [AdminCMSController::class,'updateCallBackData'])->name('cms.editCallBackData');

    Route::get('/admin/cms/view/blog',[AdminCMSController::class,'viewBlogPageData'])->name('cms.viewBlogPageData');
    Route::match(['get', 'post'], '/admin/cms/update/blog', [AdminCMSController::class,'updateBlogPageData'])->name('cms.editBlogPageData');
    Route::get('/admin/cms/view/partners',[AdminCMSController::class,'viewPartnersPageData'])->name('cms.viewPartnersPageData');
    Route::match(['get', 'post'], '/admin/cms/update/partners', [AdminCMSController::class,'updatePartnersPageData'])->name('cms.editPartnersPageData');
    Route::get('/admin/cms/view/agent',[AdminCMSController::class,'viewAgentPageData'])->name('cms.viewAgentPageData');
    Route::match(['get', 'post'], '/admin/cms/update/agent', [AdminCMSController::class,'updateAgentPageData'])->name('cms.editAgentPageData');


    //Blocks
    Route::get('/admin/list/blogs',[AdminNewsController::class,'listBlogs'])->name('blogs.list');
    Route::match(['get', 'post'],'/admin/add/blog',[AdminNewsController::class,'addBlog'])->name('blogs.add');
    Route::match(['get', 'post'],'/admin/view/blog/{id}',[AdminNewsController::class,'viewBlog'])->name('blogs.view');
    Route::match(['get', 'post'],'/admin/update/blog/{id}',[AdminNewsController::class,'updateBlog'])->name('blogs.update');
    Route::match(['get', 'post'],'/admin/delete/blog',[AdminNewsController::class,'deleteBlog'])->name('blogs.delete');

    //Category type & Categories
    Route::get('/admin/list/category/type',[AdminCategoryController::class,'listCategoryType'])->name('category_type.list');
    Route::match(['get', 'post'],'/admin/add/category/type',[AdminCategoryController::class,'addCategoryType'])->name('category_type.add');
    Route::match(['get', 'post'],'/admin/view/category/type/{id}',[AdminCategoryController::class,'viewCategoryType'])->name('category_type.view');
    Route::match(['get', 'post'],'/admin/update/category/type/{id}',[AdminCategoryController::class,'updateCategoryType'])->name('category_type.update');
    Route::match(['get', 'post'],'/admin/list/delete/type',[AdminCategoryController::class,'deleteCategoryType'])->name('category_type.delete');

    Route::get('/admin/list/category',[AdminCategoryController::class,'listCategory'])->name('category.list');
    Route::match(['get', 'post'],'/admin/add/category',[AdminCategoryController::class,'addCategory'])->name('category.add');
    Route::match(['get', 'post'],'/admin/view/category/{id}',[AdminCategoryController::class,'viewCategory'])->name('category.view');
    Route::match(['get', 'post'],'/admin/update/category/{id}',[AdminCategoryController::class,'updateCategory'])->name('category.update');
    Route::match(['get', 'post'],'/admin/list/delete',[AdminCategoryController::class,'deleteCategory'])->name('category.delete');

    //FAQ
    Route::get('/admin/list/faq',[AdminFaqController::class,'listFAQs'])->name('faq.list');
    Route::match(['get', 'post'],'/admin/add/faq',[AdminFaqController::class,'addFAQ'])->name('faq.add');
    Route::match(['get', 'post'],'/admin/view/faq/{id}',[AdminFaqController::class,'viewFAQ'])->name('faq.view');
    Route::match(['get', 'post'],'/admin/update/faq/{id}',[AdminFaqController::class,'updateFAQ'])->name('faq.update');
    Route::match(['get', 'post'],'/admin/delete/faq',[AdminFaqController::class,'deleteFAQ'])->name('faq.delete');

    //Frontpage Blocks
    Route::get('/admin/frontpage/blocks',[AdminFrontPageController::class,'frontPageBlocks'])->name('frontpage.blocks');
    Route::get('/admin/frontpage/view/supportive/partner',[AdminFrontPageController::class,'viewSupportivePartner'])->name('frontpage.viewSupportivePartner');
    Route::match(['get', 'post'], '/admin/frontpage/update/supportive/partner', [AdminFrontPageController::class,'updateSupportivePartner'])->name('frontpage.editSupportivePartner');
    Route::get('/admin/frontpage/view/mission',[AdminFrontPageController::class,'viewMission'])->name('frontpage.viewMission');
    Route::match(['get', 'post'], '/admin/frontpage/update/mission', [AdminFrontPageController::class,'updateMission'])->name('frontpage.editMission');
    Route::get('/admin/frontpage/view/vision',[AdminFrontPageController::class,'viewVision'])->name('frontpage.viewVision');
    Route::match(['get', 'post'], '/admin/frontpage/update/vision', [AdminFrontPageController::class,'updateVision'])->name('frontpage.editVision');

    Route::get('/admin/list/features',[AdminFrontPageController::class,'listFeatures'])->name('features.list');
    Route::match(['get', 'post'],'/admin/add/features',[AdminFrontPageController::class,'addFeatures'])->name('features.add');
    Route::match(['get', 'post'],'/admin/view/features/{id}',[AdminFrontPageController::class,'viewFeature'])->name('features.view');
    Route::match(['get', 'post'],'/admin/update/features/{id}',[AdminFrontPageController::class,'updateFeature'])->name('features.update');
    Route::match(['get', 'post'],'/admin/delete/features',[AdminFrontPageController::class,'deleteFeature'])->name('features.delete');
    
    Route::match(['get', 'post'],'/admin/list/enquiries',[AdminEnquiryController::class,'listEnquiries'])->name('enquiry.list');

    // Appoinments routes
    Route::get('/admin/appoinment',[appoinmentController::class,'show_appoinment'])->name('show.show_appoinment');
    Route::post('/admin/add_appoinment',[appoinmentController::class,'add_appoinment'])->name('add.appoinment');
    Route::get('/admin/all_appoinments',[appoinmentController::class,'all_appoinments'])->name('all.appoinments');
    Route::get('/admin/edit_appoinment/{id}',[appoinmentController::class,'edit_appoinment'])->name('edit.appoinment');
    Route::put('/admin/update_appoinment/{id}',[appoinmentController::class,'update_appoinment'])->name('update.appoinment');
    Route::get('/admin/delete_appoinment/{id}',[appoinmentController::class,'delete_appoinment'])->name('delete.appoinment');
    Route::get('/admin/view_appoinment/{id}',[appoinmentController::class,'view_appoinment'])->name('view.appoinment');
    Route::get('/admin/all_slots',[appoinmentController::class,'all_slots'])->name('all.slots');
    Route::post('/admin/add_slots',[appoinmentController::class,'add_slots'])->name('add.slots');
    Route::post('/admin/update-slot-status/{slotId}',[appoinmentController::class,'updateSlotStatus'])->name('update.slot.status');
    //Route::post('check-staff-date',[appoinmentController::class,'checkStaffDate'])->name('check.slots');
    Route::post('/admin/check-staff-date',[appoinmentController::class,'checkStaffDate'])->name('check.slots');
    Route::post('/fetch-time-slots', [appoinmentController::class, 'fetchTimeSlots'])->name('fetch.time.slots');


    // Enquires routes
    Route::get('/admin/all_enquires',[enquiresController::class,'all_enquires'])->name('all.enquires');
    Route::get('/admin/view_enquiry/{id}',[enquiresController::class,'view_enquiry'])->name('view.enquiry');

    // loans routes
    Route::get('/admin/all_loans',[loanController::class,'all_loans'])->name('all.loans');

    //services
    Route::get('/admin/list/service/category',[AdminServicesController::class,'listServiceCategory'])->name('service.listCategory');
    Route::match(['get', 'post'],'/admin/add/service/category',[AdminServicesController::class,'addServiceCategory'])->name('service.addCategory');
    Route::match(['get', 'post'],'/admin/view/service/category/{id}',[AdminServicesController::class,'viewServiceCategory'])->name('service.viewCategory');
    Route::match(['get', 'post'],'/admin/update/service/category/{id}',[AdminServicesController::class,'updateSeriveCategory'])->name('service.updateCategory');
    Route::match(['get', 'post'],'/admin/delete/service/category',[AdminServicesController::class,'deleteServiceCategory'])->name('service.deleteCategory');

    Route::get('/admin/list/service',[AdminServicesController::class,'listServices'])->name('service.listServices');
    Route::match(['get', 'post'],'/admin/add/service',[AdminServicesController::class,'addService'])->name('service.addService');
    Route::match(['get', 'post'],'/admin/view/service/{id}',[AdminServicesController::class,'viewService'])->name('service.viewService');
    Route::match(['get', 'post'],'/admin/update/service/{id}',[AdminServicesController::class,'updateService'])->name('service.updateService');
    Route::match(['get', 'post'],'/admin/delete/service',[AdminServicesController::class,'deleteServices'])->name('service.deleteServices');
    
    // Seo - Smo
    Route::get('/admin/settings/view/seo_smo',[AdminSEOSMOSettingsController::class,'viewSEOAndSMO'])->name('settings.viewSEOAndSMO');
    Route::match(['get', 'post'], '/admin/settings/update/seo_smo', [AdminSEOSMOSettingsController::class,'updateSEOAndSMO'])->name('settings.editSEOAndSMO');

    // Header - Footer
    Route::get('/admin/general/page',[AdminGeneralSettingsController::class,'generalSettings'])->name('settings.generalSettings');
    Route::match(['get', 'post'], '/admin/general/view_header', [AdminGeneralSettingsController::class,'viewHeader'])->name('settings.viewHeader');
    Route::match(['get', 'post'], '/admin/general/update_header', [AdminGeneralSettingsController::class,'updateHeader'])->name('settings.updateHeader');
    Route::match(['get', 'post'], '/admin/general/view_footer', [AdminGeneralSettingsController::class,'viewFooter'])->name('settings.viewFooter');
    Route::match(['get', 'post'], '/admin/general/update_footer', [AdminGeneralSettingsController::class,'updateFooter'])->name('settings.updateFooter');
    Route::post('/admin/assign-staff',[LeadController::class,'assignStaff'])->name('assign.staff');





    // branches routes
    Route::get('/admin/all_branch',[bankController::class,'all_branch'])->name('all.branch');
    Route::get('/admin/branch',[bankController::class,'show_branch'])->name('show.branch');
    Route::post('/admin/add_branch',[bankController::class,'add_branch'])->name('add.branch');
    Route::get('/admin/view_branch/{id}',[bankController::class,'view_branch'])->name('view.branch');
    Route::get('/admin/edit_branch/{id}',[bankController::class,'edit_branch'])->name('edit.branch');
    Route::put('/admin/update_branch/{id}',[bankController::class,'update_branch'])->name('update.branch');
    Route::get('/admin/delete_branch/{id}',[bankController::class,'delete_branch'])->name('delete.branch');

    // bank branches routes
    Route::get('/admin/all_bank_branch',[BankbranchController::class,'all_bank_branch'])->name('all.banks_branch');
    Route::get('/admin/banks_branch',[BankbranchController::class,'show_banks_branch'])->name('show.banks_branch');
    Route::post('/admin/add_banks_branch',[BankbranchController::class,'add_banks_branch'])->name('add.banks_branch');
    Route::get('/admin/view_banks_branch/{id}',[BankbranchController::class,'view_banks_branch'])->name('view.banks_branch');
    Route::get('/admin/edit_banks_branch/{id}',[BankbranchController::class,'edit_banks_branch'])->name('edit.banks_branch');
    Route::put('/admin/update_banks_branch/{id}',[BankbranchController::class,'update_banks_branch'])->name('update.banks_branch');
    Route::get('/admin/delete_banks_branch/{id}',[BankbranchController::class,'delete_banks_branch'])->name('delete.banks_branch');

    Route::get('/admin/getBankwiseBranch/{id}',[BankbranchController::class,'getBankwiseBranch'])->name('get.bank.branch');
});


Route::middleware(['auth', 'role:staff'])->group(function () {


    Route::get('/staff/logout',[AdminController::class,'AdminDestroystaff'])->name('staff.logout');


    // Proposal routes 
    
     Route::get('/staff/intrested_clients_proposal/{id}',[ProposalController::class,'all_intrested_clients_proposal'])->name('view.intrested.client.proposal');

    Route::get('/staff/create_application/{id}',[ProposalController::class,'create_application'])->name('create.application');
    
    Route::get('/staff/clients_proposal',[ProposalController::class,'all_client_proposal'])->name('all.client.proposal');

    Route::get('/staff/get_mortgage',[ProposalController::class,'get_mortgage'])->name('get.mortgageplan');

    Route::get('/staff/create_proposal/{id}',[ProposalController::class,'create_proposal'])->name('create.client.proposal');

    Route::post('/staff/add_proposal/{id}',[ProposalController::class,'add_proposal'])->name('add.client.proposal');

    Route::get('/staff/view_proposal/{id}',[ProposalController::class,'view_proposal'])->name('view.client.proposal');






    Route::get('/staff/dashboard',[StaffController::class,'StaffDashboard'])->name('staff.dashboard');



 // Assign lead to staff
    
    // staff leads assign by admin
    Route::get('/staff/all_staff_leads',[staff_leadsController::class,'all_staff_leads'])->name('all.staff_leads');

    Route::get('/staff/show_staff_leads',[staff_leadsController::class,'show_staff_leads'])->name('show.staff.leads');

    Route::post('/staff/add_staff_leads',[staff_leadsController::class,'add_staff_leads'])->name('add.staff.leads');

    Route::get('/staff/edit_staff_leads/{id}',[staff_leadsController::class,'edit_staff_leads'])->name('edit.staff.leads');

    Route::put('/staff/update_staff_leads/{id}',[staff_leadsController::class,'update_staff_leads'])->name('update.staff.leads');

    // set category flag route in staff
    Route::post('/staff/update-category-flag',[staff_leadsController::class,'update_category_flag'])->name('update.category.flag');

    // check staff email in user table
    Route::post('check-email-staff-leads',[staff_leadsController::class,'check_email_staff_leads'])->name('check-email-staff-leads');

    // Send the credentials of user via mail
    Route::post('user_credentials',[staff_leadsController::class,'user_credentials'])->name('user.credentials');

    // Loan Applications for Staff
    // Route::get('/staff/new_loan_applications',[loan_applicationsController::class,'new_loan_applications'])->name('new.loan.applications');

    // Route::get('/staff/show_new_loan_application',[loan_applicationsController::class,'show_new_loan_application'])->name('show.new.loan.application');

    // Route::post('/staff/add_new_loan_application',[loan_applicationsController::class,'add_new_loan_application'])->name('add.new.loan.application');
    
    // Route::post('/staff/add_new_co_loan_application',[loan_applicationsController::class,'add_new_co_loan_application'])->name('add.coapplicant.loan.application');

    // Route::get('/staff/show_loan_application_second',[loan_applicationsController::class,'show_loan_application_second'])->name('show.loan.application.second');

    // Route::get('/admin/view_loan_application/{id}',[loan_applicationsController::class,'view_loan_application'])->name('view.loan.application');

    // Route::get('/staff/edit_loan_new_applicattion/{id}',[loan_applicationsController::class,'edit_loan_new_applicattion'])->name('edit.loan.application');

    // Route::put('/staff/update_loan_application/{id}',[loan_applicationsController::class,'update_loan_application'])->name('update.loan.application');

    // In Progress Application
    // Route::get('/staff/in_progress_applications',[loan_applicationsController::class,'in_progress_applications'])->name('in.progress.applications');

    // Approved Application
    // Route::get('/staff/approved_applications',[loan_applicationsController::class,'approved_applications'])->name('approved.applications');

    // Uploded documents
    Route::get('/staff/all_client_documents',[documentsController::class,'all_client_documents'])->name('all.client.documments');

    Route::get('/staff/show_upload_documents',[documentsController::class,'show_upload_documents'])->name('show.upload.documents');


    Route::get('/staff/view_customer/{id}',[documentsController::class,'view_customer'])->name('view.customer');

    Route::get('/staff/show_uploaddocument/{id}',[documentsController::class,'show_uploaddocument'])->name('show.document');

    Route::post('/staff/add_document/{clientId}',[documentsController::class,'add_document'])->name('add.document');

    Route::get('/staff/edit_document/{id}',[documentsController::class,'edit_document'])->name('edit.document');

    Route::put('/staff/update_document/{id}',[documentsController::class,'update_document'])->name('update.document');

    Route::get('/staff/delete_document/{id}',[documentsController::class,'delete_document'])->name('delete.document');

    Route::get('/staff/delete_documents/{id}',[documentsController::class,'delete_documents'])->name('delete.documents');

    Route::get('/staff/show_documents',[documentsController::class,'show_documents'])->name('show.documments');

    Route::get('/staff/documents_verfication/{id}',[documentsController::class,'documents_verfication'])->name('documments.verfication');

    Route::get('/staff/update_documents_status',[documentsController::class,'update_documents_status'])->name('update.document.status');

    // Internal Communication
    Route::get('/staff/show_outbox',[inernalcommunicationController::class,'show_outbox'])->name('show.outbox');

    Route::get('/staff/new_message',[inernalcommunicationController::class,'show_new_message'])->name('show.new.message');

    Route::get('/staff/show_inbox',[inernalcommunicationController::class,'show_inbox'])->name('show.inbox');

    Route::post('/staff/send_message',[inernalcommunicationController::class,'send_message'])->name('send.message');

    Route::get('/staff/delete_outbox_message/{id}',[inernalcommunicationController::class,'delete_outbox_message'])->name('delete.outbox.message');

    Route::get('/staff/delete-all-outbox-messages',[inernalcommunicationController::class,'deleteAll'])->name('delete.all.outbox');

    Route::get('/staff/delete_inbox_message/{id}',[inernalcommunicationController::class,'delete_inbox_message'])->name('delete.inbox.message');

    Route::get('/staff/delete-all-inbox-messages',[inernalcommunicationController::class,'deleteAllinbox'])->name('delete.all.inbox');

    Route::post('/staff/reply/{message_id}',[inernalcommunicationController::class,'replyToMessage'])->name('replyToMessage');

    Route::get('/staff/archive_messages',[inernalcommunicationController::class,'archive_messages'])->name('archive.messages');

    Route::get('/staff/starred_messages',[inernalcommunicationController::class,'starred_messages'])->name('starred.messages');

    Route::post('/update-archive-status',[inernalcommunicationController::class,'updateArchiveStatus'])->name('update.archive');

    Route::get('/staff/show_outbox_notification',[notificationmessageController::class,'show_outbox_notification'])->name('show.outbox.notification');

    Route::get('/staff/show_inbox_notification',[notificationmessageController::class,'show_inbox_notification'])->name('show.inbox.notification');

    Route::get('/staff/new_notiication_message',[notificationmessageController::class,'new_notiication_message'])->name('new.notiiction.message');

    Route::post('/staff/send_notification',[notificationmessageController::class,'send_notification'])->name('send.notification');

    Route::get('/staff/delete-all-outbox-messages_notification',[notificationmessageController::class,'deleteAllinboxnotification'])->name('delete.all.outbox.notification');

    // Static files
    Route::get('/staff/show_communication',[notificationmessageController::class,'show_communication'])->name('show.communication');

    Route::get('/staff/application_reports',[notificationmessageController::class,'application_reports'])->name('application.reports');

    Route::get('/staff/performance_reports',[notificationmessageController::class,'performance_reports'])->name('perormance.reports');

    Route::get('/staff/traing_material',[notificationmessageController::class,'traing_material'])->name('training.material');

    Route::get('/staff/ploicy_doc',[notificationmessageController::class,'ploicy_doc'])->name('policy.document');

    Route::get('/staff/profile', [StaffProfileController::class, 'edit'])->name('staff.profile.edit');
    Route::put('/staff/profile/{id}', [StaffProfileController::class, 'update'])->name('staff.profile.update');
    Route::get('/staff/reset_password', [StaffProfileController::class, 'show_reset_password'])->name('staff.show.reset.password');
    Route::post('/staff/update_password', [StaffProfileController::class, 'update_password'])->name('staff.update.password');


    //staff new application routes
            Route::get('/staff/all_loan_applications/{status}',[loan_applicationsController::class,'all_loan_applications'])->name('all.loan_applications');
            Route::get('/staff/show_loan_applications',[loan_applicationsController::class,'show_loan_applications'])->name('show.loan.applications');
            Route::get('/staff/view_loan_applications/{id}',[loan_applicationsController::class,'view_loan_applications'])->name('view.loan.applications');
            Route::post('/staff/edit_loan_applications/{id}',[loan_applicationsController::class,'edit_loan_applications'])->name('edit.loan.applications');
            Route::put('/staff/update_loan_applications/{id}',[loan_applicationsController::class,'update_loan_applications'])->name('update.loan.applications');
            Route::post('/staff/add_loan_applications',[loan_applicationsController::class,'add_loan_applications'])->name('add.loan.applications');
            Route::get('/staff/staff_delete_loan/{id}',[loan_applicationsController::class,'delete_loan_applications'])->name('delete.loan.applications');
            Route::get('/staff/getData_loan_applications/{id}',[loan_applicationsController::class,'getData_loan_applications'])->name('edit.loan.getData_loan_applications');




    //staff customer client 
    Route::get('/staff/all_staff_clients',[Staffcustomer_ClientController::class,'new_loan_applicationsss'])->name('loan.clients');
    Route::get('/staff/view_staff_clients/{id}',[Staffcustomer_ClientController::class,'new_view_clients'])->name('view.clients');
    Route::get('/staff/edit_staff_clients/{id}',[Staffcustomer_ClientController::class,'new_edit_clients'])->name('edit.clients');
    Route::put('/staff/update_staff_clients/{id}',[Staffcustomer_ClientController::class,'new_update_clients'])->name('update.clients');
    Route::get('/staff/show_staff_client',[Staffcustomer_ClientController::class,'new_show_clients'])->name('show.show_clients');
    Route::post('/staff/add_staff_clients',[Staffcustomer_ClientController::class,'new_add_clients'])->name('add.clients');
    Route::get('/staff/delete_staff_client/{id}',[Staffcustomer_ClientController::class,'delete_clients'])->name('delete.clients');


    //staff Lead Customer for Staff
    Route::get('/staff/new_loan_applications',[Staffcustomer_leadsController::class,'new_loan_applications'])->name('new.loan.applications');

    Route::get('/staff/show_new_loan_application',[Staffcustomer_leadsController::class,'show_new_loan_application'])->name('show.new.loan.application');

    Route::post('/staff/add_new_loan_application',[Staffcustomer_leadsController::class,'add_new_loan_application'])->name('add.new.loan.application');
    
    Route::post('/staff/add_new_co_loan_application',[Staffcustomer_leadsController::class,'add_new_co_loan_application'])->name('add.coapplicant.loan.application');

    Route::get('/staff/show_loan_application_second',[Staffcustomer_leadsController::class,'show_loan_application_second'])->name('show.loan.application.second');

    Route::get('/admin/view_loan_application/{id}',[Staffcustomer_leadsController::class,'view_loan_application'])->name('view.loan.application');

    Route::get('/staff/edit_loan_new_applicattion/{id}',[Staffcustomer_leadsController::class,'edit_loan_new_applicattion'])->name('edit.loan.application');

    Route::put('/staff/update_loan_application/{id}',[Staffcustomer_leadsController::class,'update_loan_application'])->name('update.loan.application');
   
    Route::get('/staff/delete_lead_applicationt/{id}',[Staffcustomer_leadsController::class,'delete_lead_applicationt'])->name('delete.lead.applicationt');



});



Route::middleware(['auth', 'role:broker'])->group(function () {
    Route::get('/broker/dashboard',[BrokerController::class,'BrokerDashboard'])->name('broker.dashboard');
});



#########---------------Client---------#########################
Route::match(['get', 'post'],'/client/signup', [UserClientContoller::class,'clientSignup'])->name('clientSignup');
Route::match(['get', 'post'],'/client/otp', [UserClientContoller::class,'optVerification'])->name('optVerification');
Route::get('/client/dashboard', [UserClientContoller::class,'clientDashboard'])->name('clientDashboard');
Route::match(['get', 'post'],'/client/login', [UserClientContoller::class,'clientLogin'])->name('clientLogin');

Route::match(['get', 'post'],'/client/forgot/password/send/email', [UserClientContoller::class,'clientForgotPasswordSendEmail'])->name('clientForgotPasswordSendEmail');
Route::match(['get', 'post'],'/client/otp/forgot/password', [UserClientContoller::class,'optVerificationForgotPassword'])->name('optVerificationForgotPassword');
Route::match(['get', 'post'],'/client/set/forgot/password', [UserClientContoller::class,'setForgotPassword'])->name('setForgotPassword');
Route::get('/client/forgot/password/success', [UserClientContoller::class,'resetPasswordSuccess'])->name('resetPasswordSuccess');
Route::get('/client/signout', [UserClientContoller::class,'clientLogout'])->name('clientLogout');

Route::get('/client/profile/view', [UserClientContoller::class,'clientViewProfile'])->name('account.profile.view');
Route::match(['get', 'post'],'/client/profile/edit', [UserClientContoller::class,'clientEditProfile'])->name('account.profile.edit');
Route::post('/client/profile/change/password', [UserClientContoller::class,'clientChangePassword'])->name('account.profile.change.password');
Route::post('/client/profile/change/notification', [UserClientContoller::class,'clientNotificationPermission'])->name('account.profile.change.notofication');
Route::post('/client/profile/manage/contact', [UserClientContoller::class,'clientManageContacts'])->name('account.profile.manage.contact');
Route::match(['get', 'post'],'/client/reset/password', [UserClientContoller::class,'clientResetPassword'])->name('account.password.reset');


Route::get('/client/list/document', [ClientDocumentsController::class,'listClientDocuments'])->name('document.list');
Route::match(['get', 'post'],'/client/add/document/{type?}', [ClientDocumentsController::class,'addClientDocument'])->name('document.add');
Route::get('/client/view/document/{id}/{type?}', [ClientDocumentsController::class,'viewClientDocument'])->name('document.view');
Route::match(['get', 'post'],'/client/edit/document/{id?}/{type?}', [ClientDocumentsController::class,'editClientDocument'])->name('document.edit');
Route::post('/client/delete/document', [ClientDocumentsController::class,'deleteClientDocument'])->name('document.delete');

Route::get('/client/list/notification', [ClientNotificationController::class,'listClientNotifications'])->name('communication.notification.list');
Route::post('/update/notification/view', [ClientNotificationController::class, 'updateView'])->name('communication.notification.view.update');

Route::match(['get', 'post'],'/client/mortgage/calculator/step-1', [ClientMortgageController::class,'clientMortgageCalculatorStep1'])->name('mortgage.step1');
Route::get('/client/mortgage/calculator/step-2', [ClientMortgageController::class,'clientMortgageCalculatorStep2'])->name('mortgage.step2');
Route::match(['get', 'post'],'/client/mortgage/calculator/step-3', [ClientMortgageController::class,'clientMortgageCalculatorStep3'])->name('mortgage.step3');


Route::match(['get', 'post'],'/client/support/tickets', [ClientSupportController::class,'clientListSupportTickets'])->name('help.support.list_support_tickets');
Route::match(['get', 'post'],'/client/view/all/support/tickets', [ClientSupportController::class,'clientViewAllSupportTickets'])->name('help.support.view_all_support_tickets');
Route::match(['get', 'post'],'/client/add/support/tickets', [ClientSupportController::class,'clientAddSupportTickets'])->name('help.support.add_support_tickets');
Route::match(['get', 'post'],'/client/view/support/tickets/{id}', [ClientSupportController::class,'clientViewSupportTikets'])->name('help.support.view_support_tickets');
Route::match(['get', 'post'],'/client/search/support/tickets', [ClientSupportController::class,'searchSupportTicket'])->name('help.support.search_support_tickets');
Route::match(['get', 'post'],'/client/search/support/tickets/latest', [ClientSupportController::class,'searchSupportTicketGetLatestThree'])->name('help.support.get_support_tickets_latest');
Route::match(['get', 'post'],'/client/search/support/tickets/all', [ClientSupportController::class,'searchSupportTicketGetAll'])->name('help.support.get_support_tickets_all');

Route::get('/client/privacy/privacy-security', [ClientPrivacyController::class,'clientPrivacyAndSecurity'])->name('help.privacy.security');
Route::get('/client/educational-resources', [ClientEducationalResourcesController::class,'clientEducationalResources'])->name('help.educational.resources');
Route::get('/client/educational-resources/article/{id}', [ClientEducationalResourcesController::class,'clientViewArticle'])->name('help.educational.article.view');


###########-------------Frontend-------###############
Route::get('/', [HomepageController::class,'homePage'])->name('homePage');

Route::get('/about-us', [CMSController::class,'aboutUsScreen'])->name('aboutUsScreen');
Route::get('/home-financing', [CMSController::class,'homeFinancingScreen'])->name('homeFinancingScreen');
Route::match(['get', 'post'], '/contact-us', [CMSController::class,'contactUsScreen'])->name('contactUsScreen');
Route::get('/why-elite', [CMSController::class,'whyUsScreen'])->name('whyUsScreen');
Route::get('/get-call-back', [CMSController::class,'callBackData'])->name('callBackData');
Route::get('/faq', [CMSController::class,'faqData'])->name('faqData');
Route::get('/terms', [CMSController::class,'termsAndConditionsData'])->name('terms');
Route::get('/privacy', [CMSController::class,'privacyPolicyData'])->name('privacy');

// Route::get('/calculate-mortgage', 'App\Http\Controllers\Frontend\MortgageController@mortgageCalculator')->name('mortgageCalculator');
Route::match(['get', 'post'],'/start-mortgage-process', [MortgageController::class,'mortgageProcess'])->name('mortgageProcess');

Route::match(['get', 'post'], '/calculate-mortgage', [MortgageController::class,'mortgageCalculatorStep1'])->name('mortgageCalculator');
Route::match(['get', 'post'], '/calculate-mortgage-2', [MortgageController::class,'mortgageCalculatorStep2'])->name('mortgageCalculatorStep2');
Route::match(['get', 'post'], '/calculate-mortgage-3', [MortgageController::class,'mortgageCalculatorStep3'])->name('mortgageCalculatorStep3');
Route::match(['get', 'post'], '/calculate-mortgage-4', [MortgageController::class,'mortgageCalculatorStep4'])->name('mortgageCalculatorStep4');

Route::get('/resident-mortgages', [MortgageController::class,'residentMortgage'])->name('residentMortgage');
Route::get('/non-resident-mortgages', [MortgageController::class,'nonResidentMortgage'])->name('nonResidentMortgage');
Route::get('/equity-releases', [MortgageController::class,'equityReleases'])->name('equityReleases');
Route::get('/commercial-finance', [MortgageController::class,'commercialFinance'])->name('commercialFinance');
Route::get('/service/{url_key}', [MortgageController::class,'servicesPages'])->name('servicesPages');

Route::get('/partners', [PartnersController::class,'partners'])->name('partners');
Route::get('/partners-registration', [PartnersController::class,'partnerRegistration'])->name('partnerRegistration');

Route::get('/agent', [PartnersController::class,'agent'])->name('agent');

Route::get('/blog', [NewsController::class,'newsAndInsightData'])->name('newsAndInsightData');
Route::get('/blog/{id}/{title}', [NewsController::class,'newsIndividualData'])->name('newsIndividualData');

Route::match(['get', 'post'],'/book/an/appointment/step1', [AppointmentController::class,'appointmentScheduleDateTime'])->name('appointmentScheduleDateTime');
Route::match(['get', 'post'],'/book/an/appointment/step2', [AppointmentController::class,'bookAppointment'])->name('bookAppointment');
Route::match(['get', 'post'],'/get-time-slot', [AppointmentController::class,'getSlot'])->name('getSlot');

Route::post('/enquiry', [EnquiryController::class,'userEnquiry'])->name('enquiry');

