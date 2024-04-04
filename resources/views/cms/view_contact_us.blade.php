@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between ">
                    <div class="iq-header-title inner">
                        <h4 class="card-title">View Contact Us</h4>
                    </div>
                    <div class="edit_block"> 
                        <div class="inner"><a class="btn btn-primary" href="{{route('cms.editContactUs')}}">Edit</a></div>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <div class="form-group">
                            <label for="pname">Opening Time<sup>*</sup></label>
                            <input type="text" class="form-control" id="pname" placeholder="Opening Time" name="opening_time" value="{{$get_data ? $get_data->opening_time : ''}}" readonly>
                        </div>
                    </div>
                    <div class="new-user-info">
                        <div class="form-group">
                            <label for="pname">Opening Days<sup>*</sup></label>
                            <input type="text" class="form-control" id="pname" placeholder="Opening Days" name="opening_days" value="{{$get_data ? $get_data->opening_days : ''}}" readonly>
                        </div>
                    </div>
                    <div class="new-user-info">
                        <div class="form-group">
                            <label for="pname">Address<sup>*</sup></label>
                            <input type="text" class="form-control" id="pname" placeholder="Address" name="address" value="{{$get_data ? $get_data->address : ''}}" readonly>
                        </div>
                    </div>
                    <div class="new-user-info">
                        <div class="form-group">
                            <label for="pname">Phone<sup>*</sup></label>
                            <input type="text" class="form-control" id="pname" placeholder="Phone" name="phone" value="{{$get_data ? $get_data->phone : ''}}" readonly>
                        </div>
                    </div>
                    <div class="new-user-info">
                        <div class="form-group">
                            <label for="pname">Email<sup>*</sup></label>
                            <input type="text" class="form-control" id="pname" placeholder="Email" name="email" value="{{$get_data ? $get_data->email : ''}}" readonly>
                        </div>
                    </div>
                    <div class="new-user-info">
                        <div class="form-group">
                            <label for="pname">Whatsapp<sup>*</sup></label>
                            <input type="text" class="form-control" id="pname" placeholder="Whatsapp" name="whatsapp" value="{{$get_data ? $get_data->whatsapp : ''}}" readonly>
                        </div>
                    </div>
                    <div class="new-user-info">
                        <div class="form-group">
                            <label for="pname">Location<sup>*</sup></label>
                            <input type="text" class="form-control" id="pname" placeholder="Location" name="location" value="{{$get_data ? $get_data->location : ''}}" readonly>
                        </div>
                    </div>
                    <div class="new-user-info">
                        <div class="form-group">
                            <label for="pname">URL Key<sup>*</sup></label>
                            <input type="text" class="form-control" id="pname" placeholder="URL Key" name="url_key" value="{{$get_data ? $get_data->url_key : ''}}" readonly>
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
                            <input class="form-control" type="text" name="meta_title" placeholder="Meta Title" value="{{$get_data ? $get_data->meta_title : ''}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Meta Tag</label>
                            <input class="form-control" type="text" name="meta_tag" placeholder="Meta Tag" value="{{$get_data ? $get_data->meta_tag : ''}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Meta Description</label><br>
                            <textarea  class="form-control" rows="6" cols="45" name="meta_description" placeholder="Meta Description" readonly>{{$get_data ? $get_data->meta_description : ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

