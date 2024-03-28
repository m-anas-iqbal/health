@extends('frontend.layout.master')
@section('content')
<
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
   
   

        <!-- Section Content -->
        <div class="section-content" style="margin:0 auto;width:75%;">
          <div class="row" style="background-color: #ee1638;"> 
            <div class="col-md-12">
          
            <h3 style='line-height:1.0'>Pharmacy Name: <span class="title text-white">{{--$patient_fullname--}}</span>,  Pharmacy Phone: <span class="title text-white">{{--$patient_phone--}}</span></h3>
               
            </div>
          </div>
                     
          <?php echo view('frontend/inc/header_pharmacy') ?>   
          
          <br>
          <div class="row">
            
          <h3 style='margin:0px auto;'>Create General Voucher [JV]:</h3>
          <div class="col-lg-12">
                    @if (Session::has('message'))
                            <?php $alert_class =  Session::get('alert-class');  ?>
                            <div class="alert {{ $alert_class }}">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        
                    <div id="del_news" style="display: none" class="alert alert-danger"><b>Deleted!</b>
                        Successfully!
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style='border:1px solid lightgray;margin-top:5px;border-radius:10px;'>
              <div>
                     <form name="coaform" id="coaform" class="clearfix9" action="<?php echo url('frontpharmacy/COA/storeJV'); ?>" method='post'>
                        {{ csrf_field() }}
                           <br>
                           <div class="row" style='padding:10px;'>
                              <div class="form-group col-md-6">
                                    <label for="coa_parent">Current Date: {{date('Y-m-d')}}</label><br>
                              </div>
                              <div class="form-group col-md-6">
                                    <label for="coa_parent" >A/C Name: <span id='coa_name'>ABC-pvt</span></label><br>
                                    <label for="coa_parent" id=''>A/C Code: <span id='coa_code'>101000010-00006</span></label><br>
                                    
                              </div>
                           </div>

                           

                        <?php 
                              $user_id = auth()->user()->id;
                              $days = ['1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday','7'=>'Sunday']
                        ?>
                    
					<div class="" style='margin-left:15px;width:100%;border:1px solid lightgray;border-radius:15px;padding:20px;margin-bottom:10px;'>
						<div class=" fvrduplicate row">
							<div class="form-group col-sm-1 col-md-1 col-lg-1" ><p class='item_no'>1<p></div>	
                                          <?php 
                                 $all_coas = DB::table('coas')->where('coa_type','ta')->where('user_id',$user_id)->get();
                           ?>
							<div class="form-group col-sm-3 col-md-3 col-lg-3">
                           <select class="form-control account check-empty9" row-id='0' id="coa_id_0" name="coa_id[0]" style="width:100%;float:right;">

                           @if($all_coas)
                                          <option value=''>Select Transaction Account</option>
                                    @foreach($all_coas as $coa)
                                          <option value='{{$coa->id}}'>{{$coa->coa_name}}-{{$coa->coa_code}}</option>
                                          <?php 
                                                //show 2nd levels of coa
                                                $all_coas2 = DB::table('coas')->where('parent',$coa->id)->where('user_id',$user_id)->get();
                                          ?>
                                          @if($all_coas2)
                                                @foreach($all_coas2 as $coa2)
                                                   <option value='{{$coa2->id}}'>{{$coa->coa_name}} >> {{$coa2->coa_name}}-{{$coa2->coa_code}}</option>
                                                         <?php 
                                                               //show 3rd levels of coa
                                                               $all_coas3 = DB::table('coas')->where('parent',$coa2->id)->where('user_id',$user_id)->get();
                                                         ?>
                                                         @if($all_coas3)
                                                               @foreach($all_coas3 as $coa3)
                                                                  <option value='{{$coa3->id}}'>{{$coa->coa_name}} >> {{$coa2->coa_name}} >> {{$coa3->coa_name}}</option>
                                                               @endforeach()
                                                         @endif
                                                @endforeach()
                                          @endif
                                    @endforeach()
                              @endif
                           </select>
							</div>
                     <div class="form-group col-sm-3 col-md-3 col-lg-3">
                        <input type="text" class="form-control details check-empty9" id="details_0" name="details[0]" placeholder="Description">
                     </div>
                     <div class="form-group col-sm-2 col-md-2 col-lg-2">
                        <input type="text" class="form-control dc debit check-empty9" dval='debit'  id="debit_0" row-id='0' name="debit[0]" placeholder="Debit">
                     </div>
                     <div class="form-group col-sm-2 col-md-2 col-lg-2">
                        <input type="text" class="form-control dc credit check-empty9" dval='credit' id="credit_0" row-id='0' name="credit[0]" placeholder="Credit">
                     </div>
							
			      <span><button class="btn btn-success btn-add pro-row" type="button" id="r_0"><span class="glyphicon glyphicon-plus"></span></button></span>
						</div>
						<div class="fvrclone"></div>

                                    <div class="row">
                                    <div class="form-group col-sm-5 col-md-5 col-lg-5">
                                          
                                    </div>
                                    <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                          <label>Total </label>
                                    </div>
                                    
                                    <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                          <input type="text" class="form-control total_debit check-empty9"  name="total_debit[0]" id='total_debit' placeholder="Total Debit" >
                                    </div>
                                    <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                          <input type="text" class="form-control total_credit check-empty9"  name="total_credit[0]" id='total_credit' placeholder="Total Credit" >
                                    </div>
                                    <div class="form-group col-sm-1 col-md-1 col-lg-1"></div>

                                    </div>
					</div>
					<br><br>
                                 <div class="form-group pull-right mt-10">
                                    <input type="submit" name="submit" value="Create" id='add-jv' class="btn btn-primary">
                                 </div>
                     </form>
                </div>
              </div>
            </div>
          </div>
        </div>





  </div>
  <!-- end main-content -->
