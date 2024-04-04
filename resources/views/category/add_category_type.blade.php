@extends('admin.admin_dashboard')

@section('admin')
<form id="addLeadForm" method="POST" action="{{ route('category_type.add') }}" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
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
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between ">
                        <div class="iq-header-title inner">
                            <h4 class="card-title">Add Category Type</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <div class="form-group">
                                <label for="pname">Type<sup>*</sup></label>
                                <input type="text" class="form-control" id="pname" placeholder="Type" name="type"  required>
                            </div>
                            <div class="form-group">
                                <label>Description</label><br>
                                <textarea  class="form-control summernote" rows="6" cols="45" name="description" placeholder="Description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add New Category Type</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

