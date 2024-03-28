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
                <a href="{{url('frontpharmacy/inventory/addProduct')}}" class="btn btn-primary">Add Product</a>     
                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="orders">
                    <div class="table-responsive">
                      <table class="table table-hover">
                         <thead>
                            <tr>
                               <th>SNO</th>
                               <th>Product Name</th>
                               <th>Product Description</th>
                               <th>Product Status</th>
                           </tr>
                         </thead>
                         <tbody>
                            <?php 
                                 if( Auth::guard('frontpharmacy')->user() ){
                                    $pharmacy_id = Auth::guard('frontpharmacy')->user()->id;
                                 }else{
                                    $pharmacy_id = 0;
                                 }
                                 $products = DB::table('product')->where('pharmacy_id', $pharmacy_id)->get();
                            ?>
                           @if($products)
                              @foreach($products as $product)
                                 <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>@if($product->status == 1) Active @elseif($product->status == 0) Inactive @endif</td>
                                    <td><a class="btn btn-success btn-xs" href="{{url('frontpharmacy/inventory/editProduct/'.$product->id)}}">Edit</a></td>
                                 </tr>
                              @endforeach   
                           @endif
                         </tbody>
                      </table>
                    </div>
                  
                  
                  
                  
                  
                  
                  
                  </div>

                  <div role="tabpanel" class="tab-pane " id="accounting">
                    
                  </div>
                  
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
