@extends('admin.admin_dashboard')

@section('admin')
<form id="addLeadForm" method="POST" action="{{ route('category.update',['id' => $get_data->id]) }}" enctype="multipart/form-data">
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
                            <h4 class="card-title">Update Category</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <div class="form-group">
                                <label for="pname">Name<sup>*</sup></label>
                                <input type="text" class="form-control" id="pname" placeholder="name" name="name"  value="{{$get_data->name}}" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label><br>
                                <textarea  class="form-control summernote" rows="6" cols="45" name="description" placeholder="Description">{{$get_data->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 mt-2">
                                    @if($get_data)
                                        @if($get_data->image)
                                            <img src="/image_uploads/{{$get_data->image}}" alt="image" style="max-width: 20%;" class="fullscreenable"/>
                                        @else
                                            No Image
                                        @endif
                                    @else
                                        No Image
                                    @endif
                                </div>
                                <label for="pname">Image<sup>*</sup></label>
                                
                                <input type="file" name="image_file" class="file-upload-default"/>
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

