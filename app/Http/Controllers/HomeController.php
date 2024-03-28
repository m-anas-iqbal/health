<?php
namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Labority;
use App\Models\LaborityType;
use App\Models\Navbar;
use App\Models\Departments;
use App\Models\Doctor;
use App\Models\DoctorType;
use App\Models\Hospital;
use App\Models\Specialty;
use App\Models\CourseForm;
use App\Models\Hakeem;
use App\Models\HakeemType;
use App\Models\Hpservices;
use App\Models\Hpmessage;
use App\Models\News;
use App\Models\HpMainSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use Auth;

class HomeController extends Controller
{

    public function index()
    {
        $sliderExist = HpMainSlider::where('show_on_hp', '1')->get();
        $slider = false;
        if($sliderExist) $slider = $sliderExist;
        return view('frontend.home.index',['slider'=>$slider]);
    }

    public function signin(){
        //echo 'login';
        return view('frontend.home.login');
    }


    public function search(Request $request){
        $s_key = $request->input('s_key'); 

        //get data from doctors table
        $doctors = DB::table('doctors')->where('doctor_fullname', 'like', '%'.$s_key.'%')->get();
        $doctors = DB::table('doctors')->where(DB::raw('lower(doctor_fullname)'), 'like', '%'.strtolower($s_key).'%')->get();

        //get data from hospitals table
        //$hospitals = DB::table('hospitals')->where('hospital_name', 'like', '%'.$s_key.'%')->get();
        $hospitals = DB::table('hospitals')->where(DB::raw('lower(hospital_name)'), 'like', '%'.strtolower($s_key).'%')->get();

        //->where(DB::raw('lower(name)'), strtolower("Hardik"))
        //get data from hakeems table
        //$hakeems = DB::table('hakeems')->where('hakeem_fullname', 'like', '%'.$s_key.'%')->get();
        $hakeems = DB::table('hakeems')->where(DB::raw('lower(hakeem_fullname)'), 'like', '%'.strtolower($s_key).'%')->get();

        $output = array();
        if($doctors->count() > 0 || $hospitals->count() > 0 || $hakeems->count() > 0){

            if($doctors->count() > 0)
            {
                foreach($doctors as $row)
                {
                    $temp_array = array();
                    $temp_array['value'] = 'DOCTOR >>'.$row->doctor_fullname;
                    //$temp_array['label'] = '<img src="images/'.$row['image'].'" width="70" />&nbsp;&nbsp;&nbsp;'.$row['student_name'].'';
                    $temp_array['label'] = 'DOCTOR >>'.$row->doctor_fullname;
                    $output[] = $temp_array;
                    }
            }


            if($hospitals->count() > 0)
            {
                foreach($hospitals as $row)
                {
                    $temp_array = array();
                    $temp_array['value'] = 'HOSPITAL >>'.$row->hospital_name;
                    //$temp_array['label'] = '<img src="images/'.$row['image'].'" width="70" />&nbsp;&nbsp;&nbsp;'.$row['student_name'].'';
                    $temp_array['label'] = 'HOSPITAL >>'.$row->hospital_name;
                    $output[] = $temp_array;
                }
            }

            if($hakeems->count() > 0)
            {
                foreach($hakeems as $row)
                {
                    $temp_array = array();
                    $temp_array['value'] = 'HAKEEM >>'.$row->hakeem_fullname;
                    //$temp_array['label'] = '<img src="images/'.$row['image'].'" width="70" />&nbsp;&nbsp;&nbsp;'.$row['student_name'].'';
                    $temp_array['label'] = 'HAKEEM >>'.$row->hakeem_fullname;
                    $output[] = $temp_array;
                }
            }
        }                
        else
        {
         $output['value'] = '';
         $output['label'] = 'No Record Found =>';
         //$output['label'] = 'No Record Found =>'.$doctors->count().' - '.$hospitals->count().' - '.$hakeems->count();
        }
       
        echo json_encode($output);
        //echo json_encode($doctors);
    }

