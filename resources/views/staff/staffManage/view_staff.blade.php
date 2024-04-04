@extends('admin.admin_dashboard')

@section('admin')

      <div class="container-fluid">
         <div class="row">
         <div class="col-lg-2">

         </div>
            <div class="col-lg-8">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">View Staff</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form>
                           @csrf

                           <div class="row">
                            <div class="form-group col-md-6">
                               <label for="fname">Full Name</label>
                               <p class="form-control-static"  id="fname" >{{$staff->first_name}}</p>
                            </div>



                            <div class="form-group col-md-6">
                               <label for="email">Email</label>
                               <p class="form-control-static">{{$staff->email}}</p>
                               {{-- <input type="email" class="form-control" id="email" placeholder="Email" name="email"  value="{{$staff->email}}" >
                               <span id="emailError" class="text-danger"></span> --}}
                            </div>

                            <div class="form-group col-sm-6">
                                    <label>Nationality</label>
                                    <p class="form-control-static" id="nationality">
                                       {{ $staff->nationality }}
                                    </p>
                                 </div>
                            <div class="form-group col-md-6">
                               <label for="region">Designation</label>
                               <p class="form-control-static">{{$staff->region}}</p>
                               {{-- <input type="text" class="form-control" id="region" placeholder="Designation" name="region" value="{{$staff->region}}" > --}}
                            </div>

                            <div class="form-group col-md-6">
                               <label for="birth_date">Joined Date</label>
                               <p class="form-control-static">{{$staff->birth_date}}</p>
                               {{-- <input type="date" class="form-control" id="birth_date" placeholder="Joined Date" value="{{$staff->birth_date}}" name="birth_date" > --}}
                            </div>


                            <div class="form-group col-md-6">
                                <label for="birth_date">Roles</label>
                                <p>@foreach($sales_role as $sales_roles)
                                @if($sales_roles->id == $staff->role_id)
                                {{$sales_roles->name}}
                                @endif
                                @endforeach</p>
                             </div>


                            <div class="form-group col-md-6">
                               <label for="zip_code">Office Branch</label>
                               <p class="form-control-static">{{$staff->zip_code}}</p>
                               {{-- <input type="text" class="form-control" id="zip_code" placeholder="Office Branch" name="zip_code" value="{{$staff->zip_code}}" > --}}
                            </div>

                            <div class="form-group col-md-6">
                               <label for="department">Department</label>
                               <p class="form-control-static">{{$staff->department}}</p>
                               {{-- <input type="text" class="form-control" id="department" placeholder="Department" name="department" value="{{$staff->department}}" > --}}
                            </div>

                            <div class="form-group col-md-6">
                               <label for="add1">Location</label>
                               <p class="form-control-static">{{$staff->address_line1}}</p>
                               {{-- <input type="text" class="form-control" id="add1" placeholder="Location" value="{{$staff->address_line1}}" name="address_line1" > --}}
                            </div>

                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <p class="form-control-static">{{$staff->city}}</p>
                                {{-- <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{$staff->city}}" > --}}
                             </div>


                             <div class="form-group col-md-6">
                                <label for="city">Emirates</label>
                                <p class="form-control-static">{{$staff->gender}}</p>
                                {{-- Uncomment the line below if you want to keep the input field hidden --}}
                                {{-- <input type="hidden" name="city" value="{{$staff->city}}"> --}}
                            </div>

                           


                            <div class="form-group col-md-6">
                                <!-- <label for="password">Password:</label> -->
                                <input type="hidden" class="form-control" id="Password" placeholder="password" name="password" >
                             </div>
                          </div>


                              {{-- <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">First Name:</label>
                                    <p class="form-control-static" id="fname">{{ $staff->first_name }}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="lname">Last Name:</label>
                                    <p class="form-control-static" id="lname">{{ $staff->last_name }}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <p class="form-control-static" id="email">{{ $staff->email }}</p>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="birth_date">Birth Date:</label>
                                    <p class="form-control-static" id="birth_date">{{ $staff->birth_date }}</p>

                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="gender">Gender:</label>
                                    <p class="form-control-static" id="gender">{{ $staff->gender }}</p>
                                    <!-- <select class="form-control" name="gender">
                                       <option value="">Please select one…</option>
                                       <option value="female">Female</option>
                                       <option value="male">Male</option>
                                       <option value="other">Other</option>
                                    </select> -->
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="phone_number">Phone Number:</label>

                                    <p class="form-control-static" id="phone_number">{{ $staff->phone_number }}</p>

                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="add1">Street Address 1:</label>

                                    <p class="form-control-static" id="address_line1">{{ $staff->address_line1 }}</p>

                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="add2">Street Address 2:</label>

                                    <p class="form-control-static" id="address_line2">{{ $staff->address_line2 }}</p>

                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="city">City:</label>

                                    <p class="form-control-static" id="city">{{ $staff->city }}</p>

                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="region">Region:</label>

                                    <p class="form-control-static" id="region">{{ $staff->region }}</p>

                                 </div>

                                 <div class="form-group col-md-12">
                                    <label for="zip_code">Zip Code:</label>

                                    <p class="form-control-static" id="zip_code">{{ $staff->zip_code }}</p>

                                 </div>
                                 <div class="form-group col-sm-12">
                                    <label>Country:</label>
                                    <p class="form-control-static" id="Country">{{ $staff->country }}</p>

                                    <!-- <select class="form-control" id="selectcountry" name="country">
                                       <option>Select Country</option>
                                       <option>Caneda</option>
                                       <option>Noida</option>
                                       <option >USA</option>
                                       <option>India</option>
                                       <option>Africa</option>
                                    </select> -->
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="department">Department:</label>

                                    <p class="form-control-static" id="department">{{ $staff->department }}</p>

                                 </div>
                                 <div class="form-group col-md-12">
                                    <!-- <label for="password">Password:</label> -->
                                    <input type="hidden" class="form-control" id="Password" placeholder="password" name="password" autocomplete="off">
                                 </div>
                              </div>
                              --}}
                              <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>

                              <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.staff',$staff->id)}}">Edit Staff</a>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>


@endsection

<script>
    function goBack() {
       // Go back one page in the browser's history
       window.history.go(-1);
    }
 </script>
