@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider">
      <div class="container pt-0 pb-0">
          <div class="row main-content-wrap">
          <?php 
                //GET ORDER DETAILS
          ?>
          <!-- main content -->
            <div class="main-content col-lg-12">
              <div id="content" role="main" style='padding:30px;'>
                      <div class='row'>
                          <div class='col-sm-2'><b>Lab Full Name:</b></div>
                          <div class='col-sm-4'>{{$order->labority_fullname}}</div>

                          <div class='col-sm-2'><b>Lab Timming:</b></div>
                          <?php 
                              //$order->day
                              switch($order->day){
                                case 1 : { $day = 'Monday';}break;
                                case 2 : { $day = 'Tuesday';}break;
                                case 3 : { $day = 'Wednesday';}break;
                                case 4 : { $day = 'Thursday';}break;
                                case 5 : { $day = 'Friday';}break;
                                case 6 : { $day = 'Saturday';}break;
                                case 7 : { $day = 'Sunday';}break;
                            }
                          ?>
                          <div class='col-sm-4'>{{$day.', '.$order->st_time.' - '.$order->end_time}}</div>

                          <div class='col-sm-2'><b>Lab Location:</b></div>
                          <div class='col-sm-4'>{{$order->maddress}}</div>
                      </div>
                      <br>  
                      <div class='row'>
                          <div class='col-sm-2'><b>Patient's Comments:</b></div>
                          <div class='col-sm-10'>{{$order->comments}}</div>
                      </div>

                      
                    
                    @if(Auth::guard('frontlabority')->user())  
                      <br>  
                    <div class="row">
                      <div class='col-sm-2'><b>Lab Comments::</b></div>
                      <div class="form-group9 col-md-10">
                      <span id='dcomments_msg' style='color:green;'></span>
                        <textarea name='dcomments' rows="13" class='form-control dcomments' id='dcomments' orderid="{{$order->order_id}}"  style='border:1px solid lightgray;border-radius:9px;'>{{$order->dcomments}}</textarea>
                        <button id='dcomments_btn'>Save Lab Comments</button>
                      </div>
                  </div>
                  @else

                  <br>        
                      @if($order->dcomments !='')
                        <div class='row'>
                          <div class='col-sm-2'><b>Lab's Comments:</b></div>
                          <div class='col-sm-10'>{{$order->dcomments}}</div>
                        </div>
                      @endif

                  @endif
              </div>
            </div><!-- end main content -->

          </div>

      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection

@section('js')
<script>
  $(document).on('click', '#dcomments_btn', function(){
      var order_id = parseInt($('#dcomments').attr('orderid'));
      var dcomments = $('#dcomments').val();

      $.ajax({
        type:'post',
        url:"{{url('frontlabority/updateLaborityComments')}}",
        data:{order_id:order_id,dcomments:dcomments,_token: "{{ csrf_token() }}"},
        dataType:'JSON',
        success:function(data){
          console.log('success laboritys comments');
          console.log(data);
          $('#dcomments_msg').html('Comments Updated Successfully!')
          setTimeout(() => {
            $('#dcomments_msg').html('');
          }, 1000);
        },
        error:function(data){
          console.log('error');
          console.log(data.responseText);
        }
      });

  });

  $(document).on('click', '#submit_appointment', function(e){
    //alert('click on submit');
    if($('#p_mobile').hasClass('phoneerror')){
        //alert('return false');
        e.preventDefault();
        return false;
    }else{
        //alert('return true');
        return true;
    }
  });
  $(document).on('keyup keypress', '#p_mobile', function(){
    //alert('keyup');
    var number = $('#p_mobile').val();
    var filter = /^((0))(3)([0-9]{2})([0-9]{7})$/;
    if (!filter.test(number)) {
       $(this).css('background-color', 'lightpink');
       $(this).addClass('phoneerror');
    }
    else {
      $(this).css('background-color', 'white');
      $(this).removeClass('phoneerror');
    }
  });
  $(document).on('change', '#hakeem_id', function(){
    var hakeem_id = $(this).val();
    $.ajax({
      type:'post',
      url:'getSpecialityOfHakeem',
      data:{hakeem_id:hakeem_id ,_token: "{{ csrf_token() }}"},
      dataType:'JSON',
      success:function(data){
        console.log('success dept');
        console.log(data);
        if(data.department_lists){
          var department_lists = data.department_lists;
          var dept_opt_list = '';
          var fees = '';
          $.each(department_lists, function(k, v){
              //console.log(v);
              dept_opt_list += '<option value="'+v.id+'">';
              dept_opt_list += v.title;
              dept_opt_list += '</option>';
              fees = v.hakeem_fees;
          });
          //console.log(dept_opt_list);
          $('#speciality_id').html(dept_opt_list);
          $('#fees').val(fees);
        }

       
        if(data.hakeem_time_lists){
          var hakeem_time_lists = data.hakeem_time_lists;
          var dt_opt_list = '';
          //console.log(hakeem_time_lists);
          $.each(hakeem_time_lists, function(kk, vv){
              var day = '';
              switch(vv.day){
                  case 1 : { day = 'Monday';}break;
                  case 2 : { day = 'Tuesday';}break;
                  case 3 : { day = 'Wednesday';}break;
                  case 4 : { day = 'Thursday';}break;
                  case 5 : { day = 'Friday';}break;
                  case 6 : { day = 'Saturday';}break;
                  case 7 : { day = 'Sunday';}break;
              }

              dt_opt_list += '<option value="'+vv.dt_id+'">';
              dt_opt_list += day + ' ' + vv.st_time + ' - ' + vv.end_time;
              dt_opt_list += '</option>';
          });
          //console.log(dt_opt_list);
          $('#day').html(dt_opt_list);
        }
      },
      error:function(data){
        console.log('error');
        console.log(data.responseText);
      }
    });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

  <?php 
    $passwordRequired=true;  
    if(Auth::guard('frontpatient')->user()){
      $passwordRequired=false;  
    }
  ?>
  var password_req = Boolean("{{$passwordRequired}}");
  console.log('password_req');
  console.log(password_req);
  //orderhakeemform validation
  $("#orderhakeemform").validate({
      rules: {
        patient_phone: {
              required: true,
          },
          hakeem_id: {
              required: true,
          },
          ibft_no:{
            required:true,
          },
          ibft_image:{
            required:true,
          },
          p_comments:{
            required:true,
          },
          password:{
            required: password_req,
          }   
      },
      errorPlacement: function (error, element) {
          if (element.attr("name") == "hakeem_id") {
              error.appendTo("#hakeem_idError");
          }
          if (element.attr("name") == "patient_phone") {
              error.appendTo("#p_mobileError");
          }
          if (element.attr("name") == "ibft_no") {
              error.appendTo("#ibft_noError");
          }
          if (element.attr("name") == "ibft_image") {
              error.appendTo("#ibft_imageError");
          }
          if (element.attr("name") == "p_comments") {
              error.appendTo("#p_commentsError");
          }
          if (element.attr("name") == "password") {
              error.appendTo("#passwordError");
          }
      },
      messages: {
          patient_phone: '[<span class="text-danger ">Patient Mobile is Required</span>]',
          hakeem_id: '[<span class="text-danger ">Hakeem is Required</span>]',
          ibft_no: '[<span class="text-danger ">IBFT is Required</span>]',
          ibft_image: '[<span class="text-danger ">IBFT Image is Required</span>]',
          p_comments: '[<span class="text-danger ">Patient Comments is Required</span>]',
          password: '[<span class="text-danger ">Patient Password is Required</span>]',
      }
  });
</script>
@endsection