@endsection

@section('js')
<script>

 $(document).on('click', '#add-jv', function(){
            var errors = [];
            var total_debit = $('#total_debit').val();
            var total_credit = $('#total_credit').val();

            if(total_debit == total_credit && (total_debit !='' || total_credit !='') ){
                  //alert('equal');
                  $('#total_debit').removeClass('error');
                  $('#total_credit').removeClass('error');
            }else{
                  //alert('not equal');
                  $('#total_debit').addClass('error');
                  $('#total_credit').addClass('error');
                  errors.push('y');
            }

            //empty account checking
            $('.account').each(function(k,v){
                  var acc_sel_id = $(this).val();
                  //if(acc_sel_id.length != '' && acc_sel_id != acc_id){
                  if(acc_sel_id.length == ''){
                        $(this).addClass('error');
                        errors.push('y');
                  }else{
                        $(this).removeClass('error');
                  }
            });

            //empty description checking
            $('.details').each(function(k,v){
                  var acc_sel_detail = $(this).val();
                  //if(acc_sel_id.length != '' && acc_sel_id != acc_id){
                  if(acc_sel_detail.length == ''){
                        $(this).addClass('error');
                        errors.push('y');
                  }else{
                        $(this).removeClass('error');
                  }
            });

            //empty credit checking
            $('.credit').each(function(k,v){
                  var acc_sel_credit = $(this).val();
                  //if(acc_sel_id.length != '' && acc_sel_id != acc_id){
                  if(acc_sel_credit.length == '' && $(this).before().val().length == ''){
                        $(this).addClass('error');
                        $(this).before().addClass('error');
                        errors.push('y');
                  }else{
                        $(this).removeClass('error');
                        $(this).before().removeClass('error');
                  }
            });

            if(errors.indexOf('y') == -1){
                  console.log('pass');
                  $('#coaform').submit();
            }else{
                  console.log('failed');
                  return false;   
            }


         
 });     

