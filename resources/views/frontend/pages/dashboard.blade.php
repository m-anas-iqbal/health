@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
   
    <section class="inner-header divider parallax layer-overlay9 overlay-dark-5" data-bg-img="" style="background-color: #ee1638; background-position: 50% 66px;">
      <div class="container">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
            <?php 
                     if( Auth::guard('frontpatient')->user() ){
                        $patient_id = Auth::guard('frontpatient')->user()->id;
                        $patient_nameExist = DB::table('patients')->where('id', $patient_id)->get();
                        if($patient_nameExist->count() > 0){
                           $patient_fullname = $patient_nameExist->first()->patient_fullname;
                           $patient_phone = $patient_nameExist->first()->patient_phone;
                        }else{
                           $patient_fullname = '';
                           $patient_phone = '';
                        }
                     }else{
                        $patient_fullname = '';
                        $patient_phone = '';
                     }
            ?>
              <h2 class="title text-white">Patient Name:<span class="title text-black">{{$patient_fullname}}</span></h2> 
              <h2 class="title text-white">Patient Phone:<span class="title text-black">{{$patient_phone}}</span></h2> 
              <?php 
                     //echo '<pre>';
                     //print_r(Auth::guard('frontpatient')->user()->id);
              
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="">
      <div class="container">
        <div class="section-content">
          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div>
              <?php 
                     if( Auth::guard('frontpatient')->user() ){
                        $patient_id = Auth::guard('frontpatient')->user()->id;
                        
                        //get all doctor orders of this user
                        $patientOrdersExist = DB::table('order_doctors as od')
                                                ->join('departments as dp', 'dp.id', 'od.speciality_id')
                                                ->join('doctors as do', 'do.id', 'od.doctor_id')
                                                ->where('od.patient_id', $patient_id)->get();
                        if($patientOrdersExist->count() > 0){
                             $p_orders = $patientOrdersExist; 
                        }else{
                              $p_orders = false; 
                        }

                        //get all hakeem orders of this user
                        $patientHakeemOrdersExist = DB::table('order_hakeems as oh')
                                                //->join('departments as dp', 'dp.id', 'oh.speciality_id')
                                                ->join('hakeems as ho', 'ho.id', 'oh.hakeem_id')
                                                ->where('oh.patient_id', $patient_id)->get();
                        if($patientHakeemOrdersExist->count() > 0){
                             $ph_orders = $patientHakeemOrdersExist; 
                        }else{
                              $ph_orders = false; 
                        }

                        //get all labority orders of this user
                        $patientLaborityOrdersExist = DB::table('order_laborities as ol')
                                                         ->join('laborities as l', 'l.id', 'ol.labority_id')
                                                         ->where('ol.patient_id', $patient_id)->get();
                        if($patientLaborityOrdersExist->count() > 0){
                             $pl_orders = $patientLaborityOrdersExist; 
                        }else{
                              $pl_orders = false; 
                        }

                        //get all pharmacies orders of this user
                        $patientPharmacyOrdersExist = DB::table('order_pharmacies as op')
                                                         ->join('pharmacies as p', 'p.id', 'op.pharmacy_id')
                                                         ->where('op.patient_id', $patient_id)->get();
                        if($patientPharmacyOrdersExist->count() > 0){
                             $pp_orders = $patientPharmacyOrdersExist; 
                        }else{
                              $pp_orders = false; 
                        }
                     }
              
              ?>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active">
                     <a href="#orders" aria-controls="orders" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="false">Doctor's Appoinments <span class="badge"></span></a>
                  </li>
                 
                  <li role="presentation" class=""><a href="#free-orders" aria-controls="free-orders" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="true">Hakeem's Appoinments {{--<span class="badge">3</span>--}}</a></li>

               <?php /**/ ?>   
                  <li role="presentation" class=""><a href="#bookmarks" aria-controls="bookmarks" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="false">Laboratories Orders {{--<span class="badge">5</span>--}} </a></li>
                  <li role="presentation" class=""><a href="#pharmacies" aria-controls="pharmacies" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="false">Pharmacies Orders {{--<span class="badge">5</span>--}} </a></li> 
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="orders">
                    <div class="table-responsive">
                      <table class="table table-hover">
                         <thead>
                            <tr>
                               <th>Order ID</th>
                               <th>Doctor Name</th>
                               <th>Doctor Phone</th>
                               <th>Specialization</th>
                               <th>Date</th>
                               <th>Appointment Time</th>
                               <th>Fees</th>
                            </tr>
                         </thead>
                         <tbody>
                           @if($p_orders)
                              @foreach($p_orders as $order)
                                 <tr>
                                    <td scope="row">{{$order->order_id}}</td>
                                    <td>{{$order->doctor_fullname}}</td>
                                    <td>{{$order->doctor_phone}}</td>
                                    <td>{{$order->title}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                    <?php 
                                          //get appointment
                                          $apExist = DB::table('doctors_timming')->where('dt_id', $order->day)->get();
                                          if($apExist->count() > 0){
                                             $apExist = $apExist->first();
                                             $day = $apExist->day;
                                             $st_time = $apExist->st_time;
                                             $end_time = $apExist->end_time;

                                             switch($day){
                                                case 1 : {$dayis = 'Monday';}break;
                                                case 2 : {$dayis = 'Tuesday';}break;
                                                case 3 : {$dayis = 'Wednesday';}break;
                                                case 4 : {$dayis = 'Thursday';}break;
                                                case 5 : {$dayis = 'Friday';}break;
                                                case 6 : {$dayis = 'Satday';}break;
                                                case 7 : {$dayis = 'Sunday';}break;
                                             }
                                             $apdate_is = $dayis . ' '.$st_time. ' - '.$end_time;
                                          }else{
                                             $apdate_is = '';
                                          }
                                    ?>
                                       {{$apdate_is}}</td>
                                       <td>{{$order->fees}}</td>
                                    <td><a class="btn btn-success btn-xs" href="{{url('frontpatient/appointment_order_details/'.$order->order_id)}}">View Doctor Order</a></td>
                                 </tr>
                              @endforeach   
                           @endif
                         </tbody>
                      </table>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane " id="free-orders">
                  <table class="table table-hover">
                         <thead>
                            <tr>
                               <th>Order ID</th>
                               <th>Hakeem</th>
                               <th>Phone</th>
                               <th>Date</th>
                               <th>Appointment Time</th>
                               <th>Fees</th>
                            </tr>
                         </thead>
                         <tbody>
                           @if($ph_orders)
                              @foreach($ph_orders as $order)
                                 <tr>
                                    <td scope="row">{{$order->order_id}}</th>
                                    <td>{{$order->hakeem_fullname}}</td>
                                    <td>{{$order->hakeem_phone}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                    <?php 
                                          //get appointment
                                          $apExist = DB::table('hakeems_timming')->where('dt_id', $order->day)->get();
                                          if($apExist->count() > 0){
                                             $apExist = $apExist->first();
                                             $day = $apExist->day;
                                             $st_time = $apExist->st_time;
                                             $end_time = $apExist->end_time;

                                             switch($day){
                                                case 1 : {$dayis = 'Monday';}break;
                                                case 2 : {$dayis = 'Tuesday';}break;
                                                case 3 : {$dayis = 'Wednesday';}break;
                                                case 4 : {$dayis = 'Thursday';}break;
                                                case 5 : {$dayis = 'Friday';}break;
                                                case 6 : {$dayis = 'Satday';}break;
                                                case 7 : {$dayis = 'Sunday';}break;
                                             }
                                             $apdate_is = $dayis . ' '.$st_time. ' - '.$end_time;
                                          }else{
                                             $apdate_is = '';
                                          }
                                    ?>
                                       {{$apdate_is}}</td>
                                       <td>{{$order->fees}}</td>
                                    <td><a class="btn btn-success btn-xs" href="{{url('frontpatient/appointmenthakeem_order_details/'.$order->order_id)}}">View Hakeem Order</a></td>
                                 </tr>
                              @endforeach   
                           @endif
                         </tbody>
                      </table>
                  </div>

                  <?php /**/ ?>
                  <div role="tabpanel" class="tab-pane" id="bookmarks">
                  <table class="table table-hover">
                         <thead>
                            <tr>
                               <th>Order ID</th>
                               <th>Laboratory Name</th>
                               <th>Laboratory Phone</th>
                               <th>Date</th>
                               <th>Laboratory Timming</th>
                               
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                           @if($pl_orders)
                              @foreach($pl_orders as $order)
                                 <tr>
                                    <td scope="row">{{$order->order_id}}</th>
                                    <td>{{$order->labority_fullname}}</td>
                                    <td>{{$order->labority_phone}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                    <?php 
                                          //get appointment of labority
                                          $apExist = DB::table('laborities_timming')->where('dt_id', $order->day)->get();
                                          if($apExist->count() > 0){
                                             $apExist = $apExist->first();
                                             $day = $apExist->day;
                                             $st_time = $apExist->st_time;
                                             $end_time = $apExist->end_time;

                                             switch($day){
                                                case 1 : {$dayis = 'Monday';}break;
                                                case 2 : {$dayis = 'Tuesday';}break;
                                                case 3 : {$dayis = 'Wednesday';}break;
                                                case 4 : {$dayis = 'Thursday';}break;
                                                case 5 : {$dayis = 'Friday';}break;
                                                case 6 : {$dayis = 'Satday';}break;
                                                case 7 : {$dayis = 'Sunday';}break;
                                             }
                                             $apdate_is = $dayis . ' '.$st_time. ' - '.$end_time;
                                          }else{
                                             $apdate_is = '';
                                          }
                                    ?>
                                       {{$apdate_is}}</td>
                                    
                                    <td><a class="btn btn-success btn-xs" href="{{url('frontpatient/appointmentlabority_order_details/'.$order->order_id)}}">View Labority Order</a></td>
                                 </tr>
                              @endforeach   
                           @endif
                         </tbody>
                      </table>
                  </div>

                    
                  <div role="tabpanel" class="tab-pane" id="pharmacies">
                  <table class="table table-hover">
                         <thead>
                            <tr>
                               <th>Order ID</th>
                               <th>Pharmacy Name</th>
                               <th>Pharmacy Phone</th>
                               <th>Date</th>
                               
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                           @if($pp_orders)
                              @foreach($pp_orders as $order)
                                 <tr>
                                    <td scope="row">{{$order->order_id}}</th>
                                    <td>{{$order->pharmacy_fullname}}</td>
                                    <td>{{$order->pharmacy_phone}}</td>
                                    <td>{{$order->created_at}}</td>
                                    
                                      
                                    <td><a class="btn btn-success btn-xs" href="{{url('frontpatient/appointmentpharmacy_order_details/'.$order->order_id)}}">View Pharmacy Order</a></td>
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
    </section>

  </div>
  <!-- end main-content -->
@endsection

@section('js')
@endsection
