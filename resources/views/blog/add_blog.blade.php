@extends('admin.admin_dashboard')

@section('admin')
<form id="addLeadForm" method="POST" action="{{ route('blogs.add') }}" enctype="multipart/form-data">
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
                            <h4 class="card-title">Add Blog</h4>
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
                                <label for="pname">Image Text<sup>*</sup></label>
                                <input type="text" class="form-control" placeholder="Image Text" name="image_text" required>
                            </div>
                            <div class="form-group">
                                <label for="pname">Image<sup>*</sup></label>
                                <input type="file" name="image_file" class="file-upload-default" required/>
                            </div>
                            <div class="form-group">
                                <label for="pname">Date<sup>*</sup></label>
                                <input type="date" class="form-control" placeholder="Date" name="date" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">SEO</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" name="meta_title" placeholder="Meta Title"/>
                            </div>
                            <div class="form-group">
                                <label>Meta Tag</label>
                                <input class="form-control" type="text" name="meta_tag" placeholder="Meta Tag"/>
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label><br>
                                <textarea  class="form-control" rows="6" cols="45" name="meta_description" placeholder="Meta Description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add New Blog</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

