<?php
/*
Laravel say that Auth guard [user] is not defined
https://www.devopsschool.com/blog/laravel-say-that-auth-guard-user-is-not-defined/
php artisan config:clear
php artisan config:cache
*/
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\COA\COAController;
use App\Http\Controllers\Inventory\InventoryController;

use App\Http\Controllers\OrderDoctorController;
use App\Http\Controllers\OrderHakeemController;
use App\Http\Controllers\OrderLaborityController;
use App\Http\Controllers\OrderPharmacyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HakeemController;
use App\Http\Controllers\LaborityController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\CourseFormController;
use App\Http\Controllers\DoctorTypeController;
use App\Http\Controllers\HakeemTypeController;
use App\Http\Controllers\LaborityTypeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DawakhanahakeemController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DawakhanaLoginController;
use App\Http\Controllers\LabLoginController;
use App\Http\Controllers\HospitalLoginController;
use App\Http\Controllers\BolgsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\QuickLinkController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\HeaderSubController;
use App\Http\Controllers\Section1Controller;
use App\Http\Controllers\Section2Controller;
use App\Http\Controllers\Section3Controller;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\HpMainSliderController;

use App\Http\Controllers\HpmessageController; 
use App\Http\Controllers\TestimonialController; 

use App\Http\Controllers\NavbarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HpgalleryController;

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\HpServiceController;



//Frontend
Route::get('/', [HomeController::class, 'index']);
Route::post('search/', [HomeController::class, 'search']);
Route::get('/searchResult', [HomeController::class, 'searchResult']);
Route::get('signin', [HomeController::class, 'signin']);

Route::get('doctorRegistration/', [HomeController::class, 'doctorRegistration']);
//Route::post('doctorRegistrationProcess/', [HomeController::class, 'doctorRegistrationProcess']);
Route::post('doctorRegistrationProcess/', [DoctorController::class, 'storeFrontDoctor']);
Route::get('hakeemRegistration/', [HomeController::class, 'hakeemRegistration']);
//hakeemRegistrationProcess
Route::post('hakeemRegistrationProcess/', [HakeemController::class, 'storeFrontHakeem']);
Route::get('laboratoryRegistration/', [HomeController::class, 'laboratoryRegistration']);
Route::post('laboratoryRegistrationProcess/', [LaborityController::class, 'storeFrontLaboratory']);
Route::get('pharmacyRegistration/', [HomeController::class, 'pharmacyRegistration']);
//pharmacyRegistrationProcess
Route::post('pharmacyRegistrationProcess/', [PharmacyController::class, 'storeFrontPharmacy']);

Route::get('helpdesk/', [HomeController::class, 'helpDesk']);
Route::get('emergencyservices/', [HomeController::class, 'emergencyServices']);
Route::get('appointment/', [HomeController::class, 'appointment']);

Route::get('about/', [HomeController::class, 'about']);
Route::get('terms/', [HomeController::class, 'terms']);
Route::get('faq/', [HomeController::class, 'faq']);

Route::get('services/', [HomeController::class, 'services']);
Route::get('contact/', [HomeController::class, 'contact']);

Route::get('hakeemonline/', [HomeController::class, 'hakeemonline']);
Route::get('tibbenabvi/', [HomeController::class, 'tibbenabvi']);
Route::get('labs/', [HomeController::class, 'labs']);

//Laboratories
Route::get('laboratory/{slug}', [HomeController::class, 'laboratory']);

//Pharmacies appointment page
Route::get('pharmacy/{slug}', [HomeController::class, 'pharmacy']);

Route::get('pharmacy/', [HomeController::class, 'pharmacy']);
Route::get('doctor/{id}', [HomeController::class, 'doctor']);
Route::get('dashboard/', [HomeController::class, 'dashboard']);
Route::get('deptt/{slug}', [HomeController::class, 'department']);
Route::get('hpmessages/{slug}', [HomeController::class, 'viewhpmessage'])->where('slug', '[\w\s\-_\/]+')->name("hpmessages_page");
Route::get('hpservices/{slug}', [HomeController::class, 'viewhpservice'])->where('slug', '[\w\s\-_\/]+')->name("hpservices_page");
Route::get('news/{slug}', [HomeController::class, 'viewnews'])->where('slug', '[\w\s\-_\/]+')->name("news_page");

Auth::routes();
Route::get('admin/dashboard', [DashboardController::class, 'index']);
Route::get('frontdoctor/logout', [HomeController::class, 'logout'])->name('logout');

Route::post('/checkAppointment', [OrderDoctorController::class, 'checkAppointment'])->name('checkAppointment');
Route::post('/getSpecialityOfDoctor', [OrderDoctorController::class, 'getSpecialityOfDoctor'])->name('getSpecialityOfDoctor');
Route::post('frontdoctor/updateDoctorComments', [OrderDoctorController::class, 'updateDoctorComments'])->name('updateDoctorComments'); 


Route::post('/checkAppointmentHakeem', [OrderHakeemController::class, 'checkAppointment'])->name('checkAppointmentHakeem');
Route::post('/getSpecialityOfHakeem', [OrderHakeemController::class, 'getSpecialityOfHakeem'])->name('getSpecialityOfHakeem');
Route::post('fronthakeem/updateHakeemComments', [OrderHakeemController::class, 'updateHakeemComments'])->name('updateHakeemComments');

Route::post('/checkAppointmentLabority', [OrderLaborityController::class, 'checkAppointment'])->name('checkAppointmentLabority');
Route::post('laboratory/getSpecialityOfLabority', [OrderLaborityController::class, 'getSpecialityOfLabority'])->name('getSpecialityOfLabority');
Route::post('frontlabority/updateLaborityComments', [OrderLaborityController::class, 'updateLaborityComments'])->name('updateLaborityComments');

Route::post('/checkAppointmentPharmacy', [OrderPharmacyController::class, 'checkAppointment'])->name('checkAppointmentPharmacy');
Route::post('laboratory/getSpecialityOfPharmacy', [OrderPharmacyController::class, 'getSpecialityOfPharmacy'])->name('getSpecialityOfPharmacy');
Route::post('frontpharmacy/updatePharmacyComments', [OrderPharmacyController::class, 'updatePharmacyComments'])->name('updatePharmacyComments');
        
Route::post('processContactUs', [HomeController::class, 'processContactUs']);

//frontdoctor
Route::prefix('frontdoctor')->name('frontdoctor.')->group(function () {
    Route::middleware(['guest:frontdoctor', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'frontend.home.login')->name('login');
        Route::view('/login', 'frontend.home.login')->name('login');
        Route::post('/create', [HomeController::class, 'create'])->name('create');
        Route::post('/check', [HomeController::class, 'check'])->name('check');
               
    });

    Route::middleware(['auth:frontdoctor', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard']);
        Route::view('/home', 'frontend.home.login')->name('login');
        Route::get('/add-new', [HomeController::class, 'add'])->name('add');
        Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
        Route::get('/nurse', [HomeController::class, 'nurse'])->name('nurse');
        Route::get('/appointment_order_details/{id}', [OrderDoctorController::class, 'appointment_order_details']);
        Route::get('editDoctorRegistration/{id}', [HomeController::class, 'editDoctorRegistration'])->name('editDoctorRegistration'); 
        Route::post('editDoctorRegistrationProcess', [DoctorController::class, 'editDoctorRegistrationProcess'])->name('editDoctorRegistrationProcess'); 
    });
});

//frontpatient
Route::prefix('frontpatient')->name('frontpatient.')->group(function () {
   Route::middleware(['guest:frontpatient', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'frontend.home.login')->name('login');
        Route::view('/login', 'frontend.home.login')->name('login');
        Route::post('/create', [HomeController::class, 'patientcreate'])->name('patientcreate');
        Route::post('/check', [HomeController::class, 'patientcheck'])->name('patientcheck');
    });

    Route::middleware(['auth:frontpatient', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard']);
        Route::view('/home', 'frontend.home.login')->name('login');
        Route::get('/add-new', [HomeController::class, 'patientadd'])->name('patientadd');
        Route::get('/profile', [HomeController::class, 'patientprofile'])->name('patientprofile');
        Route::get('/nurse', [HomeController::class, 'patientnurse'])->name('patientnurse');
        Route::get('/appointment_order_details/{id}', [OrderDoctorController::class, 'appointment_order_details']);
        Route::get('/appointmenthakeem_order_details/{id}', [OrderHakeemController::class, 'appointmenthakeem_order_details']);
        Route::get('/appointmentlabority_order_details/{id}', [OrderLaborityController::class, 'appointmentlabority_order_details']);
        Route::get('/appointmentpharmacy_order_details/{id}', [OrderPharmacyController::class, 'appointmentpharmacy_order_details']);
    });/**/
});

//fronthakeem
Route::prefix('fronthakeem')->name('fronthakeem.')->group(function () {
    Route::middleware(['guest:fronthakeem', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'frontend.home.login')->name('login');
        Route::view('/login', 'frontend.home.login')->name('login');
        Route::post('/create', [HomeController::class, 'hakeemcreate'])->name('hakeemcreate');
        Route::post('/check', [HomeController::class, 'hakeemcheck'])->name('hakeemcheck');
    });

    Route::middleware(['auth:fronthakeem', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard']);
        Route::view('/home', 'frontend.home.login')->name('login');
        Route::get('/add-new', [HomeController::class, 'hakeemadd'])->name('hakeemadd');
        Route::get('/profile', [HomeController::class, 'hakeemprofile'])->name('hakeemprofile');
        Route::get('/nurse', [HomeController::class, 'hakeemnurse'])->name('hakeemnurse');
        Route::get('/appointmenthakeem_order_details/{id}', [OrderHakeemController::class, 'appointmenthakeem_order_details']);
        Route::get('editHakeemRegistration/{id}', [HomeController::class, 'editHakeemRegistration'])->name('editHakeemRegistration'); 
        Route::post('editHakeemRegistrationProcess', [HakeemController::class, 'editHakeemRegistrationProcess'])->name('editHakeemRegistrationProcess'); 
    });
});

//frontlabority
Route::prefix('frontlabority')->name('frontlabority.')->group(function () {
    Route::middleware(['guest:frontlabority', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'frontend.home.login')->name('login');
        Route::view('/login', 'frontend.home.login')->name('login');
        Route::post('/create', [HomeController::class, 'laboritycreate'])->name('laboritycreate');
        Route::post('/check', [HomeController::class, 'laboritycheck'])->name('laboritycheck');
    });

    Route::middleware(['auth:frontlabority', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard']);
        Route::view('/home', 'frontend.home.login')->name('login');
        Route::get('/add-new', [HomeController::class, 'laborityadd'])->name('laborityadd');
        Route::get('/profile', [HomeController::class, 'laborityprofile'])->name('laborityprofile');
        Route::get('/nurse', [HomeController::class, 'laboritynurse'])->name('laboritynurse');
        Route::get('/appointmentlabority_order_details/{id}', [OrderLaborityController::class, 'appointmentlabority_order_details']);
        Route::get('editLaborityRegistration/{id}', [HomeController::class, 'editLaborityRegistration'])->name('editLaborityRegistration'); 
        Route::post('editLaborityRegistrationProcess', [LaborityController::class, 'editLaborityRegistrationProcess'])->name('editLaborityRegistrationProcess'); 
    });
});

