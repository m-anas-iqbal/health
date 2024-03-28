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
              <?php if($news){ 
                $cnews = $news->first();
                //echo '<pre>';
                //print_r($news);
                ?>
                  <h3>{{$cnews->title}}</h3>
                  <p>{{$cnews->description}}</p>
                  

                <?php } ?>
                

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
