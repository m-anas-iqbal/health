@extends('frontend.layout.master')
@section('content')
   <!-- Start main-content -->
  <div class="main-content">
     
    <!-- Section: home -->
    <section id="home" class="divider">
      <div class="container pt-0 pb-0">
       <h1>@if($laboratory) {{$laboratory->labority_fullname}} @endif</h1>

<div style="border-radius: 10px;" class="col-12 col-md-10 offset-md-1 bg-white my-2">
        <div class="row">
            <div class="col-12">
                <form class="form" id="lab-appointment-form" method="post" enctype="multipart/form-data" novalidate="novalidate">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
                    <input type="hidden" name="lab_id" value="" class="form-control">
                    <h3 class="text-accent font-size-md pt-3">Enter Your Details</h3>
                    <div class="row pt-3">
                        <div class="col-md-6 col-12">
                            <label class="font-size-sm">Select Lab city*</label>
                            <select style=" border-radius: 4px; border-color:#d3d3d3" class="form-control w-100 font-size-md valid" id="lab_cities" required="" name="lab_city_name" data-lab-id="15" aria-invalid="false">
                                <option value="">Choose Lab City</option>
                                <option value="Lahore">Lahore</option>
                                <option value="Karachi">Karachi</option>
                                <option value="Islamabad">Islamabad</option>
                                <option value="Gujranwala">Gujranwala</option>
                                <option value="Hyderabad">Hyderabad</option>
                                <option value="Mirpur">Mirpur</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="font-size-sm">Select Branch*</label>
                            <select style=" border-radius: 4px; border-color:#d3d3d3" class="font-size-md form-control w-100" required="" name="lab_branch_name" id="lab_branches" data-lab-id="15"><option value="">Choose Lab Branch</option><option value="A-1/3 &amp; 4, Block 4, Gulshan-e-Iqbal, Main Abul Hassan Isphahani Road - Karachi">A-1/3 &amp; 4, Block 4, Gulshan-e-Iqbal, Main Abul Hassan Isphahani Road - Karachi</option><option value="Billys Arcade, Shop No.145-146, Main University Road, KDA Scheme 33, Adjacent to Johar Complex - Kar">Billys Arcade, Shop No.145-146, Main University Road, KDA Scheme 33, Adjacent to Johar Complex - Kar</option><option value="FL-11/17, Block 13-A, Gulshan-e-Iqbal - Karachi.">FL-11/17, Block 13-A, Gulshan-e-Iqbal - Karachi.</option><option value="N-28 korangi 1/2, sector 35-C, opposite PSO pump">N-28 korangi 1/2, sector 35-C, opposite PSO pump</option><option value="One Step Diagnostic Centre: 38-C, Lane-8, Main Khayaban-e-Muslim, Bukhari Commercial, Phase-VI - Kar">One Step Diagnostic Centre: 38-C, Lane-8, Main Khayaban-e-Muslim, Bukhari Commercial, Phase-VI - Kar</option><option value="One Step Diagnostic Centre: R-01-02, Jamal-e-Ibrahim Society Quaidabad, Karachi">One Step Diagnostic Centre: R-01-02, Jamal-e-Ibrahim Society Quaidabad, Karachi</option><option value="Plot 38, DHA Phase 6 Karachi.">Plot 38, DHA Phase 6 Karachi.</option><option value="Plot No. B-122, Block H, North Nazimabad - Karachi.">Plot No. B-122, Block H, North Nazimabad - Karachi.</option><option value="R-46 sector 5 C-2 near powerhouse chowrangi, north karachi">R-46 sector 5 C-2 near powerhouse chowrangi, north karachi</option><option value="S B 1, Suite#2, Javed Arcade, Block 17, Gulistan-e-Jauhar - Karachi.">S B 1, Suite#2, Javed Arcade, Block 17, Gulistan-e-Jauhar - Karachi.</option><option value="Shop No. 26, 28,29,30, Ground Floor, Taj Complex Main M.A. Jinnah Road - Karachi.">Shop No. 26, 28,29,30, Ground Floor, Taj Complex Main M.A. Jinnah Road - Karachi.</option><option value="Suit No. 1-3, Asif Square, Baba-e-Urdu Road, Opp. Civil Hospital - Karachi.">Suit No. 1-3, Asif Square, Baba-e-Urdu Road, Opp. Civil Hospital - Karachi.</option><option value="Suite No. 2, Plot 8-C, Near Subway &amp; Deepak Parwani, 4th Zamzama Commercial Lane - Karachi.">Suite No. 2, Plot 8-C, Near Subway &amp; Deepak Parwani, 4th Zamzama Commercial Lane - Karachi.</option><option value="Suite#CS 19/02, Block 7, Ali Apartments, F.B. Area-Karachi.">Suite#CS 19/02, Block 7, Ali Apartments, F.B. Area-Karachi.</option></select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 col-12">
                            <input class="form-check-input" id="lab_visit" type="radio" name="type" checked="" value="0">
                            <label for="lab_visit" class="font-size-sm">I need to visit lab for blood test</label>
                        </div>
                        <div class="col-md-6 col-12">
                            <input class="form-check-input" id="home_visit" type="radio" name="type" value="1">
                            <label for="home_visit" class="font-size-sm">I need to give my blood test at home.</label><br>
                        </div>
                    </div>

            <div class="col-sm-6">
                <div class="form-group">   
                <label>Patient Full name:</label>
                <input type="text" placeholder="Fullname" class="form-control chk-empty" name="patient_phone" id='p_mobile' value="">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">   
                    <label>Attach Prescription:</label>
                    <input class="btn border form-control" id="patient_prescription" name="patient_prescription" type="file">
                </div>
            </div>
     
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Patient Mobile:[e.g 03332071179]</label><span id='p_mobileError'></span>
                  <input type="text" placeholder="Mobile" class="form-control chk-empty" name="patient_phone" id='p_mobile' value="">
                </div>
              </div>
              
              
              <div class="col-sm-6">
                <div class="form-group">   
                <label>Patient Password:</label><span id='passwordError'></span>
                <input type="password" placeholder="Password" name="password" value="" class="form-control chk-empty" aria-required="true" aria-invalid="false" maxlength="100"></span>
                </div>
              </div>
              

            <div class="col-12"><span id='p_commentsError'></span>
                <label>Patient Address:</label>
                <textarea name="p_addresss" placeholder="addresss" cols="40" rows="10" class="form-control" aria-invalid="false"></textarea>
            </div>
            
            <div class="col-12"><span id='p_commentsError'></span>
                <label>Patient Comments:</label>
                <textarea name="p_comments" placeholder="comments" cols="40" rows="10" class="form-control" aria-invalid="false"></textarea>
            </div>

            <br><br>    

                    <div class="row pt-4">
                        <div class="col-12 text-right">
                            <a id="submit" class="btn btn-primary py-2 lab_book_lab_test" onclick="submitForm()" style="cursor: pointer;"><i class="fa fa-video" style="color: #fff;"></i>Book Lab Test</a>
                        </div>
                    </div>
                </form>
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