//frontpharmacy
Route::prefix('frontpharmacy')->name('frontpharmacy.')->group(function () {
    Route::middleware(['guest:frontpharmacy', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'frontend.home.login')->name('login');
        Route::view('/home', 'frontend.home.login')->name('login');
        Route::view('/login', 'frontend.home.login')->name('login');
        Route::post('/create', [HomeController::class, 'pharmacycreate'])->name('pharmacycreate');
        Route::post('/check', [HomeController::class, 'pharmacycheck'])->name('pharmacycheck');
    });

    Route::middleware(['auth:frontpharmacy', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard']);
        Route::view('/home', 'frontend.home.login')->name('login');
        Route::get('/add-new', [HomeController::class, 'pharmacyadd'])->name('pharmacyadd');
        Route::get('/profile', [HomeController::class, 'pharmacyprofile'])->name('pharmacyprofile');
        Route::get('/nurse', [HomeController::class, 'pharmacynurse'])->name('pharmacynurse');
        Route::get('/appointmentpharmacy_order_details/{id}', [OrderPharmacyController::class, 'appointmentpharmacy_order_details']);
        Route::get('editPharmacyRegistration/{id}', [HomeController::class, 'editPharmacyRegistration'])->name('editPharmacyRegistration'); 
        Route::post('editPharmacyRegistrationProcess', [PharmacyController::class, 'editPharmacyRegistrationProcess'])->name('editPharmacyRegistrationProcess'); 

            Route::prefix('COA')->group(function () {
                Route::view('/', 'frontend.coa.index');
                Route::view('create', 'frontend.coa.create');
                //Route::view('ledger', 'frontend.coa.ledger');
                Route::post('store', [COAController::class, 'store']);
                Route::post('editCOA', [COAController::class, 'editCOA']);
                Route::post('storeTA', [COAController::class, 'storeTA']);
                Route::post('editTA', [COAController::class, 'editTA']);
                Route::post('getCOAName', [COAController::class, 'getCOAName']);
                Route::post('getSelTA', [COAController::class, 'getSelTA']);
                
                Route::match(['get', 'post'], 'ledger', [COAController::class, 'getLedger']);
                Route::post('getLedgerPDF', [COAController::class, 'getLedgerPDF']);

                Route::post('storeJV', [COAController::class, 'storeJV']);
                Route::get('createGeneralEntery', [COAController::class, 'createGeneralEntery']);

                
            });

            Route::prefix('inventory')->group(function () {
                //Brand
                Route::get('brand', [InventoryController::class, 'brand']);
                Route::get('addBrand', [InventoryController::class, 'addBrand']);
                Route::get('editBrand/{id}', [InventoryController::class, 'editBrand']);
                Route::post('addEditBrandProcess', [InventoryController::class, 'addEditBrandProcess']);

                Route::get('category', [InventoryController::class, 'category']);
                Route::get('addCategory', [InventoryController::class, 'addCategory']);
                Route::get('editCategory/{id}', [InventoryController::class, 'editCategory']);
                Route::post('addEditCategoryProcess', [InventoryController::class, 'addEditCategoryProcess']);

                Route::get('product', [InventoryController::class, 'product']);
                Route::get('addProduct', [InventoryController::class, 'addProduct']);
                Route::get('editProduct/{id}', [InventoryController::class, 'editProduct']);
                Route::post('addEditProductProcess', [InventoryController::class, 'addEditProductProcess']);

                Route::get('makeOrder/{id}', [InventoryController::class, 'makeOrder']);

                Route::post('searchProduct', [InventoryController::class, 'searchProduct']);

                //getProductData
                Route::post('getProductData', [InventoryController::class, 'getProductData']);
                
            });
    });
});


