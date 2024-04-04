@extends('admin.admin_dashboard')

@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between ">
                    <div class="iq-header-title inner">
                        <h4 class="card-title">View FAQ</h4>
                    </div>
                    <div class="edit_block"> 
                        <div class="inner"><a class="btn btn-primary" href="{{route('faq.update',['id' => $get_data->id])}}">Edit</a></div>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <div class="form-group">
                            <label for="pname">Question<sup>*</sup></label>
                            <input type="text" class="form-control" id="pname" placeholder="Name" name="name"  value="{{$get_data->question}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Answer<sup>*</sup></label><br>
                            <textarea  class="form-control summernote" rows="6" cols="45" name="answer" placeholder="Answer" readonly>{{$get_data->answer}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="pname">Category<sup>*</sup></label>
                            <select class="form-control" id="exampleFormControlSelect2" name="category_id" disabled>
                                <option value="" selected disabled>Select Category</option>
                                @foreach($all_categories as $data)
                                    <option value="{{$data->id}}" {{ ( $data->id == $get_data->category_id) ? 'selected' : '' }}>{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

