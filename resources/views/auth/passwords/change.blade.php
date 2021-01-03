@extends('layouts.index')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Change Password
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="kt-form kt-form--label-right" method="POST" action="{{ route('changepassword') }}">
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                    <h3 class="kt-section__title">Fill the Form below:</h3>
                    <div class="kt-section__body">
                        <div class="form-group row">
                            <label for="current-password"
                                class="col-lg-3 col-form-label {{ $errors->has('current-password') ? ' has-error' : '' }}">Current
                                Password:</label>
                            <div class="col-lg-6">
                                <input type="password" name="current-password" class="form-control"
                                    placeholder="Current passowrd">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new-password" class="col-lg-3 col-form-label">New Password:</label>
                            <div class="col-lg-6">
                                <input type="password" name="new-password" class="form-control" placeholder="New password">
                            </div>
                        </div>
                        @if ($errors->has('new-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="kt-section__body">
                        <div class="form-group row">
                            <label for="new-password_confirmation" class="col-lg-3 col-form-label">Confrim New
                                Password:</label>
                            <div class="col-lg-6">
                                <input type="password" name="new-password_confirmation" class="form-control"
                                    placeholder="Confrim new password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary" role="button">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>





    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-light">{{ __('Change Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('changepassword') }}">
                            {{ csrf_field() }}

                            <div class="form-group row{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label text-md-right">Current
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control"
                                        name="current-password" required>

                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label text-md-right">New Password</label>

                                <div class="col-md-6">
                                    <input id="new-password" type="password" class="form-control" name="new-password"
                                        required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new-password-confirm" class="col-md-4 control-label text-md-right">Confirm New
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="new-password-confirm" type="password" class="form-control"
                                        name="new-password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
