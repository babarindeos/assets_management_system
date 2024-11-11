<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuth;

use App\Http\Controllers\Admin\Admin_AuthController;
use App\Http\Controllers\Admin\Admin_DashboardController;
use App\Http\Controllers\Admin\Admin_CollegeController;
use App\Http\Controllers\Admin\Admin_DepartmentController;
use App\Http\Controllers\Admin\Admin_StaffController;
use App\Http\Controllers\Admin\Admin_DeanController;
use App\Http\Controllers\Admin\Admin_DirectorateController;
use App\Http\Controllers\Admin\Admin_AdminDocumentController;
use App\Http\Controllers\Admin\Admin_DocumentController;
use App\Http\Controllers\Admin\Admin_AdminCategoryTypeController;
use App\Http\Controllers\Admin\Admin_AdminCategoryController;

use App\Http\Controllers\Admin\Admin_ProfileController;

use App\Http\Controllers\Admin\Admin_TrackerController;
use App\Http\Controllers\Admin\Admin_AnalyticsController;


use App\Http\Controllers\Admin\Admin_DivisionController;
use App\Http\Controllers\Admin\Admin_BranchController;
use App\Http\Controllers\Admin\Admin_SectionController;
use App\Http\Controllers\Admin\Admin_UnitController;

use App\Http\Controllers\Admin\Admin_LocationController;
use App\Http\Controllers\Admin\Admin_LocationTypeController;

use App\Http\Controllers\Admin\Admin_LocationUserController;

use App\Http\Controllers\Admin\Admin_AssetCategoryController;

use App\Http\Controllers\Admin\Admin_OrganController;

use App\Http\Controllers\Admin\Admin_AssetController;

use App\Http\Controllers\Admin\Admin_MaintenanceScheduleController;

use App\Http\Controllers\Admin\Admin_WorkOrderController;

use App\Http\Controllers\Admin\Admin_ServiceProviderController;

use App\Http\Controllers\Admin\Admin_MaintenanceHistoryController;



use App\Http\Controllers\Staff\Staff_AuthController;
use App\Http\Controllers\Staff\Staff_DashboardController;
use App\Http\Controllers\Staff\Staff_DocumentController;
use App\Http\Controllers\Staff\Staff_WorkflowController;
use App\Http\Controllers\Staff\Staff_GeneralMessageController;
use App\Http\Controllers\Staff\Staff_PrivateMessageController;

use App\Http\Controllers\Staff\Staff_ProfileController;
use App\Http\Controllers\Staff\Staff_AssetController;



use App\Http\Controllers\Staff\Staff_CategoryController;
use App\Http\Controllers\Staff\Staff_AdminDocumentController;
use App\Http\Controllers\Staff\Staff_ServiceProviderController;
use App\Http\Controllers\Staff\Staff_MaintenanceScheduleController;

use App\Http\Controllers\Staff\Staff_WorkOrderController;
use App\Http\Controllers\Staff\Staff_MaintenanceHistoryController;

use App\Http\Controllers\Staff\Staff_VendorController;
use App\Http\Controllers\Staff\Staff_ProcurementController;

use App\Http\Controllers\PDFController;


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
})->name('welcome');


Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);


Route::post('/', [Staff_AuthController::class, 'login'])->name('staff.auth.login');



Route::get('/admin', [Admin_AuthController::class, 'index'])->name('admin.auth.index');
Route::post('/admin', [Admin_AuthController::class, 'login'])->name('admin.auth.login');


