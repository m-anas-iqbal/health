@extends('frontend.layout.master')
@section('content')
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
<style>
   .error {border:1px solid lightpink;}
</style>

   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
   
   

        <!-- Section Content -->
        <div class="section-content" style="margin:0 auto;width:75%;">
          <div class="row" style="background-color: #ee1638;"> 
            <div class="col-md-12">
            <?php 
                     if( Auth::guard('frontpharmacy')->user() ){
                        $patient_id = Auth::guard('frontpharmacy')->user()->id;
                        $patient_nameExist = DB::table('pharmacies')->where('id', $patient_id)->get();
                        if($patient_nameExist->count() > 0){
                           $patient_fullname = $patient_nameExist->first()->pharmacy_fullname;
                           $patient_phone = $patient_nameExist->first()->pharmacy_phone;
                        }else{
                           $patient_fullname = '';
                           $patient_phone = '';
                        }
                     }else{
                        $patient_fullname = '';
                        $patient_phone = '';
                     }
            ?>
            <h3 style='line-height:1.0'> Pharmacy Name: <span class="title text-white">{{$patient_fullname}}</span>,  Pharmacy Phone: <span class="title text-white">{{$patient_phone}}</span></h3>
               
            </div>
          </div>
                     
          <?php echo view('frontend/inc/header_pharmacy') ?>  
          
          <br>
          <div class="row">
            
          <h3 style='margin:0px auto;'>Make an Order:</h3>
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
            <form name="coaform" id="coaform" class="clearfix9" action="<?php echo url('frontpharmacy/COA/storeJV9'); ?>" method='post'>
                        {{ csrf_field() }}
                           <br>
                           <div class="row" style='padding:10px;'>
                              
                              <div class="form-group col-md-6">
                                    <label for="coa_parent" >Patient Name: </label>
                                    <input type='text' name='abc' value="@if($order_data) {{$order_data->patient_fullname}} @endif" class="form-control" required readonly/>
                              </div>
                              <div class="form-group col-md-6">
                                    <label for="coa_parent" >Patient Phone: </label>
                                    <input type='text' name='abc' value="@if($order_data) {{$order_data->patient_phone}} @endif" class="form-control" required readonly/>
                              </div>
                              <div class="form-group col-md-6">
                                    <label for="coa_parent">Patient Address: </label>
                                    <textarea  class="form-control" required readonly>@if($order_data) {{$order_data->patient_address}} @endif</textarea>
                              </div>
                              <div class="form-group col-md-6">
                                    <label for="coa_parent">Pharmist's Comments: </label>
                                    <textarea  class="form-control"></textarea>
                              </div>

                              <div class="form-group col-md-6">
                                    <label for="coa_parent" >Patient IBFT: </label>
                                    <input type='text' name='ibft' value="@if($order_data) {{$order_data->ibft_no}} @endif" class="form-control" required readonly/>
                              </div>
                              <div class="form-group col-md-6">
                                    <label for="coa_parent" >Patient Amount: </label>
                                    <input type='text' name='amount' id='patient_amount' value="@if($order_data) {{$order_data->fees}} @endif" class="form-control" required readonly/>
                              </div>

                           </div>

                           

                        <?php 
                              $user_id = auth()->user()->id;
                              $days = ['1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday','7'=>'Sunday']
                        ?>
                    
					<div class="" style='margin-left:0px;width:100%;border:1px solid lightgray;border-radius:15px;padding:20px;margin-bottom:10px;'>
                     <div class="row" style='background:lightgray;margin-bottom:10px;'>
                           <div class="form-group col-sm-1 col-md-1 col-lg-1">SNO</div>
                           <div class="form-group col-sm-3 col-md-3 col-lg-3">Product</div>
                           <div class="form-group col-sm-2 col-md-2 col-lg-2">Price</div>
                           <div class="form-group col-sm-1 col-md-1 col-lg-1">Rem Qty</div>
                           <div class="form-group col-sm-1 col-md-1 col-lg-1">Quantity</div>
                           <div class="form-group col-sm-1 col-md-1 col-lg-1">Discount(%)</div>
                           <div class="form-group col-sm-3 col-md-3 col-lg-3">Sub Total</div>
                     </div>
						<div class=" fvrduplicate row">
							<div class="form-group col-sm-1 col-md-1 col-lg-1" ><p class='item_no'>1<p></div>	
                     <?php 
                              if( Auth::guard('frontpharmacy')->user() ){
                                 $patient_id = Auth::guard('frontpharmacy')->user()->id;
                                 //get all orders of this user
                                 $productExist = DB::table('product as p')
                                                         //->join('patients as p', 'od.patient_id', 'p.id')
                                                         //->join('pharmacies as do', 'do.id', 'od.pharmacy_id')
                                                         ->where('p.pharmacy_id', $patient_id)->get();
                                 if($productExist->count() > 0){
                                    $products = $productExist; 
                                 }else{
                                       $products = false; 
                                 }
                              }else{
                                 $products = false; 
                              }
                     ?>
							<div class="form-group col-sm-3 col-md-3 col-lg-3">
                           <select class="form-control account product check-empty9" row-id='0' id="product_0" name="product[0]" style="width:100%;float:right;">
                              <option >Please Select Product</option>
                                 @if($products)
                                    @foreach($products as $prod)
                                       <option value="{{$prod->id}}">{{$prod->name}}</option>
                                    @endforeach
                                 @endif   
                           </select>
							</div>
                     <div class="form-group col-sm-2 col-md-2 col-lg-2">
                        <input type="text" class="form-control price check-empty9" id="price_0" name="price[0]" placeholder="Price" readonly>
                     </div>
                     <div class="form-group col-sm-1 col-md-1 col-lg-1">
                        <input type="text" class="form-control dc rem_qty check-empty9" dval='debit'  id="rem_qty_0" row-id='0' name="rem_qty[0]" placeholder="Rem Qty" readonly>
                     </div>
                     <div class="form-group col-sm-1 col-md-1 col-lg-1">
                        <input type="number" class="form-control dc qty check-empty9" dval='debit'  id="qty_0" row-id='0' name="qty[0]" placeholder="Qty">
                     </div>
                     <div class="form-group col-sm-1 col-md-1 col-lg-1">
                        <input type="text" class="form-control dc discount check-empty9" dval='credit' id="discount_0" row-id='0' name="discount[0]" placeholder="Discount(%)">
                     </div>
							<div class="form-group col-sm-2 col-md-2 col-lg-2">
                        <input type="text" class="form-control sub_total check-empty9" id="sub_total_0" name="sub_total[0]" placeholder="Sub Total">
                     </div>
			      <span><button class="btn btn-success btn-add pro-row" type="button" id="r_0"><span class="glyphicon glyphicon-plus"></span></button></span>
						</div>
						<div class="fvrclone"></div>
                     <div class="row">
                           <div class="form-group col-sm-5 col-md-5 col-lg-5"></div>
                           <div class="form-group col-sm-2 col-md-2 col-lg-2"></div>

                           <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                 <label>Total Amount</label>
                           </div>
                           
                           <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                 <input type="text" class="form-control total_amount check-empty9"  name="total_amount[0]" id='total_amount' placeholder="Total Amount" >
                           </div>
                           
                           <div class="form-group col-sm-1 col-md-1 col-lg-1"></div>
                     </div>
					</div>
					                  <br><br>
                                 <div class="form-group pull-right mt-10">
                                    <input type="submit" name="submit" value="Save Order" id='save-order' class="btn btn-primary">
                                 </div>
                     </form>
              </div>
            </div>
        </div>
  </div>
  <!-- end main-content -->
@endsection

@section('js')
<!-- JS -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<script>

   

     $(function() {

$("#searchproduct").autocomplete({                
          source: function (request, response) {
              //console.log('call');
              console.log(request.term);
              $.ajax({
                  type: "post",
                  url: "{{url('frontpharmacy/inventory/searchProduct')}}",
                  dataType: "json",
                  data:{
                      "_token": "{{ csrf_token() }}", 
                      "s_key": request.term
                  },
                  success: function (data) {
                      console.log('success');
                      console.log(data);
                      response($.map(data, function (item) {  
                          console.log('success item');
                          console.log(item);
                          //console.log(item.doctors[0].doctor_fullname);                        
                          //var AC = new Object();
                          //$.each(item, function(k, v){
                              //autocomplete default values REQUIRED
                              //AC.label = v.doctor_fullname;
                            // AC.value = v.doctor_fullname;    
                          //});    
                          
                          return item;
                          
                      })/**/
                      //return data;
                      );       
                  },error:function(data){
                      console.log('error');
                      console.log(data.responseText);
                  }                                             
              });
          },
          minLength: 3,
          select: function (event, ui) { 
              console.log(ui);   
              $('#searchform').submit();                
          }                    
      }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
          .data("item.autocomplete", item)
              .append(item.label)
              .appendTo(ul);
      };//$("#searchproduct").autocomplete

     
});

$(".chosen-select").chosen();

