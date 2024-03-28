@extends('layout.master')
@section('doctors')
    active
@endsection
@section('content')

    <!--**********************************
                                                                                                                        Content body start
                                                    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Update Hakeem </h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

                    <ol class="breadcrumb">
                        @if (Auth::guard()->user()->role == 12)
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.hakeem') }}">All Hakeems</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Hakeem</a></li>
                        @endif
                    </ol>

                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Hakeem Info</h5>
                        </div>
                        <div class="card-body">
                            @if (Auth::guard()->user()->role == 12)
                                <form id="addHakeem" action="{{ route('admin.hakeemupdate', $hakeems->id) }}"
                                    method="POST" enctype="multipart/form-data">
                            @endif
                            @if (Auth::guard()->user()->role == 1)
                                <form id="addHakeem" action="{{ route('hakeem.hakeemupdate', $hakeems->id) }}"
                                    method="POST" enctype="multipart/form-data">
                            @endif

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Full Name</label> <span id='hakeem_fullname'></span>
                                        <input type="text" name="hakeem_fullname" value="{{ $hakeems->hakeem_fullname }}"
                                            id="hakeem_fullname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Email</label> <span id='email'></span>
                                        <input type="email" name="email" value="{{ $hakeems->email }}" id="email"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Phone</label> <span id='hakeem_phone'></span>
                                        <input type="number" name="hakeem_phone" value="{{ $hakeems->hakeem_phone }}"
                                            id="hakeem_phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date of Birth</label> <span id='hakeem_dob'></span>
                                        <input type="date" name="hakeem_dob" value="{{ $hakeems->hakeem_dob }}"
                                            id="hakeem_dob" class="form-control">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Gender</label> <span id='hakeem_gender'></span>
                                        <select class="form-control" name="hakeem_gender">
                                            <option disabled selected value="">Gender</option>
                                            <option value="Male"
                                                {{ $hakeems->hakeem_gender == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female"
                                                {{ $hakeems->hakeem_gender == 'Female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label"> Marital Status</label> <span id='hakeem_martialStatus'></span>
                                        <select class="form-control" name="hakeem_martialStatus">
                                            <option disabled selected value="">Marital Status</option>
                                            <option value="Single"
                                                {{ $hakeems->hakeem_martialStatus == 'Single' ? 'selected' : '' }}>
                                                Single</option>
                                            <option value="Married"
                                                {{ $hakeems->hakeem_martialStatus == 'Married' ? 'selected' : '' }}>
                                                Married </option>
                                        </select>
                                    </div>
                                </div>

                                

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Degree</label> <span id='hakeem_degree'></span>
                                        <input type="text" name="hakeem_degree" value="{{ $hakeems->hakeem_degree }}"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Experience</label> <span id='hakeem_experience'></span>
                                        <input type="text" name="hakeem_experience"
                                            value="{{ $hakeems->hakeem_experience }}" class="form-control">
                                    </div>
                                </div>





                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                       
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Hospital</label> <span id='hakeem_hospital_id'></span>
                                        <select class="form-control select multipleSelection" name="hakeem_hospital_id[]"
                                            multiple>
                                            {{-- <option disabled selected value=""> Select Hospital</option> --}}
                                            @if (!empty($hospitals))
                                                @foreach ($hospitals as $hospital)
                                                    <option value="{{ $hospital->id }}"
                                                        @if (in_array($hospital->id, $hakeemhospital)) selected @endif>
                                                        {{ $hospital->hospital_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label ">Course</label> <span id='hakeem_course_id'></span>
                                        <select class="form-control select multipleSelection" name="hakeem_course_id[]"
                                            multiple>
                                            {{-- <option disabled selected value=""> Select Course</option> --}}
                                            @if (!empty($courseforms))
                                                @foreach ($courseforms as $courseform)
                                                    <option value="{{ $courseform->id }}"
                                                        @if (in_array($courseform->id, $hakeemcourseForm)) selected @endif>
                                                        {{ $courseform->course_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Hakeem Type</label> <span id='hakeem_hakeemType_id'></span>
                                        <select class="form-control" name="hakeem_hakeemType_id">
                                            <option disabled selected value=""> Select Hakeem Type</option>
                                            @if (!empty($hakeemTypes))
                                                @foreach ($hakeemTypes as $hakeemType)
                                                    <option value="{{ $hakeemType->id }}"
                                                        {{ $hakeemType->id == $hakeems->hakeem_hakeemType_id ? 'selected' : '' }}>
                                                        {{ $hakeemType->hakeemType_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label ">hakeem Status</label> <span id='hakeem_status'></span>
                                        <select class="form-control select" name="hakeem_status">
                                            {{-- <option disabled selected value=""> Select Hakeem Status</option> --}}
                                            <option value="Active" @if($hakeems->hakeem_status && $hakeems->hakeem_status == 'Active') {{' selected'}} @endif>Active</option>
                                            <option value="Inactive" @if($hakeems->hakeem_status && $hakeems->hakeem_status == 'Inactive') {{' selected'}} @endif>Inactive</option>
                                            <option value="Block" @if($hakeems->hakeem_status && $hakeems->hakeem_status == 'Block') {{' selected'}} @endif>Block</option>
                                            <option value="Pending" @if($hakeems->hakeem_status && $hakeems->hakeem_status == 'Pending') {{' selected'}} @endif>Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Password</label> <span id='password'></span>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">PMDC</label> <span id='hakeem_PMDC'></span>
                                        <input type="file" name="hakeem_PMDC" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Profile Image</label> <span id='hakeem_profileImage'></span>
                                        <input type="file" name="hakeem_profileImage" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <img src="{{ asset('uploads/HakeemPMDCSave/' . $hakeems->hakeem_PMDC) }}"
                                            width="150" alt="">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <img src="{{ asset('uploads/HakeemImagesSave/' . $hakeems->hakeem_profileImage) }}"
                                            width="150" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Country</label> <span id='hakeem_country'></span>
                                        <input type="text" name="hakeem_country" value="{{ $hakeems->hakeem_country }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">City</label> <span id='hakeem_city'></span>
                                        <input type="text" name="hakeem_city" value="{{ $hakeems->hakeem_city }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">State</label> <span id='hakeem_state'></span>
                                        <input type="text" name="hakeem_state" value="{{ $hakeems->hakeem_state }}"
                                            class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Address</label> <span id='hakeem_address'></span>
                                        <input type="text" name="hakeem_address" value="{{ $hakeems->hakeem_address }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Fees</label> <span id='hakeem_fees'></span>
                                        <input type="number" step=0.1 name="hakeem_fees" value="{{ $hakeems->hakeem_fees }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Details</label> <span id='hakeem_details'></span>
                                            <textarea name="hakeem_details"  rows=7 class="form-control">{{ $hakeems->hakeem_details }}</textarea>
                                        </div>
                                    </div>


                    <?php 
                        $days = ['1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday','7'=>'Sunday']
                    ?>
                    @php $c=1;
                            $hakeem_timmingsExist = DB::table('hakeems_timming')->where('hakeem_id', $hakeems->id)->get();  
                            if($hakeem_timmingsExist->count() > 0){
                    @endphp        
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label class="form-label">Hakeem's Timming:</label>
                    </div>
					<div class="" style='margin-left:15px;width:100%;border:1px solid lightgray;border-radius:15px;padding:20px;margin-bottom:10px;'>
						

                                @php
                                  foreach($hakeem_timmingsExist as $hakeemtime){
                        @endphp
                        <div class=" fvrduplicate9 row">
							<div class="form-group col-sm-1 col-md-1 col-lg-1" ><p class='item_no'>{{$c}}<p></div>	
                            <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                    <input type="text" class="form-control maddress check-empty9" row-id='{{$hakeemtime->dt_id}}' id="emaddress_{{$hakeemtime->dt_id}}" name="emaddress[{{$hakeemtime->dt_id}}]" value="{{$hakeemtime->maddress}}" placeholder="Address">
                            </div>	
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
							<select class="form-control day_list day_id check-empty9" row-id='0' id="eday_name_{{$hakeemtime->dt_id}}" name="eday_name[{{$hakeemtime->dt_id}}]" style="width:100%;float:right;">
								<?php 
									if($days){ ?>
									<option value="">Please Select Day</option>	
								<?php
										foreach($days as $key => $day){
								?>
									<option value="<?php echo $key; ?>" @if($hakeemtime->day == $key) {{'selected'}} @endif><?php echo $day; ?></option>
								<?php }}?>
							</select>
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<input type="time" class="form-control st_time check-empty9" row-id='{{$hakeemtime->dt_id}}' id="est_time_{{$hakeemtime->dt_id}}" name="est_time[{{$hakeemtime->dt_id}}]" value="{{$hakeemtime->st_time}}" placeholder="ST Time">
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<input type="time" class="form-control end_time check-empty9" id="eend_time_{{$hakeemtime->dt_id}}" name="eend_time[{{$hakeemtime->dt_id}}]" placeholder="END Time" value="{{$hakeemtime->end_time}}">
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<select class="form-control time_status check-empty9" id="etime_status_{{$hakeemtime->dt_id}}" name="etime_status[{{$hakeemtime->dt_id}}]">
									<option value="1" @if($hakeemtime->time_status == '1') {{'selected'}} @endif>Active</option>
                                    <option value="0" @if($hakeemtime->time_status == '0') {{'selected'}} @endif>In Active</option>
							    </select>
							</div>
						</div>
                        @php              

                        $c++;}
                        @endphp
                        </div>                   
                        @php  
                            }
                        @endphp
                        
					
					<br><br>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label class="form-label">Hakeem's New Timming:</label> 
                    </div>
					<div class="" style='margin-left:15px;width:100%;border:1px solid lightgray;border-radius:15px;padding:20px;margin-bottom:10px;'>
						<div class=" fvrduplicate row">
							<div class="form-group col-sm-1 col-md-1 col-lg-1" ><p class='item_no'>{{$c++}}<p></div>	
                            <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                <input type="text" class="form-control maddress check-empty9" id="maddress_0" name="maddress[0]" placeholder="Address">
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
							<select class="form-control day_list day_id check-empty9" row-id='0' id="day_name_0" name="day_name[0]" style="width:100%;float:right;">
								<?php 
									if($days){ ?>
									<option value="">Select Day</option>	
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
					<br><br>



                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

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
			row += "<input type='text' class='form-control maddress check-empty9' id='maddress_"+newrow_counter+"' name='maddress["+newrow_counter+"]' placeholder='Address'>";
			row += "</div>";
			row += "<div class='form-group col-sm- col-md-2 col-lg-2'>";
	        
            row += "<select name='day_name["+newrow_counter+"]' class='form-control day_name day_id check-empty9' row-id='"+newrow_counter+"' id='day_name"+newrow_counter+"' style='width:100%;float:right;'>";
            row += "<option value=''>Please Select Day</option>";
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
			
            row += "<select class='form-control time_status check-empty9' id='time_status_"+newrow_counter+"' name='time_status["+newrow_counter+"]'>";
			row += "	<option value='1'>Active</option>";
            row += "    <option value='0'>In Active</option>";
			row += "</select>";

			row += "</div>";
			row += "<span><button class='btn btn-success btn-add pro-row' type='button' id='r_"+newrow_counter+"'><span class='glyphicon glyphicon-plus'></span></button></span>";
			row += "</div>";
			
			
            e.preventDefault();
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

        $("#addHakeem").validate({
            rules: {
                hakeem_fullname: {
                    required: true,
                },
                email: {
                    required: true,
                },
                hakeem_password: {
                    required: true,
                },
                hakeem_phone: {
                    required: true,
                },
                hakeem_address: {
                    required: true,
                },
            },
            errorPlacement: function (error, element) {
                
                if (element.attr("name") == "hakeem_fullname") {
                    error.appendTo("#hakeem_fullname");
                }
                if (element.attr("name") == "email") {
                    error.appendTo("#email");
                }
                if (element.attr("name") == "password") {
                    error.appendTo("#password");
                }
                if (element.attr("name") == "hakeem_gender") {
                    error.appendTo("#hakeem_gender");
                }
                if (element.attr("name") == "hakeem_phone") {
                    error.appendTo("#hakeem_phone");
                }

                if (element.attr("name") == "hakeem_address") {
                    error.appendTo("#hakeem_address");
                }
                if (element.attr("name") == "hakeem_degree") {
                    error.appendTo("#hakeem_degree");
                }
                if (element.attr("name") == "hakeem_experience") {
                    error.appendTo("#hakeem_experience");
                }
                if (element.attr("name") == "hakeem_PMDC") {
                    error.appendTo("#hakeem_PMDC");
                }
                if (element.attr("name") == "hakeem_status") {
                    error.appendTo("#hakeem_status");
                }
                if (element.attr("name") == "hakeem_specialty_id") {
                    error.appendTo("#hakeem_specialty_id");
                }
                if (element.attr("name") == "hakeem_hospital_id") {
                    error.appendTo("#hakeem_hospital_id");
                }
                if (element.attr("name") == "hakeem_hakeemType_id") {
                    error.appendTo("#hakeem_hakeemType_id");
                }
                if (element.attr("name") == "hakeem_course_id") {
                    error.appendTo("#hakeem_course_id");
                }
            },
            messages: {
                hakeem_fullname: '[<span class="text-danger ">Full Name is Required</span>]',
                email: '[<span class="text-danger ">Email is Required</span>]',
                password: '[<span class="text-danger ">Password is Required</span>]',
                hakeem_phone: '[<span class="text-danger ">Phone is Required</span>]',
                hakeem_address: '[<span class="text-danger ">Address is Required</span>]',
            }
        });
    </script>
@endsection
