@extends('admin.admin_dashboard')

@section('admin')
<form id="addLeadForm" method="POST" action="{{ route('cms.editCallBackData') }}">
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
                            <h4 class="card-title">Update Call Back</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <div class="form-group">
                                <label for="pname">URL Key<sup>*</sup></label>
                                <input type="text" class="form-control" id="pname" placeholder="URL Key" name="url_key" value="{{$get_data ? $get_data->url_key : ''}}" required>
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
                                <input class="form-control" type="text" name="meta_title" placeholder="Meta Title" value="{{$get_data ? $get_data->meta_title : ''}}"/>
                            </div>
                            <div class="form-group">
                                <label>Meta Tag</label>
                                <input class="form-control" type="text" name="meta_tag" placeholder="Meta Tag" value="{{$get_data ? $get_data->meta_tag : ''}}"/>
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label><br>
                                <textarea  class="form-control" rows="6" cols="45" name="meta_description" placeholder="Meta Description">{{$get_data ? $get_data->meta_description : ''}}</textarea>
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

