@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <div class="section-content" style="margin:0 auto;width:75%;">
         <div class="row" style="background-color: #ee1638;"> 
            <div class="col-md-12">
            <?php 
                     if( Auth::guard('frontdoctor')->user() ){
                        $patient_id = Auth::guard('frontdoctor')->user()->id;
                        $patient_nameExist = DB::table('doctors')->where('id', $patient_id)->get();
                        if($patient_nameExist->count() > 0){
                           $patient_fullname = $patient_nameExist->first()->doctor_fullname;
                           $patient_phone = $patient_nameExist->first()->doctor_phone;
                        }else{
                           $patient_fullname = '';
                           $patient_phone = '';
                        }
                     }else{
                        $patient_fullname = '';
                        $patient_phone = '';
                     }
            ?>
            <h3 style='line-height:1.0'> Doctor's Name: <span class="title text-white">{{$patient_fullname}}</span>,  Doctor's Phone: <span class="title text-white">{{$patient_phone}}</span></h3>
               
            </div>
          </div>
                     
          <?php echo view('frontend/inc/header_doctor') ?> 




          <?php /*<section class="inner-header divider parallax layer-overlay9 overlay-dark-5" data-bg-img="" style="background-color: #ee1638; background-position: 50% 66px;">
      <div class="container">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
            <?php 
                     if( Auth::guard('frontdoctor')->user() ){
                        $patient_id = Auth::guard('frontdoctor')->user()->id;
                        $patient_nameExist = DB::table('doctors')->where('id', $patient_id)->get();
                        if($patient_nameExist->count() > 0){
                           $patient_fullname = $patient_nameExist->first()->doctor_fullname;
                           $patient_phone = $patient_nameExist->first()->doctor_phone;
                        }else{
                           $patient_fullname = '';
                           $patient_phone = '';
                        }
                     }else{
                        $patient_fullname = '';
                        $patient_phone = '';
                     }
            ?>
            
              <h2 class="title text-white">Doctor's Name:<span class="title text-black">{{$patient_fullname}}</span></h2> 
              <h2 class="title text-white">Doctor's Phone:<span class="title text-black">{{$patient_phone}}</span></h2> 

            </div>
          </div>
        </div>
      </div>
    </section>*/ ?>

    <section class="">
      <div class="container">
        <div class="section-content">
          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div>
              <?php 
                     if( Auth::guard('frontdoctor')->user() ){
                        $patient_id = Auth::guard('frontdoctor')->user()->id;
                        //get all orders of this user
                        $patientOrdersExist = DB::table('order_doctors as od')
                                                ->join('patients as p', 'od.patient_id', 'p.id')
                                                ->join('departments as dp', 'dp.id', 'od.speciality_id')
                                                ->join('doctors as do', 'do.id', 'od.doctor_id')
                                                ->where('od.doctor_id', $patient_id)->get();
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
                  <li role="presentation" class="active">
                     <a href="#orders" aria-controls="orders" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="false">Upcomming Appoinments <span class="badge"></span></a>
                  </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="orders">
                    <div class="table-responsive">
                      <table class="table table-hover">
                         <thead>
                            <tr>
                               <th>Order ID</th>
                               <th>Patient Name</th>
                               <th>Patient Phone</th>
                               <th>Doctor Location</th>
                               <th>Day</th>
                               <th>Appointment Time</th>
                               <th>Fees</th>
                            </tr>
                         </thead>
                         <tbody>
                           @if($p_orders)
                              @foreach($p_orders as $order)
                                 <tr>
                                    <th scope="row">{{$order->order_id}}</th>
                                    <td>{{$order->patient_fullname}}</td>
                                    <td>{{$order->patient_phone}}</td>
                                    <?php 
                                          //get appointment
                                          $apExist = DB::table('doctors_timming')->where('dt_id', $order->day)->get();
                                          if($apExist->count() > 0){
                                             $apExist = $apExist->first();
                                             $day = $apExist->day;
                                             $st_time = $apExist->st_time;
                                             $end_time = $apExist->end_time;
                                             $maddress = $apExist->maddress;
                                             switch($day){
                                                case 1 : {$dayis = 'Monday';}break;
                                                case 2 : {$dayis = 'Tuesday';}break;
                                                case 3 : {$dayis = 'Wednesday';}break;
                                                case 4 : {$dayis = 'Thursday';}break;
                                                case 5 : {$dayis = 'Friday';}break;
                                                case 6 : {$dayis = 'Satday';}break;
                                                case 7 : {$dayis = 'Sunday';}break;
                                             }
                                             //$apdate_is = $dayis . ' '.$st_time. ' - '.$end_time;
                                             $apdate_is = $st_time. ' - '.$end_time;
                                          }else{
                                             $apdate_is = '';
                                             $maddress  = '';
                                             $dayis = '';
                                          }
                                    ?>
                                    <td>{{$maddress}}</td>
                                    <td>{{$dayis}}</td>
                                    <td>{{$apdate_is}}</td>
                                    
                                    
                                    <td>{{$order->fees}}</td>
                                    <td><a class="btn btn-success btn-xs" href="{{url('frontdoctor/appointment_order_details/'.$order->order_id)}}">View Order</a></td>
                                 </tr>
                              @endforeach   
                           @endif
                         </tbody>
                      </table>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   </div>
  </div>
  <!-- end main-content -->
@endsection

@section('js')
@endsection
