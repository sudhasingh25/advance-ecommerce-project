@extends('frontend.main_master')
@section('frontend_main')

<div class="body-content">
    <div class="container">
        <div class="row">
        @include('frontend.common.user_sidebar')
            <div class="col-md-2">
                    
            </div>
            <div class="col-md-6">
                <h3 class="text-center">Hi..  {{Auth::user()->name}} Welcome to Shopee</h3>
            </div>
        </div>
    </div>
</div>

@endsection