    public function searchResult(Request $request){
        $s_key = $request->input('s');

        if (str_contains($s_key, '>>')) { 
            $s_key_arr = explode('>>', $s_key);
            $s_key = $s_key_arr[1];
        }

        
        //echo $s_key;die;

        //get data from doctors table
        $doctors = DB::table('doctors')->where('doctor_fullname', 'like', '%'.$s_key.'%')->get();

        //get data from hospitals table
        $hospitals = DB::table('hospitals')->where('hospital_name', 'like', '%'.$s_key.'%')->get();

        //get data from hakeems table
        $hakeems = DB::table('hakeems')->where('hakeem_fullname', 'like', '%'.$s_key.'%')->get();

        return view('frontend.search.index', ['doctors'=>$doctors, 'hospitals'=>$hospitals, 'hakeems'=>$hakeems]);
    }

    //helpDesk    
    public function helpDesk(){
        return view('frontend.pages.helpdesk');
    }

    //emergencyServices
    public function emergencyServices(){
        return view('frontend.pages.emergencyservices');
    }

    //Appointment
    public function appointment(){
        $doctors = Doctor::all();
        $departments = Departments::all();
        return view('frontend.pages.appointment', ['doctors'=>$doctors, 'departments'=>$departments]);
    }



    //about
    public function about(){
        return view('frontend.pages.about');
    }

    //terms
    public function terms(){
        return view('frontend.pages.terms');
    }

    //faq
    public function faq(){
        return view('frontend.pages.faq');
    }

    //services
    public function services(){
        return view('frontend.pages.services');
    }

    //contact
    public function contact(){
        return view('frontend.pages.contact');
    }

    //hakeemonline
    public function hakeemonline(){
        $hakeems = Hakeem::all();
        $departments = Departments::all();
        return view('frontend.pages.hakeemonline', ['hakeems'=>$hakeems, 'departments'=>$departments]);
        //return view('frontend.pages.hakeemonline');
    }

    //tibbenabvi
    public function tibbenabvi(){
        return view('frontend.pages.tibbenabvi');
    }

    //labs
    public function labs(){
        return view('frontend.pages.labs');
    }

    //laboratory
    public function laboratory($slug){
        $laboritys = Labority::all();
        $departments = Departments::all();
        $laboratoryExist =  labority::where('labority_slug', $slug)->get();
        if($laboratoryExist){
            $laboratory = $laboratoryExist->first();
        }else{
            $laboratory = false;
        }
        return view('frontend.pages.laboratory', ['laboritys'=>$laboritys, 'departments'=>$departments,'laboratory'=>$laboratory]);
        //return view('frontend.pages.laboratory', ['laboratory'=>$laboratory]);
    }

    //Pharmacy
    public function pharmacy($slug){
        $pharmacys = Pharmacy::all();
        $pharmacyExist =  Pharmacy::where('pharmacy_slug', $slug)->get();
        if($pharmacyExist){
            $pharmacy = $pharmacyExist->first();
        }else{
            $pharmacy = false;
        }
        //echo '<pre>';
        //print_r($pharmacys);
        //die;
        return view('frontend.pages.pharmacy', ['pharmacys'=>$pharmacys, 'departments'=>[],'pharmacy'=>$pharmacy]);
        //return view('frontend.pages.laboratory', ['laboratory'=>$laboratory]);
    }

    //pharmacy
    public function pharmacy9(){
        return view('frontend.pages.pharmacy');
    }

    //doctor
    public function doctor($id){
        $doctorExist = Doctor::where('id',$id)->get();
        if($doctorExist){
               $doctor = $doctorExist->first(); 
               $dc_timeExist = DB::table('doctors_timming')->where('doctor_id',$id)->orderBy('day')->get();
               if($dc_timeExist){
                    $doctor_timmings = $dc_timeExist;
               }else{
                    $doctor_timmings = false;
               }
        }else{
                $doctor = false;
                $doctor_timmings = false;
        }
        return view('frontend.pages.doctor',['doctor'=>$doctor, 'doctor_timmings'=>$doctor_timmings]);
    }

    //dashboard
    public function dashboard(){
        //echo '<pre>';
        //print_r(Auth::guard('frontpatient')->user());
        //die;
       if (Auth::guard('frontpatient')->user()) {
            return view('frontend.pages.dashboard');    
        }
        if (Auth::guard('frontdoctor')->user()) {
            return view('frontend.pages.dashboard_doctor');    
        }
        if (Auth::guard('fronthakeem')->user()) {
            return view('frontend.pages.dashboard_hakeem');    
        }
        if (Auth::guard('frontlabority')->user()) {
            return view('frontend.pages.dashboard_labority');    
        }
        if (Auth::guard('frontpharmacy')->user()) {
            return view('frontend.pages.dashboard_pharmacy');    
        }
    }

