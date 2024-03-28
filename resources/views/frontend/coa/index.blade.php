<?php
//header('Content-type: application/json');
?>
@extends('frontend.layout.master')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

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
            <h3 style='line-height:1.0'>Chart of Account  Pharmacy Name: <span class="title text-white">{{$patient_fullname}}</span>,  Pharmacy Phone: <span class="title text-white">{{$patient_phone}}</span></h3>
            
               
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
             
            
   <?php /*<div id="html" class="demo">
		<ul>
			<li data-jstree='{ "opened" : true }'>Root node
				<ul>
					<li data-jstree='{ "selected" : true }'>Child node 1</li>
					<li>Child node 2</li>
				</ul>
			</li>
		</ul>
	</div>
   <div id="data" class="demo"></div>*/ ?>
			 
            
<!-- /input-group  <div id="evts" class="demo"></div>-->
          <div class="container" style="padding:10px 10px;">
	<h1>Chart Of Account Tree View : </h1>
	<div id="header"></div>
	<div class="well clearfix">
		<div class="col-md-6">
			<!--panel-->
			<div class="panel panel-default">
			 <div class="panel-heading">
				<div class="input-group99">
				  <input type="text" class="form-control" placeholder="Search node .." id="search">
				  <span class="input-group-btn">
					<!-- <button class="btn btn-default" type="button" id="btn-search">Go!</button> -->
				  </span>
				</div><!-- /input-group -->
			 </div>
			 <div class="panel-body">
				<div class="row">
               
					<div class="col-md-8" id="evts"></div>
				</div>
			 </div>
			</div>
		</div>
		<div class="col-md-6">
			<!--panel-->
			<div class="panel panel-default">
			 <div class="panel-heading" style='padding:20px;'>Edit Selected COA Name : </div>
			 <div class="panel-body">
               <span id='node_msg'></span>
               @if (Session::has('message'))
                            <?php $alert_class =  Session::get('alert-class');  ?>
                            <div class="alert {{ $alert_class }}">
                                {{ Session::get('message') }}
                            </div>
                        @endif
               <form name="editCOAForm" id="editCOAForm" class="clearfix9" action="<?php echo url('frontpharmacy/COA/storeTA');  ?>" method='post'>
                  {{ csrf_field() }}
                  
                     <br>
                     <div class="row">
                        <div class="form-group col-md-3"><label for="coa_name">COA Parent:</label></div>
                        <div class="form-group col-md-8">
                           <?php 
                                $user_id = auth()->user()->id;

                                 $all_coas = DB::table('coas')->where('parent',0)->where('user_id',$user_id)->get();
                           ?>
                           <select id="coa_id" name="coa_id" class="form-control" required>
                              
                              <option value=''>Please Select COA Parent</option>

                              @if($all_coas)
                                    @foreach($all_coas as $coa)
                                          <?php /*
                                          <option value='2_{{$coa->id}}_{{$coa->id}}'>{{$coa->coa_name}}-{{$coa->coa_code}}</option>
                                          */ ?>
                                          <?php 
                                                //show 2nd levels of coa
                                                $all_coas2 = DB::table('coas')->where('parent',$coa->id)->where('user_id',$user_id)->get();
                                          ?>
                                          @if($all_coas2)
                                                @foreach($all_coas2 as $coa2)
                                                   <?php /*
                                                   <option value='3_{{$coa2->id}}_{{$coa->id}}'>{{$coa->coa_name}} >> {{$coa2->coa_name}}-{{$coa2->coa_code}}</option>
                                                   */ ?>      
                                                         <?php 
                                                               /**///show 3rd levels of coa
                                                               $all_coas3 = DB::table('coas')->where('parent',$coa2->id)->where('user_id',$user_id)->get();
                                                         ?>
                                                         @if($all_coas3)
                                                               @foreach($all_coas3 as $coa3)
                                                                  <option value='4_{{$coa3->id}}_{{$coa->id}}'>{{$coa->coa_name}} >> {{$coa2->coa_name}} >> {{$coa3->coa_name}}</option>

                                                               @endforeach()
                                                         @endif
                                                         <?php  ?>

                                                @endforeach()
                                          @endif
                                    @endforeach()
                              @endif
                              
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-3"><label for="coa_name">Transaction Account:</label></div>
                        <div class="form-group col-md-8">
                           <input id="coa_name" name="coa_name" class="form-control" type="text" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-3"><label for="coa_name">Opening Balance:</label></div>
                        <div class="form-group col-md-8">
                           <input id="coa_obalance" name="coa_obalance" class="form-control" type="text" required>
                        </div>
                     </div>
                     <div class="form-group pull-right mt-10">
                        <input type="submit" name="submit" value="Add" class="btn btn-primary">
                     </div>
               </form>
            </div>
			 </div>
			</div>
		</div>
	</div>
	<div id="footer"></div>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
 

                  <?php 
                        $user_id = auth()->user()->id;
                        $all_nodes = [];
                        //get parent=0 of coas table
                        $coas1_q = DB::table('coas')->where('parent', 0)->where('status', '1')->where('user_id',$user_id)->get();
                        if($coas1_q->count() > 0){
                              $coa_db = [];
                              $coa_tree = [];
                              //$coa_db_child = [];
                              foreach($coas1_q as $cq){
                                      // echo 'Level 1 => '.$cq->coa_name.'<br>';
                                      $ck1 = $cq->id;
                                 //get second level
                                 $coas2_q = DB::table('coas')->where('parent', $cq->id)->where('status', '1')->where('user_id',$user_id)->get();
                                 if($coas2_q->count() > 0){
                                    $children2 = [];
                                    foreach($coas2_q as $cq2){
                                                //echo '=======> Level 2 => '.$cq2->coa_name.'<br>';
                                                $ck2 = $cq2->id;
                                                //$all_nodes[$cq->coa_name][$ck2] = $cq2->coa_name;
                                                //$all_nodes[$ck1.'-'.$ck2] = $cq2->coa_name;
                                                //$children2 = ['text'=>"$cq2->coa_name"];
                                                
                                                $c3_exist = false;
                                                //get third level
                                                /*,"icon" => "jstree-file"*/
                                                $coas3_q = DB::table('coas')->where('parent', $cq2->id)->where('user_id',$user_id)->get();
                                                
                                                if($coas3_q->count() > 0){
                                                   $children3 = [];
                                                   foreach($coas3_q as $cq3){
                                                      //echo '==================> Level 3 => '.$cq3->coa_name.'<br>';

                                                      //get fourth level
                                                      /*,"icon" => "jstree-file"*/
                                                      $coas4_q = DB::table('coas')->where('parent', $cq3->id)->where('user_id',$user_id)->get();
                                                      if($coas4_q->count() > 0){
                                                         $children4 = [];
                                                         foreach($coas4_q as $cq4){
                                                            array_push($children4, ['id'=>'5_'.$cq4->id.'_'.$cq->id,'text'=>"$cq4->coa_name"."-"."$cq4->coa_code","icon" => "jstree-file"]);
                                                         }
                                                         array_push($children3, ['id'=>'4_'.$cq3->id.'_'.$cq->id, 'text'=>"$cq3->coa_name"."-"."$cq3->coa_code", 'children'=>$children4]);
                                                      }else{
                                                         array_push($children3, ['id'=>'4_'.$cq3->id.'_'.$cq->id, 'text'=>"$cq3->coa_name"."-"."$cq3->coa_code"]);
                                                      }

                                                      //array_push($children3, ['id'=>'4_'.$cq3->id.'_'.$cq->id,'text'=>"$cq3->coa_name"."-"."$cq3->coa_code"]);
                                                   }
                                                   array_push($children2, ['text'=>"$cq2->coa_name"."-"."$cq2->coa_code", 'children'=>$children3]);
                                                }else{
                                                   array_push($children2, ['text'=>"$cq2->coa_name"."-"."$cq2->coa_code"]);
                                                }
                                       
                                    }
                                    $coa_tree[] = ['text'=>"$cq->coa_name"."-"."$cq->coa_code", 'children'=>$children2]; 
                                 }else{
                                    //$all_nodes[$cq->coa_name]=$cq->coa_name;
                                    $coa_tree[] = ['text'=>"$cq->coa_name"."-"."$cq->coa_code"];
                                 }
                                 
                                 

                                 /*if(!empty($coa_db_child) && count($coa_db_child) > 0){
                                    //echo '$coa_db_child exist';
                                    $coa_db[] = ['text'=>"$cq->coa_name"."-"."$cq->coa_code", 'children'=>$coa_db_child]; 
                                    $coa_db_child = [];
                                 }else{
                                    $coa_db[] = ['text'=>"$cq->coa_name"."-"."$cq->coa_code"]; 
                                 }*/
                                 
                                 //echo '<br>';
                              }
                              //$coas1 = json_encode($coa_db);
                        }else{
                           //$coas1 = false;
                           //$coa_db = false;
                           $coa_tree = false;
                        }

                       
                        //echo '<pre>';
                        //print_r($all_nodes);

                        //echo '<pre>';
                        //print_r($coa_db);
                              
                        /*$coas_ori = json_decode('[{ "text" : "Root node1"}]');
                        $coas_arr = ["text"=>"aaaa"];

                        echo '<pre>';   
                        print_r($coas_ori);
                        print_r($coas_arr);

                        $coas_json = json_encode($coas_arr);
                        
                        print_r(json_encode($coas_ori));
                        print_r($coas_json);*/

                        /*$myArr = array(['text'=>"apple"], ['text'=>"banana"], ['text'=>"mango"], ['text'=>"jackfruit"]);
                        echo '<pre>';
                        print_r($myArr);*/

                  //if($coa_db) $toJSON = json_encode($coa_db); else $toJSON = false;
                  if($coa_tree) $toJSON = json_encode($coa_tree); else $toJSON = false;
                        ///echo '$toJSON';
                        ///echo $toJSON;
                  ?>
             <br>
             <br>
              </div>
            </div>
          </div>
        </div>





  </div>
  <!-- end main-content -->
