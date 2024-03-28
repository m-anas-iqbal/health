@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
            <div class="row">
              <div class="col-md-6 col-md-push-3">
                <div class="text-center mb-60"><a href="#" class=""><img alt="" src="images/logo-wide.png"></a></div>
                <h4 class="text-theme-colored mt-0 pt-5"> Welcome to Famehealth</h4>
                <hr>
                @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                  
                  <div class="alert alert-danger">
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                    </div>
                @endforeach
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ Session::get('success') }}</li>
                        </ul>
                    </div>
                @endif
                <form name="loginform" id="loginform" class="clearfix9" action="{{url('frontdoctor/check')}}" method='post'>
                    {{ csrf_field() }}
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="doctor_phone">Phone Number [e.g 03332071179]</label>
                      <input id="doctor_phone" name="doctor_phone" class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="doctor_type">User Type</label>
                      <select id="doctor_type" name="doctor_type" class="form-control">
                        <option value='1'>Doctor</option>
                        <option value='2'>Patient</option>
                        <option value='3'>Hakeem</option>
                        <option value='4'>Laboratory</option>
                        <option value='5'>Pharmacy</option>
                      </select>
                    </div>
                  </div>
                  <?php /*<div class="checkbox pull-left mt-15">
                    <label for="form_checkbox">
                      <input id="form_checkbox" name="form_checkbox" type="checkbox">
                      Remember me </label>
                  </div> <button type="submit" class="btn btn-dark btn-sm">Login</button>*/ ?>
                  <div class="form-group pull-right mt-10">
                    <input type="submit" name="submit" value="Login" class="btn btn-primary">
                  </div>

                  <?php /*<div class="clear text-center pt-10">
                    <a class="text-theme-colored font-weight-600 font-12" href="#">Forgot Your Password?</a>
                  </div>
                  <div class="clear text-center pt-10">
                    <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15" href="#" data-bg-color="#3b5998" style="background: rgb(59, 89, 152) !important;">Login with facebook</a>
                    <a class="btn btn-dark btn-lg btn-block no-border" href="#" data-bg-color="#00acee" style="background: rgb(0, 172, 238) !important;">Login with twitter</a>
                  </div>*/ ?>
                </form>
              </div>
            </div>
  </div>
  <!-- end main-content -->
@endsection


@section('js')
<script>
  $(document).on('change', '#doctor_type', function(){
    var user_type = parseInt($(this).val());
    var base_url = "{{url('/')}}";
    var url = base_url;

    switch(user_type){
      case 1 : {
          //dotor
          url = url+'/frontdoctor/check';
          $('#loginform').attr('action', url);
          $('#doctor_phone').attr('name', 'doctor_phone');
      }break;
      case 2 : {
          //patient
          url = url+'/frontpatient/check';
          $('#loginform').attr('action', url);
          $('#doctor_phone').attr('name', 'patient_phone');
      }break;
      case 3 : {
          //hakeem
          url = url+'/fronthakeem/check';
          $('#loginform').attr('action', url);
          $('#doctor_phone').attr('name', 'hakeem_phone');
      }break; 
      case 4 : {
          //labority
          url = url+'/frontlabority/check';
          $('#loginform').attr('action', url);
          $('#doctor_phone').attr('name', 'labority_phone');
      }break;
      case 5 : {
          //pharmacy
          url = url+'/frontpharmacy/check';
          $('#loginform').attr('action', url);
          $('#doctor_phone').attr('name', 'pharmacy_phone');
      }break;       
    }
  });

  /*$('#loginform').validate({
    rule:{},
    message:{
      
    }
  });*/

</script>
@endsection
