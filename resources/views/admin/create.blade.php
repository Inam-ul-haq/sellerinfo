@extends('layouts.index')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Add User
            </h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" method="POST" action="{{ route('admin.store') }}">
        {{ csrf_field() }}
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body">
                    <div class="form-group row">
                        <label for="current-password"
                            class="col-lg-3 col-form-label {{ $errors->has('current-password') ? ' has-error' : '' }}">{{$user-name}}</label>
                        <div class="col-lg-6">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-6">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-lg-3 col-form-label">Password</label>
                        <div class="col-lg-6">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="kt-section__body">
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-lg-3 col-form-label">Confrim Password</label>
                        <div class="col-lg-6">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confrim password">
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
                        <button type="submit" class="btn btn-success">Add</button>
                        <a href="" class="btn btn-secondary" role="button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--end::Form-->
</div>
@endsection
