@extends('backend/common')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit User Profile</b></h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ url('/admin/update', $user['id']) }}">
                    @csrf
                    <div class="row">
                     <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="name" class="form-control" value="{{ $user['name'] ? $user['name'] : old('name') }}">
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name="email" class="form-control" value="{{ $user['email'] ? $user['email'] : old('email') }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input type="text"  name="first_name" class="form-control" value="{{ $user['first_name'] ? $user['first_name'] : old('first_name') }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="last_name" class="form-control" value="{{ $user['last_name'] ? $user['last_name'] : old('last_name') }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" name="address" class="form-control" value="{{ $user['address'] ? $user['address'] : old('address') }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" class="form-control" value="{{ $user['city'] ? $user['city'] : old('city') }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" name="country" class="form-control" value="{{ $user['country'] ? $user['country'] : old('country') }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" name="postal_code" class="form-control" value="{{ $user['postal_code'] ? $user['postal_code'] : old('postal_code') }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <!-- <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label> -->
                            <textarea class="form-control" rows="5" name="about_me">{{ $user['about_me'] ? $user['about_me'] : old('about_me') }}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact Number</label>
                          <input type="text" name="contact_number" class="form-control" value="{{ $user['contact_number'] ? $user['contact_number'] : old('contact_number') }}">
                        </div>
                      </div>
                    </div>
                    <a href="{{route('admin.users')}}" class="btn btn-warning pull-right">Back</a>
                    <button type="submit" class="btn btn-primary ">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="{{asset('backend/assets/img/faces/marc.jpg')}}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">{{Auth::user()->name}}</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
      @endsection