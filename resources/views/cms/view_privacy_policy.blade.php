@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between ">
                    <div class="iq-header-title inner">
                        <h4 class="card-title">View Privacy Policy</h4>
                    </div>
                    <div class="edit_block"> 
                        <div class="inner"><a class="btn btn-primary" href="{{route('cms.editPrivacy')}}">Edit</a></div>
                    </div>
                </div>
                <div class="iq-card-body">
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

