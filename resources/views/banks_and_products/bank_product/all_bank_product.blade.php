@extends('admin.admin_dashboard')

@section('admin')

      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Bank Products List</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-6">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <!--<form class="mr-3 position-relative">-->
                                    <!--   <div class="form-group mb-0">-->
                                    <!--      <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">-->
                                    <!--   </div>-->
                                    <!--</form>-->
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="btn btn-primary" href="{{route('show.banks.products')}}">
                                       Add New Product
                                     </a>
                                   </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>Sr No.</th>
                                    <th>Product Name</th>
                                    <th>Bank Name</th>
                                    <th>Branch Name</th>
                                    <th>Plan</th>
                                    <th>Interest Rate</th>
                                    <th>Processing Fee</th>
                                    <th>Available Date</th>
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <?php $i=1; ?>
                             <tbody>
                             
                             @foreach($bank_product as $bank_products)

                                 <tr>
                                   
                                    <td>{{$i++}}</td>
                                    <td>{{$bank_products->name}}</td>
                                  
                                    
                                   <td>
                                    {{$bank_products->bank->name}}
                                </td>

                                <td>@if($bank_products->branch)
                                        {{$bank_products->branch->branch_name}}
                                    
                                    @endif
                                     
                             </td>
                                  
                                    <td>{{$bank_products->plan}}</td>
                                    <td>{{$bank_products->interest_rate}}</td>
                                    <td>{{$bank_products->processing_fee}}</td>
                                 
                                    <td>{{$bank_products->available_date}}</td>

                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="{{route('view.bank.product',$bank_products->id)}}"><i class="ri-eye-line"></i></a>
                                          <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.bank.products',$bank_products->id)}}"><i class="ri-pencil-line"></i></a>
                                          <a class="iq-bg-primary delete-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('delete.products',$bank_products->id)}}"><i class="ri-delete-bin-line"></i></a>
                                          

                                         
                                       </div>
                                    </td>
                                
                                </tr>
                                @endforeach
                             </tbody>
                           </table>
                        </div>

                       
                    
                           
                     </div>
                  </div>
            </div>
         </div>
      </div>
   

@endsection
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