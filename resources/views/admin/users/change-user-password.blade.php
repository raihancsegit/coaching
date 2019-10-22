@extends('admin.master')
@section('main-content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content login-form">
            <div class="col-12 pl-0 pr-0">
                @if(Session::get('error_msg'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error_msg') }}
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">User Password Update Form</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('user-password-update') }}" enctype="multipart/form-data" autocomplete="off" class="form-inline">
                    @csrf

                    <div class="form-group col-12 mb-3">
                        <label for="password" class="col-sm-3 col-form-label text-right">Old Password</label>
                        <input id="password" type="password" class="col-sm-9 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="new-password" class="col-sm-3 col-form-label text-right">New Password</label>
                        <input id="new-password" type="password" class="col-sm-9 form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">
                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="form-group col-12 mb-3">
                        <label class="col-sm-3"></label>
                        <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
