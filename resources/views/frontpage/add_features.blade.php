@extends('admin.admin_dashboard')

@section('admin')
<form id="addLeadForm" method="POST" action="{{ route('features.add') }}" enctype="multipart/form-data">
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
                            <h4 class="card-title">Add Feature</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <div class="form-group">
                                <label for="pname">Title<sup>*</sup></label>
                                <input type="text" class="form-control" id="pname" placeholder="Title" name="title"  required>
                            </div>
                            <div class="form-group">
                                <label>Description<sup>*</sup></label><br>
                                <textarea  class="form-control summernote" rows="6" cols="45" name="description" placeholder="Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pname">Image<sup>*</sup></label>
                                <input type="file" name="image_file" class="file-upload-default" required/>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