$(document).on('click, keyup', '.dc', function(e){
      var dc_val = $(this).attr('dval');
      var rowid = $(this).attr('row-id');
      console.log(dc_val);

      if(dc_val == 'debit'){
            $('#credit_'+rowid).val(0);
      }
      if(dc_val == 'credit'){
            $('#debit_'+rowid).val(0);
      }

      var total_debit = 0;
      var total_credit = 0;
      $('.debit').each(function(k,v){
            var debit_val = parseInt($(this).val());
            if(isNaN(debit_val)) debit_val = 0;
            total_debit += debit_val;
      });
      $('#total_debit').val(total_debit);

      $('.credit').each(function(k,v){
            var credit_val = parseInt($(this).val());
            if(isNaN(credit_val)) credit_val = 0;
            total_credit += credit_val;
      });
      $('#total_credit').val(total_credit);
});

$(document).on('change', '.account', function(e){
      var acc_id = $(this).val();
      
      $.ajax({
            type:'post',
            url:"{{url('frontpharmacy/COA/getSelTA')}}",
            data:{"_token": "{{ csrf_token() }}",acc_id:acc_id,},
            dataType:'json',
            success:function(data){
                  console.log('success');
                  console.log(data);
                  var new_opt = '<option value="">Select Transaction Account</option>';
                  var ta_data = data.ta_data;
                  $('#coa_name').html(ta_data.coa_name);
                  $('#coa_code').html(ta_data.coa_code);
                  
            },
            error:function(data){
                  console.log('success');
                  console.log(data.responseText);
            }
      });

      //console.log(acc_id);
      /*if(jQuery.inArray("test", myarray) != -1) {
      console.log("is in array");
      } else {
      console.log("is NOT in array");
      } */
                                                            /*var acc_id_arr = [];
                                                            if(acc_id.length !='') acc_id_arr.push(acc_id);
                                                            $('.account').each(function(k,v){
                                                                  var acc_sel_id = $(this).val();
                                                                  //if(acc_sel_id.length != '' && acc_sel_id != acc_id){
                                                                  if(acc_sel_id.length != ''){
                                                                  console.log(acc_sel_id);
                                                                  acc_id_arr.push(acc_sel_id);
                                                                  }
                                                            });*/
                                                            //console.log(acc_id_arr);
                                                            //get all transaction accounts except acc_id_arr
                                                            /*$.ajax({
                                                                  type:'post',
                                                                  url:"{{url('frontpharmacy/COA/getSelTA')}}",
                                                                  data:{"_token": "{{ csrf_token() }}",acc_id_arr:[],},
                                                                  dataType:'json',
                                                                  success:function(data){
                                                                        //console.log('success');
                                                                        //console.log(data);
                                                                        var new_opt = '<option value="">Select Transaction Account</option>';
                                                                        var ta_lists = data.ta_list;
                                                                        console.log(acc_id_arr);
                                                                        $.each(ta_lists, function(k, v){
                                                                              //console.log(v.id + ' - ' + v.coa_name);
                                                                              new_opt += '<option value="'+v.id+'"'; 
                                                                              //if( acc_id_arr.indexOf('v.id') != -1){ new_opt += ' disabled="disabled"'; console.log('present => '+v.id);}else{new_opt += ' no in';}
                                                                              $.each(acc_id_arr, function(ki, kv){
                                                                                    if( v.id == kv){ 
                                                                                          ///console.log('present => '+v.id);
                                                                                          new_opt += ' disabled="disabled"';
                                                                                    }
                                                                              });
                                                                              new_opt += '>'+v.coa_name+' mm </option>';
                                                                        });
                                                                        $('.account').each(function(k,v){
                                                                              var acc_sel_id = $(this).val();
                                                                              if(acc_sel_id.length == ''){
                                                                                    $(this).html(new_opt);
                                                                              }else{
                                                                                    var new_opt2 = '<option value="">Select Transaction Account</option>';
                                                                                    var ta_lists = data.ta_list;
                                                                                    $.each(ta_lists, function(k, v){
                                                                                          new_opt2 += '<option value="'+v.id+'" ';
                                                                                          if(v.id == acc_sel_id){ new_opt2 += ' selected'; }
                                                                                          if( acc_id_arr.indexOf(v.id) != -1){ new_opt2 += ' disabled="disabled"';  console.log('present2 => '+v.id);}
                                                                                          
                                                                                          new_opt2 += '>'+v.coa_name+' nn </option>';
                                                                                    }); 
                                                                                    $(this).html(new_opt2);
                                                                              }
                                                                        });
                                                                  },
                                                                  error:function(data){
                                                                        console.log('success');
                                                                        console.log(data.responseText);
                                                                  }
                                                            });*/
});

