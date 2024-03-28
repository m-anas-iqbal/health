@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider">
      <div class="container pt-0 pb-0">
      <div class="row main-content-wrap">

<!-- main content -->
<div class="main-content col-lg-12">


<div id="content" role="main">

<article class="post-5357 page type-page status-publish hentry">
  
  <span class="entry-title" style="display: none;">Teleclinics</span><span class="vcard" style="display: none;"><span class="fn"><a href="/author/dev_admin/" title="Posts by Developer" rel="author">Developer</a></span></span><span class="updated" style="display:none">2020-04-29T10:20:08+00:00</span>
<div class="page-content">
<p>Now you no longer have to wait in long queues to see the pharmacy. Instead, you can simply consult our certified pharmacys to get medical advice from the comfort of your homes through the FameHospital Hospital Online pharmacy service. This service helps patients who are unable to physically visit the hospital to consult with pharmacys via an online platform. To book an appointment, please fill out the forms below and deposit your amount in the following bank account:
</p>

<h3 class="account-details">
  <span class="bankname">@if($pharmacy) {{$pharmacy->pharmacy_fullname}} @endif</span>
</h3>



<h4><small><strong>Note:&nbsp;</strong>Please check the pharmacy’s fees and clinic days using the fields below, before transferring the funds.</small></h4>
<hr>
<div role="form" class="beforePayamentCustomFrom" id="beforePayamentCustomFrom" lang="en-US" dir="ltr">


<div class="screen-reader-response"></div>

