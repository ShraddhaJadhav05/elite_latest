@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between ">
                    <div class="iq-header-title inner">
                        <h4 class="card-title">View Category</h4>
                    </div>
                    <div class="edit_block"> 
                        <div class="inner"><a class="btn btn-primary" href="{{route('category.update',['id' => $get_data['id']])}}">Edit</a></div>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <div class="form-group">
                            <label for="pname">Name<sup>*</sup></label>
                            <input type="text" class="form-control" id="pname" placeholder="Name" name="name"  value="{{$get_data['name']}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Description<sup>*</sup></label><br>
                            <textarea  class="form-control summernote" rows="6" cols="45" name="description" placeholder="Description" readonly>{{$get_data['description']}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 mt-2">
                                @if($get_data)
                                <img src="/image_uploads/{{$get_data['image']}}" alt="image" style="max-width: 20%;" class="fullscreenable"/>
                                @else
                                No Image
                                @endif
                            </div>
                            <label for="pname">Image<sup>*</sup></label>
                            
                            <input type="file" name="image_file" class="file-upload-default" disabled/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