//Admin
Route::prefix('admin')->name('admin.')->group(function () {
    //Route::view('/', 'dashboard.admin.login');
    Route::get('/', [AdminController::class, 'login']);

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        //Route::get('/login', [AdminController::class, 'login'])->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        //doctor
        Route::get('doctor', [DoctorController::class, 'index'])->name('doctor');
        Route::get('doctor/create', [DoctorController::class, 'create'])->name('doctorcreate');
        Route::post('doctor/store', [DoctorController::class, 'store'])->name('doctorstore');
        Route::post('doctor/update/{id}', [DoctorController::class, 'update'])->name('doctorupdate');
        Route::get('doctor/edit/{id}', [DoctorController::class, 'edit'])->name('doctoredit');
        Route::post('doctor/delete', [DoctorController::class, 'delete'])->name('doctordelete');
        Route::post('doctor/status', [DoctorController::class, 'doctorStatus'])->name('doctorstatus');
        Route::get('doctor/profile/{id}', [DoctorController::class, 'profile'])->name('doctorprofile');

        //hakeem
        Route::get('hakeem', [HakeemController::class, 'index'])->name('hakeem');
        Route::get('hakeem/create', [HakeemController::class, 'create'])->name('hakeemcreate');
        Route::post('hakeem/store', [HakeemController::class, 'store'])->name('hakeemstore');
        Route::post('hakeem/update/{id}', [HakeemController::class, 'update'])->name('hakeemupdate');
        Route::get('hakeem/edit/{id}', [HakeemController::class, 'edit'])->name('hakeemedit');
        Route::post('hakeem/delete', [HakeemController::class, 'delete'])->name('hakeemdelete');
        Route::post('hakeem/status', [HakeemController::class, 'hakeemStatus'])->name('hakeemstatus');
        Route::get('hakeem/profile/{id}', [HakeemController::class, 'profile'])->name('hakeemprofile');

        //labority
        Route::get('labority', [LaborityController::class, 'index'])->name('labority');
        Route::get('labority/create', [LaborityController::class, 'create'])->name('laboritycreate');
        Route::post('labority/store', [LaborityController::class, 'store'])->name('laboritystore');
        Route::post('labority/update/{id}', [LaborityController::class, 'update'])->name('laborityupdate');
        Route::get('labority/edit/{id}', [LaborityController::class, 'edit'])->name('laborityedit');
        Route::post('labority/delete', [LaborityController::class, 'delete'])->name('laboritydelete');
        Route::post('labority/status', [LaborityController::class, 'laborityStatus'])->name('laboritystatus');
        Route::get('labority/profile/{id}', [LaborityController::class, 'profile'])->name('laborityprofile');

        //pharmacy
        Route::get('pharmacy', [PharmacyController::class, 'index'])->name('pharmacy');
        Route::get('pharmacy/create', [PharmacyController::class, 'create'])->name('pharmacycreate');
        Route::post('pharmacy/store', [PharmacyController::class, 'store'])->name('pharmacystore');
        Route::post('pharmacy/update/{id}', [PharmacyController::class, 'update'])->name('pharmacyupdate');
        Route::get('pharmacy/edit/{id}', [PharmacyController::class, 'edit'])->name('pharmacyedit');
        Route::post('pharmacy/delete', [PharmacyController::class, 'delete'])->name('pharmacydelete');
        Route::post('pharmacy/status', [PharmacyController::class, 'pharmacyStatus'])->name('pharmacystatus');
        Route::get('pharmacy/profile/{id}', [PharmacyController::class, 'profile'])->name('pharmacyprofile');

        //Hospital
        Route::get('hospital', [HospitalController::class, 'index'])->name('hospital');
        Route::get('hospital/create', [HospitalController::class, 'create'])->name('hospitalcreate');
        Route::post('hospital/store', [HospitalController::class, 'store'])->name('hospitalstore');
        Route::post('hospital/update/{id}', [HospitalController::class, 'update'])->name('hospitalupdate');
        Route::get('hospital/edit/{id}', [HospitalController::class, 'edit'])->name('hospitaledit');
        Route::post('hospital/delete', [HospitalController::class, 'delete'])->name('hospitaldelete');

        //Department
        Route::get('department', [DepartmentsController::class, 'index'])->name('department');
        Route::get('department/create', [DepartmentsController::class, 'create'])->name('departmentcreate');
        Route::post('department/store', [DepartmentsController::class, 'store'])->name('departmentstore');
        Route::post('department/update/{id}', [DepartmentsController::class, 'update'])->name('departmentupdate');
        Route::get('department/edit/{id}', [DepartmentsController::class, 'edit'])->name('departmentedit');
        Route::post('department/delete', [DepartmentsController::class, 'delete'])->name('departmentdelete');
        Route::get('department/departmentview/{id}', [BolgsController::class, 'departmentview'])->name('departmentview');

          //hpservice
        Route::get('hpservice', [HpServiceController::class, 'index'])->name('hpservice');
        Route::get('hpservice/create', [HpServiceController::class, 'create'])->name('hpservicecreate');
        Route::post('hpservice/store', [HpServiceController::class, 'store'])->name('hpservicestore');
        Route::post('hpservice/update/{id}', [HpServiceController::class, 'update'])->name('hpserviceupdate');
        Route::get('hpservice/edit/{id}', [HpServiceController::class, 'edit'])->name('hpserviceedit');
        Route::post('hpservice/delete', [HpServiceController::class, 'delete'])->name('hpservicedelete');
        Route::get('hpservice/serviceview/{id}', [HpServiceController::class, 'hpserviceview'])->name('hpserviceview');

        //Specialty
        Route::get('specialty', [SpecialtyController::class, 'index'])->name('specialty');
        Route::get('specialty/create', [SpecialtyController::class, 'create'])->name('specialtycreate');
        Route::post('specialty/store', [SpecialtyController::class, 'store'])->name('specialtystore');
        Route::post('specialty/update/{id}', [SpecialtyController::class, 'update'])->name('specialtyupdate');
        Route::get('specialty/edit/{id}', [SpecialtyController::class, 'edit'])->name('specialtyedit');
        Route::post('specialty/delete', [SpecialtyController::class, 'delete'])->name('specialtydelete');

        //CourseForm
        Route::get('courseform', [CourseFormController::class, 'index'])->name('courseform');
        Route::get('courseform/create', [CourseFormController::class, 'create'])->name('courseformcreate');
        Route::post('courseform/store', [CourseFormController::class, 'store'])->name('courseformstore');
        Route::post('courseform/update/{id}', [CourseFormController::class, 'update'])->name('courseformupdate');
        Route::get('courseform/edit/{id}', [CourseFormController::class, 'edit'])->name('courseformedit');
        Route::post('courseform/delete', [CourseFormController::class, 'delete'])->name('courseformdelete');

        //DoctorType
        Route::get('doctortype', [DoctorTypeController::class, 'index'])->name('doctortype');
        Route::get('doctortype/create', [DoctorTypeController::class, 'create'])->name('doctortypecreate');
        Route::post('doctortype/store', [DoctorTypeController::class, 'store'])->name('doctortypestore');
        Route::post('doctortype/update/{id}', [DoctorTypeController::class, 'update'])->name('doctortypeupdate');
        Route::get('doctortype/edit/{id}', [DoctorTypeController::class, 'edit'])->name('doctortypeedit');
        Route::post('doctortype/delete', [DoctorTypeController::class, 'delete'])->name('doctortypedelete');

        //HakeemType
        Route::get('hakeemtype', [HakeemTypeController::class, 'index'])->name('hakeemtype');
        Route::get('hakeemtype/create', [HakeemTypeController::class, 'create'])->name('hakeemtypecreate');
        Route::post('hakeemtype/store', [HakeemTypeController::class, 'store'])->name('hakeemtypestore');
        Route::post('hakeemtype/update/{id}', [HakeemTypeController::class, 'update'])->name('hakeemtypeupdate');
        Route::get('hakeemtype/edit/{id}', [HakeemTypeController::class, 'edit'])->name('hakeemtypeedit');
        Route::post('hakeemtype/delete', [HakeemTypeController::class, 'delete'])->name('hakeemtypedelete');

        //LaborityType
        Route::get('laboritytype', [LaborityTypeController::class, 'index'])->name('laboritytype');
        Route::get('laboritytype/create', [LaborityTypeController::class, 'create'])->name('laboritytypecreate');
        Route::post('laboritytype/store', [LaborityTypeController::class, 'store'])->name('laboritytypestore');
        Route::post('laboritytype/update/{id}', [LaborityTypeController::class, 'update'])->name('laboritytypeupdate');
        Route::get('laboritytype/edit/{id}', [LaborityTypeController::class, 'edit'])->name('laboritytypeedit');
        Route::post('laboritytype/delete', [LaborityTypeController::class, 'delete'])->name('laboritytypedelete');

        //Patient
        Route::get('patient', [PatientController::class, 'index'])->name('patient');
        Route::get('patient/create', [PatientController::class, 'create'])->name('patientcreate');
        Route::post('patient/store', [PatientController::class, 'store'])->name('patientstore');
        Route::post('patient/update/{id}', [PatientController::class, 'update'])->name('patientupdate');
        Route::get('patient/edit/{id}', [PatientController::class, 'edit'])->name('patientedit');
        Route::post('patient/delete', [PatientController::class, 'delete'])->name('patientdelete');
        Route::post('patient/status', [PatientController::class, 'patientStatus'])->name('patientstatus');
        Route::get('patient/profile/{id}', [PatientController::class, 'profile'])->name('patientprofile');

        //Nurse
        Route::get('nurse', [NurseController::class, 'index'])->name('nurse');
        Route::get('nurse/create', [NurseController::class, 'create'])->name('nursecreate');
        Route::post('nurse/store', [NurseController::class, 'store'])->name('nursestore');
        Route::post('nurse/update/{id}', [NurseController::class, 'update'])->name('nurseupdate');
        Route::get('nurse/edit/{id}', [NurseController::class, 'edit'])->name('nurseedit');
        Route::post('nurse/delete', [NurseController::class, 'delete'])->name('nursedelete');

        //Lab
        Route::get('lab', [LabController::class, 'index'])->name('lab');
        Route::get('lab/create', [LabController::class, 'create'])->name('labcreate');
        Route::post('lab/store', [LabController::class, 'store'])->name('labstore');
        Route::post('lab/update/{id}', [LabController::class, 'update'])->name('labupdate');
        Route::get('lab/edit/{id}', [LabController::class, 'edit'])->name('labedit');
        Route::post('lab/delete', [LabController::class, 'delete'])->name('labdelete');

        //Dawakhanahakeem
        Route::get('dawakhanahakeem', [DawakhanahakeemController::class, 'index'])->name('dawakhanahakeem');
        Route::get('dawakhanahakeem/create', [DawakhanahakeemController::class, 'create'])->name('dawakhanahakeemcreate');
        Route::post('dawakhanahakeem/store', [DawakhanahakeemController::class, 'store'])->name('dawakhanahakeemstore');
        Route::post('dawakhanahakeem/update/{id}', [DawakhanahakeemController::class, 'update'])->name('dawakhanahakeemupdate');
        Route::get('dawakhanahakeem/edit/{id}', [DawakhanahakeemController::class, 'edit'])->name('dawakhanahakeemedit');
        Route::post('dawakhanahakeem/delete', [DawakhanahakeemController::class, 'delete'])->name('dawakhanahakeemdelete');

        //Appointment
        Route::get('appointment', [AppointmentController::class, 'index'])->name('appointment');
        Route::get('appointment/create', [AppointmentController::class, 'create'])->name('appointmentcreate');
        Route::post('appointment/store', [AppointmentController::class, 'store'])->name('appointmentstore');
        Route::post('appointment/update/{id}', [AppointmentController::class, 'update'])->name('appointmentupdate');
        Route::get('appointment/edit/{id}', [AppointmentController::class, 'edit'])->name('appointmentedit');
        Route::post('appointment/delete', [AppointmentController::class, 'delete'])->name('appointmentdelete');
        Route::get('appointment/view/{id}', [AppointmentController::class, 'appointmentview'])->name('appointmentview');

        //Header
        Route::get('header', [HeaderController::class, 'index'])->name('header');
        Route::get('header/create', [HeaderController::class, 'create'])->name('headercreate');
        Route::post('header/store', [HeaderController::class, 'store'])->name('headerstore');
        Route::post('header/update/{id}', [HeaderController::class, 'update'])->name('headerupdate');
        Route::get('header/edit/{id}', [HeaderController::class, 'edit'])->name('headeredit');
        Route::post('header/delete', [HeaderController::class, 'delete'])->name('headerdelete');
        //Sub Header
        Route::get('subheader/{id}', [HeaderSubController::class, 'index'])->name('subheader');
        Route::get('subheader/create/{id}', [HeaderSubController::class, 'create'])->name('subheadercreate');
        Route::post('subheader/store/{id}', [HeaderSubController::class, 'store'])->name('subheaderstore');
        Route::post('subheader/update/{id}', [HeaderSubController::class, 'update'])->name('subheaderupdate');
        Route::get('subheader/edit/{id}', [HeaderSubController::class, 'edit'])->name('subheaderedit');
        Route::post('subheader/delete', [HeaderSubController::class, 'delete'])->name('subheaderdelete');


        //Section1
        Route::get('section1', [Section1Controller::class, 'index'])->name('section1');
        Route::post('section1/update/{id}', [Section1Controller::class, 'update'])->name('section1update');
        Route::get('section1/edit/{id}', [Section1Controller::class, 'edit'])->name('section1edit');

        //Section2
        Route::get('section2', [Section2Controller::class, 'index'])->name('section2');
        Route::post('section2/update/{id}', [Section2Controller::class, 'update'])->name('section2update');
        Route::get('section2/edit/{id}', [Section2Controller::class, 'edit'])->name('section2edit');

        //Section3
        Route::get('section3', [Section3Controller::class, 'index'])->name('section3');
        Route::get('section3/create', [Section3Controller::class, 'create'])->name('section3create');
        Route::post('section3/store', [Section3Controller::class, 'store'])->name('section3store');
        Route::post('section3/update/{id}', [Section3Controller::class, 'update'])->name('section3update');
        Route::get('section3/edit/{id}', [Section3Controller::class, 'edit'])->name('section3edit');
        Route::post('section3/delete', [Section3Controller::class, 'delete'])->name('section3delete');

        //Blogs
        Route::get('blog', [BolgsController::class, 'index'])->name('blog');
        Route::get('blog/create', [BolgsController::class, 'create'])->name('blogcreate');
        Route::post('blog/store', [BolgsController::class, 'store'])->name('blogstore');
        Route::post('blog/update/{id}', [BolgsController::class, 'update'])->name('blogupdate');
        Route::get('blog/edit/{id}', [BolgsController::class, 'edit'])->name('blogedit');
        Route::post('blog/delete', [BolgsController::class, 'delete'])->name('blogdelete');
        Route::get('blog/blogview/{id}', [BolgsController::class, 'blogview'])->name('blogview');

        //hpmainslider
        Route::get('hpmainslider', [HpMainSliderController::class, 'index'])->name('hpmainslider');
        Route::get('hpmainslider/create', [HpMainSliderController::class, 'create'])->name('hpmainslidercreate');
        Route::post('hpmainslider/store', [HpMainSliderController::class, 'store'])->name('hpmainsliderstore');
        Route::post('hpmainslider/update/{id}', [HpMainSliderController::class, 'update'])->name('hpmainsliderupdate');
        Route::get('hpmainslider/edit/{id}', [HpMainSliderController::class, 'edit'])->name('hpmainslideredit');
        Route::post('hpmainslider/delete', [HpMainSliderController::class, 'delete'])->name('hpmainsliderdelete');
        Route::get('hpmainslider/sliderview/{id}', [HpMainSliderController::class, 'hpmainsliderview'])->name('hpmainsliderview');
        Route::post('hpmainslider/delimg', [HpMainSliderController::class, 'delimg'])->name('delimg');

        Route::get('navbar', [NavbarController::class, 'index'])->name('navbar');
        Route::get('navbar/create', [NavbarController::class, 'create'])->name('navbarcreate');
        Route::post('navbar/store', [NavbarController::class, 'store'])->name('navbarstore');
        Route::post('navbar/update/{id}', [NavbarController::class, 'update'])->name('navbarupdate');
        Route::get('navbar/edit/{id}', [NavbarController::class, 'edit'])->name('navbaredit');
        Route::post('navbar/delete', [NavbarController::class, 'delete'])->name('navbardelete');
        Route::get('navbar/navbarview/{id}', [NavbarController::class, 'navbarview'])->name('navbarview');

        Route::get('faq', [FaqController::class, 'index'])->name('faq');
        Route::get('faq/create', [FaqController::class, 'create'])->name('faqcreate');
        Route::post('faq/store', [FaqController::class, 'store'])->name('faqstore');
        Route::post('faq/update/{id}', [FaqController::class, 'update'])->name('faqupdate');
        Route::get('faq/edit/{id}', [FaqController::class, 'edit'])->name('faqedit');
        Route::post('faq/delete', [FaqController::class, 'delete'])->name('faqdelete');
        Route::get('faq/faqview/{id}', [FaqController::class, 'faqview'])->name('faqview');

        //news    
        Route::get('news', [NewsController::class, 'index'])->name('news');
        Route::get('news/create', [NewsController::class, 'create'])->name('newscreate');
        Route::post('news/store', [NewsController::class, 'store'])->name('newsstore');
        Route::post('news/update/{id}', [NewsController::class, 'update'])->name('newsupdate');
        Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('newsedit');
        Route::post('news/delete', [NewsController::class, 'delete'])->name('newsdelete');
        Route::get('news/newsview/{id}', [NewsController::class, 'newsview'])->name('newsview');

        //testimonial
        Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial');
        Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('testimonialcreate');
        Route::post('testimonial/store', [TestimonialController::class, 'store'])->name('testimonialstore');
        Route::post('testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonialupdate');
        Route::get('testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonialedit');
        Route::post('testimonial/delete', [TestimonialController::class, 'delete'])->name('testimonialdelete');
        Route::get('testimonial/testimonial/{id}', [TestimonialController::class, 'testimonialview'])->name('testimonialview');

        //hpmessage
        Route::get('hpmessage', [HpmessageController::class, 'index'])->name('hpmessage');
        Route::get('hpmessage/create', [HpmessageController::class, 'create'])->name('hpmessagecreate');
        Route::post('hpmessage/store', [HpmessageController::class, 'store'])->name('hpmessagestore');
        Route::post('hpmessage/update/{id}', [HpmessageController::class, 'update'])->name('hpmessageupdate');
        Route::get('hpmessage/edit/{id}', [HpmessageController::class, 'edit'])->name('hpmessageedit');
        Route::post('hpmessage/delete', [HpmessageController::class, 'delete'])->name('hpmessagedelete');
        Route::get('hpmessage/messageview/{id}', [HpmessageController::class, 'hpmessageview'])->name('hpmessageview');

        //hpgallery
        Route::get('hpgallery', [HpgalleryController::class, 'index'])->name('gallery');
        Route::get('hpgallery/create', [HpgalleryController::class, 'create'])->name('hpgallerycreate');
        Route::post('hpgallery/store', [HpgalleryController::class, 'store'])->name('hpgallerystore');
        Route::post('hpgallery/update/{id}', [HpgalleryController::class, 'update'])->name('hpgalleryupdate');
        Route::get('hpgallery/edit/{id}', [HpgalleryController::class, 'edit'])->name('hpgalleryedit');
        Route::post('hpgallery/delete', [HpgalleryController::class, 'delete'])->name('hpgallerydelete');
        Route::get('hpgallery/sliderview/{id}', [HpgalleryController::class, 'hpgalleryview'])->name('hpgalleryview');

        //Footer
        Route::get('footer/edit/logo/{id}', [FooterController::class, 'editlogo'])->name('footereditlogo');
        Route::get('footer/edit/description/{id}', [FooterController::class, 'editdescription'])->name('footereditdescription');
        Route::post('footer/updatedescription/{id}', [FooterController::class, 'updatedescription'])->name('footerupdatedescription');
        Route::post('footer/updatelogo/{id}', [FooterController::class, 'updatelogo'])->name('footerupdatelogo');
        Route::get('footer', [FooterController::class, 'index'])->name('footer');


        //QuickLink
        Route::get('quicklink', [QuickLinkController::class, 'index'])->name('quicklink');
        Route::get('quicklink/create', [QuickLinkController::class, 'create'])->name('quicklinkcreate');
        Route::post('quicklink/store', [QuickLinkController::class, 'store'])->name('quicklinkstore');
        Route::post('quicklink/update/{id}', [QuickLinkController::class, 'update'])->name('quicklinkupdate');
        Route::get('quicklink/edit/{id}', [QuickLinkController::class, 'edit'])->name('quicklinkedit');
        Route::post('quicklink/delete', [QuickLinkController::class, 'delete'])->name('quicklinkdelete');

        //SocialMedia
        Route::get('socialmedia', [SocialMediaController::class, 'index'])->name('socialmedia');
        Route::get('socialmedia/create', [SocialMediaController::class, 'create'])->name('socialmediacreate');
        Route::post('socialmedia/store', [SocialMediaController::class, 'store'])->name('socialmediastore');
        Route::post('socialmedia/update/{id}', [SocialMediaController::class, 'update'])->name('socialmediaupdate');
        Route::get('socialmedia/edit/{id}', [SocialMediaController::class, 'edit'])->name('socialmediaedit');
        Route::post('socialmedia/delete', [SocialMediaController::class, 'delete'])->name('socialmediadelete');


        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});




