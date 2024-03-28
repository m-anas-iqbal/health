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
            <h3 style='line-height:1.0'>Pharmacy Name: <span class="title text-white">{{$patient_fullname}}</span>,  Pharmacy Phone: <span class="title text-white">{{$patient_phone}}</span></h3>
               
            </div>
          </div>
                     
          <?php echo view('frontend/inc/header_pharmacy') ?>   
          
          <br>
          <div class="row">
            
          <h3 style='margin:0px auto;'>Create Chart of Account:</h3>
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
                  <form name="coaform" id="coaform" class="clearfix9" action="<?php echo url('frontpharmacy/COA/store'); ?>" method='post'>
                    {{ csrf_field() }}

                     <br>
                     <div class="row" style='padding:10px;'>
                        
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="coa_parent">COA Parent:</label></div>
                        <div class="form-group col-md-6">
                           <?php 
                                 $user_id = auth()->user()->id;
                                 $all_coas = DB::table('coas')->where('parent',0)->where('user_id',$user_id)->get();
                           ?>
                           <select id="coa_parent" name="coa_parent" class="form-control">
                              
                              <option value=''>Please Select COA Parent</option>

                              @if($all_coas)
                                    @foreach($all_coas as $coa)
                                          <option value='2_{{$coa->id}}_{{$coa->id}}_{{$coa->family_code}}'>{{$coa->coa_name}}-{{$coa->coa_code}}</option>
                                          <?php 
                                                //show 2nd levels of coa
                                                $all_coas2 = DB::table('coas')->where('parent',$coa->id)->where('user_id',$user_id)->get();
                                          ?>
                                          @if($all_coas2)
                                                @foreach($all_coas2 as $coa2)
                                                   <option value='3_{{$coa2->id}}_{{$coa->id}}_{{$coa->family_code}}'>{{$coa->coa_name}} >> {{$coa2->coa_name}}-{{$coa2->coa_code}}</option>
                                                         
                                                         <?php 
                                                               /*//show 3rd levels of coa
                                                               $all_coas3 = DB::table('coas')->where('parent',$coa2->id)->get();
                                                         ?>
                                                         @if($all_coas3)
                                                               @foreach($all_coas3 as $coa3)
                                                                  <option value='4_{{$coa3->id}}_{{$coa->id}}'>{{$coa->coa_name}} >> {{$coa2->coa_name}} >> {{$coa3->coa_name}}</option>

                                                               @endforeach()
                                                         @endif
                                                         <?php */ ?>

                                                @endforeach()
                                          @endif
                                    @endforeach()
                              @endif
                              
                           </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>

                     <div class="row">
                     <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-2"><label for="coa_name">COA Name:</label></div>
                        <div class="form-group col-md-6">
                           
                           <input id="coa_name" name="coa_name" class="form-control" type="text">
                        </div>
                        <div class="form-group col-md-2"></div>
                     </div>

                        <div class="form-group pull-right mt-10">
                           <input type="submit" name="submit" value="Create" class="btn btn-primary">
                        </div>

                     </div>

                </form>
              </div>
            </div>

          </div>
          
        </div>





  </div>
  <!-- end main-content -->
@endsection

@section('js')

@endsection
