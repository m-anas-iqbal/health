@extends('frontend.layout.master')
@section('content')


   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider">
      <div class="container pt-0 pb-0">
      <div id="about" class="about-area default-padding">

<div class="container">

    <div class="row">

        <div class="about-items">

            <div class="col-md-12 info">

                <!-- Progress Bar Start -->

                <h2 align="center"><strong>{{$hpmessages['heading']}} </strong></h2>

                <p align="center" class="hidden-xs">

                  {{$hpmessages['description']}}

                    

                </p>


          </div>

        </div>

    </div>

    

   
  <hr>
   


</div>

</div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection

@section('js')
@endsection
