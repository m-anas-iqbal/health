@extends('frontend.layout.master')
@section('content')
<
   <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
   <!-- CSS -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">

<style>

select{
    width: 80%;/* Only for example */
}

select.form-control + .chosen-container.chosen-container-single .chosen-single {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    vertical-align: middle;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    background-image:none;
}

select.form-control + .chosen-container.chosen-container-single .chosen-single div {
    top:4px;
    color:#000;
}

select.form-control + .chosen-container .chosen-drop {
    background-color: #FFF;
    border: 1px solid #CCC;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    background-clip: padding-box;
    margin: 2px 0 0;

}

select.form-control + .chosen-container .chosen-search input[type=text] {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    vertical-align: middle;
    background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    background-image:none;
}

select.form-control + .chosen-container .chosen-results {
    margin: 2px 0 0;
    padding: 5px 0;
    font-size: 14px;
    list-style: none;
    background-color: #fff;
    margin-bottom: 5px;
}

select.form-control + .chosen-container .chosen-results li , 
select.form-control + .chosen-container .chosen-results li.active-result {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.428571429;
    color: #333;
    white-space: nowrap;
    background-image:none;
}
select.form-control + .chosen-container .chosen-results li:hover, 
select.form-control + .chosen-container .chosen-results li.active-result:hover,
select.form-control + .chosen-container .chosen-results li.highlighted
{
    color: #FFF;
    text-decoration: none;
    background-color: #428BCA;
    background-image:none;
}

select.form-control + .chosen-container-multi .chosen-choices {
    display: block;
    width: 100%;
    min-height: 34px;
    padding: 6px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    vertical-align: middle;
    background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    background-image:none;
}

select.form-control + .chosen-container-multi .chosen-choices li.search-field input[type="text"] {
    height:auto;
    padding:5px 0;
}

select.form-control + .chosen-container-multi .chosen-choices li.search-choice {

    background-image: none;
    padding: 3px 24px 3px 5px;
    margin: 0 6px 0 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.428571429;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: #333;
    background-color: #FFF;
    border-color: #CCC;
}

select.form-control + .chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
    top:8px;
    right:6px;
}

select.form-control + .chosen-container-multi.chosen-container-active .chosen-choices,
select.form-control + .chosen-container.chosen-container-single.chosen-container-active .chosen-single,
select.form-control + .chosen-container .chosen-search input[type=text]:focus{
    border-color: #66AFE9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),0 0 8px rgba(102, 175, 233, 0.6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),0 0 8px rgba(102, 175, 233, 0.6);
}

select.form-control + .chosen-container-multi .chosen-results li.result-selected{
    display: list-item;
    color: #ccc;
    cursor: default;
    background-color: white;
}

select:invalid {
    height: 0px !important;
    opacity: 0 !important;
    position: absolute !important;
    display: flex !important;
}

select:invalid[multiple] {
    margin-top: 15px !important;
}