    //department
    public function department(){
        return view('frontend.pages.department');
    }

    public function viewhpmessage($slug)
    {
        $hpmessages=Hpmessage::all();
        $data=array();
        foreach($hpmessages as $hpmessage)
        {
            for($i=1;$i<=3;$i++)
            {
                if($hpmessage['slug'.$i]==$slug)
                {
                    $data[]=['image'=>$hpmessage['image'.$i],'heading'=>$hpmessage['heading'.$i], 'description'=>$hpmessage['description'.$i],'main_heading'=>$hpmessage['main_heading'],'main_description'=>$hpmessage['description']];
                }
            }
        }
        return view('frontend.pages.hpmessagefront',['hpmessages'=>$data[0]]);
    }

    //public function viewhpservice($slug)
    //{
        //return view('frontend.pages.hpservicefront');
    //}
    public function viewhpservice($slug)
    {  
        $hpservices=Hpservices::all();
        $data=array();
        foreach($hpservices as $hpservice)
        {
            for($i=1;$i<=6;$i++)
            {
                if($hpservice['slug'.$i]==$slug)
                {
                    $data[]=['icon'=>$hpservice['icon'.$i],'heading'=>$hpservice['heading'.$i], 'description'=>$hpservice['description'.$i]];
                }
            }
        }
        return view('frontend.pages.hpservicefront',['hpservices'=>$data[0]]);
    }

    //viewnews
    public function viewnews($slug)
    {
        $news = News::where('slug', $slug)->get();
        return view('frontend.pages.hpnewsfront', ['news'=>$news]);
    }

    //create
    public function create(){
        echo 'create';
    }

    //check
    public function check(Request $request)
    {
        //echo '<pre>';
        //print_r($request->all());
        //die;
          //Validate Inputs
          $request->validate([
            'doctor_phone'=>'required|exists:doctors,doctor_phone',
            'password'=>'required|min:2|max:30'
         ],[
             'doctor_phone.exists'=>'This Doctor Phone Number is not exists.'
         ]);

         
 
        $creds = $request->only('doctor_phone','password');
        //echo '<pre>';
        //print_r($creds);
        //die;
        /*
        Array
        (
            [doctor_phone] => 03332072279
            [password] => 123
        )
        */
        $creds['doctor_status'] = 'Active';
        
        if( Auth::guard('frontdoctor')->attempt($creds) ){
            //echo 'pass'; die;
            return redirect('frontdoctor/dashboard');
         }else{
             //echo 'fail';die;
             return redirect('frontdoctor')->with('success', 'Invallid credentials');;
         }
    }

    //patientcreate
    public function patientcreate(){
        echo 'patientcreate';
    }
    public function patientcheck9(Request $request){
            echo 'patientcheck';
    }
    
    //patientcheck
    public function patientcheck(Request $request)
    { 
        if( Auth::guard('frontpatient')->check() ){
            //echo 'auth working';die;
        }else{
            //echo 'auth not working';die;
        }
        //echo '<pre>';
        //print_r($request->all());
        //die;
          //Validate Inputs
          $request->validate([
            'patient_phone'=>'required|exists:patients,patient_phone',
            'password'=>'required|min:2|max:30'
         ],[
             'patient_phone.exists'=>'This Patient Phone Number is not exists.'
         ]);

         
 
         $creds = $request->only('patient_phone','password');
        //echo '<pre>';
        //print_r($creds);
        //die;
         if( Auth::guard('frontpatient')->attempt($creds) ){
            //$user = Auth::guard('frontpatient')->user();
            //echo 'pass'; die;
            return redirect('frontpatient/dashboard');
         }else{
             //echo 'fail';die;
             return redirect('frontpatient')->with('success', 'Invallid credentials');;
         }
    }

