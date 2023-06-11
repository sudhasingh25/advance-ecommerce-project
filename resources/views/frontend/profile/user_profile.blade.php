@extends('frontend.main_master')
@section('frontend_main')

<div class="body-content">
    <div class="container">
        <div class="row">
        @include('frontend.common.user_sidebar')

            <div class="col-md-2">
                    
            </div>
            <div class="col-md-6">
                <h3 class="text-center">Hi..  {{Auth::user()->name}} Update Your Profile</h3>
                <div class="card-body">
                    <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{$user->name}}" >
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address</label>
                            <input id="email" type="email" name="email" class="form-control" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone</label>
                            <input id="phone" type="text" name="phone" class="form-control" value="{{$user->phone}}" >
                        </div>

                        
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Profile Image</label>
                            <input type="file" name="profile_photo_path" class="form-control">
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