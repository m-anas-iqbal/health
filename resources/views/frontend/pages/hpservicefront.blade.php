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

                <h2 align="center"><strong>{{$hpservices['heading']}} </strong></h2>

                <p align="center" class="hidden-xs">
                  {{$hpservices['description']}}

                    
                </p>

                <p align="center" class="visible-xs">

                    The purpose of Hakeem Online website is to create awareness about hygienic principles in

                    people and to present the solution of problems and rising trend of treatment by indigenous

                    herbs. To acquire this fixed goal we already formulated a medical board consisting on Hukma

                    and herbalists. 

                    <a href="#para" id="more_button" data-toggle="collapse" onclick="more_button()">More</a>

                    <span id="para" class="collapse">

                    The herbal, medical and pharmaceutical experts in this board all are considered

                    specialists in their fields. You can consult your internal and external diseases with them without

                    any hesitation and fear. You can also get your repots checked. Men, Women and Child disease

                    specialists are present here as well as you’re spiritual, mental, cerebral and psychological issues

                    also solved by spiritual treatment. Moreover our Hukma suggests you to cure your diseases by

                    herbs and nuskhajat. Our online stores are fully developed according to air-conditioned, air

                    tightened and hygienic principles. In which herbs, supplies and medicines, valuable components

                    like mushk, zafran, amber, marvarid including these all fresh, clean things are kept saved after

                    complete inspection. Expired Date is also written on jars and packing’s which are used to

                    protect these herbal products. So these herbal products can deliver at your door step in safe

                    and fresh condition and also in secure packing. We are delighted to bring this to your knowledge that Allah has healed herbs a lot. Provided that the components used in these

                    nuskhajat should be fresh and clean. Only this standard, quantity and blend free things are

                    provided on our online store. Test is condition. Get the most out of our service by contacting

                    out our e-mail, whatsapp or mobile number and live a healthy life.

                    </span>

                </p>

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
