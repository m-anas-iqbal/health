<div class="row" style='border:1px solid lightgray;margin-top:5px;border-radius:10px;'>
<div class="col-xs-4 col-sm-4 col-md-4">
      <nav id="menuzord-right" class="menuzord blue bg-lightest">
         <?php 
         if( Auth::guard('fronthakeem')->user() ){
            $id = Auth::guard('fronthakeem')->user()->id;
         }else{
            $id = '';
         }
         ?>
         <ul class="menuzord-menu">
            <li><a href="{{url('fronthakeem')}}">Dashboard</a></li>
            <li><a href="{{url('fronthakeem/editHakeemRegistration/'.$id)}}">Edit Hakeem Registration</a>
               <?php /*<ul class="dropdown">
                  <li><a href="{{url('fronthakeem/COA')}}">Chart Of Accounts (COA)</a></li> 
                  <li><a href="{{url('fronthakeem/COA/create')}}">Create Chart Of Accounts (COA)</a></li> 
                  <li><a href="{{url('fronthakeem/COA/createGeneralEntery')}}">Create General Entery</a></li> 
                  <li><a href="{{url('fronthakeem/COA/ledger')}}">Ledger</a></li> 
               </ul>*/ ?>
            </li>            
         </ul>
      </nav>     
   </div>
   <div class="col-xs-8 col-sm-8 col-md-8"></div>
</div> 