    //hakeemcheck
    public function hakeemcheck(Request $request)
    { 
        if( Auth::guard('fronthakeem')->check() ){
            //echo 'auth working';die;
        }else{
            //echo 'auth not working';die;
        }
        //echo '<pre>';
        //print_r($request->all());
        //die;
          //Validate Inputs
          $request->validate([
            'hakeem_phone'=>'required|exists:hakeems,hakeem_phone',
            'password'=>'required|min:2|max:30'
         ],[
             'hakeem_phone.exists'=>'This Hakeem Phone Number is not exists.'
         ]);

         
 
         $creds = $request->only('hakeem_phone','password');
        //echo '<pre>';
        //print_r($creds);
        //die;
        $creds['hakeem_status'] = 'Active';
         if( Auth::guard('fronthakeem')->attempt($creds) ){
            //$user = Auth::guard('fronthakeem')->user();
            //echo 'pass'; die;
            return redirect('fronthakeem/dashboard');
         }else{
             //echo 'fail';die;
             return redirect('fronthakeem')->with('success', 'Invallid credentials of Hakeem');;
         }
    }

    //laboritycheck
    public function laboritycheck(Request $request)
    { 
        if( Auth::guard('frontlabority')->check() ){
            //echo 'auth working';die;
        }else{
            //echo 'auth not working';die;
        }
        //echo '<pre>';
        //print_r($request->all());
        //die;
          //Validate Inputs
          $request->validate([
            'labority_phone'=>'required|exists:laborities,labority_phone',
            'password'=>'required|min:2|max:30'
         ],[
             'labority_phone.exists'=>'This Labority Phone Number is not exists.'
         ]);

         
 
         $creds = $request->only('labority_phone','password');
        //echo '<pre>';
        //print_r($creds);
        //die;
        $creds['labority_status'] = 'Active';
         if( Auth::guard('frontlabority')->attempt($creds) ){
            //$user = Auth::guard('frontlabority')->user();
            //echo 'pass'; die;
            return redirect('frontlabority/dashboard');
         }else{
             //echo 'fail';die;
             return redirect('frontlabority')->with('success', 'Invallid credentials of Labority');;
         }
    }

    //pharmacycheck 
    public function pharmacycheck(Request $request)
    { 
        if( Auth::guard('frontpharmacy')->check() ){
            //echo 'auth working';die;
        }else{
            //echo 'auth not working';die;
        }
        //echo '<pre>';
        //print_r($request->all());
        //die;
          //Validate Inputs
          $request->validate([
            'pharmacy_phone'=>'required|exists:pharmacies,pharmacy_phone',
            'password'=>'required|min:2|max:30'
         ],[
             'pharmacy_phone.exists'=>'This Pharmacy Phone Number is not exists.'
         ]);

         
 
         $creds = $request->only('pharmacy_phone','password');
        //echo '<pre>';
        //print_r($creds);
        //die;
        $creds['pharmacy_status'] = 'Active';
         if( Auth::guard('frontpharmacy')->attempt($creds) ){
            //$user = Auth::guard('frontpharmacy')->user();
            //echo 'pass'; die;
            return redirect('frontpharmacy/dashboard');
         }else{
             //echo 'fail';die;
             return redirect('frontpharmacy')->with('success', 'Invallid credentials of Pharmacy');
         }
    }

    function logout(){
        //echo 'logout called';die;
        Auth::logout();
        Auth::guard('frontdoctor')->logout();
        Session::flush();
        return redirect('/');
    }

    //processContactUs
    function processContactUs(Request $request){
        $status = false;
        if ($request->method() == 'POST') {
                $cemail = $request->cemail;
                $cmessage = $request->cmessage;

                DB::table('contacts')->insert(['email'=>$cemail, 'content'=>$cmessage]);
                $status = true;
        }

        return json_encode(['status'=>$status]);
    }

//doctorRegistration
//hakeemRegistration
//laboratoryRegistration
//pharmacyRegistration

    function doctorRegistration(){
        $doctors = Doctor::all();
        $doctorTypes = DoctorType::all();
        $hospitals = Hospital::all();
        //$specialties = Specialty::all();
        $departments = Departments::all();
        $courseforms = CourseForm::all();
        return view('frontend.pages.doctor_registration', 
        [
            'doctors' => $doctors, 
            'doctorTypes' => $doctorTypes, 
            'hospitals' => $hospitals, 
            'departments' => $departments, 
            'courseforms' => $courseforms
        ]);
        //return view('frontend.pages.doctor_registration');
    }

