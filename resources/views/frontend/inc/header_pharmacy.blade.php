<div class="row" style='border:1px solid lightgray;margin-top:5px;border-radius:10px;'>
<div class="col-xs-6 col-sm-6 col-md-6">
         <?php 
            if( Auth::guard('frontpharmacy')->user() ){
               $id = Auth::guard('frontpharmacy')->user()->id;
            }else{
               $id = '';
            }
         ?>
      <nav id="menuzord-right" class="menuzord blue bg-lightest">
         <ul class="menuzord-menu">
            <li><a href="{{url('frontpharmacy')}}">Dashboard</a></li>
            <li><a href="{{url('frontpharmacy/editPharmacyRegistration/'.$id)}}">Edit Pharmacy Registration</a>
            <li><a href="#">Accounts</a>
               <ul class="dropdown">
                  <li><a href="{{url('frontpharmacy/COA')}}">Chart Of Accounts (COA)</a></li> 
                  <li><a href="{{url('frontpharmacy/COA/create')}}">Create Chart Of Accounts (COA)</a></li> 
                  <li><a href="{{url('frontpharmacy/COA/createGeneralEntery')}}">Create General Entery</a></li> 
                  <li><a href="{{url('frontpharmacy/COA/ledger')}}">Ledger</a></li> 
               </ul>
            </li> 
            <li><a href="#">Inventory</a>
               <ul class="dropdown">
                  <li><a href="{{url('frontpharmacy/inventory/brand')}}">Brands</a></li> 
                  <li><a href="{{url('frontpharmacy/inventory/category')}}">Categories</a></li> 
                  <li><a href="{{url('frontpharmacy/inventory/product')}}">Products</a></li> 
                  <li><a href="{{url('frontpharmacy/dashboard')}}">Make Order</a></li> 
               </ul>
            </li>           
         </ul>
      </nav>     
   </div>
   <div class="col-xs-6 col-sm-6 col-md-6"></div>
</div> 