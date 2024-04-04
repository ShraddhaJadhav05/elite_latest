@extends('admin.admin_dashboard')

@section('admin')

<div class="container-fluid">
    <div class="row">

       <div class="col-lg-12">
          <div class="iq-edit-list-data">
             <div class="tab-content">
                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                    <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Reset Password</h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <form id="updateresetpasswordForm" method="POST" action="{{route('update.password')}}">
                            @csrf
                            
                            <div class=" row align-items-center">
                               <div class="form-group col-sm-6">
                                  <label for="current_password">Current Password</label>
                                  <input type="password" class="form-control" id="current_password"  name="password">
                                  @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                  @enderror
                               </div>
                               <div class="form-group col-sm-6">
                                  <label for="new_password">New Password</label>
                                  <input type="password" class="form-control" id="new_password" name="new_password">
                                  @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                  @enderror
                               </div>
                         
                               <div class="form-group col-sm-12">
                                    <label for="new_password_confirmation">Verify Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                    @error('new_password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>

                            
                            <button type="submit" class="btn btn-primary mr-2">Update Password</button>
                            <!-- <button type="reset" class="btn iq-bg-danger">Cancle</button> -->
                         </form>

                         @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                      </div>
                   </div>
                </div>
                
             </div>
          </div>
       </div>
    </div>
 </div>


<script>
   function goBack() {
      // Go back one page in the browser's history
      window.history.go(-1);
   }
</script>
@endsection