$(document).on('click', '.btn-add', function(e)
      {
        console.log('btn-add has clicked');
			var row_id = $(this).attr('id');
			var row_arr = row_id.split('_');
	
            var newrow_counter =  parseInt(row_arr[1]) + 1; 
			var row = "<div class='fvrclonned row '>";
			row += "<div class='form-group col-sm-1 col-md-1 col-lg-1' ><p class='item_no'>"+newrow_counter+"<p></div>";	

         row += "<div class='form-group col-sm-3 col-md-3 col-lg-3'>";  
            row += "<select name='coa_id["+newrow_counter+"]' class='form-control  account check-empty9' row-id='"+newrow_counter+"' id='coa_id"+newrow_counter+"' style='width:100%;float:right;'>";
            //row += "<option value=''>Select Day</option>";

            @if($all_coas)
                        row += "<option value=''>Select Transaction Account</option>";
                  @foreach($all_coas as $coa)
                  row += "<option value='{{$coa->id}}'>{{$coa->coa_name}}-{{$coa->coa_code}}</option>";
                        <?php 
                              //show 2nd levels of coa
                              $all_coas2 = DB::table('coas')->where('parent',$coa->id)->get();
                        ?>
                        @if($all_coas2)
                              @foreach($all_coas2 as $coa2)
                              row += "<option value='{{$coa2->id}}'>{{$coa->coa_name}} >> {{$coa2->coa_name}}-{{$coa2->coa_code}}</option>";
                                       <?php 
                                             //show 3rd levels of coa
                                             $all_coas3 = DB::table('coas')->where('parent',$coa2->id)->get();
                                       ?>
                                       @if($all_coas3)
                                             @foreach($all_coas3 as $coa3)
                                             row += "<option value='{{$coa3->id}}'>{{$coa->coa_name}} >> {{$coa2->coa_name}} >> {{$coa3->coa_name}}</option>";
                                             @endforeach()
                                       @endif
                              @endforeach()
                        @endif
                  @endforeach()
            @endif


			row += "</select>";
			row += "</div>";
			
         row += "<div class='form-group col-sm-3 col-md-3 col-lg-3'>";
			row += "<input type='text' class='form-control details check-empty9' row-id='"+newrow_counter+"' id='details_"+newrow_counter+"' name='details["+newrow_counter+"]' placeholder='Description'>";
			row += "</div>";

         row += "<div class='form-group col-sm-2 col-md-2 col-lg-2'>";
			row += "<input type='text' class='form-control dc debit check-empty9' dval='debit' row-id='"+newrow_counter+"' id='debit_"+newrow_counter+"' name='debit["+newrow_counter+"]' placeholder='Debit'>";
			row += "</div>";

                  row += "<div class='form-group col-sm-2 col-md-2 col-lg-2'>";
			row += "<input type='text' class='form-control dc credit check-empty9' dval='credit' row-id='"+newrow_counter+"' id='credit_"+newrow_counter+"' name='credit["+newrow_counter+"]' placeholder='Credit'>";
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



                  /*var acc_id_arr = [];
                  $('.account').each(function(k,v){
                        var acc_sel_id = $(this).val();
                        if(acc_sel_id.length != ''){
                              acc_id_arr.push(acc_sel_id);
                        }
                  });

                  //get all transaction accounts except acc_id_arr
                  $.ajax({
                        type:'post',
                        url:"{{url('frontpharmacy/COA/getSelTA')}}",
                        data:{"_token": "{{ csrf_token() }}",acc_id_arr:[]},
                        dataType:'json',
                        success:function(data){
                              console.log('success');
                              console.log(data);
                              var new_opt = '<option value="">Select Transaction Account</option>';
                              var ta_lists = data.ta_list;
                              console.log(acc_id_arr);
                              $.each(ta_lists, function(k, v){
                                    //console.log(v.id + ' - ' + v.coa_name);
                                    new_opt += '<option value="'+v.id+'"'; 
                                    //if( acc_id_arr.indexOf('v.id') != -1){ new_opt += ' disabled="disabled"'; console.log('present => '+v.id);}else{new_opt += ' no in';}
                                    $.each(acc_id_arr, function(ki, kv){
                                          if( v.id == kv){ 
                                                ///console.log('present => '+v.id);
                                                new_opt += ' disabled="disabled"';
                                          }
                                    });
                                    new_opt += '>'+v.coa_name+' mm </option>';
                              });
                              $('.account').each(function(k,v){
                                    var acc_sel_id = $(this).val();
                                    if(acc_sel_id.length == ''){
                                          $(this).html(new_opt);
                                    }else{
                                          var new_opt2 = '<option value="">Select Transaction Account</option>';
                                          var ta_lists = data.ta_list;
                                          $.each(ta_lists, function(k, v){
                                                new_opt2 += '<option value="'+v.id+'" ';
                                                if(v.id == acc_sel_id){ new_opt2 += ' selected'; }
                                                if( acc_id_arr.indexOf(v.id) != -1){ new_opt2 += ' disabled="disabled"';  console.log('present2 => '+v.id);}
                                                
                                                new_opt2 += '>'+v.coa_name+' nn </option>';
                                          }); 
                                          $(this).html(new_opt2);
                                    }
                              });*/
                              /*var new_opt = '<option value="">Select Transaction Account</option>';
                              var ta_lists = data.ta_list;
                              $.each(ta_lists, function(k, v){
                                    //console.log(v.id + ' - ' + v.coa_name);
                                    new_opt += '<option value="'+v.id+'">'+v.coa_name+'</option>';
                              });
                              $('.account').each(function(k,v){
                                    var acc_sel_id = $(this).val();
                                    if(acc_sel_id.length == ''){
                                          $(this).html(new_opt);
                                    }
                              });*/

                              /*var new_opt = '<option value="">Select Transaction Account</option>';
                              var ta_lists = data.ta_list;
                              $.each(ta_lists, function(k, v){
                                    //console.log(v.id + ' - ' + v.coa_name);
                                    new_opt += '<option value="'+v.id+'">'+v.coa_name+'</option>';
                              });
                              $('.account').each(function(k,v){
                                    var acc_sel_id = $(this).val();
                                    if(acc_sel_id.length == ''){
                                          $(this).html(new_opt);
                                    }else{
                                          var new_opt = '<option value="">Select Transaction Account</option>';
                                          var ta_lists = data.ta_list;
                                          $.each(ta_lists, function(k, v){
                                                new_opt += '<option value="'+v.id+'" ';
                                                if(v.id == acc_sel_id){ new_opt += ' selected'; }
                                                new_opt += '>'+v.coa_name+'</option>';
                                          }); 
                                          $(this).html(new_opt);
                                    }
                              });*/

                        //},
                        //error:function(data){
                              //console.log('success');
                              //console.log(data.responseText);
                        //}
                  //});
            
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

                  //recalculate total debit and total credit
                  
                  var total_debit = 0;
                  var total_credit = 0;
                  $('.debit').each(function(k,v){
                        var debit_val = parseInt($(this).val());
                        if(isNaN(debit_val)) debit_val = 0;
                        total_debit += debit_val;
                  });
                  $('#total_debit').val(total_debit);

                  $('.credit').each(function(k,v){
                        var credit_val = parseInt($(this).val());
                        if(isNaN(credit_val)) credit_val = 0;
                        total_credit += credit_val;
                  });
                  $('#total_credit').val(total_credit);
                              
                        e.preventDefault();
                        return false;
                  });

       </script>
@endsection
