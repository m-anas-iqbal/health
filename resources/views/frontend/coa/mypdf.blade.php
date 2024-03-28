<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger PDF</title>
</head>
<body>
    <style>
        table , td, th { 
        /* border: 1px solid #595959; 
        border-collapse: collapse; */
         }
        table{
        border-radius:10px;
        }
        td,th {
        padding: 3px;
                width: 105px;
                height: 20px;
                text-align: center;
                font-size:12px;
        }
        th{
            border-collapse: collapse;
             border: 1px solid #cecece; 
            padding: 3px;
                width: 105px;
                height: 20px;
                text-align: center;
                font-size:12px;
          /* background:#dbdbdb; */
          color:rgb(0, 0, 0);
        }
        .heading{
            font-weight: bolder;
            font-size: larger;
            text-align: left;
            padding-left: 20px;
        }
        .container{
        
        padding: 5px;
        
        }
        </style>

      <?php 
      if($ledgers){
            $sno = 1;
            foreach($ledgers as $coa_name => $ledger){
      ?> 
        <div class="container">
        <h3>{{ucfirst($coa_name)}}</h3>
        <lebal>Transactions accounts are as follow:</lebal>
        <table style='border: 3px solid #dbdbdb;border-radius: 10px;'>
            <tbody>
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
                                            <tr>
                                                <td class="heading" colspan="5">{{$ldgr_count}}: {{$ldgr_path}}</td>
                                                <td >Opening:{{$obalance}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:105px ;"> Date</th>
                                                <th style="width:105px ;">account name</th>
                                                <th style="width:105px ;">account code</th>

                                                <th style="width:105px ;">Debit</th>
                                                <th style="width:105px ;">Credit</th>
                                                <th style="width:105px ;">Balance </th>
                                                
                                            </tr>
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
                                                                $coa_details = DB::table('coas')->where('id', $ta->coa_id)->first();
                                                          ?>
                                                          
                                                          <tr>
                                                              <td>{{$ta->created_at}}</td>
                                                              <td>{{$coa_details->coa_name}}</td>
                                                              <td>{{$coa_details->coa_code}}</td>
                                                              <td>{{$ta->debit}}</td>
                                                              <td>{{$ta->credit}}</td>
                                                              <td>{{$cbalance}}</td>
                                                          </tr>
                                                  <?php       }?>
                                                            <tr>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td>Closing: </td>
                                                              <td>{{$cbalance}}</td>
                                                          </tr>
                                                  
                                                   <?php }
                                                  ?>
                                  <?php }
                                  $ldgr_count++;}
                            }
                            ?>
                            </tbody>
                        </table>
              <?php $sno++;}} ?> 
            
        <br>
     </div>


        <br>



<?php 
            /*if($ledgers){
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
                                                      $coa_details = DB::table('coas')->where('id', $ta->coa_id)->first();
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

      <?php $sno++;}}*/ ?>    