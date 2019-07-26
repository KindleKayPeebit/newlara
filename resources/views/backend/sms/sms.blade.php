@extends('backend/common')
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="container">
                <a href="{{route('admin.sms.add')}}" class="btn btn-primary">Add Sms</a>
              <form action="{{route('admin.sms.search')}}" method="POST" role="search">
              {{ csrf_field() }}
              <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search sms"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">
                        <i class="material-icons">search</i>
                    </button>
                   <a href="{{route('admin.sms')}}" class="btn btn-primary pull-right">Reset</a>
                </span>
            </div>
             </form>
              </div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Sms Table</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                   @if(!empty($sms))
                    <table class="table">
                      <thead class=" text-primary">
                        <th> S.No</th>
                        <th> Title </th>
                       <!--  <th> Message </th> -->
                        <th> Status </th>
                        <th> Action </th>
                      </thead>
                      <tbody>
                    <?php $i =0;?>
                     @foreach($sms as $value)
                        <tr>
                          <td><?= ++$i; ?></td>
                          <td>{{$value->title}}</td>
                         <!--  <td>{{$value->message}}</td> -->
                          <td>@if($value->status ==1){{ 'Un-block'}}@else {{'Block'}}@endif </td>
                           <td class="td-actions ">
                              <a href="{{ url('/admin/sms/edit', $value->id) }}" rel="tooltip" title="Edit SMS" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i> </a>
                                @if($value->status ==1)
                               
                                 <a href="javascript:void(0);" id="blockUnblock1{{$value->id}}" data-url="{{url('admin/sms/blockUnblock/'.$value->id)}}" data-userid="{{$value->id}}" data-status='1' rel="tooltip" title="Block SMS" class="btn btn-success btn-link btn-sm .block-unblock"> <i class="material-icons">lock_open</i></a>
                                @else
                                
                                 <a href="javascript:void(0);" id="blockUnblock1{{$value->id}}" data-url="{{url('admin/sms/blockUnblock/'.$value->id)}}" data-userid="{{$value->id}}" data-status='0' rel="tooltip" title="UnBlock SMS" class="btn btn-warning btn-link btn-sm block-unblock"> <i class="material-icons">lock</i></a>
                                @endif
                                <a href="javascript:void(0);" id="deleteBtn1{{$value->id}}" data-userid="{{$value->id}}" data-url="{{url('/admin/sms/deleteUser/'.$value->id)}}" rel="tooltip" title="Remove" data-userid="{{$value->id}}" class="btn btn-danger btn-link btn-sm ">
                                <i class="material-icons">close</i></a>
                              </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                    {!! $sms->render() !!}
                    
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
