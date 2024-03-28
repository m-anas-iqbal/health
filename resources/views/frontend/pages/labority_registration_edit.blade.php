@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content" style="margin:0 auto;width:75%;">
    <!-- Section: home -->

    <div class="row" style="background-color: #ee1638;"> 

<div class="col-md-12">
        <?php 
                 if( Auth::guard('frontlabority')->user() ){
                    $patient_id = Auth::guard('frontlabority')->user()->id;
                    $patient_nameExist = DB::table('laborities')->where('id', $patient_id)->get();
                    if($patient_nameExist->count() > 0){
                       $patient_fullname = $patient_nameExist->first()->labority_fullname;
                       $patient_phone = $patient_nameExist->first()->labority_phone;
                    }else{
                       $patient_fullname = '';
                       $patient_phone = '';
                    }
                 }else{
                    $patient_fullname = '';
                    $patient_phone = '';
                 }
        ?>
        <h3 style='line-height:1.0'> Laboratory Name: <span class="title text-white">{{$patient_fullname}}</span>, Laboratory Phone: <span class="title text-white">{{$patient_phone}}</span></h3>
           
        </div>
      </div>
      <?php echo view('frontend/inc/header_labority') ?>

    <section id="home" class="divider">
      <div class="container pt-0 pb-0">
        <p style="text-align: center;">
        <h2>Laboratory Registration</h2>
        </p>
        <section class="section-padding about-company">
    <div class="container">
	
	        <div class="section-header heading_style4 center">
            <h2>Laboratory</h2>
            @if (Session::has('message'))
                <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('message') }}
                </div>
            @endif
          </div>
    </div>

    <form id="addLabority" action="{{ url('frontlabority/editLaborityRegistrationProcess') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type='hidden' name='id' value="{{$laboritys->id}}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Full Name</label> <span id='labority_fullname'></span>
                                            <input type="text" name="labority_fullname" id="labority_fullname" value="{{ $laboritys->labority_fullname }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Email</label> <span id='email'></span>
                                            <input type="email" name="email" value="{{ $laboritys->email }}" id="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label> <span id='labority_phone'></span>
                                            <input type="number" name="labority_phone" id="labority_phone" value="{{ $laboritys->labority_phone }}"
                                                class="form-control">
                                        </div>
                                    </div>
                  
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">labority Type</label> <span id='labority_laborityType_id'></span>
                                            <select class="form-control" name="labority_laborityType_id">
                                                <option disabled selected value=""> Select labority Type</option>
                                                @if (!empty($laborityTypes))
                                                    @foreach ($laborityTypes as $laborityType)
                                                        <option value="{{ $laborityType->id }}"
                                                            {{ $laborityType->id == $laboritys->labority_laborityType_id ? 'selected' : '' }}>
                                                            {{ $laborityType->laborityType_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">PMDC</label> <span id='labority_PMDC'></span>
                                            <input type="file" name="labority_PMDC" class="form-control">
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
                                            <label class="form-label">Profile Image</label> <span id='labority_profileImage'></span>
                                            <input type="file" name="labority_profileImage" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <img src="{{ asset('uploads/LaborityPMDCSave/' . $laboritys->labority_PMDC) }}"
                                            width="150" alt="">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <img src="{{ asset('uploads/LaborityImagesSave/' . $laboritys->labority_profileImage) }}"
                                            width="150" alt="">
                                    </div>
                                </div>

                                   <input type="hidden" name="labority_status" value="Active" class="form-control">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Country</label> <span id='labority_country'></span>
                                            <input type="text" name="labority_country" value="{{ $laboritys->labority_country }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">City</label> <span id='labority_city'></span>
                                            <input type="text" name="labority_city" value="{{ $laboritys->labority_city }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">State</label> <span id='labority_state'></span>
                                            <input type="text" name="labority_state" value="{{ $laboritys->labority_state }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Address</label> <span id='labority_address'></span>
                                            <input type="text" name="labority_address" value="{{ $laboritys->labority_address }}" class="form-control">
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Details</label> <span id='labority_details'></span>
                                            <textarea name="labority_details" rows=7 class="form-control">{{ $laboritys->labority_details }}</textarea>
                                        </div>
                                    </div>
                                     
                                    <?php 
                        $days = ['1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday','7'=>'Sunday']
                    ?>
                    @php $c=1;
                            $labority_timmingsExist = DB::table('laborities_timming')->where('labority_id', $laboritys->id)->get();  
                            if($labority_timmingsExist->count() > 0){
                    @endphp        
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label class="form-label">Labority's Timming:</label>
                    </div>
					<div class="" style='margin-left:15px;width:100%;padding:20px;margin-bottom:10px;'>
						

                                @php
                                  foreach($labority_timmingsExist as $laboritytime){
                        @endphp
                        <div class=" fvrduplicate9 row">
							<div class="form-group col-sm-1 col-md-1 col-lg-1" ><p class='item_no'>{{$c}}<p></div>	
                            <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                    <input type="text" class="form-control maddress check-empty9" row-id='{{$laboritytime->dt_id}}' id="emaddress_{{$laboritytime->dt_id}}" name="emaddress[{{$laboritytime->dt_id}}]" value="{{$laboritytime->maddress}}" placeholder="Address">
                            </div>	
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
							<select class="form-control day_list day_id check-empty9" row-id='0' id="eday_name_{{$laboritytime->dt_id}}" name="eday_name[{{$laboritytime->dt_id}}]" style="width:100%;float:right;">
								<?php 
									if($days){ ?>
									<option value="">Please Select Day</option>	
								<?php
										foreach($days as $key => $day){
								?>
									<option value="<?php echo $key; ?>" @if($laboritytime->day == $key) {{'selected'}} @endif><?php echo $day; ?></option>
								<?php }}?>
							</select>
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<input type="time" class="form-control st_time check-empty9" row-id='{{$laboritytime->dt_id}}' id="est_time_{{$laboritytime->dt_id}}" name="est_time[{{$laboritytime->dt_id}}]" value="{{$laboritytime->st_time}}" placeholder="ST Time">
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<input type="time" class="form-control end_time check-empty9" id="eend_time_{{$laboritytime->dt_id}}" name="eend_time[{{$laboritytime->dt_id}}]" placeholder="END Time" value="{{$laboritytime->end_time}}">
							</div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
								<select class="form-control time_status check-empty9" id="etime_status_{{$laboritytime->dt_id}}" name="etime_status[{{$laboritytime->dt_id}}]">
									<option value="1" @if($laboritytime->time_status == '1') {{'selected'}} @endif>Active</option>
                                    <option value="0" @if($laboritytime->time_status == '0') {{'selected'}} @endif>In Active</option>
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
                        <label class="form-label">Labority's New Timming:</label> 
                    </div>
                    <div class="" style='margin-left:15px;width:100%;15px;padding:20px;margin-bottom:10px;'>
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
                    
					<br>
				

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

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


        $("#addLabority").validate({
            rules: {
                labority_fullname: {
                    required: true,
                },
                email: {
                    required: true,
                },
                password: {
                    required: false,
                },
labority_phone: {
                    required: true,
                },
                labority_address: {
                    required: false,
                },
                labority_PMDC: {
                    required: false,
                },

                labority_status: {
                    required: false,
                },

                


            },
            errorPlacement: function (error, element) {
                
                if (element.attr("name") == "labority_fullname") {
                    error.appendTo("#labority_fullname");
                }
                if (element.attr("name") == "email") {
                    error.appendTo("#email");
                }
                if (element.attr("name") == "password") {
                    error.appendTo("#password");
                }
                
                if (element.attr("name") == "labority_phone") {
                    error.appendTo("#labority_phone");
                }

                if (element.attr("name") == "labority_address") {
                    error.appendTo("#labority_address");
                }
               
                if (element.attr("name") == "labority_PMDC") {
                    error.appendTo("#labority_PMDC");
                }
                if (element.attr("name") == "labority_status") {
                    error.appendTo("#labority_status");
                }
                if (element.attr("name") == "labority_laborityType_id") {
                    error.appendTo("#labority_laborityType_id");
                }
                
            },
            messages: {
                labority_fullname: '[<span class="text-danger ">Full Name is Required</span>]',
                email: '[<span class="text-danger ">Email is Required</span>]',
                password: '[<span class="text-danger ">Password is Required</span>]',
               
                labority_phone: '[<span class="text-danger ">Phone is Required</span>]',
                labority_address: '[<span class="text-danger ">Address is Required</span>]',
                
                labority_PMDC: '[<span class="text-danger ">PMDC is Required</span>]',
                labority_status: '[<span class="text-danger ">Labority Status is Required</span>]',
                
                
                'labority_laborityType_id': '[<span class="text-danger ">Labority Type is Required</span>]',
                
            }
        });

        $(".multipleSelection").select2({
            maximumSelectionLength: 2
        });
        
        
    </script>
@endsection