//Doctor
Route::prefix('doctor')->name('doctor.')->group(function () {

    Route::middleware(['guest:doctor', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.doctor.login')->name('login');
        Route::view('/register', 'dashboard.doctor.register')->name('register');
        Route::post('/create', [DoctorController::class, 'create'])->name('create');
        Route::post('/check', [DoctorController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:doctor', 'PreventBackHistory'])->group(function () {
        Route::view('/dashboard', 'dashboard.doctor.dashboard')->name('dashboard');
        Route::post('/logout', [DoctorController::class, 'logout'])->name('logout');
        Route::get('/profile', [DoctorController::class, 'Doctorprofile'])->name('profile');
        Route::post('doctor/update/{id}', [DoctorController::class, 'update'])->name('doctorupdate');
        Route::get('doctor/edit/{id}', [DoctorController::class, 'edit'])->name('doctoredit');

        Route::get('/appointment', [DoctorController::class, 'appointment'])->name('appointment');
    });
});

Route::get('doctor/edits/{id}', [DoctorController::class, 'edit'])->middleware('auth:doctor')->name('edits');






//Patient
Route::prefix('patient')->name('patient.')->group(function () {

    Route::middleware(['guest:patient', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.patient.login')->name('login');
        Route::view('/register', 'dashboard.patient.register')->name('register');
        Route::post('/create', [PatientController::class, 'create'])->name('create');
        Route::post('/check', [PatientController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:patient', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.patient.home')->name('home');
        Route::post('/logout', [PatientController::class, 'logout'])->name('logout');
        Route::get('/add-new', [PatientController::class, 'add'])->name('add');
    });
});

//Hospital
Route::prefix('hospital')->name('hospital.')->group(function () {
    Route::get('/logout2', [HospitalLoginController::class, 'logout2']);

    Route::middleware(['guest:hospital', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.hospital.login')->name('login');
        Route::view('/register', 'dashboard.hospital.register')->name('register');
        Route::post('/create', [HospitalLoginController::class, 'create'])->name('create');
        Route::post('/check', [HospitalLoginController::class, 'check'])->name('check');
        
    });

    Route::middleware(['auth:hospital', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [HospitalLoginController::class, 'index']);
       // Route::view('/dashboard', 'dashboard.hospital.dashboard')->name('dashboard');
        Route::view('/home', 'dashboard.hospital.home')->name('home');
        Route::post('/logout', [HospitalController::class, 'logout'])->name('logout');
        Route::get('/add-new', [HospitalController::class, 'add'])->name('add');

        Route::get('/profile', [HospitalController::class, 'profile'])->name('profile');
        Route::get('/nurse', [HospitalController::class, 'nurse'])->name('nurse');
    });
});




//Lab
Route::prefix('lab')->name('lab.')->group(function () {

    Route::middleware(['guest:lab', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.lab.login')->name('login');
        Route::view('/register', 'dashboard.lab.register')->name('register');
        Route::post('/create', [LabLoginController::class, 'create'])->name('create');
        Route::post('/check', [LabLoginController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:lab', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.lab.home')->name('home');
        Route::post('/logout', [LabController::class, 'logout'])->name('logout');
        Route::get('/add-new', [LabController::class, 'add'])->name('add');
    });
});


//Doctor
// Route::get('doctor', [DoctorController::class, 'index'])->name('');
// Route::get('doctor/create', [DoctorController::class, 'create'])->name('');
// Route::post('doctor/store', [DoctorController::class, 'store'])->name('');
// Route::post('doctor/update/{id}', [DoctorController::class, 'update'])->name('');
// Route::get('doctor/edit/{id}', [DoctorController::class, 'edit'])->name('');
// Route::post('doctor/delete', [DoctorController::class, 'delete'])->name('');
// Route::post('doctor/status', [DoctorController::class, 'doctorStatus'])->name('');
// Route::get('doctor/profile/{id}', [DoctorController::class, 'profile'])->name('');

// //Hospital
// Route::get('hospital', [HospitalController::class, 'index'])->name('');
// Route::get('hospital/create', [HospitalController::class, 'create'])->name('');
// Route::post('hospital/store', [HospitalController::class, 'store'])->name('');
// Route::post('hospital/update/{id}', [HospitalController::class, 'update'])->name('');
// Route::get('hospital/edit/{id}', [HospitalController::class, 'edit'])->name('');
// Route::post('hospital/delete', [HospitalController::class, 'delete'])->name('');

// //Specialty
// Route::get('specialty', [SpecialtyController::class, 'index'])->name('');
// Route::get('specialty/create', [SpecialtyController::class, 'create'])->name('');
// Route::post('specialty/store', [SpecialtyController::class, 'store'])->name('');
// Route::post('specialty/update/{id}', [SpecialtyController::class, 'update'])->name('');
// Route::get('specialty/edit/{id}', [SpecialtyController::class, 'edit'])->name('');
// Route::post('specialty/delete', [SpecialtyController::class, 'delete'])->name('');

// //CourseForm
// Route::get('courseform', [CourseFormController::class, 'index'])->name('');
// Route::get('courseform/create', [CourseFormController::class, 'create'])->name('');
// Route::post('courseform/store', [CourseFormController::class, 'store'])->name('');
// Route::post('courseform/update/{id}', [CourseFormController::class, 'update'])->name('');
// Route::get('courseform/edit/{id}', [CourseFormController::class, 'edit'])->name('');
// Route::post('courseform/delete', [CourseFormController::class, 'delete'])->name('');

// //DoctorType
// Route::get('doctortype', [DoctorTypeController::class, 'index'])->name('');
// Route::get('doctortype/create', [DoctorTypeController::class, 'create'])->name('');
// Route::post('doctortype/store', [DoctorTypeController::class, 'store'])->name('');
// Route::post('doctortype/update/{id}', [DoctorTypeController::class, 'update'])->name('');
// Route::get('doctortype/edit/{id}', [DoctorTypeController::class, 'edit'])->name('');
// Route::post('doctortype/delete', [DoctorTypeController::class, 'delete'])->name('');

// //Patient
// Route::get('patient', [PatientController::class, 'index'])->name('');
// Route::get('patient/create', [PatientController::class, 'create'])->name('');
// Route::post('patient/store', [PatientController::class, 'store'])->name('');
// Route::post('patient/update/{id}', [PatientController::class, 'update'])->name('');
// Route::get('patient/edit/{id}', [PatientController::class, 'edit'])->name('');
// Route::post('patient/delete', [PatientController::class, 'delete'])->name('');
// Route::post('patient/status', [PatientController::class, 'patientStatus'])->name('');
// Route::get('patient/profile/{id}', [PatientController::class, 'profile'])->name('');

// //Nurse
// Route::get('nurse', [NurseController::class, 'index'])->name('');
// Route::get('nurse/create', [NurseController::class, 'create'])->name('');
// Route::post('nurse/store', [NurseController::class, 'store'])->name('');
// Route::post('nurse/update/{id}', [NurseController::class, 'update'])->name('');
// Route::get('nurse/edit/{id}', [NurseController::class, 'edit'])->name('');
// Route::post('nurse/delete', [NurseController::class, 'delete'])->name('');

// //Lab
// Route::get('lab', [LabController::class, 'index'])->name('');
// Route::get('lab/create', [LabController::class, 'create'])->name('');
// Route::post('lab/store', [LabController::class, 'store'])->name('');
// Route::post('lab/update/{id}', [LabController::class, 'update'])->name('');
// Route::get('lab/edit/{id}', [LabController::class, 'edit'])->name('');
// Route::post('lab/delete', [LabController::class, 'delete'])->name('');

// //Dawakhana
// Route::get('dawakhana', [DawakhanaController::class, 'index'])->name('');
// Route::get('dawakhana/create', [DawakhanaController::class, 'create'])->name('');
// Route::post('dawakhana/store', [DawakhanaController::class, 'store'])->name('');
// Route::post('dawakhana/update/{id}', [DawakhanaController::class, 'update'])->name('');
// Route::get('dawakhana/edit/{id}', [DawakhanaController::class, 'edit'])->name('');
// Route::post('dawakhana/delete', [DawakhanaController::class, 'delete'])->name('');

// //Appointment
// Route::get('appointment', [AppointmentController::class, 'index'])->name('');
// Route::get('appointment/create', [AppointmentController::class, 'create'])->name('');
// Route::post('appointment/store', [AppointmentController::class, 'store'])->name('');
// Route::post('appointment/update/{id}', [AppointmentController::class, 'update'])->name('');
// Route::get('appointment/edit/{id}', [AppointmentController::class, 'edit'])->name('');
// Route::post('appointment/delete', [AppointmentController::class, 'delete'])->name('');


// Route::get('/asd', function () {
//     return view('appointments.fullcalender');
// });

Route::post('fullcalenderAjax', [AppointmentController::class, 'ajax']);









//Dawakhana
Route::prefix('dawakhana')->name('dawakhana.')->group(function () {

    Route::middleware(['guest:dawakhana', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.dawakhana.login')->name('login');
        Route::view('/register', 'dashboard.dawakhana.register')->name('register');
        Route::post('/create', [DawakhanaLoginController::class, 'create'])->name('create');
        Route::post('/check', [DawakhanaLoginController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:dawakhana', 'PreventBackHistory'])->group(function () {
        Route::view('/dashboard', 'dashboard.dawakhana.dashboard')->name('dashboard');
        Route::post('/logout', [DawakhanaLoginController::class, 'logout'])->name('logout');
        Route::get('/profile', [DawakhanaLoginController::class, 'Dawakhanaprofile'])->name('profile');
        Route::get('/medicines', [DawakhanaLoginController::class, 'medicines'])->name('medicines');
    });
});

Route::get('dawakhanaProfile/edit/{id}', [DawakhanaLoginController::class, 'profileEdit'])->middleware('auth:dawakhana')->name('edit');
Route::post('dawakhanaProfile/update/{id}', [DawakhanaLoginController::class, 'update'])->middleware('auth:dawakhana')->name('update');



// use App\Http\Controllers\BuildingController;
// use App\Http\Controllers\VillasController;
// use App\Http\Controllers\HousesController;
// use App\Http\Controllers\PlotsController;
// use App\Http\Controllers\ShopsController;

// //BuildingController
// Route::get('building', [BuildingController::class, 'index'])->name('building');
// Route::get('building/create', [BuildingController::class, 'create'])->name('buildingcreate');
// Route::post('building/store', [BuildingController::class, 'store'])->name('buildingstore');
// Route::post('building/update/{id}', [BuildingController::class, 'update'])->name('buildingupdate');
// Route::get('building/edit/{id}', [BuildingController::class, 'edit'])->name('buildingedit');
// Route::post('building/delete', [BuildingController::class, 'delete'])->name('buildingdelete');

// //VillasController
// Route::get('villas', [VillasController::class, 'index'])->name('villas');
// Route::get('villas/create', [VillasController::class, 'create'])->name('villascreate');
// Route::post('villas/store', [VillasController::class, 'store'])->name('villasstore');
// Route::post('villas/update/{id}', [VillasController::class, 'update'])->name('villasupdate');
// Route::get('villas/edit/{id}', [VillasController::class, 'edit'])->name('villasedit');
// Route::post('villas/delete', [VillasController::class, 'delete'])->name('villasdelete');

// //HousesController
// Route::get('houses', [HousesController::class, 'index'])->name('houses');
// Route::get('houses/create', [HousesController::class, 'create'])->name('housescreate');
// Route::post('houses/store', [HousesController::class, 'store'])->name('housesstore');
// Route::post('houses/update/{id}', [HousesController::class, 'update'])->name('housesupdate');
// Route::get('houses/edit/{id}', [HousesController::class, 'edit'])->name('housesedit');
// Route::post('houses/delete', [HousesController::class, 'delete'])->name('housesdelete');

// //PlotsController
// Route::get('plots', [PlotsController::class, 'index'])->name('plots');
// Route::get('plots/create', [PlotsController::class, 'create'])->name('plotscreate');
// Route::post('plots/store', [PlotsController::class, 'store'])->name('plotsstore');
// Route::post('plots/update/{id}', [PlotsController::class, 'update'])->name('plotsupdate');
// Route::get('plots/edit/{id}', [PlotsController::class, 'edit'])->name('plotsedit');
// Route::post('plots/delete', [PlotsController::class, 'delete'])->name('plotsdelete');

// //ShopsController
// Route::get('shops', [ShopsController::class, 'index'])->name('shops');
// Route::get('shops/create', [ShopsController::class, 'create'])->name('shopscreate');
// Route::post('shops/store', [ShopsController::class, 'store'])->name('shopsstore');
// Route::post('shops/update/{id}', [ShopsController::class, 'update'])->name('shopsupdate');
// Route::get('shops/edit/{id}', [ShopsController::class, 'edit'])->name('shopsedit');
// Route::post('shops/delete', [ShopsController::class, 'delete'])->name('shopsdelete');


use App\Http\Controllers\DemoController;

//DemoController
Route::get('Demo', [DemoController::class, 'index'])->name('Demo');
Route::get('Demo/create', [DemoController::class, 'create'])->name('Democreate');
Route::post('Demo/store', [DemoController::class, 'store'])->name('Demostore');
Route::post('Demo/update/{id}', [DemoController::class, 'update'])->name('Demoupdate');
Route::get('Demo/edit/{id}', [DemoController::class, 'edit'])->name('Demoedit');
Route::post('Demo/delete', [DemoController::class, 'delete'])->name('Demodelete');
Route::post('Demo/status', [DemoController::class, 'DemoStatus'])->name('Demostatus');
Route::get('Demo/profile/{id}', [DemoController::class, 'profile'])->name('Demoprofile');