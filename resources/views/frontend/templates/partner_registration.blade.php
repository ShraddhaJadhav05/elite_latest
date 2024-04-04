@extends("frontend.layouts.app")
@section('page_content')
<div id="home" class="confidence-home-area five-banner-here">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-lg-12 col-md-12">
            <div class="confidence-home-content text-center">
               <h1>Sign up For Partners</h1>
               <nav class="text-center">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{route('homePage')}}">Home</a></li>
                     <li class="breadcrumb-item active">Sign up For Partners</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="contact" class="pt-100 pb-100">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-12"></div>
         <div class="col-lg-6 col-md-12">
            <div class="let-contact-form with-main-color process_mg">
               @if ($message = Session::get('success'))
               <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>    
                  <strong>{{ $message }}</strong>
               </div>
               @endif

               @if ($message = Session::get('error'))
               <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>    
                  <strong>{{ $message }}</strong>
               </div>
               @endif
               <h3>User Details</h3>
               <form method="post" action="{{route('partnerRegistration')}}">
                  @csrf
                  <div class="row m-0">
                     <div class="col-sm-12 col-lg-12">
                        <div class="form-group">
                           <label for="name">First Name</label>
                           <input type="text" name="first_name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="William">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-12">
                        <div class="form-group">
                           <label for="name">Last Name</label>
                           <input type="text" name="last_name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="William">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-12">
                        <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter a valid email address" placeholder="demo@gmail.com">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-12">
                        <div class="form-group">
                           <label for="phone_number">Phone Number</label>
                           <input class="logincountryselection form-control" id="phone" name="phone" type="tel" placeholder="Phone no" required="">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-12">
                        <div class="form-group">
                           <label for="phone_number">Password</label>
                           <input class="logincountryselection form-control pass_log_id" id="Password" name="password" type="password" placeholder="Password"  onChange="onChange()" required="">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-12">
                        <div class="form-group">
                           <label for="phone_number">Confirm Password</label>
                           <input class="logincountryselection form-control pass_log_id" id="Confirm Password" name="confirm_password" type="password" placeholder="Confirm Password"  onChange="onChange()" required="">
                           <div class="help-block with-errors"></div>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-12">
                        <div class="let-contact-btn">
                           <button class="main-default-btn cnt_btn" type="submit">Register</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-lg-3 col-md-12"></div>
         </div>
      </div>
   </div>
</div>
<script>
    function onChange() {
        const password = document.querySelector('input[name=password]');
        const confirm = document.querySelector('input[name=confirm_password]');
    
        if (confirm.value === password.value) {
            confirm.setCustomValidity('');
        } else {
            confirm.setCustomValidity('Passwords do not match');
        }
    }
</script>
@endsection  