@if (Session::has('message'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
        {{ Session::get('message') }}
    </div>
@endif



<div class="container" id="successDirectDepositWrapper" style="display: none">
<div class="row">
  <div class="col-12">

      <p class="alert-success text-center" style="padding: 5px 10px;">Appointment request submitted</p>

  </div>
</div>
</div>

  @if ($errors->any())
    <div class="container" id="formErrorWrapper" >
      <div class="row">
        <div class="col-12">
              @foreach ($errors->all() as $error)
                <p class="alert-danger text-center">{{$error}}</p>
              @endforeach
        </div>
      </div>
    </div>
  @endif

<form action="{{route('checkAppointmentPharmacy')}}" name="orderpharmacyform" id="orderpharmacyform" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <input type="hidden" name="pharmacy_slug"  value="{{ Request::segment(2)}}" />
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                  <label>pharmacy/Consultant:</label><span id='pharmacy_idError'></span>
                  <select name="pharmacy_id" id="pharmacy_id" class="form-control chk-empty">
                    <option value=''>Select Pharmacy</option>
                  @if($pharmacys)  
                    @foreach($pharmacys as $pharmacy)
                    <option value="{{$pharmacy->id}}">{{$pharmacy->pharmacy_fullname}}</option>
                    @endforeach
                  @endif  
                  <select>
                </div>
              </div>
              <div class="col-sm-6">

              <?php /*<div class="form-group">
                <label>Specialization:</label>
                  <select name="speciality_id" class="form-control chk-empty" id="speciality_id">
                      <option value=''>Select Specialization</option>
                      @if($departments)  
                        @foreach($departments as $department)
                          <option value="{{$department->id}}">{{$department->title}}</option> 
                        @endforeach
                      @endif
                  </select>
                </div>*/ ?>

              </div>
              
              <?php /*<div class="col-sm-6">
                <div class="form-group">
                <label>Pharmacy Fees:(Rs)</label>
                  <input type="text" name="fees" id="fees" placeholder="Fee" class="form-control chk-empty" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>Pharmacy's Timmings:</label>
                <select class="form-control chk-empty" name="day" aria-invalid="false" id="day" readonly>
                  <option>Days</option>
                </select>
                </div>
              </div>*/ ?>

              <div class="col-sm-6">
                <div class="form-group">
                <label>IBFT NO:</label><span id='ibft_noError'></span>
                <input type="text" placeholder="IBFT-Transaction-ID" name="ibft_no" class="form-control chk-empty" value="" size="40" class="" aria-invalid="false" maxlength="100">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>Doctor's Prescription:</label> <span id='ibft_imageError'></span> 
                <input type="file" name="ibft_image" class="form-control chk-empty" size="40" accept=".jpg,.jpeg,.png" aria-invalid="false" id="file">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>Prescription Details:</label> <span id='pres_details'></span> 
                  <textarea name="pres_details" placeholder="Prescription Details" cols="6" rows="3" class="form-control" aria-invalid="false"></textarea>
                </div>
              </div>
              
            </div>


          <hr>

          <h2>Patient Details</h2>
          <?php 
          if(Auth::guard('frontpatient')->user()){
            $patient_fullname = Auth::guard('frontpatient')->user()->patient_fullname;
            $patient_phone = Auth::guard('frontpatient')->user()->patient_phone;
            $patient_gender = Auth::guard('frontpatient')->user()->patient_gender;

            $patient = [
              'patient_fullname'  =>$patient_fullname,
              'patient_phone'  =>$patient_phone,
              'patient_gender'  =>$patient_gender,
            ];
          }else{
            $patient = false;
          }
          ?>



              <div class="col-sm-6">
                <div class="form-group">   
                <label>Patient Full Name:</label>
                <input type="text" placeholder="patient-fullname" name="p_name" value="@if($patient) {{$patient['patient_fullname']}} @endif" class="form-control chk-empty" aria-required="true" aria-invalid="false" maxlength="100"></span>
                </div>
              </div>
              <?php 
                if($patient){
                    $mobileno = trim($patient['patient_phone']);
                }else{
                    $mobileno = '';
                }
              ?>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Patient Mobile:[e.g 03332071179]</label><span id='p_mobileError'></span>
                  <input type="text" placeholder="Mobile" class="form-control chk-empty" name="patient_phone" id='p_mobile' value="@if($patient) {{$mobileno}} @endif">
                </div>
              </div>
              
              <?php /*<div class="col-sm-6">
                <div class="form-group">
                  <input type="text" placeholder="father-name" class="form-control" name="father-name" value="" lass="" aria-required="true" aria-invalid="false" maxlength="250">
                </div>
              </div>*/ ?>




              <div class="col-sm-6">
                <div class="form-group">   
                <label>Patient Gender:</label>
                <select name="p_gender" class="form-control" aria-required="true" aria-invalid="false">
                  <option value=''>Select Gender</option>
                  <option value="Male" @if($patient && $patient['patient_gender'] == 'Male') {{' selected'}} @endif>Male</option>
                  <option value="Female" @if($patient && $patient['patient_gender'] == 'Female') {{' selected'}} @endif>Female</option>
                </select>
                </div>
              </div>

              <?php /*<div class="col-sm-6">
                <div class="form-group">
                  <input type="text" placeholder="FameHospital-Hospital-No" class="form-control" name="FameHospital-Hospital-No" value="" lass="" aria-required="true" aria-invalid="false" maxlength="250">
                </div>
              </div>*/ ?>

              
              <div class="col-sm-6">
                <div class="form-group">   
                <label>Patient Password:</label><span id='passwordError'></span>
                <input type="password" placeholder="Password" name="password" value="" class="form-control chk-empty" aria-required="true" aria-invalid="false" maxlength="100"></span>
                </div>
              </div>
              

            <?php /*
              <div class="col-sm-6">
                <div class="form-group">   
                <input type="date" placeholder="date-of-birth" name="date-of-birth" value="" class="form-control" aria-required="true" aria-invalid="false" maxlength="100"></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" placeholder="City" name="City" class="form-control" value="" lass="" aria-required="true" aria-invalid="false" maxlength="250">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">   
                <input type="text" placeholder="email-address" name="email-address" value="" class="form-control" aria-required="true" aria-invalid="false" maxlength="100"></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" placeholder="Address" class="form-control" name="Address" value="" lass="" aria-required="true" aria-invalid="false" maxlength="250">
                </div>
              </div>
            */ ?>

            <div class="col-12"><span id='p_commentsError'></span>
            <label>Patient Comments:</label>
                <textarea name="p_comments" placeholder="comments" cols="40" rows="10" class="form-control" aria-invalid="false"></textarea>
            </div>
     
      <br><br>
      <input type="submit" value="Send Request" id='submit_appointment' class="btn btn-primary custombookingSubmitBeforePayment">
      <br>

</form>


</div>
  </div>
</article>



<div style="height: 50px"></div>


</div>



</div><!-- end main content -->



</div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection

@section('js')
<script>
  
  $(document).on('keyup keypress', '#p_mobile', function(){
    //alert('keyup');
    var number = $('#p_mobile').val();
    var filter = /^((0))(3)([0-9]{2})([0-9]{7})$/;
    if (!filter.test(number)) {
       $(this).css('background-color', 'lightpink');
       $(this).addClass('phoneerror');
    }
    else {
      $(this).css('background-color', 'white');
      $(this).removeClass('phoneerror');
    }
  });
  
  $(document).on('change', '#pharmacy_id', function(){
    var pharmacy_id = $(this).val();
    console.log(pharmacy_id);
    $.ajax({
      type:'post',
      url:'getSpecialityOfpharmacy',
      data:{pharmacy_id:pharmacy_id ,_token: "{{ csrf_token() }}"},
      dataType:'JSON',
      success:function(data){
        console.log('success dept');
        console.log(data);

        if(data.fees){
          $('#fees').val(data.fees);
        }

       
        if(data.pharmacy_time_lists){
          var pharmacy_time_lists = data.pharmacy_time_lists;
          var dt_opt_list = '';
          //console.log(pharmacy_time_lists);
          $.each(pharmacy_time_lists, function(kk, vv){
              var day = '';
              switch(vv.day){
                  case 1 : { day = 'Monday';}break;
                  case 2 : { day = 'Tuesday';}break;
                  case 3 : { day = 'Wednesday';}break;
                  case 4 : { day = 'Thursday';}break;
                  case 5 : { day = 'Friday';}break;
                  case 6 : { day = 'Saturday';}break;
                  case 7 : { day = 'Sunday';}break;
              }

              dt_opt_list += '<option value="'+vv.dt_id+'">';
              dt_opt_list += day + ' ' + vv.st_time + ' - ' + vv.end_time;
              dt_opt_list += '</option>';
          });
          //console.log(dt_opt_list);
          $('#day').html(dt_opt_list);
        }
      },
      error:function(data){
        console.log('error');
        console.log(data.responseText);
      }
    });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

  <?php 
    $passwordRequired=true;  
    if(Auth::guard('frontpatient')->user()){
      $passwordRequired=false;  
    }
  ?>
  var password_req = Boolean("{{$passwordRequired}}");
  console.log('password_req');
  console.log(password_req);
  //orderpharmacyform validation
  $("#orderpharmacyform").validate({
      rules: {
        patient_phone: {
              required: true,
          },
          pharmacy_id: {
              required: true,
          },
          ibft_no:{
            required:true,
          },
          ibft_image:{
            required:false,
          },
          p_comments:{
            required:true,
          },
          password:{
            required: password_req,
          }   
      },
      errorPlacement: function (error, element) {
          if (element.attr("name") == "pharmacy_id") {
              error.appendTo("#pharmacy_idError");
          }
          if (element.attr("name") == "patient_phone") {
              error.appendTo("#p_mobileError");
          }
          if (element.attr("name") == "ibft_no") {
              error.appendTo("#ibft_noError");
          }
          if (element.attr("name") == "ibft_image") {
              error.appendTo("#ibft_imageError");
          }
          if (element.attr("name") == "p_comments") {
              error.appendTo("#p_commentsError");
          }
          if (element.attr("name") == "password") {
              error.appendTo("#passwordError");
          }
      },
      messages: {
          patient_phone: '[<span class="text-danger ">Patient Mobile is Required</span>]',
          pharmacy_id: '[<span class="text-danger ">pharmacy is Required</span>]',
          ibft_no: '[<span class="text-danger ">IBFT is Required</span>]',
          ibft_image: '[<span class="text-danger ">Doctors Prescription is Required</span>]',
          p_comments: '[<span class="text-danger ">Patient Comments is Required</span>]',
          password: '[<span class="text-danger ">Patient Password is Required</span>]',
      }
  });

  $(document).on('click', '#submit_appointment', function(e){
    //chk-empty
    $('.chk-empty').each(function(k,v){
           if($(this).val() == ''){
               errors.push('y');
               //$(this).addClass('error');
           }else{
               //$(this).removeClass('error');
           }
       });
       
       if(errors.length == 0){
         if($('#p_mobile').hasClass('phoneerror')){
              //alert('return false');
              e.preventDefault();
              return false;
          }else{
              //alert('return true');
              return true;
          }
       }
    


  });
</script>
@endsection
