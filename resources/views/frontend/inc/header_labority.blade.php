<div class="row" style='border:1px solid lightgray;margin-top:5px;border-radius:10px;'>
<div class="col-xs-4 col-sm-4 col-md-4">
      <nav id="menuzord-right" class="menuzord blue bg-lightest">
         <?php 
         if( Auth::guard('frontlabority')->user() ){
            $id = Auth::guard('frontlabority')->user()->id;
         }else{
            $id = '';
         }
         ?>
         <ul class="menuzord-menu">
            <li><a href="{{url('frontlabority')}}">Dashboard</a></li>
            <li><a href="{{url('frontlabority/editLaborityRegistration/'.$id)}}">Edit Laboratory Registration</a>
               <?php /*<ul class="dropdown">
                  <li><a href="{{url('frontlabority/COA')}}">Chart Of Accounts (COA)</a></li> 
                  <li><a href="{{url('frontlabority/COA/create')}}">Create Chart Of Accounts (COA)</a></li> 
                  <li><a href="{{url('frontlabority/COA/createGeneralEntery')}}">Create General Entery</a></li> 
                  <li><a href="{{url('frontlabority/COA/ledger')}}">Ledger</a></li> 
               </ul>*/ ?>
            </li>            
         </ul>
      </nav>     
   </div>
   <div class="col-xs-8 col-sm-8 col-md-8"></div>
</div> 