    //editDoctorRegistration
    function editDoctorRegistration($id){
        $doctors = Doctor::where('id', $id)->first();
        $doctorTypes = DoctorType::all();
        $hospitals = Hospital::all();
        //$specialties = Specialty::all();
        $departments = Departments::all();
        $courseforms = CourseForm::all();

        $doctorspecialties = explode(',', $doctors->doctor_specialty_id);
        $doctorhospital = explode(',', $doctors->doctor_hospital_id);
        $doctorcourseForm = explode(',', $doctors->doctor_course_id);

        return view('frontend.pages.doctor_registration_edit', 
        [
            'doctors' => $doctors,
                'doctorspecialties' => $doctorspecialties,
                'doctorhospital' => $doctorhospital,
                'doctorcourseForm' => $doctorcourseForm,
                'doctorTypes' => $doctorTypes,
                'hospitals' => $hospitals,
                'departments' => $departments,
                'courseforms' => $courseforms
        ]);
        //return view('frontend.pages.doctor_registration');
    }

    function hakeemRegistration(){
        $hakeems = Hakeem::all();
        $hakeemTypes = HakeemType::all();
        $hospitals = Hospital::all();
        
        $departments = Departments::all();
        $courseforms = CourseForm::all();
        return view('frontend.pages.hakeem_registration', 
        [
            'hakeems' => $hakeems, 
            'hakeemTypes' => $hakeemTypes, 
            'hospitals' => $hospitals, 
            'departments' => $departments, 
            'courseforms' => $courseforms
        ]);
    }

    //editHakeemRegistration
    function editHakeemRegistration($id){
        $hakeems = Hakeem::where('id', $id)->first();
        $hakeemTypes = HakeemType::all();
        $hospitals = Hospital::all();
        //$specialties = Specialty::all();
        $departments = Departments::all();
        $courseforms = CourseForm::all();

        $hakeemhospital = explode(',', $hakeems->hakeem_hospital_id);
        $hakeemcourseForm = explode(',', $hakeems->hakeem_course_id);

        return view('frontend.pages.hakeem_registration_edit', 
        [
                'hakeems' => $hakeems,
                'hakeemhospital' => $hakeemhospital,
                'hakeemcourseForm' => $hakeemcourseForm,
                'hakeemTypes' => $hakeemTypes,
                'hospitals' => $hospitals,
                'departments' => $departments,
                'courseforms' => $courseforms
        ]);
        //return view('frontend.pages.doctor_registration');
    }

    //editLaborityRegistration
    function editLaborityRegistration($id){
        $laboritys = Labority::where('id', $id)->first();
        $laborityTypes = LaborityType::all();
        $hospitals = Hospital::all();

        return view('frontend.pages.labority_registration_edit', 
        [
            'laboritys' => $laboritys,
            'laborityTypes' => $laborityTypes
        ]);
        //return view('frontend.pages.doctor_registration');
    }

    function laboratoryRegistration(){
        $laboritys = Labority::all();
        $laborityTypes = LaborityType::all();
        $hospitals = Hospital::all();
        
        $departments = Departments::all();
        $courseforms = CourseForm::all();
        return view('frontend.pages.labority_registration', 
        [
            'laboritys' => $laboritys, 
            'laborityTypes' => $laborityTypes, 
            'hospitals' => $hospitals, 
            'departments' => $departments, 
            'courseforms' => $courseforms
        ]);
    }

    function pharmacyRegistration(){
        $pharmacys = Pharmacy::all();
        
        $hospitals = Hospital::all();
        
        $departments = Departments::all();
        $courseforms = CourseForm::all();
        return view('frontend.pages.pharmacy_registration', 
        [
            'pharmacys' => $pharmacys, 
            
            'hospitals' => $hospitals, 
            'departments' => $departments, 
            'courseforms' => $courseforms
        ]);
    }

    //editPharmacyRegistration
    function editPharmacyRegistration($id){
        $pharmacys = Pharmacy::where('id', $id)->first();
        
        $hospitals = Hospital::all();

        return view('frontend.pages.pharmacy_registration_edit',['pharmacys' => $pharmacys]);
    }

}//End of Class HomeController
