@extends('admin.admin_dashboard')

@section('admin')
<form id="addLeadForm" method="POST" action="{{ route('faq.update',['id' => $get_data->id]) }}" enctype="multipart/form-data">
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
                            <h4 class="card-title">Update FAQ</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <div class="form-group">
                                <label for="pname">Question<sup>*</sup></label>
                                <input type="text" class="form-control" id="pname" placeholder="Question" name="question"  value="{{$get_data->question}}" required>
                            </div>
                            <div class="form-group">
                                <label>Answer</label><br>
                                <textarea  class="form-control summernote" rows="6" cols="45" name="answer" placeholder="Answer">{{$get_data->answer}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="pname">Category<sup>*</sup></label>
                                <select class="form-control" id="exampleFormControlSelect2" name="category_id" required>
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach($all_categories as $data)
                                        <option value="{{$data->id}}" {{ ( $data->id == $get_data->category_id) ? 'selected' : '' }}>{{$data->name}}</option>
                                    @endforeach
                                </select>
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

