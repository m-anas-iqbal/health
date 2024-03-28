@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider">
      <div class="container">
        
      <ul id="myTab" class="nav nav-tabs boot-tabs">
      @if($doctors->count() > 0)
        <li class="active"><a href="#home" data-toggle="tab">Doctors</a></li>
      @endif
      @if($hospitals->count() > 0)
      <li class="@if($doctors->count() == 0) active @endif"><a href="#dropdown1" tabindex="-1" data-toggle="tab">Hospitals</a></li>
      @endif
      @if($hakeems->count() > 0)
      <li class="@if($doctors->count() == 0 && $hospitals->count() == 0) active @endif"><a href="#dropdown2" tabindex="-1" data-toggle="tab">Hakeems</a></li>
      @endif
      
        <?php /*<li><a href="#profile" data-toggle="tab">Hakeems</a></li>
        <li><a href="#dropdown2" tabindex="-1" data-toggle="tab">Tawakhanas</a></li>*/ ?>

        <?php /*<li class="dropdown"> <a href="#" id="myTabDrop2" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop2">
            <li><a href="#dropdown1" tabindex="-1" data-toggle="tab">@fat</a></li>
            <li><a href="#dropdown2" tabindex="-1" data-toggle="tab">@mdo</a></li>
          </ul>
        </li>*/ ?>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade  @if($doctors->count() > 0) in active @endif" id="home">
          <div class='row'>
              @if($doctors->count() > 0)
                @foreach($doctors as $doctor)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="schedule-box maxwidth500 bg-light mb-30">
                      <div class="schedule-details clearfix p-15 pt-10">
                        <h5 class="font-16 title"><a href="javascript:void(0)">{{$doctor->doctor_fullname}}</a></h5>
                        <ul class="list-inline font-11 mb-20">
                          <li><i class="fa fa-calendar mr-5"></i> DEC 31/2016</li>
                          <li><i class="fa fa-map-marker mr-5"></i> 89 Newyork City.</li>
                        </ul>
                        <ul class="list font-11 mb-20">
                            <li><i class="fa fa-calendar mr-5"></i>Gender: {{$doctor->doctor_gender}}</li>
                            <li><i class="fa fa-calendar mr-5"></i>Degree: {{$doctor->doctor_degree}}</li>
                            <li><i class="fa fa-calendar mr-5"></i>Experience: {{$doctor->doctor_experience}}</li>
                            <li><i class="fa fa-calendar mr-5"></i>Email: {{$doctor->email}}</li>
                        </ul>
                        <?php /*<div class="mt-10">
                          <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="#">Register</a>
                          <a href="#" class="btn btn-dark btn-sm mt-10">Details</a>
                        </div>*/ ?>
                      </div>
                    </div>
                </div>
                @endforeach
              @endif
          </div>
        </div>
       
        <div class="tab-pane fade   @if($hospitals->count() > 0) in active @endif" id="dropdown1">
        <div class='row'>
        @if($hospitals->count() > 0)
                @foreach($hospitals as $hospital)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="schedule-box maxwidth500 bg-light mb-30">
                      <div class="schedule-details clearfix p-15 pt-10">
                        <h5 class="font-16 title"><a href="javascript:void(0)">{{$hospital->hospital_name}}</a></h5>
                        <ul class="list-inline font-11 mb-20">
                          <li><i class="fa fa-calendar mr-5"></i> DEC 31/2016</li>
                          <li><i class="fa fa-map-marker mr-5"></i> 89 Newyork City.</li>
                        </ul>
                        <ul class="list font-11 mb-20">
                            <li><i class="fa fa-calendar mr-5"></i>Address: {{$hospital->hospital_address}}</li>
                            <li><i class="fa fa-calendar mr-5"></i>Phone: {{$hospital->hospital_phone}}</li>
                            <li><i class="fa fa-calendar mr-5"></i>City: {{$hospital->hospital_city}}</li>
                            <li><i class="fa fa-calendar mr-5"></i>Zip: {{$hospital->hospital_zip}}</li>
                        </ul>
                        <?php /*<div class="mt-10">
                          <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="#">Register</a>
                          <a href="#" class="btn btn-dark btn-sm mt-10">Details</a>
                        </div>*/ ?>
                      </div>
                    </div>
                </div>
                @endforeach
              @endif
              </div>
        </div>

        <div class="tab-pane fade   @if($hakeems->count() > 0) in active @endif" id="dropdown2">
        <div class='row'>
        @if($hakeems->count() > 0)
                @foreach($hakeems as $hakeem)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="schedule-box maxwidth500 bg-light mb-30">
                      <div class="schedule-details clearfix p-15 pt-10">
                        <h5 class="font-16 title"><a href="javascript:void(0)">{{$hakeem->hakeem_fullname}}</a></h5>
                        <ul class="list-inline font-11 mb-20">
                          <li><i class="fa fa-calendar mr-5"></i> DEC 31/2016</li>
                          <li><i class="fa fa-map-marker mr-5"></i> 89 Newyork City.</li>
                        </ul>
                        <ul class="list font-11 mb-20">
                            <li><i class="fa fa-calendar mr-5"></i>Address: {{$hakeem->hakeem_address}}</li>
                            <li><i class="fa fa-calendar mr-5"></i>Phone: {{$hakeem->hakeem_phone}}</li>
                            <li><i class="fa fa-calendar mr-5"></i>City: {{$hakeem->hakeem_city}}</li>
                            
                        </ul>
                        <?php /*<div class="mt-10">
                          <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="#">Register</a>
                          <a href="#" class="btn btn-dark btn-sm mt-10">Details</a>
                        </div>*/ ?>
                      </div>
                    </div>
                </div>
                @endforeach
              @endif
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
