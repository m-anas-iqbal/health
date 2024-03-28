@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content" style="margin:0 auto;width:75%;">
    <!-- Section: home -->
    <div class="row" style="background-color: #ee1638;"> 

    <div class="col-md-12">
            <?php 
                     if( Auth::guard('fronthakeem')->user() ){
                        $patient_id = Auth::guard('fronthakeem')->user()->id;
                        $patient_nameExist = DB::table('hakeems')->where('id', $patient_id)->get();
                        if($patient_nameExist->count() > 0){
                           $patient_fullname = $patient_nameExist->first()->hakeem_fullname;
                           $patient_phone = $patient_nameExist->first()->hakeem_phone;
                        }else{
                           $patient_fullname = '';
                           $patient_phone = '';
                        }
                     }else{
                        $patient_fullname = '';
                        $patient_phone = '';
                     }
            ?>
            <h3 style='line-height:1.0'> Hakeem's Name: <span class="title text-white">{{$patient_fullname}}</span>, Hakeem's Phone: <span class="title text-white">{{$patient_phone}}</span></h3>
               
            </div>
          </div>
                     
          <?php echo view('frontend/inc/header_hakeem') ?> 

   
          <?php /*<section class="inner-header divider parallax layer-overlay9 overlay-dark-5" data-bg-img="" style="background-color: #ee1638; background-position: 50% 66px;">
      <div class="container">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
            <?php 
                     if( Auth::guard('fronthakeem')->user() ){
                        $patient_id = Auth::guard('fronthakeem')->user()->id;
                        $patient_nameExist = DB::table('hakeems')->where('id', $patient_id)->get();
                        if($patient_nameExist->count() > 0){
                           $patient_fullname = $patient_nameExist->first()->hakeem_fullname;
                           $patient_phone = $patient_nameExist->first()->hakeem_phone;
                        }else{
                           $patient_fullname = '';
                           $patient_phone = '';
                        }
                     }else{
                        $patient_fullname = '';
                        $patient_phone = '';
                     }
            ?>
            <h1> Hakeem Name: <span class="title text-white">{{$patient_fullname}}</span> </h1>
            <h1> Hakeem Phone: <span class="title text-white">{{$patient_phone}}</span> </h1>
            
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
                     if( Auth::guard('fronthakeem')->user() ){
                        $patient_id = Auth::guard('fronthakeem')->user()->id;
                        //get all orders of this user
                        $patientOrdersExist = DB::table('order_hakeems as od')
                                                ->join('patients as p', 'od.patient_id', 'p.id')
                                                
                                                ->join('hakeems as do', 'do.id', 'od.hakeem_id')
                                                ->where('od.hakeem_id', $patient_id)->get();
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
                 
                  <?php /*<li role="presentation" class="active"><a href="#free-orders" aria-controls="free-orders" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="true">Past Appoinments <span class="badge">3</span></a></li>
                  <li role="presentation" class=""><a href="#bookmarks" aria-controls="bookmarks" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="false">Contact Us <span class="badge">5</span></a></li>
                  */ ?>
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
                               <th>hakeem Location</th>
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
                                    <?php 
                                          //get appointment
                                          $apExist = DB::table('hakeems_timming')->where('dt_id', $order->day)->get();
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
                                    <td><a class="btn btn-success btn-xs" href="{{url('fronthakeem/appointmenthakeem_order_details/'.$order->order_id)}}">View Order</a></td>
                                 </tr>
                              @endforeach   
                           @endif
                         </tbody>
                      </table>
                    </div>
                  
                  
                  
                  
                  
                  
                  
                  </div>

                  <?php /*<div role="tabpanel" class="tab-pane active" id="free-orders">
                    <table class="table table-hover">
                       <thead>
                          <tr>
                             <th>Order ID</th>
                             <th>Date</th>
                             <th>Payment</th>
                             <th>Total</th>
                             <th></th>
                          </tr>
                       </thead>
                       <tbody>
                          <tr>
                             <th scope="row">#1189</th>
                             <td>24/07/2016</td>
                             <td>PayPal</td>
                             <td>$127.50</td>
                             <td><a class="btn btn-success btn-xs" href="#">View Order</a></td>
                          </tr>
                          <tr>
                             <th scope="row">#1189</th>
                             <td>24/07/2016</td>
                             <td>PayPal</td>
                             <td>$127.50</td>
                             <td><a class="btn btn-success btn-xs" href="#">View Order</a></td>
                          </tr>
                          <tr>
                             <th scope="row">#1189</th>
                             <td>24/07/2016</td>
                             <td>PayPal</td>
                             <td>$127.50</td>
                             <td><a class="btn btn-success btn-xs" href="#">View Order</a></td>
                          </tr>
                          <tr>
                             <th scope="row">#1189</th>
                             <td>24/07/2016</td>
                             <td>PayPal</td>
                             <td>$127.50</td>
                             <td><a class="btn btn-success btn-xs" href="#">View Order</a></td>
                          </tr>
                       </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="bookmarks">
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
    </section>
      </div>
  </div>
  <!-- end main-content -->
@endsection

@section('js')
@endsection
