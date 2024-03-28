@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider">
      <div class="container pt-0 pb-0">
        
        <section class="section-padding about-company">
    <div class="container">
	
	<div class="section-header heading_style4 center">
            <h2>Doctor Registration</h2>
          </div>
	
          <div class="container-fluid">

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Add Doctor</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

    @if (Session::has('message'))
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                            {{ Session::get('message') }}
                        </div>
                    @endif

    </div>
</div>

<form id="addDoctor" action="{{ url('doctorRegistrationProcess') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }} 
        <div class="row">


            <div class="col-sm-6">
                <div class="form-group">
                <label>Full Name</label><span id='doctor_fullname'></span>
                  <input type="text" name="doctor_fullname" id="doctor_fullname" placeholder="Full Name" class="form-control chk-empty">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Email</label> <span id='email'></span>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                        <label class="form-label">Phone</label> <span id='doctor_phone'></span>
                        <input type="number" name="doctor_phone" id="doctor_phone"
                                                class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Date of Birth</label> <span id='doctor_dob'></span>
                    <input type="date" name="doctor_dob" id="doctor_dob" class="form-control">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label">Gender</label> <span id='doctor_gender'></span>
                    <select class="form-control" name="doctor_gender">
                        <option disabled selected value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label"> Marital Status</label> <span id='doctor_martialStatus'></span>
                    <select class="form-control" name="doctor_martialStatus">
                        <option disabled selected value=""> Select Marital Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married </option>
                    </select>
                </div>
            </div>

              
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Degree</label> <span id='doctor_degree'></span>
                    <input type="text" name="doctor_degree" class="form-control">
                </div>
              </div>


              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Experience</label> <span id='doctor_experience'></span>
                    <input type="text" name="doctor_experience" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Speciality</label> <span id='doctor_specialty_id'></span>
                    <select class="form-control select multipleSelection9"
                        name="doctor_specialty_id[]" multiple9>
                        {{-- <option disabled selected value=""> Select Speciality</option> --}}
                        <?php /*
                        @if (!empty($specialties))
                            @foreach ($specialties as $specialtie)
                                <option value="{{ $specialtie->id }}">
                                    {{ $specialtie->specialty_name }}</option>
                            @endforeach
                        @endif
                        */ ?>
                        @if (!empty($departments))
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">
                                    {{ $department->title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Hospital</label> <span id='doctor_hospital_id'></span>
                    <select class="form-control select multipleSelection"
                        name="doctor_hospital_id[]" multiple>
                        {{-- <option disabled selected value=""> Select Hospital</option> --}}
                        @if (!empty($hospitals))
                            @foreach ($hospitals as $hospital)
                                <option value="{{ $hospital->id }}">
                                    {{ $hospital->hospital_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div><br>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label ">Course</label> <span id='doctor_course_id'></span>
                    <select class="form-control select multipleSelection" name="doctor_course_id[]"
                        id="doctor_course_id" multiple>
                        {{-- <option disabled selected value=""> Select Course</option> --}}
                        @if (!empty($courseforms))
                            @foreach ($courseforms as $courseform)
                                <option value="{{ $courseform->id }}">
                                    {{ $courseform->course_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Doctor Type</label> <span id='doctor_doctorType_id'></span>
                    <select class="form-control" name="doctor_doctorType_id">
                        <option disabled selected value=""> Select Doctor Type</option>
                        @if (!empty($doctorTypes))
                            @foreach ($doctorTypes as $doctorType)
                                <option value="{{ $doctorType->id }}">
                                    {{ $doctorType->doctorType_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">PMDC</label> <span id='doctor_PMDC'></span>
                    <input type="file" name="doctor_PMDC" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                        <label class="form-label">Password</label> <span id='password'></span>
                        <input type="password" name="password" id="password" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Profile Image</label> <span id='doctor_profileImage'></span>
                    <input type="file" name="doctor_profileImage" class="form-control">
                </div>
              </div>
              <input type="hidden" name="doctor_status" value="Active" class="form-control">
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Country</label> <span id='doctor_country'></span>
                    <input type="text" name="doctor_country" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">City</label> <span id='doctor_city'></span>
                    <input type="text" name="doctor_city" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">State</label> <span id='doctor_state'></span>
                    <input type="text" name="doctor_state" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Address</label> <span id='doctor_address'></span>
                    <input type="text" name="doctor_address" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label">Fees</label> <span id='doctor_fees'></span>
                    <input type="text" name="doctor_fees" class="form-control">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                    <label class="form-label">Details</label> <span id='doctor_details'></span>
                    <textarea name="doctor_details" rows=7 class="form-control"></textarea>
                </div>
              </div>

              <?php 
                        $days = ['1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday','7'=>'Sunday']
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label class="form-label">Doctor's Timming:</label> <span id='doctor_city'></span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12" style="border: lightgray 1px solid;border-radius: 20px;margin-bottom: 20px;">
					<div class="" style='margin-left:15px;width:100%;padding:20px;margin-bottom:10px;'>
						<div class=" fvrduplicate row">
							<div class="form-group col-sm-1 col-md-1 col-lg-1" ><p class='item_no'>1<p></div>	
                            <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                <input type="text" class="form-control maddress check-empty9" id="maddress_0" name="maddress[0]" placeholder="Address">
                            </div>	
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
							<select class="form-control day_list day_id check-empty9" row-id='0' id="day_name_0" name="day_name[0]" style="width:100%;float:right;">
								<?php 
									if($days){ ?>
									<option value="">Day</option>	
								<?php
										foreach($days as $key => $day){
								?>
									<option value="<?php echo $key; ?>"><?php echo $day; ?></option>
								<?php }}?>
							</select>
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<input type="time" class="form-control st_time check-empty9" row-id='0' id="st_time_0" name="st_time[0]" placeholder="ST Time">
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<input type="time" class="form-control end_time check-empty9" id="end_time_0" name="end_time[0]" placeholder="END Time">
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<select class="form-control time_status check-empty9" id="time_status_0" name="time_status[0]">
									<option value="1">Active</option>
                                    <option value="0">In Active</option>
							    </select>
							</div>
							<span><button class="btn btn-success btn-add pro-row" type="button" id="r_0"><span class="glyphicon glyphicon-plus"></span></button></span>
						</div>
						<div class="fvrclone"></div>
					</div>
                                        </div>
					<br>


                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <?php /*<div class="col-sm-6">
                <div class="form-group">
                  <label>Doctor/Consultant:</label><span id='doctor_idError'></span>
                  <select name="doctor_id" id="doctor_id" class="form-control chk-empty">
                    <option value=''>Select Doctor</option>
                 
                  <select>
                    
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>Specialization:</label>
                  <select name="speciality_id" class="form-control chk-empty" id="speciality_id">
                      <option value=''>Select Specialization</option>
                      
                  </select>
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                <label>Doctor Fees:(Rs)</label>
                  <input type="text" name="fees" id="fees" placeholder="Fee" class="form-control chk-empty" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>Doctor's Timmings:</label>
                <select class="form-control chk-empty" name="day" aria-invalid="false" id="day" readonly>
                  <option>Days</option>
                </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>IBFT NO:</label><span id='ibft_noError'></span>
                <input type="text" placeholder="IBFT-Transaction-ID" name="ibft_no" class="form-control chk-empty" value="" size="40" class="" aria-invalid="false" maxlength="100">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label>IMAGE:</label> <span id='ibft_imageError'></span> 
                <input type="file" name="ibft_image" class="form-control chk-empty" size="40" accept=".jpg,.jpeg,.png" aria-invalid="false" id="file">
                </div>
              </div>
              
            </div>*/ ?>



                        <?php /*<div class="row">
              <div class="col-6">
                  </div>
              <div class="col-6">
                  <label style="display: block">Attachment ( JPG/PNG allowed )</label><span class="">
                  <br>(Max upload size:2Mb)</span></div>
            </div>
            <br>
            <div class="row">
              <div class="col-12">
                  <p>Note: At least one of "IBFT Transaction ID" or "Attachment" of a proof of funds transfer is mandatory.</p>
              </div>
            </div>*/ ?>

<?php /*<hr>

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

            

              
              <div class="col-sm-6">
                <div class="form-group">   
                <label>Patient Password:</label><span id='passwordError'></span>
                <input type="password" placeholder="Password" name="password" value="" class="form-control chk-empty" aria-required="true" aria-invalid="false" maxlength="100"></span>
                </div>
              </div>
              


            <div class="col-12"><span id='p_commentsError'></span>
            <label>Patient Comments:</label>
                <textarea name="p_comments" placeholder="comments" cols="40" rows="10" class="form-control" aria-invalid="false"></textarea>
            </div>
     
      <br><br>
      <input type="submit" value="Send Request" id='submit_appointment' class="btn btn-primary custombookingSubmitBeforePayment">
      <br>*/ ?>

</form>

</div>
    </div>
  </section>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

$(document).on('click', '.btn-add', function(e)
      {
        console.log('btn-add has clicked');
			var row_id = $(this).attr('id');
			var row_arr = row_id.split('_');
	
            var newrow_counter =  parseInt(row_arr[1]) + 1; 
			var row = "<div class='fvrclonned row '>";
			row += "<div class='form-group col-sm-1 col-md-1 col-lg-1' ><p class='item_no'>"+newrow_counter+"<p></div>";	
            row += "<div class='form-group col-sm-2 col-md-2 col-lg-2'>";
			row += "<input type='text' class='form-control maddress check-empty9' row-id='"+newrow_counter+"' id='maddress_"+newrow_counter+"' name='maddress["+newrow_counter+"]' placeholder='Address'>";
			row += "</div>";
			row += "<div class='form-group col-sm-2 col-md-2 col-lg-2'>";
	        
            row += "<select name='day_name["+newrow_counter+"]' class='form-control day_name day_id check-empty9' row-id='"+newrow_counter+"' id='day_name"+newrow_counter+"' style='width:100%;float:right;'>";
            row += "<option value=''>Select Day</option>";
            @foreach($days as $key => $day)
			    row += "<option value='{{$key}}'>{{$day}}</option>";
            @endforeach
			row += "</select>";

			row += "</div>";
			row += "<div class='form-group col-sm-2 col-md-2 col-lg-2'>";
			row += "<input type='time' class='form-control st_time check-empty9' row-id='"+newrow_counter+"' id='st_time_"+newrow_counter+"' name='st_time["+newrow_counter+"]' placeholder='ST Time'>";
			row += "</div>";
			row += "<div class='form-group col-sm-2 col-md-2 col-lg-2'>";
			row += "<input type='time' class='form-control end_time check-empty9' id='end_time_"+newrow_counter+"' name='end_time["+newrow_counter+"]' placeholder='END Time'>";
			row += "</div>";
			row += "<div class='form-group col-sm-2 col-md-2 col-lg-2'>";
			//row += "<input type='price' class='form-control product_amount check-empty' id='product_amount_"+newrow_counter+"' name='p_amount["+newrow_counter+"]' placeholder='Amount'>";

            row += "<select class='form-control time_status check-empty9' id='time_status_"+newrow_counter+"' name='time_status["+newrow_counter+"]'>";
			row += "	<option value='1'>Active</option>";
            row += "    <option value='0'>In Active</option>";
			row += "</select>";

			row += "</div>";
			row += "<span><button class='btn btn-success btn-add pro-row' type='button' id='r_"+newrow_counter+"'><span class='glyphicon glyphicon-plus'></span></button></span>";
			row += "</div>";
			
			
            e.preventDefault();
			//$( ".fvrclone" ).append(fvrhtmlclone);
			$( ".fvrclone" ).append(row);
                $(this).removeClass('btn-add').addClass('btn-remove').removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
				
			var product_amt = 0;    
			//Calculate Totoal of 'Amount'
			$('.product_amount').each(function(){
				if($(this).val() != '')	product_amt += parseFloat($(this).val());
			});	

			$('#net_total_amt').html(product_amt);	
			
			//update item no
			var $item_no = 1;
			$('.item_no').each(function(){
				$(this).html($item_no);
				$item_no++;
			});
            
        }).on('click', '.btn-remove', function(e)
        {
            $(this).parents('.fvrclonned').remove();
			$(this).parents('.fvrduplicate').remove();
			var product_amt = 0;    
			//Calculate Totoal of 'Amount'
			$('.product_amount').each(function(){
				if($(this).val() != '') product_amt += parseFloat($(this).val());
			});	
			//console.log('.product_amount value is' + product_amt);
			$('#net_total_amt').html(product_amt);
						
			//update item no
			var $item_no = 1;
			$('.item_no').each(function(){
				$(this).html($item_no);
				$item_no++;
			});
			
    		e.preventDefault();
    		return false;
    	});


        $("#addDoctor").validate({
            rules: {
                doctor_fullname: {
                    required: true,
                },
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
                doctor_gender: {
                    required: true,
                },

                doctor_phone: {
                    required: true,
                },
                doctor_address: {
                    required: true,
                },
                doctor_degree: {
                    required: true,
                },

                doctor_experience: {
                    required: true,
                },

                doctor_PMDC: {
                    required: true,
                },

                doctor_status: {
                    required: true,
                },

                ' doctor_specialty_id[]': {
                    required: true,
                },
                'doctor_hospital_id[]': {
                    required: true,
                },
                doctor_doctorType_id: {
                    required: true,
                },
                'doctor_course_id[]': {
                    required: true,
                },


            },
            errorPlacement: function (error, element) {
                
                if (element.attr("name") == "doctor_fullname") {
                    error.appendTo("#doctor_fullname");
                }
                if (element.attr("name") == "email") {
                    error.appendTo("#email");
                }
                if (element.attr("name") == "password") {
                    error.appendTo("#password");
                }
                if (element.attr("name") == "doctor_gender") {
                    error.appendTo("#doctor_gender");
                }
                if (element.attr("name") == "doctor_phone") {
                    error.appendTo("#doctor_phone");
                }

                if (element.attr("name") == "doctor_address") {
                    error.appendTo("#doctor_address");
                }
                if (element.attr("name") == "doctor_degree") {
                    error.appendTo("#doctor_degree");
                }
                if (element.attr("name") == "doctor_experience") {
                    error.appendTo("#doctor_experience");
                }
                if (element.attr("name") == "doctor_PMDC") {
                    error.appendTo("#doctor_PMDC");
                }
                if (element.attr("name") == "doctor_status") {
                    error.appendTo("#doctor_status");
                }
                if (element.attr("name") == "doctor_specialty_id") {
                    error.appendTo("#doctor_specialty_id");
                }
                if (element.attr("name") == "doctor_hospital_id") {
                    error.appendTo("#doctor_hospital_id");
                }
                if (element.attr("name") == "doctor_doctorType_id") {
                    error.appendTo("#doctor_doctorType_id");
                }
                if (element.attr("name") == "doctor_course_id") {
                    error.appendTo("#doctor_course_id");
                }
            },
            messages: {
                doctor_fullname: '[<span class="text-danger ">Full Name is Required</span>]',
                email: '[<span class="text-danger ">Email is Required</span>]',
                password: '[<span class="text-danger ">Password is Required</span>]',
                doctor_gender: '[<span class="text-danger ">Gender is Required</span>]',
                doctor_phone: '[<span class="text-danger ">Phone is Required</span>]',
                doctor_address: '[<span class="text-danger ">Address is Required</span>]',
                doctor_degree: '[<span class="text-danger ">Degree is Required</span>]',
                doctor_experience: '[<span class="text-danger ">Experience is Required</span>]',
                doctor_PMDC: '[<span class="text-danger ">PMDC is Required</span>]',
                doctor_status: '[<span class="text-danger ">Doctor Status is Required</span>]',
                'doctor_specialty_id[]': '[<span class="text-danger ">Specialty is Required</span>]',
                'doctor_hospital_id[]': '[<span class="text-danger ">Hospital is Required</span>]',
                'doctor_doctorType_id': '[<span class="text-danger ">Doctor Type is Required</span>]',
                'doctor_course_id[]': '[<span class="text-danger ">Course is Required</span>]',
            }
        });

        $(".multipleSelection").select2({
            maximumSelectionLength: 2
        });
        
        
    </script>
@endsection
