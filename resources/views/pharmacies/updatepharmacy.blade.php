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
                        <h4>Update Pharmacy </h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

                    <ol class="breadcrumb">
                        @if (Auth::guard()->user()->role == 12)
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.pharmacy') }}">All Pharmacus</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Update Pharmacu</a></li>
                        @endif
                    </ol>

                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Pharmacu Info</h5>
                        </div>
                        <div class="card-body">
                            @if (Auth::guard()->user()->role == 12)
                                <form id="addPharmacu" action="{{ route('admin.pharmacyupdate', $pharmacys->id) }}"
                                    method="POST" enctype="multipart/form-data">
                            @endif
                            @if (Auth::guard()->user()->role == 1)
                                <form id="addPharmacu" action="{{ route('pharmacy.pharmacyupdate', $pharmacys->id) }}"
                                    method="POST" enctype="multipart/form-data">
                            @endif

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Full Name</label> <span id='pharmacy_fullname'></span>
                                        <input type="text" name="pharmacy_fullname" value="{{ $pharmacys->pharmacy_fullname }}"
                                            id="pharmacy_fullname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Email</label> <span id='email'></span>
                                        <input type="email" name="email" value="{{ $pharmacys->email }}" id="email"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Phone</label> <span id='pharmacy_phone'></span>
                                        <input type="number" name="pharmacy_phone" value="{{ $pharmacys->pharmacy_phone }}"
                                            id="pharmacy_phone" class="form-control">
                                    </div>
                                </div>
                               
                                
                                
                                

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label ">Pharmacy Status</label> <span id='pharmacy_status'></span>
                                        <select class="form-control select" name="pharmacy_status">
                                            {{-- <option disabled selected value=""> Select Pharmacu Status</option> --}}
                                            <option value="Active" @if($pharmacys->pharmacy_status && $pharmacys->pharmacy_status == 'Active') {{' selected'}} @endif>Active</option>
                                            <option value="Inactive" @if($pharmacys->pharmacy_status && $pharmacys->pharmacy_status == 'Inactive') {{' selected'}} @endif>Inactive</option>
                                            <option value="Block" @if($pharmacys->pharmacy_status && $pharmacys->pharmacy_status == 'Block') {{' selected'}} @endif>Block</option>
                                            <option value="Pending" @if($pharmacys->pharmacy_status && $pharmacys->pharmacy_status == 'Pending') {{' selected'}} @endif>Pending</option>
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
                                        <label class="form-label">PMDC</label> <span id='pharmacy_PMDC'></span>
                                        <input type="file" name="pharmacy_PMDC" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Profile Image</label> <span id='pharmacy_profileImage'></span>
                                        <input type="file" name="pharmacy_profileImage" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <img src="{{ asset('uploads/pharmacyPMDCSave/' . $pharmacys->pharmacy_PMDC) }}"
                                            width="150" alt="">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <img src="{{ asset('uploads/PharmacuImagesSave/' . $pharmacys->pharmacy_profileImage) }}"
                                            width="150" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Country</label> <span id='pharmacy_country'></span>
                                        <input type="text" name="pharmacy_country" value="{{ $pharmacys->pharmacy_country }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">City</label> <span id='pharmacy_city'></span>
                                        <input type="text" name="pharmacy_city" value="{{ $pharmacys->pharmacy_city }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">State</label> <span id='pharmacy_state'></span>
                                        <input type="text" name="pharmacy_state" value="{{ $pharmacys->pharmacy_state }}"
                                            class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Address</label> <span id='pharmacy_address'></span>
                                        <input type="text" name="pharmacy_address" value="{{ $pharmacys->pharmacy_address }}"
                                            class="form-control">
                                    </div>
                                </div>

                              

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Details</label> <span id='pharmacy_details'></span>
                                            <textarea name="pharmacy_details"  rows=7 class="form-control">{{ $pharmacys->pharmacy_details }}</textarea>
                                        </div>
                                    </div>

                    
                    <?php 
                        $days = ['1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday','7'=>'Sunday']
                    ?>
                    @php $c=1;
                            $pharmacy_timmingsExist = DB::table('pharmacies_timming')->where('pharmacy_id', $pharmacys->id)->get();  
                            if($pharmacy_timmingsExist->count() > 0){
                    @endphp        
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label class="form-label">Pharmacy's Timming:</label>
                    </div>
					<div class="" style='margin-left:15px;width:100%;border:1px solid lightgray;border-radius:15px;padding:20px;margin-bottom:10px;'>
						

                                @php
                                  foreach($pharmacy_timmingsExist as $pharmacytime){
                        @endphp
                        <div class=" fvrduplicate9 row">
							<div class="form-group col-sm-1 col-md-1 col-lg-1" ><p class='item_no'>{{$c}}<p></div>	
                            <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                    <input type="text" class="form-control maddress check-empty9" row-id='{{$pharmacytime->dt_id}}' id="emaddress_{{$pharmacytime->dt_id}}" name="emaddress[{{$pharmacytime->dt_id}}]" value="{{$pharmacytime->maddress}}" placeholder="Address">
                            </div>	
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
							<select class="form-control day_list day_id check-empty9" row-id='0' id="eday_name_{{$pharmacytime->dt_id}}" name="eday_name[{{$pharmacytime->dt_id}}]" style="width:100%;float:right;">
								<?php 
									if($days){ ?>
									<option value="">Please Select Day</option>	
								<?php
										foreach($days as $key => $day){
								?>
									<option value="<?php echo $key; ?>" @if($pharmacytime->day == $key) {{'selected'}} @endif><?php echo $day; ?></option>
								<?php }}?>
							</select>
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<input type="time" class="form-control st_time check-empty9" row-id='{{$pharmacytime->dt_id}}' id="est_time_{{$pharmacytime->dt_id}}" name="est_time[{{$pharmacytime->dt_id}}]" value="{{$pharmacytime->st_time}}" placeholder="ST Time">
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<input type="time" class="form-control end_time check-empty9" id="eend_time_{{$pharmacytime->dt_id}}" name="eend_time[{{$pharmacytime->dt_id}}]" placeholder="END Time" value="{{$pharmacytime->end_time}}">
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<select class="form-control time_status check-empty9" id="etime_status_{{$pharmacytime->dt_id}}" name="etime_status[{{$pharmacytime->dt_id}}]">
									<option value="1" @if($pharmacytime->time_status == '1') {{'selected'}} @endif>Active</option>
                                    <option value="0" @if($pharmacytime->time_status == '0') {{'selected'}} @endif>In Active</option>
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
                        <label class="form-label">Pharmacu's New Timming:</label> 
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

        $("#addPharmacu").validate({
            rules: {
                pharmacy_fullname: {
                    required: true,
                },
                email: {
                    required: true,
                },
                pharmacy_password: {
                    required: true,
                },
                pharmacy_phone: {
                    required: true,
                },
                pharmacy_address: {
                    required: true,
                },
            },
            errorPlacement: function (error, element) {
                
                if (element.attr("name") == "pharmacy_fullname") {
                    error.appendTo("#pharmacy_fullname");
                }
                if (element.attr("name") == "email") {
                    error.appendTo("#email");
                }
                if (element.attr("name") == "password") {
                    error.appendTo("#password");
                }
                if (element.attr("name") == "pharmacy_gender") {
                    error.appendTo("#pharmacy_gender");
                }
                if (element.attr("name") == "pharmacy_phone") {
                    error.appendTo("#pharmacy_phone");
                }

                if (element.attr("name") == "pharmacy_address") {
                    error.appendTo("#pharmacy_address");
                }
                if (element.attr("name") == "pharmacy_degree") {
                    error.appendTo("#pharmacy_degree");
                }
                if (element.attr("name") == "pharmacy_experience") {
                    error.appendTo("#pharmacy_experience");
                }
                if (element.attr("name") == "pharmacy_PMDC") {
                    error.appendTo("#pharmacy_PMDC");
                }
                if (element.attr("name") == "pharmacy_status") {
                    error.appendTo("#pharmacy_status");
                }
                if (element.attr("name") == "pharmacy_specialty_id") {
                    error.appendTo("#pharmacy_specialty_id");
                }
                if (element.attr("name") == "pharmacy_hospital_id") {
                    error.appendTo("#pharmacy_hospital_id");
                }
 
                if (element.attr("name") == "pharmacy_course_id") {
                    error.appendTo("#pharmacy_course_id");
                }
            },
            messages: {
                pharmacy_fullname: '[<span class="text-danger ">Full Name is Required</span>]',
                email: '[<span class="text-danger ">Email is Required</span>]',
                password: '[<span class="text-danger ">Password is Required</span>]',
                pharmacy_phone: '[<span class="text-danger ">Phone is Required</span>]',
                pharmacy_address: '[<span class="text-danger ">Address is Required</span>]',
            }
        });
    </script>
@endsection
