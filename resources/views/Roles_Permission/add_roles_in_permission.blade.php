@extends('admin.admin_dashboard')

@section('admin')
<div class="col-lg-12">
<div class="iq-card">
   <div class="iq-card-header d-flex justify-content-between">
      <div class="iq-header-title">
         <!-- <h4 class="card-title">Mortgage Process</h4> -->
      </div>
   </div>
   <div class="iq-card-body">
      <div class="new-user-info">
         <form id="addPermissionForm" method="POST" action="{{ route('add.roles') }}">
         @csrf

            
               <div class="form-group col-md-6">
                  <label for="pname">Role Name:</label>
                  <select class="form-control">
                     <option selected=""> Please select one…</option>
                     @foreach($roles as $role)
                     <option value="{{$role->id}}">{{$role->name}}</option>
                     @endforeach

                  </select>
               </div>

               <hr>

               @foreach($permission_groups as $permission_group)
               <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">{{$permission_group->group_name}}</label>
                        </div>

                    </div>

                    <div class="col-9">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Default CheckBox</label>
                        </div>

                    </div>
               </div>
               @endforeach
            
            <button type="submit"  class="btn btn-primary">Add New Role</button>
         </form>
      </div>
   </div>
</div>
</div>
</div>


@endsection

