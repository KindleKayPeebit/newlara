@extends('backend/common')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Sms</b></h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ url('/admin/sms/editsms', $sms['id']) }}">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" class="form-control" value="{{ $sms['title'] ? $sms['title'] :old('title') }}">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Message</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Maximum 1600 Characters</label>
                            <textarea class="form-control" rows="5" name="message" onkeyup="countChar(this)">{{ $sms['message'] ? $sms['message'] : old('message') }}</textarea>
                            <div id="charNum"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    <a href="{{route('admin.sms')}}" class="btn btn-warning pull-right">Back</a>
                    <button type="submit" class="btn btn-primary ">Update SMS</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
      @endsection