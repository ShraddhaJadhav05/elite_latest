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
                           <h4 class="card-title">View Branch</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form>
                           @csrf
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="name">Branch Name</label>
                                    <p class="form-control-static" id="name">{{ $branch->branch_name }}</p>
                                 </div>
                                 
                              </div>
                              <button type="button" class="btn btn-primary" onclick="return goBack()">Go Back</button>
                              <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('edit.branch',$branch->id)}}">Edit Branch</a>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="col-lg-2">

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

