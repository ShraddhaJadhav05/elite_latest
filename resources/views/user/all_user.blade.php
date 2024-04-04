@extends('admin.admin_dashboard')

@section('admin')


<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Users</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-responsive">
                      <div class="row justify-content-between">
                      <div class="col-sm-12 col-md-2">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <form id="searchForm" action="{{ route('data.userData') }}" method="GET">
                                        <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div>
                                    </form>
                                 </div>
                              </div>
                         <div class="col-sm-12 col-md-6">
                            <div class="user-list-files d-flex float-right">
                               <a class="btn btn-primary" href="{{ route('show.user')}}">
                                  Add New User
                                </a>
                              </div>
                         </div>
                      </div>
                      <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                        <thead>
                            <tr>
                              <th>Sr No</th>
                               <th>Profile</th>
                               <th>Name</th>
                               <th>Role</th>
                               <th>Email</th>
                               <th>Country</th>
                               <th>Status</th>
                               
                               <th>Action</th>
                            </tr>
                        </thead>
                        <?php $i=1; ?>
                        <tbody>
                           @foreach($users as $user)
                           <tr>
                              <td>{{$i++}}</td>
                              <td>
                                 @if($user->logo)
                                     <img class="rounded-circle img-fluid avatar-40" src="{{ asset('user_profile/' . $user->logo) }}" alt="Logo">
                                 @else
                                     <img class="rounded-circle img-fluid avatar-40" src="{{ asset('images/user/blank.png') }}" alt="Logo">
                                 @endif
                             </td>
                              <td>{{$user->fname}}</td>
                              <td>{{$user->role}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->state}}</td>
                              <td>{{$user->status}}</td>
                        
                          
                               <td>
                                  <div class="flex align-items-center list-user-action">
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="{{ route('view.user',$user->id) }}"><i class="ri-eye-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('edit.user',$user->id) }}"><i class="ri-pencil-line"></i></a>
                                     <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{ route('delete.user',$user->id) }}"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                               </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                   </div>
                   <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-12" >
                                <div style="float:right;">

                                {{ $users->appends(['search' => request('search')])->links() }}
                                </div>
                            </div>
                  </div>
                    </div>
             </div>
       </div>
    </div>
 </div>

 <script>
   document.getElementById('searchInput').addEventListener('input', function () {
      document.getElementById('searchForm').submit();
   });
</script>
<script>
    // Add a click event listener to the delete button
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            // Prevent the default action of following the link immediately
            event.preventDefault();

            // Show a confirmation box
            if (confirm('Are you sure you want to delete?')) {
                // If the user confirms, follow the link
                window.location.href = button.getAttribute('href');
            }
        });
    });
</script>
@endsection