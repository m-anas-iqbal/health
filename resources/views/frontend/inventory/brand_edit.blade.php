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
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                <?php /*<li role="presentation" class="active">
                     <a href="#orders" aria-controls="orders" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="false">Upcomming Pharmacy Orders
                        <?php //<span class="badge"></span> ?>
                     </a>
                  </li>*/ ?>
                 
                  <?php /*<li role="presentation" class="">
                     <a href="#accounting" aria-controls="accounting" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="true">Accounting
                        <span class="badge">3</span>
                     </a>
                  </li>*/ ?>
                  <?php /*<li role="presentation" class=""><a href="#bookmarks" aria-controls="bookmarks" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="false">Contact Us <span class="badge">5</span></a></li>
                  */ ?>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="orders">
                   
                    
                    
                  <h3 style='margin:0px auto;'>Edit Brand:</h3>
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
                       
                     }else{
                       
                     }
              ?>
                     
                  <form name="coaform" id="coaform" class="clearfix9" action="<?php echo url('frontpharmacy/inventory/addEditBrandProcess'); ?>" method='post'>
                    {{ csrf_field() }}
                    <input type="hidden" name='id' @if($brand) value="{{$brand->id}}"  @endif/>

                     <div class="row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="brand_name">Brand Name:</label></div>
                        <div class="form-group col-md-6">
                           <input id="brand_name" name="brand_name" @if($brand) value="{{$brand->name}}" @endif class="form-control" type="text" style='border:1px solid lightgray;' required>
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>

                     <div class="row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="brand_name">Brand Description:</label></div>
                        <div class="form-group col-md-6">
                           <input id="brand_name" name="brand_description" @if($brand) value="{{$brand->description}}" @endif class="form-control" type="text" style='border:1px solid lightgray;'>
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>

                     <div class="row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="brand_name">Brand Status:</label></div>
                        <div class="form-group col-md-6">
                           <select class="form-control" name="brand_status" style='border:1px solid lightgray;'>
                              <option value="1" @if($brand && $brand->status == '1') {{' selected'}} @endif>Active</option>
                              <option value="0" @if($brand && $brand->status == '0') {{' selected'}} @endif>Inactive</option>
                           </select>

                           <!-- <input id="brand_name" name="brand_description" @if($brand) value="{{$brand->description}}" @endif class="form-control" type="text"> -->
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>



                     <div class="form-group pull-right mt-10">
                        <input type="submit" name="submit" value="Edit" class="btn btn-primary">
                     </div>
                  </form>
              </div>


          </div>
                  
                  
                  
                  
                  
                  
                  
                  </div>

                  <div role="tabpanel" class="tab-pane " id="accounting">
                    
                  </div>
                  <?php /*<div role="tabpanel" class="tab-pane" id="bookmarks">
                    <table class="table">
                       <tbody>
                          <tr>
                             <th scope="row"><img src="#" alt=""></th>
                             <td><h4>Web Development Course</h4>
                             </td><td><h4>$127.50</h4>
                             </td><td><h4><a href="#"><i class="fa fa-close"></i></a></h4>
                          </td></tr>
                          <tr>
                             <th scope="row"><img src="#" alt=""></th>
                             <td><h4>Software Development Course</h4>
                             </td><td><h4>$127.50</h4>
                             </td><td><h4><a href="#"><i class="fa fa-close"></i></a></h4>
                          </td></tr>
                          <tr>
                             <th scope="row"><img src="#" alt=""></th>
                             <td><h4>App Development Course</h4>
                             </td><td><h4>$127.50</h4>
                             </td><td><h4><a href="#"><i class="fa fa-close"></i></a></h4>
                          </td></tr>
                          <tr>
                             <th scope="row"><img src="#" alt=""></th>
                             <td><h4>Photoshop Course</h4>
                             </td><td><h4>$127.50</h4>
                             </td><td><h4><a href="#"><i class="fa fa-close"></i></a></h4>
                          </td></tr>
                       </tbody>
                    </table>
                  </div>*/ ?>
                </div>
              </div>
            </div>
          </div>
        </div>





  </div>
  <!-- end main-content -->
@endsection

@section('js')
@endsection