$(document).on('click', '.btn-add', function(e)
      {
        console.log('btn-add has clicked');
			var row_id = $(this).attr('id');
			var row_arr = row_id.split('_');
	
            var newrow_counter =  parseInt(row_arr[1]) + 1; 
			var row = "<div class='fvrclonned row '>";
			row += "<div class='form-group col-sm-1 col-md-1 col-lg-1' ><p class='item_no'>"+newrow_counter+"<p></div>";	

         row += "<div class='form-group col-sm-3 col-md-3 col-lg-3'>";  
            row += "<select name='product["+newrow_counter+"]' class='form-control product account check-empty9' row-id='"+newrow_counter+"' id='product"+newrow_counter+"' style='width:100%;float:right;'>";
            
            @if($products)
                     row += "<option value=''>Please Select Product</option>";
                  @foreach($products as $prod)
                     row += "<option value='{{$prod->id}}'>{{$prod->name}}</option>";
                  @endforeach()
            @endif

			row += "</select>";
			row += "</div>";
			
         row += "<div class='form-group col-sm-2 col-md-2 col-lg-2'>";
			row += "<input type='text' class='form-control price check-empty9' row-id='"+newrow_counter+"' id='price_"+newrow_counter+"' name='price["+newrow_counter+"]' placeholder='Price' readonly>";
			row += "</div>";

         row += "<div class='form-group col-sm-1 col-md-1 col-lg-1'>";
			row += "<input type='text' class='form-control dc rem_qty check-empty9' dval='debit' row-id='"+newrow_counter+"' id='rem_qty_"+newrow_counter+"' name='rem_qty["+newrow_counter+"]' placeholder='Rem Qty' readonly>";
			row += "</div>";

         row += "<div class='form-group col-sm-1 col-md-1 col-lg-1'>";
			row += "<input type='number' class='form-control dc qty check-empty9' dval='debit' row-id='"+newrow_counter+"' id='qty_"+newrow_counter+"' name='qty["+newrow_counter+"]' placeholder='Qty'>";
			row += "</div>";

                  row += "<div class='form-group col-sm-1 col-md-1 col-lg-1'>";
			row += "<input type='text' class='form-control dc discount check-empty9' dval='credit' row-id='"+newrow_counter+"' id='discount_"+newrow_counter+"' name='discount["+newrow_counter+"]' placeholder='Discount(%)'>";
			row += "</div>"; 
         
         row += "<div class='form-group col-sm-2 col-md-2 col-lg-2'>";
			row += "<input type='text' class='form-control sub_total check-empty9' row-id='"+newrow_counter+"' id='sub_total_"+newrow_counter+"' name='sub_total["+newrow_counter+"]' placeholder='Sub Total'>";
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

                  function getTotal(){
                     total_amount = 0;
                     $('.sub_total').each(function(k, v){
                           //console.log($(this).val());
                           var sub_total = parseFloat($(this).val());
                           total_amount = total_amount + sub_total;
                     });
                     $('#total_amount').val(total_amount);
                  }

                  //product price and quantity
                  $(document).on('change', '.product',function(){
                     var product_id = $(this).val();
                     var row_id = $(this).attr('row-id');

                   
                     
                     //console.log(product_id);
                     $.ajax({
                        type:'post',
                        url:"{{url('frontpharmacy/inventory/getProductData')}}",
                        data:{_token:"{{csrf_token()}}", product_id:product_id},
                        dataType:'json',
                        success:function(data){
                              //console.log('success');
                              //console.log(data);
                              //console.log('row-id => ' + row_id);
                              if(data.status == true){
                                 var product = data.product_data;
                                 //console.log('product price => ' + product.price);
                                 $('#price_'+row_id).val(product.price);
                                 //$('#qty_'+row_id).val(product.quantity);
                                 $('#qty_'+row_id).val(1);
                                 $('#rem_qty_'+row_id).val(product.quantity);

                                 var discount = $('#discount_'+row_id).val();
                                 var price = $('#price_'+row_id).val();
                                 var qty = $('#qty_'+row_id).val();

                                 if(isNaN(discount)) discount = 0;
                                 if(isNaN(price)) price = 0;

                                 var discounted_price = price*discount/100;
                                 var sub_total = (qty*(price-discounted_price)).toFixed(2)

                                 $('#sub_total_'+row_id).val(sub_total);

                                 //total
                                 getTotal();
                              }
                              
                        },
                        error:function(data){
                              console.log('error');
                              console.log(data.responseText);
                        }
                     });
                  });

                  function getSubTotal(){

                  }

                  //get discount 
                  $(document).on('keyup change', '.discount, .qty, .price',function(){
                    
                     var row_id = $(this).attr('row-id');
                     var discount = $('#discount_'+row_id).val();
                     var price = $('#price_'+row_id).val();
                     var qty = $('#qty_'+row_id).val();

                     if(isNaN(discount)) discount = 0;
                     if(isNaN(price)) price = 0;

                     var discounted_price = price*discount/100;
                     var sub_total = (qty*(price-discounted_price)).toFixed(2)

                     $('#sub_total_'+row_id).val(sub_total);
                     
                     //total
                     getTotal();

                     //console.log(product_id);
               
                  });

                  //save-order
                  $(document).on( 'click','#save-order', function(e){
                     e.preventDefault();
                     var total_amount = parseInt($('#total_amount').val());
                     var patient_amount = parseInt($('#patient_amount').val());
console.log('total_amount => '+total_amount);
console.log('patient_amount => '+patient_amount);
                     if(total_amount == patient_amount){
                           $('#total_amount').removeClass('error');
                           $('#patient_amount').removeClass('error');
                     }else{
                           $('#total_amount').addClass('error');
                           $('#patient_amount').addClass('error');
                     }

                  });

               
</script>
@endsection
