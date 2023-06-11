@extends('frontend.main_master')
@section('frontend_main')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')

            <div class="col-md-2">
                    
            </div>
            <div class="col-md-6">
                <h3 class="text-center">Change Password</h3>
                <div class="card-body">
                    <form method="post" action="{{route('user.store.change.password')}}" >
                    @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Current Password</label>
                            <input id="current_password" type="password" name="old_password" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">New Password</label>
                            <input id="password" type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"  >
                        </div>

                        <div class="form-group">
                            <button type="submit"  class="btn btn-danger">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection