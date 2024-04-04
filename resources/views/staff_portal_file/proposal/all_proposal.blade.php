@extends('staff.staff_dashboard')

@section('staff')

	<div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Client Proposal</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-6 col-lg-3">
                               <div id="user_list_datatable_info" class="dataTables_filter">
                                  <!--<form id="searchForm" method ="GET" action="{{ route('all.client.proposal') }}">-->
                                  <!--   <div class="form-group mb-0">-->
                                  <!--     <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search" aria-controls="user-list-table" id="searchInput">-->
                                  <!--   </div>-->
                                  <!--</form>-->
                               </div>
                            </div>
                           
                         </div>
                         <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                   <th>SR No</th>
                                  <th>Client Name</th>
                                  <th>Contact no</th>
                                  <th>Email</th>
                                  <th>Looking For</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                            <?php $i=1; ?>
                           <tbody>
                            @foreach($clients as $value)
                            <tr>
                                <td>{{$i++}}</td>
                               <td>{{$value->first_name}}</td>
                               <td>{{$value->phone_number}}</td>
                               <td>{{$value->email}}</td>
                               <td>{{$value->reason_for_loan}}</td>
                               <td>
                                  <div class="flex align-items-center list-user-action">
                                    @php
                                       $proposals = \App\Models\Client_proposal_plan::where('client_id', $value->id)->get();

                                       $intrested_proposals = \App\Models\Client_proposal_plan::where('client_id', $value->id)->where('client_interest',1)->get();
                                    @endphp
                                   
                                    
                                    @if(sizeof($proposals)==3)
                                     <a  class="iq-bg-primary" href="javascript:void(0)" class="create_proposal" data-original-title="Client Allready Created Proposal"><i class="fa fa-check verified"></i></a>
                                     @else
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Create Proposal" href="{{route('create.client.proposal',$value->id)}}"><i class="ri-add-line"></i></a>
                                     @endif

                                     @if(sizeof($proposals)>0)
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="{{route('view.client.proposal',$value->id)}}" style="float: inline-start;"><i class="ri-eye-line"></i></a>
                                    @endif

                                    @if(sizeof($intrested_proposals)>0)
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Client Intrested" href="{{route('view.intrested.client.proposal',$value->id)}}"><i class="ri-file-line"></i></a>
                                     @endif
                                     {{-- <a href="{{route('create.client.proposal',$value->id)}}" class="create_proposal">Create Proposal</a> --}}
                                     
                                     
                                  </div>
                               </td>
                            </tr>
                          @endforeach
                          
                        </tbody>
                         </table>
                      </div>
                         <!-- <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-6">
                               <span>Showing 1 to 5 of 5 entries</span>
                            </div>
                            <div class="col-md-6">
                               <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-end mb-0">
                                     <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                     </li>
                                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                                     <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                     </li>
                                  </ul>
                               </nav>
                            </div>
                         </div> -->
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