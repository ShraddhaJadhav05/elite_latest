@extends('admin.admin_dashboard')

@section('admin')

      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Enquires</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-2">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    {{-- <form id="searchForm" action="{{ route('all.enquires') }}" method="GET">
                                        <div class="form-group mb-0">
                                            <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">
                                        </div>
                                    </form> --}}
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                   
                                   </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email ID</th>
                                    <th>Contact Number</th>
                                    <th>Subject</th>
                                    <!-- <th>Message</th> -->
                                    <th>Looking For</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <?php $i=1; ?>
                              <tbody>
                              @foreach($enquiry as $enquirys)
                                 <tr>
                                   
                                    <td>{{$i++}}</td>
                                    <td>{{$enquirys->name}}</td>
                                    <td>{{$enquirys->email}}</td>
                                    <td>{{$enquirys->phone}}</td>
                                    <td>{{$enquirys->subject}}</td>
                                    <!-- <td>{{$enquirys->message}}</td> -->
                                    <td>{{$enquirys->looking_for}}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="{{route('view.enquiry',$enquirys->id)}}"><i class="ri-eye-line"></i></a>

                                          <!-- <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.appoinment',$enquirys->id)}}"><i class="ri-pencil-line"></i></a>

                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.appoinment',$enquirys->id)}}"><i class="ri-delete-bin-line"></i></a> -->

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

                                {{ $enquiry->appends(['search' => request('search')])->links() }}
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
@endsection
