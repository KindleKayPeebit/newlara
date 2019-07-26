@extends('backend/common')
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="container">
              <form action="{{route('admin.search')}}" method="POST" role="search">
              {{ csrf_field() }}
              <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search users"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">
                        <i class="material-icons">search</i>
                    </button>
                   <a href="{{route('admin.users')}}" class="btn btn-primary pull-right">Reset</a>
                </span>
            </div>
             </form>
              </div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Users Table</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                   @if(!empty($users))
                    <table class="table">
                      <thead class=" text-primary">
                        <th> S.No</th>
                        <th> Name </th>
                        <th> Phone </th>
                        <th> Status </th>
                        <th> Action </th>
                      </thead>
                      <tbody>
                    <?php $i =0;?>
                     @foreach($users as $user)
                        <tr>
                          <td><?= ++$i; ?></td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->contact_number}}</td>
                          <td>@if($user->status ==1){{ 'Un-blocked '}}@else {{'Blocked'}}@endif </td>
                           <td class="td-actions ">
                              <a href="{{ url('/admin/edituser', $user->id) }}" rel="tooltip" title="Edit User" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i> </a>
                                @if($user->status ==1)
                               
                                 <a href="javascript:void(0);" id="blockUnblock{{$user->id}}" data-url="{{url('admin/blockUnblock/'.$user->id)}}" data-userid="{{$user->id}}" data-status='1' rel="tooltip" title="Block User" class="btn btn-success btn-link btn-sm .block-unblock"> <i class="material-icons">lock_open</i></a>
                                @else
                                
                                 <a href="javascript:void(0);" id="blockUnblock{{$user->id}}" data-url="{{url('admin/blockUnblock/'.$user->id)}}" data-userid="{{$user->id}}" data-status='0' rel="tooltip" title="UnBlock User" class="btn btn-warning btn-link btn-sm block-unblock"> <i class="material-icons">lock</i></a>
                                @endif
                                <a href="javascript:void(0);" id="deleteBtn{{$user->id}}" data-userid="{{$user->id}}" data-url="{{url('admin/deleteUser/'.$user->id)}}" rel="tooltip" title="Remove" data-userid="{{$user->id}}" class="btn btn-danger btn-link btn-sm ">
                                <i class="material-icons">close</i></a>
                              </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                    {!! $users->render() !!}
                    @else
                      <div class="alert alert- alert-with-icon" data-notify="container">
                      <i class="material-icons" data-notify="icon">add_alert</i>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       
                      </button>
                      <span data-notify="message">{{ 'No Details found. Try to search again !'}} </span>
                      
                    </div>
                    @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection
