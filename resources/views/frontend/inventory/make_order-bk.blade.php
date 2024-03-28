@extends('frontend.layout.master')
@section('content')
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">


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
                  <form name="coaform" id="coaform" class="clearfix9" action="<?php echo url('frontpharmacy/inventory/store99'); ?>" method='post'>
                    {{ csrf_field() }}
                    <br>
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
                     <div class="row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="coa_name">Search Product:</label></div>
                        <div class="form-group col-md-6">
                           
                           <!-- <input id="searchproduct" name="product_search" class="form-control" type="text"> -->
                           <select name="product_search" class="form-control chosen-select" multiple>
                              <option >Please Select Product</option>
                              @if($products)
                                 @foreach($products as $prod)
                                    <option value="{{$prod->id}}">{{$prod->name}}</option>
                                 @endforeach
                              @endif   
                           </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>

                     <div class="form-group pull-right mt-10">
                        <input type="submit" name="submit" value="Create" class="btn btn-primary">
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

$(".chosen-select").chosen()
</script>
@endsection
