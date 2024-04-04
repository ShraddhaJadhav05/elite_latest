@extends('lead.admin_lead')

@section('lead')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Leads List</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-responsive">
                      <div class="row justify-content-between">
                         <div class="col-sm-12 col-md-6">
                            <div id="user_list_datatable_info" class="dataTables_filter">
                               <form class="mr-3 position-relative">
                                  <div class="form-group mb-0">
                                     <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                  </div>
                               </form>
                            </div>
                         </div>
                         <div class="col-sm-12 col-md-6">
                            <div class="user-list-files d-flex float-right">
                               <a class="btn btn-primary" href="addnewslots.html">
                                  Add New Lead
                                </a>
                              </div>
                         </div>
                      </div>
                      <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                        <thead>
                            <tr>
                               <th>Name</th>
                               <th>Contact</th>
                               <th>Email</th>
                               <th>Country</th>
                               <th>Status</th>
                               <th>Company</th>
                               <th>Join Date</th>
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                               <td>Anna Sthesia</td>
                               <td>(760) 756 7568</td>
                               <td>annasthesia@gmail.com</td>
                               <td>UAE</td>
                               <td><span class="badge dark-icon-light iq-bg-primary">Active</span></td>
                               <td>Acme Corporation</td>
                               <td>2019/12/01</td>
                               <td>
                                  <div class="flex align-items-center list-user-action">
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                               </td>
                            </tr>
                            <tr>

                               <td>Brock Lee</td>
                               <td>+62 5689 458 658</td>
                               <td>brocklee@gmail.com</td>
                               <td>UAE</td>
                               <td><span class="badge  dark-icon-light iq-bg-primary">Active</span></td>
                               <td>Soylent Corp</td>
                               <td>2019/12/01</td>
                               <td>
                                  <div class="flex align-items-center list-user-action">
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                               </td>
                            </tr>
                            <tr>

                               <td>Dan Druff</td>
                               <td>+55 6523 456 856</td>
                               <td>dandruff@gmail.com</td>
                               <td>UAE</td>
                               <td><span class="badge iq-bg-warning">Pending</span></td>
                               <td>Umbrella Corporation</td>
                               <td>2019/12/01</td>
                               <td>
                                  <div class="flex align-items-center list-user-action">
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                               </td>
                            </tr>
                            <tr>

                               <td>Hans Olo</td>
                               <td>+91 2586 253 125</td>
                               <td>hansolo@gmail.com</td>
                               <td>UAE</td>
                               <td><span class="badge iq-bg-danger">Inactive</span></td>
                               <td>Vehement Capital</td>
                               <td>2019/12/01</td>
                               <td>
                                  <div class="flex align-items-center list-user-action">
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                               </td>
                            </tr>
                            <tr>

                               <td>Lynn Guini</td>
                               <td>+27 2563 456 589</td>
                               <td>lynnguini@gmail.com</td>
                               <td>UAE</td>
                               <td><span class="badge  dark-icon-light iq-bg-primary">Active</span></td>
                               <td>Massive Dynamic</td>
                               <td>2019/12/01</td>
                               <td>
                                  <div class="flex align-items-center list-user-action">
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                               </td>
                            </tr>
                            <tr>

                               <td>Eric Shun</td>
                               <td>+55 25685 256 589</td>
                               <td>ericshun@gmail.com</td>
                               <td>UAE</td>
                               <td><span class="badge iq-bg-warning">Pending</span></td>
                               <td>Globex Corporation</td>
                               <td>2019/12/01</td>
                               <td>
                                  <div class="flex align-items-center list-user-action">
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                               </td>
                            </tr>
                            <tr>

                               <td>aaronottix</td>
                               <td>(760) 765 2658</td>
                               <td>budwiser@ymail.com</td>
                               <td>UAE</td>
                               <td><span class="badge iq-bg-info">Hold</span></td>
                               <td>Acme Corporation</td>
                               <td>2019/12/01</td>
                               <td>
                                  <div class="flex align-items-center list-user-action">
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                     <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                               </td>
                            </tr>


                        </tbody>
                      </table>
                   </div>
                      <div class="row justify-content-between mt-3">
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
                      </div>
                </div>
             </div>
       </div>
    </div>
 </div>
@endsection