Route::prefix('staff')->middleware(['auth', 'staff'])->group(function(){
    Route::get('/dashboard', [Staff_DashboardController::class, 'index'])->name('staff.dashboard.index');
    Route::post('/logout', [Staff_AuthController::class, 'logout'])->name('staff.auth.logout');

    Route::get('/documents', [Staff_DocumentController::class, 'index'])->name('staff.document.index');
    Route::get('/documents/create', [Staff_DocumentController::class, 'create'])->name('staff.documents.create');
    Route::post('/documents/store', [Staff_DocumentController::class, 'store'])->name('staff.documents.store');
    
    Route::get('/documents/{document}/show', [Staff_DocumentController::class, 'show'])->name('staff.documents.show');
    Route::get('/documents/mydocuments', [Staff_DocumentController::class, 'mydocuments'])->name('staff.documents.mydocuments');

    // Admin Document
    Route::get('/admin_documents', [Staff_AdminDocumentController::class, 'index'])->name('staff.admin_documents.index');
    

    
    
    Route::get('/workflows/{document}/flow', [Staff_WorkflowController::class, 'flow'])->name('staff.workflows.flow');
    Route::get('/workflows/{document}/add_contributor',[Staff_WorkflowController::class, 'add_contributor'])->name('staff.workflows.add_contributor');
    Route::post('/workflows/{document}/post_add_contributor', [Staff_WorkflowController::class, 'post_add_contributor'])->name('staff.workflows.post_add_contributor');

    Route::post('/workflows/{document}/search_staff', [Staff_WorkflowController::class, 'search_staff'])->name('staff.workflows.search_staff');
    Route::post('/workflows/{document}/forward_document', [Staff_WorkflowController::class, 'forward_document'])->name('staff.workflows.forward_document');

    Route::get('/workflows/{workflow}/notification_update', [Staff_WorkflowController::class, 'notification_update'])->name('staff.workflows.notification_update');

    
    Route::get('/workflows/{document}/general_message', [Staff_GeneralMessageController::class, 'index'])->name('staff.workflows.general_message');
    Route::post('/workflows/{document}/general_message', [Staff_GeneralMessageController::class, 'store'])->name('staff.workflows.general_message.store');

    Route::get('/workflows/{document}/private_messages/{recipient}/my_private_messages', [Staff_PrivateMessageController::class, 'my_private_messages'])->name('staff.workflows.private_messages.my_private_messages');
    Route::get('/workflows/{document}/private_message/{recipient}', [Staff_PrivateMessageController::class, 'index'])->name('staff.workflows.private_message.index');
    Route::get('/workflows/{document}/private_message/{sender}/{recipient}/{chat_uuid}/chat', [Staff_PrivateMessageController::class, 'chat'])->name('staff.workflows.private_message.chat');

    Route::post('/workflows/{document}/private_message/{sender}/{recipient}/{chat_uuid}/chat', [Staff_PrivateMessageController::class, 'store'])->name('staff.workflows.private_message.store');

    Route::get('/profile/create', [Staff_ProfileController::class, 'create'])->name('staff.profile.create');
    Route::post('/profile/create', [Staff_ProfileController::class, 'store'])->name('staff.profile.store');
    Route::post('/profile/upload_avatar', [Staff_ProfileController::class, 'upload_avatar'])->name('staff.profile.upload_avatar');

    Route::get('/profile/myprofile', [Staff_ProfileController::class, 'myprofile'])->name('staff.profile.myprofile');
    
    Route::get('/profile/myprofile/edit', [Staff_ProfileController::class, 'edit'])->name('staff.profile.myprofile.edit');
    Route::post('/profile/myprofile/update', [Staff_ProfileController::class, 'update'])->name('staff.profile.myprofile.update');

    Route::post('/profile/myprofile/update_avatar', [Staff_ProfileController::class, 'update_avatar'])->name('staff.profile.myprofile.update_avatar');
    
    Route::get('/profile/user/{fileno}', [Staff_ProfileController::class, 'user_profile'])->name('staff.profile.user_profile');
    Route::get('/profile/user/{email}/user_profile', [Staff_ProfileController::class, 'email_user_profile'])->name('staff.profile.email_user_profile');
    
    Route::get('/profile/change_password', [Staff_ProfileController::class, 'change_password'])->name('staff.profile.change_password');
    Route::post('/profile/update_password', [Staff_ProfileController::class, 'update_password'])->name('staff.profile.update_password');

    Route::get('/profile/my_signature', [Staff_ProfileController::class, 'my_signature'])->name('staff.profile.my_signature');
    Route::post('/profile/my_signature', [Staff_ProfileController::class, 'upload_signature'])->name('staff.profile.upload_signature');
    Route::post('/profile/update_signature', [Staff_ProfileController::class, 'update_signature'])->name('staff.profile.update_signature');

    // Categories
    Route::get('/categories/create', [Staff_CategoryController::class, 'create'])->name('staff.categories.create');
    Route::post('/categories/store', [Staff_CategoryController::class, 'store'])->name('staff.categories.store');


    // Assets
    Route::get('assets', [Staff_AssetController::class, 'index'])->name('staff.assets.index');
    Route::get('assets/create', [Staff_AssetController::class, 'create'])->name('staff.assets.create');
    Route::post('assets/store', [Staff_AssetController::class, 'store'])->name('staff.assets.store');
    Route::get('assets/{asset}/show', [Staff_AssetController::class, 'show'])->name('staff.assets.show');
    Route::get('assets/{asset}/edit', [Staff_AssetController::class, 'edit'])->name('staff.assets.edit');
    Route::post('assets/{asset}/update', [Staff_AssetController::class, 'update'])->name('staff.assets.update');
    Route::get('assets/{asset}/confirm_delete', [Staff_AssetController::class, 'confirm_delete'])->name('staff.assets.confirm_delete');
    Route::post('assets/{asset}/delete', [Staff_AssetController::class, 'destroy'])->name('staff.assets.delete');

    // Maintenance
    Route::get('maintenance/service_providers', [Staff_ServiceProviderController::class, 'index'])->name('staff.maintenance.service_providers.index');
    Route::get('maintenance/service_providers/create', [Staff_ServiceProviderController::class, 'create'])->name('staff.maintenance.service_providers.create');
    Route::post('maintenance/service_providers/store', [Staff_ServiceProviderController::class, 'store'])->name('staff.maintenance.service_providers.store');
    Route::get('maintenance/service_providers/{service_provider}/edit', [Staff_ServiceProviderController::class, 'edit'])->name('staff.maintenance.service_providers.edit');
    Route::post('maintenance/service_providers/{service_provider}/update', [Staff_ServiceProviderController::class, 'update'])->name('staff.maintenance.service_providers.update');
    Route::get('maintenance/service_providers/{service_provider}/confirm_delete', [Staff_ServiceProviderController::class, 'confirm_delete'])->name('staff.maintenance.service_providers.confirm_delete');
    Route::post('maintenance/service_providers/{service_provider}/delete', [Staff_ServiceProviderController::class, 'delete'])->name('staff.maintenance.service_providers.delete');

    Route::get('maintenance/maintenance_schedules', [Staff_MaintenanceScheduleController::class, 'index'])->name('staff.maintenance.maintenance_schedules.index');
    Route::get('maintenance/maintenance_schedules/create', [Staff_MaintenanceScheduleController::class, 'create'])->name('staff.maintenance.maintenance_schedules.create');
    Route::post('maintenance/maintenance_schedules/store', [Staff_MaintenanceScheduleController::class, 'store'])->name('staff.maintenance.maintenance_schedules.store');
    Route::get('maintenance/maintenance_schedules/{maintenance_schedule}/edit', [Staff_MaintenanceScheduleController::class, 'edit'])->name('staff.maintenance.maintenance_schedules.edit');
    Route::post('maintenance/maintenance_schedules/{maintenance_schedule}/update', [Staff_MaintenanceScheduleController::class, 'update'])->name('staff.maintenance.maintenance_schedules.update');
    Route::get('maintenance/maintenance_schedules/{maintenance_schedule}/confirm_delete', [Staff_MaintenanceScheduleController::class, 'confirm_delete'])->name('staff.maintenance.maintenance_schedules.confirm_delete');
    Route::post('maintenance/maintenance_schedule/{maintenance_schedule}/delete', [Staff_MaintenanceScheduleController::class, 'destory'])->name('staff.maintenance.maintenance_schedules.delete');

    // Work Order
    Route::get('maintenance/workorders/', [Staff_WorkOrderController::class, 'index'])->name('staff.maintenance.workorders.index');
    Route::get('maintenance/workorders/create', [Staff_WorkOrderController::class, 'create'])->name('staff.maintenance.workorders.create');
    Route::post('maintenance/workorders/store', [Staff_WorkOrderController::class, 'store'])->name('staff.maintenance.workorders.store');
    Route::get('maintenance/history', [Staff_MaintenanceHistoryController::class, 'index'])->name('staff.maintenance.history');
    Route::get('maintenance/workorders/{workorder}/show',[Staff_WorkOrderController::class, 'show'])->name('staff.maintenance.workorders.show');
    Route::get('maintenance/workorders/{workorder}/edit',[Staff_WorkOrderController::class, 'edit'])->name('staff.maintenance.workorders.edit');
    Route::post('maintenance/workorders/{workorder}/update',[Staff_WorkOrderController::class, 'update'])->name('staff.maintenance.workorders.update');
    Route::get('maintenance/workorders/{workorder}/confirm_delete',[Staff_WorkOrderController::class, 'confirm_delete'])->name('staff.maintenance.workorder.confirm_delete');
    Route::post('maintenance/workorders/{workorder}/delete',[Staff_WorkOrderController::class, 'destroy'])->name('staff.maintenance.workorders.delete');


    // Vendor
    Route::get('procurement/vendors', [Staff_VendorController::class, 'index'])->name('staff.procurements.vendors.index');
    Route::get('procurement/vendors/create', [Staff_VendorController::class, 'create'])->name('staff.procurements.vendors.create');
    Route::post('procurement/vendors/store', [Staff_VendorController::class, 'store'])->name('staff.procurements.vendors.store');
    Route::get('procurement/vendors/{vendor}/edit', [Staff_VendorController::class, 'edit'])->name('staff.procurements.vendors.edit');
    Route::post('procurement/vendors/{vendor}/update', [Staff_VendorController::class, 'update'])->name('staff.procurements.vendors.update');
    Route::get('procurement/vendors/{vendor}/confirm_delete', [Staff_VendorController::class, 'confirm_delete'])->name('staff.procurements.vendors.confirm_delete');
    Route::post('procurement/vendors/{vendor}/delete', [Staff_VendorController::class, 'destroy'])->name('staff.procurements.vendors.delete');


    // procurement requeststaff.procurements.purchase_requests.index
    Route::get('procurement/purchase_requests', [Staff_ProcurementController::class, 'index'])->name('staff.procurements.purchase_requests.index');
    Route::get('procurement/purchase_requests/create', [Staff_ProcurementController::class, 'create'])->name('staff.procurements.purchase_requests.create');
    Route::post('procurement/purchase_requests/store', [Staff_ProcurementController::class, 'store'])->name('staff.procurements.purchase_requests.store');
    Route::get('procurement/purchase_requests/{purchase_request}/edit', [Staff_ProcurementController::class, 'edit'])->name('staff.procurements.purchase_requests.edit');
    Route::post('procurement/purchase_requests/{purchase_request}/update', [Staff_ProcurementController::class, 'update'])->name('staff.procurements.purchase_requests.update');
    Route::get('procurement/purchase_requests/{purchase_request}/confirm_delete', [Staff_ProcurementController::class, 'confirm_delete'])->name('staff.procurements.purchase_requests.confirm_delete');
    Route::post('procurement/purchase_requests/{purchase_request}/delete', [Staff_ProcurementController::class, 'destroy'])->name('staff.procurements.purchase_requests.delete');


});



Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
    
    Route::get('/dashboard', [Admin_DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::post('/logout', [Admin_AuthController::class, 'logout'])->name('admin.auth.logout');


    //college
    Route::get('/colleges', [Admin_CollegeController::class, 'index'])->name('admin.colleges.index');
    Route::get('/colleges/create', [Admin_CollegeController::class, 'create'])->name('admin.colleges.create');
    Route::post('colleges/store', [Admin_CollegeController::class, 'store'])->name('admin.colleges.store');

    Route::get('colleges/{college}/edit', [Admin_CollegeController::class, 'edit'])->name('admin.colleges.edit');
    Route::post('colleges/{college}/update', [Admin_CollegeController::class, 'update'])->name('admin.colleges.update');
    Route::delete('college/{college}/destroy', [Admin_CollegeController::class, 'destroy'])->name('admin.colleges.destroy');


    // directorates
    Route::get('/directorates', [Admin_DirectorateController::class, 'index'])->name('admin.directorates.index');
    Route::get('/directorates/create', [Admin_DirectorateController::class, 'create'])->name('admin.directorates.create');
    Route::post('/directorates/store', [Admin_DirectorateController::class, 'store'])->name('admin.directorates.store');
    
    Route::get('/directorates/{directorate}/show', [Admin_DirectorateController::class, 'show'])->name('admin.directorates.show');
    Route::get('/directorates/{directorate}/edit', [Admin_DirectorateController::class, 'edit'])->name('admin.directorates.edit');
    Route::post('/directorates/{directorate}/update', [Admin_DirectorateController::class, 'update'])->name('admin.directorates.update');

    Route::get('/directorates/{directorate}/confirm_delete', [Admin_DirectorateController::class, 'confirm_delete'])->name('admin.directorates.confirm_delete');
    Route::post('/directorates/{directorate}/destroy', [Admin_DirectorateController::class, 'destroy'])->name('admin.directorates.destroy');

    
    // ministry
    Route::get('/ministries', [Admin_MinistryController::class, 'index'])->name('admin.ministries.index');
    Route::get('/ministries/create', [Admin_MinistryController::class, 'create'])->name('admin.ministries.create');
    Route::post('/ministries/store', [Admin_MinistryController::class, 'store'])->name('admin.ministries.store');
    
    Route::get('/ministries/{ministry}/show', [Admin_MinistryController::class, 'show'])->name('admin.ministries.show');
    Route::get('/ministries/{ministry}/edit', [Admin_MinistryController::class, 'edit'])->name('admin.ministries.edit');
    Route::post('/ministries/{ministry}/update', [Admin_MinistryController::class, 'update'])->name('admin.ministries.update');

    Route::get('/ministries/{ministry}/destroy', [Admin_MinistryController::class, 'destroy'])->name('admin.ministries.destroy');
    Route::post('/ministries/{ministry}/confirm_delete', [Admin_MinistryController::class, 'confirm_delete'])->name('admin.ministries.confirm_delete');


    
    // Department
    Route::get('/departments', [Admin_DepartmentController::class, 'index'])->name('admin.departments.index');
    Route::get('departments/create', [Admin_DepartmentController::class, 'create'])->name('admin.departments.create');
    Route::post('departments/store', [Admin_DepartmentController::class, 'store'])->name('admin.departments.store');
    
    Route::get('departments/{department}/edit', [Admin_DepartmentController::class, 'edit'])->name('admin.departments.edit');
    Route::post('departments/{department}/update', [Admin_DepartmentController::class, 'update'])->name('admin.departments.update');

    Route::get('departments/{department}/confirm_delete', [Admin_DepartmentController::class, 'confirm_delete'])->name('admin.departments.confirm_delete');
    Route::post('/departments/{department}/destroy', [Admin_DepartmentController::class, 'destroy'])->name('admin.departments.destroy');


    // Division
    Route::get('/divisions', [Admin_DivisionController::class, 'index'])->name('admin.divisions.index');
    Route::get('divisions/create', [Admin_DivisionController::class, 'create'])->name('admin.divisions.create');
    Route::post('divisions/store', [Admin_DivisionController::class, 'store'])->name('admin.divisions.store');
    
    Route::get('divisions/{division}/show', [Admin_DivisionController::class, 'show'])->name('admin.divisions.show');
    Route::get('divisions/{division}/edit', [Admin_DivisionController::class, 'edit'])->name('admin.divisions.edit');
    Route::post('divisions/{division}/update', [Admin_DivisionController::class, 'update'])->name('admin.divisions.update');

    Route::get('divisions/{division}/confirm_delete', [Admin_DivisionController::class, 'confirm_delete'])->name('admin.divisions.confirm_delete');
    Route::post('/divisions/{division}/destroy', [Admin_DivisionController::class, 'destroy'])->name('admin.divisions.destroy');

    
    // Branch
    Route::get('/branches', [Admin_BranchController::class, 'index'])->name('admin.branches.index');
    Route::get('branches/create', [Admin_BranchController::class, 'create'])->name('admin.branches.create');
    Route::post('branches/store', [Admin_BranchController::class, 'store'])->name('admin.branches.store');
    
    Route::get('branches/{branch}/show', [Admin_BranchController::class, 'show'])->name('admin.branches.show');
    Route::get('branches/{branch}/edit', [Admin_BranchController::class, 'edit'])->name('admin.branches.edit');
    Route::post('branches/{branch}/update', [Admin_BranchController::class, 'update'])->name('admin.branches.update');

    Route::get('branches/{branch}/confirm_delete', [Admin_BranchController::class, 'confirm_delete'])->name('admin.branches.confirm_delete');
    Route::post('/branches/{branch}/destroy', [Admin_BranchController::class, 'destroy'])->name('admin.branches.destroy');


    // Section
    Route::get('/sections', [Admin_SectionController::class, 'index'])->name('admin.sections.index');
    Route::get('sections/create', [Admin_SectionController::class, 'create'])->name('admin.sections.create');
    Route::post('sections/store', [Admin_SectionController::class, 'store'])->name('admin.sections.store');
    
    Route::get('sections/{section}/show', [Admin_SectionController::class, 'show'])->name('admin.sections.show');
    Route::get('sections/{section}/edit', [Admin_SectionController::class, 'edit'])->name('admin.sections.edit');
    Route::post('sections/{section}/update', [Admin_SectionController::class, 'update'])->name('admin.sections.update');

    Route::get('sections/{section}/confirm_delete', [Admin_SectionController::class, 'confirm_delete'])->name('admin.sections.confirm_delete');
    Route::post('/sections/{section}/confirm_destroy', [Admin_SectionController::class, 'destroy'])->name('admin.sections.destroy');


    // Unit
    Route::get('/units', [Admin_UnitController::class, 'index'])->name('admin.units.index');
    Route::get('units/create', [Admin_UnitController::class, 'create'])->name('admin.units.create');
    Route::post('units/store', [Admin_UnitController::class, 'store'])->name('admin.units.store');
    
    Route::get('units/{unit}/show', [Admin_UnitController::class, 'show'])->name('admin.units.show');
    Route::get('units/{unit}/edit', [Admin_UnitController::class, 'edit'])->name('admin.units.edit');
    Route::post('units/{unit}/update', [Admin_UnitController::class, 'update'])->name('admin.units.update');

    Route::get('units/{unit}/confirm_delete', [Admin_UnitController::class, 'confirm_delete'])->name('admin.units.confirm_delete');
    Route::post('/units/{unit}/destroy', [Admin_UnitController::class, 'destroy'])->name('admin.units.destroy');





    // Staff
    Route::get('staff', [Admin_StaffController::class, 'index'])->name('admin.staff.index');
    Route::post('staff/select_organ', [Admin_StaffController::class, 'select_organ'])->name('admin.staff.select_organ');
    Route::get('staff/create', [Admin_StaffController::class, 'create'])->name('admin.staff.create');
    Route::post('staff/store', [Admin_StaffController::class, 'store'])->name('admin.staff.store');

    Route::get('staff/{staff}/edit', [Admin_StaffController::class, 'edit'])->name('admin.staff.edit');
    Route::post('staff/{staff}/update', [Admin_StaffController::class, 'update'])->name('admin.staff.update');


    // Location Type
    Route::get('location_types', [Admin_LocationTypeController::class, "index"])->name('admin.location_types.index');
    Route::get('location_types/create', [Admin_LocationTypeController::class, "create"])->name('admin.location_types.create');
    Route::post('location_types/store', [Admin_LocationTypeController::class, "store"])->name('admin.location_types.store');
    Route::get('location_types/{location_type}/show', [Admin_LocationTypeController::class, 'show'])->name('admin.location_types.show');
    Route::get('location_types/{location_type}/edit', [Admin_LocationTypeController::class, "edit"])->name('admin.location_types.edit');
    Route::post('location_types/{location_type}/update', [Admin_LocationTypeController::class, "update"])->name('admin.location_types.update');
    Route::get('location_types/{location_type}/confirm_delete', [Admin_LocationTypeController::class, 'confirm_delete'])->name('admin.location_types.confirm_delete');
    Route::post('location_types/{location_type}/destroy', [Admin_LocationController::class, 'destroy'])->name('admin.location_types.destroy');



    // Organ 
    Route::get('organs', [Admin_OrganController::class, "index"])->name('admin.organs.index');
    Route::get('organs/{organ}/show', [Admin_OrganController::class, 'show'])->name('admin.organs.show');
    Route::get('organs/create', [Admin_OrganController::class, 'create'])->name('admin.organs.create');
    Route::post('organs/store', [Admin_OrganController::class, 'store'])->name('admin.organs.store');
    Route::get('organs/{organ}/edit', [Admin_OrganController::class, 'edit'])->name('admin.organs.edit');
    Route::post('organs/{organ}/update', [Admin_OrganController::class, 'update'])->name('admin.organs.update');
    Route::get('organs/{organ}/confirm_delete', [Admin_OrganController::class, 'confirm_delete'])->name('admin.organs.confirm_delete');
    Route::post('organs/{organ}/delete', [Admin_OrganController::class, 'destroy'])->name('admin.organs.delete');


    // Location
    Route::get('locations', [Admin_LocationController::class, 'index'])->name('admin.locations.index');
    Route::get('locations/create', [Admin_LocationController::class, 'create'])->name('admin.locations.create');
    Route::post('locations/store', [Admin_LocationController::class, 'store'])->name('admin.locations.store');
    Route::get('locations/{location}/show', [Admin_LocationController::class, 'show'])->name('admin.locations.show');
    Route::get('locations/{location}/edit', [Admin_LocationController::class, 'edit'])->name('admin.locations.edit');
    Route::post('locations/{location}/update', [Admin_LocationController::class, 'update'])->name('admin.locations.update');
    Route::get('locations/{location}/confirm_delete', [Admin_LocationController::class, 'confirm_delete'])->name('admin.locations.confirm_delete');
    Route::post('locations/{location}/destroy', [Admin_LocationController::class, 'destroy'])->name('admin.locations.destroy');  
    
    
    // Location Users
    Route::get('location_users/{location}/users', [Admin_LocationUserController::class, 'index'])->name('admin.location_users.index');
    Route::get('location_users/{location}/create', [Admin_LocationUserController::class, 'create'])->name('admin.location_users.create');
    Route::post('location_users/{location}/store', [Admin_LocationUserController::class, 'store'])->name('admin.location_users.store');
    Route::post('location_users/{location}/location/{location_user}/delete', [Admin_LocationUserController::class, 'destroy'])->name('admin.location_users.delete');
    


    // Admin Document Category Type
    Route::get('admin_category_types', [Admin_AdminCategoryTypeController::class, 'index'])->name('admin.admin_category_types.index');
    Route::get('admin_category_types/create', [Admin_AdminCategoryTypeController::class, 'create'])->name('admin.admin_category_types.create');
    Route::post('admin_category_types/store', [Admin_AdminCategoryTypeController::class, 'store'])->name('admin.admin_category_types.store');
    Route::get('admin_category_types/{admin_category_type}/edit', [Admin_AdminCategoryTypeController::class, 'edit'])->name('admin.admin_category_types.edit');
    Route::post('admin_category_types/{admin_category_type}/update', [Admin_AdminCategoryTypeController::class, 'update'])->name('admin.admin_category_types.update');
    Route::get('admin_category_types/{admin_category_type}/show', [Admin_AdminCategoryTypeController::class, 'show'])->name('admin.admin_category_types.show');
    


    // Admin Categories
    Route::get('admin_categories', [Admin_AdminCategoryController::class, 'index'])->name('admin.admin_categories.index');
    Route::get('admin_categories/create', [Admin_AdminCategoryController::class, 'create'])->name('admin.admin_categories.create');
    Route::post('admin_categories/store', [Admin_AdminCategoryController::class, 'store'])->name('admin.admin_categories.store');
    Route::get('admin_categories/{admin_category}/edit', [Admin_AdminCategoryController::class, 'edit'])->name('admin.admin_categories.edit');
    Route::post('admin_categories/{admin_category}/update', [Admin_AdminCategoryController::class, 'update'])->name('admin.admin_categories.update');

    //  Admin Documents
    Route::get('admin_documents', [Admin_AdminDocumentController::class, 'index'])->name('admin.admin_documents.index');
 

    // Document
    Route::get('documents', [Admin_DocumentController::class, 'index'])->name('admin.documents.index');
    Route::get('document_details/{document}', [Admin_DocumentController::class, 'show'])->name('admin.documents.show');

    // User Profile
    Route::get('/profile/user/{fileno}', [Admin_ProfileController::class, 'user_profile'])->name('admin.profile.user_profile');
    Route::get('/profile/{email}/user', [Admin_ProfileController::class, 'email_user_profile'])->name('admin.profile.email_user_profile');


    // Tracker
    Route::get('tracker', [Admin_TrackerController::class, 'index'])->name('admin.tracker.index');
    Route::get('analytics', [Admin_AnalyticsController::class, 'index'])->name('admin.analytics.index');
    //Route::post('tracker', [Admin_TrackerController::class, 'index'])->name('admin.tracker.index');


    // Deans
    Route::get('deans', [Admin_DeanController::class, 'index'])->name('admin.deans.index');
    Route::get('dean/create', [Admin_DeanController::class, 'create'])->name('admin.deans.create');
    Route::post('dean/get_assigned_dean', [Admin_DeanController::class, 'get_assigned_dean'])->name('admin.deans.get_assigned_dean');

    Route::get('dean/assign_dean', [Admin_DeanController::class, 'assign_dean'])->name('admin.deans.assign_dean');
    Route::post('dean/assign_dean', [Admin_DeanController::class, 'store_assign_dean'])->name('admin.deans.store_assign_dean');


    // Asset Categories
    Route::get('asset_categories', [Admin_AssetCategoryController::class, 'index'])->name('admin.asset_categories.index');
    Route::get('asset_categories/create', [Admin_AssetCategoryController::class, 'create'])->name('admin.asset_categories.create');
    Route::post('asset_categories/store', [Admin_AssetCategoryController::class, 'store'])->name('admin.asset_categories.store');
    Route::get('asset_categories/{category}/edit', [Admin_AssetCategoryController::class, 'edit'])->name('admin.asset_categories.edit');
    Route::post('asset_categories/{category}/update', [Admin_AssetCategoryController::class, 'update'])->name('admin.asset_categories.update');
    Route::get('asset_categories/{category}/confirm_delete', [Admin_AssetCategoryController::class, 'confirm_delete'])->name('admin.asset_categories.confirm_delete');
    Route::post('asset_categories/{category}/delete', [Admin_AssetCategoryController::class, 'destroy'])->name('admin.asset_categories.delete');


    // Asset
    Route::get('assets', [Admin_AssetController::class, 'index'])->name('admin.assets.index');
    Route::get('assets/{asset}/show', [Admin_AssetController::class, 'show'])->name('admin.assets.show');
    Route::get('assets/categories', [Admin_AssetController::class, 'categories'])->name('admin.assets.categories');
    Route::get('assets/categories/{category}/show', [Admin_AssetController::class, 'category_show'])->name('admin.assets.categories.show');
    Route::get('assets/find_asset', [Admin_AssetController::class, 'find_asset'])->name('admin.assets.find_asset');


    //
    Route::get('maintenance/maintenace_schedule', [Admin_MaintenanceScheduleController::class, 'index'])->name('admin.maintenance.maintenance_schedule.index');
    
    Route::get('maintenance/workorders', [Admin_WorkOrderController::class, 'index'])->name('admin.maintenance.workorders.index');
    Route::get('maintenance/workorders/{workorder}/show', [Admin_WorkOrderController::class, 'show'])->name('admin.maintenance.workorders.show');
    Route::get('maintenance/history', [Admin_MaintenanceHistoryController::class, 'index'])->name('admin.maintenance.history');

    Route::get('maintenance/service_providers', [Admin_ServiceProviderController::class, 'index'])->name('admin.maintenance.service_providers.index');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
