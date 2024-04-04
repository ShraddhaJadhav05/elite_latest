@extends('admin.admin_dashboard')

@section('admin')
<form method="POST" action="{{ route('frontpage.editSupportivePartner') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$get_data ? $get_data->id : ''}}">
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
                            <h4 class="card-title">Update Supportive Partner</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <div class="form-group">
                                <label>Title<sup>*</sup></label>
                                <input class="form-control" type="text" name="title" placeholder="Title" value="{{$get_data ? $get_data->title : ''}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Sub Title</label>
                                <input class="form-control" type="text" name="sub_title" placeholder="Sub Title" value="{{$get_data ? $get_data->sub_title : ''}}"/>
                            </div>
                            <div class="form-group">
                                <label>Description<sup>*</sup></label><br>
                                <textarea  class="form-control" rows="6" cols="45" name="description" placeholder="Description" required>{{$get_data ? $get_data->description : ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="mb-3 mt-2">
                                    @if($get_data)
                                    <img src="/image_uploads/{{$get_data->image}}" alt="image" style="max-width: 20%;" class="fullscreenable"/>
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

