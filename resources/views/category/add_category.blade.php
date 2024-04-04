@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Add Category</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                    <div class="new-user-info">
                        <form method="POST" action="{{ route('category.add') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="pname">Name<sup>*</sup></label>
                                    <input type="text" class="form-control" id="pname" placeholder="Name" name="name"  required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Description</label><br>
                                    <textarea  class="form-control summernote" rows="6" cols="45" name="description" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="pname">Image<sup>*</sup></label>
                                    <input type="file" name="image_file" class="file-upload-default"/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create New Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
@endsection