</style>
   

        <!-- Section Content -->
        <div class="section-content" style="margin:0 auto;width:75%;">
          <div class="row" style="background-color: #ee1638;"> 
            <div class="col-md-12">
          
            <h3 style='line-height:1.0'>Pharmacy Name: <span class="title text-white">{{--$patient_fullname--}}</span>,  Pharmacy Phone: <span class="title text-white">{{--$patient_phone--}}</span></h3>
               
            </div>
          </div>
                     
          <?php echo view('frontend/inc/header_pharmacy') ?>   
          
          <br>
          <div class="row">
            
          <h3 style='margin:0px auto;'>Ledger: 
          <?php 
                  $user_id = auth()->user()->id;
                  $all_coas = DB::table('coas')->where('parent',0)->where('user_id',$user_id)->get();
            ?>
          <form name="coaform" id="coaform" class="clearfix9" action="<?php echo url('frontpharmacy/COA/getLedgerPDF'); ?>" method='post'>
          {{ csrf_field() }}
          <select id="coa_parent" name="coa_parent[]" class="form-control" multiple style='display:none;'>
                              
                              <option value=''>Please Select COA Parent</option>

                              @if($all_coas)
                                    @foreach($all_coas as $coa)
                                          <option value='1_{{$coa->id}}_{{$coa->id}}' <?php if(!empty($coa_parent_arr)){if(in_array('1_'.$coa->id.'_'.$coa->id, $coa_parent_arr)){ echo ' selected'; }}  ?>>{{$coa->coa_name}}-{{$coa->coa_code}}</option>
                                          <?php 
                                                //show 2nd levels of coa
                                                $all_coas2 = DB::table('coas')->where('parent',$coa->id)->get();
                                          ?>
                                          @if($all_coas2)
                                                @foreach($all_coas2 as $coa2)
                                                   <option value='2_{{$coa2->id}}_{{$coa->id}}' <?php if(!empty($coa_parent_arr)){if(in_array('2_'.$coa2->id.'_'.$coa->id, $coa_parent_arr)){ echo ' selected'; }}  ?>>{{$coa->coa_name}} >> {{$coa2->coa_name}}-{{$coa2->coa_code}}</option>
                                                         
                                                         <?php 
                                                               /**///show 3rd levels of coa
                                                               $all_coas3 = DB::table('coas')->where('parent',$coa2->id)->where('parent',$coa->id)->get();
                                                         ?>
                                                         @if($all_coas3)
                                                               @foreach($all_coas3 as $coa3)
                                                                  <option value='3_{{$coa3->id}}_{{$coa->id}}' <?php if(!empty($coa_parent_arr)){if(in_array('3_'.$coa3->id.'_'.$coa->id, $coa_parent_arr)){ echo ' selected'; }}  ?>>{{$coa->coa_name}} >> {{$coa2->coa_name}} >> {{$coa3->coa_name}}</option>

                                                                  <?php 
                                                                        /**///show 4rd levels of coa
                                                                        $all_coas4 = DB::table('coas')->where('parent',$coa3->id)->where('parent',$coa->id)->get();
                                                                  ?>
                                                                  @if($all_coas4)
                                                                        @foreach($all_coas4 as $coa4)
                                                                              <option value='4_{{$coa4->id}}_{{$coa->id}}' <?php if(!empty($coa_parent_arr)){if(in_array('4_'.$coa4->id.'_'.$coa->id, $coa_parent_arr)){ echo ' selected'; }}  ?>>{{$coa->coa_name}} >> {{$coa2->coa_name}} >> {{$coa3->coa_name}} >> {{$coa4->coa_name}}</option>

                                                                        @endforeach()
                                                                  @endif
                                                               @endforeach()
                                                         @endif
                                                @endforeach()
                                          @endif
                                    @endforeach()
                              @endif                              
                           </select>
                           <input type="hidden" class="form-control details check-empty9" id="st_date" name="st_date" value="@if($st_date != ''){{date('Y-m-d',strtotime($st_date))}}@endif" placeholder="Start Date">
                           <input type="hidden" class="form-control details check-empty9" id="end_date" name="end_date" value="@if($end_date != ''){{date('Y-m-d',strtotime($end_date))}}@endif" placeholder="End Date">

            <input type="submit" name="submit" value="Download PDF" id='' class="btn btn-primary" formtarget="_blank" <?php if(!empty($coa_parent_arr)){ echo "style='display:block;float:right;'";}else{ echo "style='display:none;'";}?>>
          </form>
      
      
      </h3>
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
            <div class="col-xs-12 col-sm-12 col-md-12" style='border:1px solid lightgray;margin-top:5px;border-radius:10px;'>
              <div>
                     <form name="coaform" id="coaform" class="clearfix9" action="<?php echo url('frontpharmacy/COA/ledger'); ?>" method='post'>
                        {{ csrf_field() }}
                           <br>
                              <div class="form-group col-sm-5 col-md-5 col-lg-5">
                             
                           <select id="coa_parent" name="coa_parent[]" class="form-control chosen chosen-select" multiple required="required">
                              
                              <option value=''>Please Select COA Parent</option>

                              @if($all_coas)
                                    @foreach($all_coas as $coa)
                                          <option value='1_{{$coa->id}}_{{$coa->id}}' <?php if(!empty($coa_parent_arr)){if(in_array('1_'.$coa->id.'_'.$coa->id, $coa_parent_arr)){ echo ' selected'; }}  ?>>{{$coa->coa_name}}-{{$coa->coa_code}}</option>
                                          <?php 
                                                //show 2nd levels of coa
                                                $all_coas2 = DB::table('coas')->where('parent',$coa->id)->where('parent',$coa->id)->get();
                                          ?>
                                          @if($all_coas2)
                                                @foreach($all_coas2 as $coa2)
                                                   <option value='2_{{$coa2->id}}_{{$coa->id}}' <?php if(!empty($coa_parent_arr)){if(in_array('2_'.$coa2->id.'_'.$coa->id, $coa_parent_arr)){ echo ' selected'; }}  ?>>{{$coa->coa_name}} >> {{$coa2->coa_name}}-{{$coa2->coa_code}}</option>
                                                         
                                                         <?php 
                                                               /**///show 3rd levels of coa
                                                               $all_coas3 = DB::table('coas')->where('parent',$coa2->id)->where('parent',$coa->id)->get();
                                                         ?>
                                                         @if($all_coas3)
                                                               @foreach($all_coas3 as $coa3)
                                                                  <option value='3_{{$coa3->id}}_{{$coa->id}}' <?php if(!empty($coa_parent_arr)){if(in_array('3_'.$coa3->id.'_'.$coa->id, $coa_parent_arr)){ echo ' selected'; }}  ?>>{{$coa->coa_name}} >> {{$coa2->coa_name}} >> {{$coa3->coa_name}}</option>

                                                                  <?php 
                                                                        /**///show 4rd levels of coa
                                                                        $all_coas4 = DB::table('coas')->where('parent',$coa3->id)->where('parent',$coa->id)->get();
                                                                  ?>
                                                                  @if($all_coas4)
                                                                        @foreach($all_coas4 as $coa4)
                                                                              <option value='4_{{$coa4->id}}_{{$coa->id}}' <?php if(!empty($coa_parent_arr)){if(in_array('4_'.$coa4->id.'_'.$coa->id, $coa_parent_arr)){ echo ' selected'; }}  ?>>{{$coa->coa_name}} >> {{$coa2->coa_name}} >> {{$coa3->coa_name}} >> {{$coa4->coa_name}}</option>

                                                                        @endforeach()
                                                                  @endif
                                                               @endforeach()
                                                         @endif
                                                @endforeach()
                                          @endif
                                    @endforeach()
                              @endif                              
                           </select>
                              </div>
                              <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                    <input type="date" class="form-control details check-empty9" id="st_date" name="st_date" value="@if($st_date != ''){{date('Y-m-d',strtotime($st_date))}}@endif" placeholder="Start Date">
                                    <script>
                                    //document.getElementById('st_date').value = moment().format('yyyy-mm-dd');
                                    
                                    </script>
                              </div>
                              <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                    <input type="date" class="form-control details check-empty9" id="end_date" name="end_date" value="@if($end_date != ''){{date('Y-m-d',strtotime($end_date))}}@endif" placeholder="End Date">
                                    <script>
                                    //document.getElementById('end_date').value = moment().format('yyyy-mm-dd');
                                    
                                    </script>
                              </div>


                              <div class="form-group pull-right mt-10">
                                    <input type="submit" name="submit" value="Search" id='add-jv' class="btn btn-primary">
                              </div>
                     </form>
                </div>
              </div>


              </div>

      <?php 
            $user_id = auth()->user()->id;
            if($ledgers){
                  $sno = 1;
                  foreach($ledgers as $coa_name => $ledger){
      ?>        
              <div class="col-xs-12 col-sm-12 col-md-12" style='border:1px solid lightgray;margin-top:5px;border-radius:10px;'> 
                  <u><h2 style='margin-top:5px; margin-bottom:-15px;'>{{--$sno--}} {{ucfirst($coa_name)}}</h2></u><br> - <label>Transactions accounts are as follow:</label>
                        
                  <?php 
                  if(!empty($ledger) ){
                        $ldgr_count = 1;
                        foreach($ledger as  $ldgr){
                              foreach($ldgr as $ldgr_path => $id_balance){  
                                    $id_balance_arr = explode('_', $id_balance);
                                    $id = $id_balance_arr[0];
                                    $obalance = $id_balance_arr[1];
                                    $cbalance = $id_balance_arr[1];
                              ?>
                              <div id='1'>      
                                    <div class="row"> 
                                          <div class="form-group col-sm-10 col-md-10 col-lg-10">
                                                <h3><u>{{$ldgr_count}}: {{$ldgr_path}}</u></h3>
                                          </div>
                                          <div class="form-group col-sm-2 col-md-2 col-lg-2"  style='margin-top:17px;'>
                                                <span><b>Opening:{{$obalance}}</b></span>
                                          </div>
                                    </div>


                                    <div class="form-group col-sm-2 col-md-2 col-lg-2" style='border:1px solid lightgray'>
                                          Date
                                    </div>
                                    <div class="form-group col-sm-2 col-md-2 col-lg-2" style='border:1px solid lightgray'>
                                          account name
                                    </div>
                                    <div class="form-group col-sm-2 col-md-2 col-lg-2" style='border:1px solid lightgray'>
                                          account code
                                    </div>
                                    <div class="form-group col-sm-2 col-md-2 col-lg-2" style='border:1px solid lightgray'>
                                          Debit
                                    </div>
                                    <div class="form-group col-sm-2 col-md-2 col-lg-2" style='border:1px solid lightgray'>
                                          Credit
                                    </div>
                                    <div class="form-group col-sm-2 col-md-2 col-lg-2" style='border:1px solid lightgray'>
                                          Balance
                                    </div>

                                    <?php 
                                          //Get all transaction jv using tranaction id
                                          $ta_list = DB::table('journal_vouchar_details');
                                          $ta_list->where('coa_id', $id);
                                          if($st_date != ''){
                                                $ta_list->where('jv_date', '>=',  $st_date);
                                          }
                                          if($end_date != ''){
                                                $ta_list->where('jv_date', '<=',  $end_date);
                                          }
                                          $ta_lists = $ta_list->get(); 
                                          if($ta_lists->count() > 0){
                                                foreach($ta_lists as $ta){ 
                                                      $cbalance += $ta->debit;
                                                      $cbalance -= $ta->credit;

                                                      //get transaction name and code
                                                      $coa_details = DB::table('coas')->where('id', $ta->coa_id)->where('user_id',$user_id)->first();
                                                ?>
                                                      <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                                            {{$ta->created_at}}
                                                      </div>
                                                      <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                                            {{$coa_details->coa_name}}
                                                      </div>
                                                      <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                                            {{$coa_details->coa_code}}
                                                      </div>
                                                      <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                                           {{$ta->debit}}
                                                      </div>
                                                      <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                                            {{$ta->credit}}
                                                      </div>
                                                      <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                                            {{$cbalance}}
                                                      </div>

                                                      
                                    <?php       }
                                          }
                                    ?>
                                                      <div class="form-group col-sm-9 col-md-9 col-lg-9"></div>
                                                      <div class="form-group col-sm-1 col-md-1 col-lg-1">
                                                            <b>Closing :</b> 
                                                      </div>
                                                      <div class="form-group col-sm-2 col-md-2 col-lg-2">
                                                            <b>{{$cbalance}}</b>
                                                      </div>
                              </div>
                        <?php }
                        $ldgr_count++;}
                  }
                  ?>
              </div>

      <?php $sno++;}} ?>            




            </div>
          </div>
        </div>





  </div>
  <!-- end main-content -->
@endsection

@section('js')
<!-- JS -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<script>
$(".chosen-select").chosen();

$(document).on('click', '#pdf', function(){
      var coaform = $('#coaform');
      var formdata = coaform.serialize();
      
      var st_date = $('#st_date').val();
      var end_date = $('#end_date').val();
      var coa_parent = $('#coa_parent').val();

      console.log(coa_parent);

      $.ajax({
            type:'post',
            url:"{{url('frontpharmacy/COA/getLedgerPDF')}}",
            data:{'_token':"{{ csrf_token() }}", coa_parent:coa_parent, st_date:st_date, end_date:end_date},
            dataType:'json',
            success:function(data){
                  console.log('success');
                  console.log(data);
            },
            error:function(data){
                  console.log('ERROR COA PDF');
                  console.log(data.responseText);
            }
      });
});

</script>
@endsection
