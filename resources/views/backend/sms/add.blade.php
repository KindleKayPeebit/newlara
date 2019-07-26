@extends('backend/common')
@section('content')
<style>
  hr {
    border-top: 1px solid #9c27b0 !important;
  }
  .dyn-height {
    
    max-height:500px;
    overflow-y:scroll;
}
  </style>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Sms</b></h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body dyn-height">
                  <form method="POST" action="{{ url('/admin/sms/addsms') }}">
                    @csrf
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" class="form-control" value="" required >
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Day1</label>
                          <input type="text" name="title1" class="form-control" value="{{ 'Day1' }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Message</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Maximum 1600 characters allowed.</label>
                            <textarea class="form-control" rows="5" name="message[]" onkeyup="countChar(this,'charNum1')" required>{{  old('message') }}</textarea>
                             <div id="charNum1" class="text-danger"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Day2</label>
                          <input type="text" name="title1" class="form-control" value="{{ 'Day2' }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Message</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Maximum 1600 characters allowed.</label>
                            <textarea class="form-control" rows="5" name="message[]" onkeyup="countChar(this,'charNum2')" required>{{  old('message') }}</textarea>
                             <div id="charNum2" class="text-danger"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Day3</label>
                          <input type="text" name="title1" class="form-control" value="{{ 'Day3' }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Message</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Maximum 1600 characters allowed.</label>
                            <textarea class="form-control" rows="5" name="message[]" onkeyup="countChar(this,'charNum3')" required>{{  old('message') }}</textarea>
                             <div id="charNum3" class="text-danger"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Day4</label>
                          <input type="text" name="title1" class="form-control" value="{{ 'Day4' }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Message</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Maximum 1600 characters allowed.</label>
                            <textarea class="form-control" rows="5" name="message[]" onkeyup="countChar(this,'charNum4')" required>{{  old('message') }}</textarea>
                             <div id="charNum4" class="text-danger"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Day5</label>
                          <input type="text" name="title1" class="form-control" value="{{ 'Day5' }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Message</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Maximum 1600 characters allowed.</label>
                            <textarea class="form-control" rows="5" name="message[]" onkeyup="countChar(this,'charNum5')" required>{{  old('message') }}</textarea>
                             <div id="charNum5" class="text-danger"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Day6</label>
                          <input type="text" name="title1" class="form-control" value="{{ 'Day6' }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Message</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Maximum 1600 characters allowed.</label>
                            <textarea class="form-control" rows="5" name="message[]" onkeyup="countChar(this,'charNum6')" required>{{  old('message') }}</textarea>
                             <div id="charNum5" class="text-danger"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Day7</label>
                          <input type="text" name="title1" class="form-control" value="{{ 'Day7' }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Message</label>
                          <div class="form-group">
                            <label class="bmd-label-floating">Maximum 1600 characters allowed.</label>
                            <textarea class="form-control" rows="5" name="message[]" onkeyup="countChar(this,'charNum7')"  required>{{  old('message') }}</textarea>
                             <div id="charNum7" class="text-danger"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                  
                    <a href="{{route('admin.sms')}}" class="btn btn-warning pull-right">Back</a>
                    <button type="submit" class="btn btn-primary ">Add SMS</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
      @endsection