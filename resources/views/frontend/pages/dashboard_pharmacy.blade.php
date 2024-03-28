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
                  <li role="presentation" class="active">
                     <a href="#orders" aria-controls="orders" role="tab" data-toggle="tab" class="font-15 text-uppercase" aria-expanded="false">Upcomming Pharmacy Orders
                        <?php /*<span class="badge"></span>*/ ?>
                     </a>
                  </li>
                 
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
                    <div class="table-responsive">
                      <table class="table table-hover">
                         <thead>
                            <tr>
                               <th>Order ID</th>
                               <th>Cstmr Name</th>
                               <th>Cstmr Phone</th>
                               <th>Pharmacy Name</th>
                               <th>Pharmacy Location</th>
                               <th>Day</th>
                               <th>Timming</th>
                               <th>Fees</th>
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                           @if($p_orders)
                              @foreach($p_orders as $order)
                                 <tr>
                                    <th scope="row">{{$order->order_id}}</th>
                                    <td>{{$order->patient_fullname}}</td>
                                    <td>{{$order->patient_phone}}</td>
                                    <td>{{$order->pharmacy_fullname}}</td>
                                    <?php 
                                          //get appointment
                                          $apExist = DB::table('pharmacies_timming')->where('dt_id', $order->day)->get();
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
                                    <td>
                                       <a class="btn-xs" href="{{url('frontpharmacy/appointmentpharmacy_order_details/'.$order->order_id)}}" title='Order Details'><i class="fa fa-eye" aria-hidden="true"></i></a>
                                       <a class="btn-xs" href="{{url('frontpharmacy/inventory/makeOrder/'.$order->order_id)}}" title='Make Order'><i class="fa fa-shopping-basket"></i></a>
                                    </td>
                                 </tr>
                              @endforeach   
                           @endif
                         </tbody>
                      </table>
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
