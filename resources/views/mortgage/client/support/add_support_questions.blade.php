
@extends("mortgage.client.layouts.app")
@section('page_content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Create Ticket</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="{{ route('help.support.add_support_tickets') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="addtype">Support Required</label>
                                        <select class="form-control select_filed" id="addtype" name="support_for" required>
                                            <option>Technical</option>
                                            <option>Portal</option>
                                            <option>Mortgage</option>
                                            <option>Sales</option>
                                            <option>Billing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <label>Subject: *</label> 
                                      <input type="text" class="form-control" name="subject" required="">
                                   </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Content: *</label> 
                                       <textarea type="text" class="form-control" name="content" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    </div>
</div>
@endsection