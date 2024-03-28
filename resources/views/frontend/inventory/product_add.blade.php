@extends('frontend.layout.master')
@section('content')
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
            <div class="col-xs-12 col-sm-12 col-md-12">
            
              <?php 
                     if( Auth::guard('frontpharmacy')->user() ){
                        $pharmacy_id = Auth::guard('frontpharmacy')->user()->id;
                        //get all enabled categories 
                        $categories = DB::table('category')->where('parent_id', 0)->where('pharmacy_id', $pharmacy_id)->where('status', 1)->get();

                        $brands = DB::table('brand')->where('pharmacy_id', $pharmacy_id)->where('status', 1)->get();
                     }else{
                        $pharmacy_id = false; 
                        $categories = false;
                        $brands = false;
                     }
              ?>
            </div>

            <h3 style='margin:0px auto;'>Create Product:</h3>
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
              <?php 
                     if( Auth::guard('frontpharmacy')->user() ){
                        $patient_id = Auth::guard('frontpharmacy')->user()->id;
                        //get all orders of this user
                        $patientOrdersExist = DB::table('order_pharmacies as od')
                                                ->join('patients as p', 'od.patient_id', 'p.id')
                                                ->join('pharmacies as do', 'do.id', 'od.pharmacy_id')
                                                ->where('od.pharmacy_id', $patient_id)->get();
                        if($patientOrdersExist->count() > 0){
                             $p_orders = $patientOrdersExist; 
                        }else{
                              $p_orders = false; 
                        }
                     }else{
                        $p_orders = false; 
                     }
              ?>
                  <form name="coaform" id="coaform" class="clearfix9" action="<?php echo url('frontpharmacy/inventory/addEditProductProcess'); ?>" method='post'>
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="product_name">Product Category:</label></div>
                        <div class="form-group col-md-6">
                           <select class="form-control" name="product_cat" style='border:1px solid lightgray;' required>
                           @if($categories)
                           <option value=''>Select Category</option>
                              @foreach($categories as $cat1)
                                 <?php 
                                    //get second category
                                    $categories2 = DB::table('category')->where('parent_id', $cat1->id)->where('pharmacy_id', $pharmacy_id)->where('status', 1)->get();
                                 ?>
                                    @if($categories2)
                                       @foreach($categories2 as $cat2)
                                             <option value="{{$cat1->id}}_{{$cat2->id}}">{{$cat1->name}} >> {{$cat2->name}}</option>   
                                       @endforeach
                                    @endif 

                              @endforeach
                           @endif
                              
                              
                           </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>

                     <div class="row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="product_brand">Product Brand:</label></div>
                        <div class="form-group col-md-6">
                           <select class="form-control" name="product_brand" style='border:1px solid lightgray;' required>
                                 @if($brands)
                                    <option value=''>Select Brand</option>
                                    @foreach($brands as $brand)
                                             <option value="{{$brand->id}}">{{$brand->name}}</option>   
                                    @endforeach
                                 @endif
                           </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>
                     

                     <div class="row" style='margin-top:20px;'>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="product_name">Product Name:</label></div>
                        <div class="form-group col-md-6">
                           <input id="product_name" name="product_name" class="form-control" type="text" style='border:1px solid lightgray;' required>
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>

                     <div class="row" style='margin-top:20px;'>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="product_price">Product Price:</label></div>
                        <div class="form-group col-md-6">
                           <input id="product_price" name="product_price" class="form-control" type="text" style='border:1px solid lightgray;' required>
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>

                     <div class="row" style='margin-top:20px;'>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="product_quantity">Product Quantity:</label></div>
                        <div class="form-group col-md-6">
                           <input id="product_quantity" name="product_quantity" class="form-control" type="text" style='border:1px solid lightgray;' required>
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>

                     <div class="row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="product_name">Product Description:</label></div>
                        <div class="form-group col-md-6">
                           <input id="product_name" name="product_description" class="form-control" type="text" style='border:1px solid lightgray;'>
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>

                     <div class="row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="product_name">Product Status:</label></div>
                        <div class="form-group col-md-6">
                           <select class="form-control" name="product_status" style='border:1px solid lightgray;'>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
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
@endsection