@endsection



@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script>

   /*var coas1 = "{{--$coas1--}}";
   console.log('coas1');
   console.log(coas1);
   console.log(JSON.parse(coas1, true));
   $.each( (JSON.parse(coas1)), function(k,v){
      console.log(v);
   });*/


  /*$('#evts')
		.on("changed.jstree", function (e, data) {
			if(data.selected.length) {
				alert('The selected node is: ' + data.instance.get_node(data.selected[0]).text);
			}
		})
		.jstree({
			'core' : {
				'multiple' : false,
				'data' : [
					{ "text" : "Root node1", "children" : [
                                                      { "text" : "Child node 1", "id" : 1 },
                                                      { "text" : "Child node 2", "children" : [
                                                                                                { "text" : "Child node 2111", "id" : 11 },
                                                                                                { "text" : "Child node 2112" },
                                                                                                { "text" : "Child node 2113" },
                                                                                                { "text" : "Child node 2114" },
                                                                                                { "text" : "Child node 2115" },
                                                                                                { "text" : "Child node 2116" }
                                                                                             ] 
                                                      },
                                                      { "text" : "Child node 3" },
                                                      { "text" : "Child node 4" },
                                                      { "text" : "Child node 5" },
                                                      { "text" : "Child node 6" }
                                                   ]
               },
               { "text" : "Root node2", "children" : [
                                                      { "text" : "Child node 21", "id" : 21 },
                                                      { "text" : "Child node 22" },
                                                      { "text" : "Child node 23" },
                                                      { "text" : "Child node 24" },
                                                      { "text" : "Child node 25" },
                                                      { "text" : "Child node 26" }
                                                   ]
               }
				]
			}
		});*/
      
      <?php if($toJSON){ ?>
      var toJSON =  JSON.parse(<?php echo json_encode($toJSON); ?>);
      <?php }else{?>
         var toJSON = false;
      <?php } ?>
      console.log('toJSON');
      console.log(toJSON);

      //var coa_ori = [{ "text" : "Root node1"}];
      //console.log(coa_ori);      

      /*var coas_json = "{{--$coas_json--}}";
      console.log(JSON.stringify(coas_json));*/

      /*$('#evts')
		
		.jstree({
			'core' : {
				'multiple' : true,
				'data' : toJSON
			}
		});*/


   $('#editCOAForm').hide();  
   $('#node_msg'). html('Please Select Third Level COA Name for Transacton Account.'); 	
	$('#evts')
   .on("changed.jstree", function (e, data) {
			if(data.selected.length) {
            var id = data.instance.get_node(data.selected[0]).id;
				//$('#node_msg'). html('The selected node ID is: ' + data.instance.get_node(data.selected[0]).id);

            $.ajax({
                  type:'post',
                  url:"{{url('frontpharmacy/COA/getCOAName')}}",
                  data:{"_token": "{{ csrf_token() }}",id:id,},
                  dataType:'json',
                  success:function(data){
                     console.log('success'); 
                     console.log(data); 
                     if(data.status == true){
                        $('#coa_id').show();
                           $('#coa_obalance').show();
                        $('#editCOAForm').show();
                        $('#coa_name').val('');   
                        $('#coa_id').val(data.coa_id);
                        $('.btn').val(data.type);
                        
                        if(data.type == 'Edit'){
                           //$('#coa_name').val(data.coa_name);   
                           //$('#coa_id').hide();
                           //$('#coa_obalance').hide();
                        }

                        if(data.type == 'Add'){
                           $('#editCOAForm').show(); 
                        }else{
                           $('#editCOAForm').hide(); 
                        }
                     }
                  },
                  error:function(data){
                     console.log('error'); 
                     console.log(data.responseText); 
                  }
            });


            
			}
		})
   .jstree({
		'core' : {
            'data' : toJSON
        },
	
		plugins: ["search"]
	}).on('loaded.jstree', function() {
      $('#evts').jstree('open_all');
  }).bind("select_node.jstree", function (e, data) {
		 var href = data.node.a_attr.href;
		 var parentId = data.node.a_attr.parent_id;
		 if(href == '#')
		 return '';
		 
		 window.open(href);
		 
	});

	$('#evts').slimScroll({
		height: '800px'
	});

	$('#search').keyup(function(){
		$('#evts').jstree('search', $(this).val());
	});
</script>




@endsection
