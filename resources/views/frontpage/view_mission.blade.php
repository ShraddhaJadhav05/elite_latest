@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between ">
                    <div class="iq-header-title inner">
                        <h4 class="card-title">View Mission</h4>
                    </div>
                    <div class="edit_block"> 
                        <div class="inner"><a class="btn btn-primary" href="{{route('frontpage.editMission')}}">Edit</a></div>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <div class="form-group">
                            <label>Title<sup>*</sup></label>
                            <input class="form-control" type="text" name="title" placeholder="Title" value="{{$get_data ? $get_data->title : ''}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Description<sup>*</sup></label><br>
                            <textarea  class="form-control" rows="6" cols="45" name="description" placeholder="Description" readonly>{{$get_data ? $get_data->description : ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Features<sup>*</sup></label>
                            <input class="form-control mb-2" type="text" name="feature1" placeholder="Feature" value="{{$get_data ? $get_data->feature1 : ''}}" readonly/>
                            <input class="form-control mb-2" type="text" name="feature2" placeholder="Feature" value="{{$get_data ? $get_data->feature2 : ''}}" readonly/>
                            <input class="form-control" type="text" name="feature3" placeholder="Feature" value="{{$get_data ? $get_data->feature3 : ''}}" readonly/>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection

