@extends('layouts.app')

@section('content')
<div class="kt-grid kt-grid--ver kt-grid--root">
	<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(/media/bg/bg-3.jpg);">
			<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">

				<div class="kt-login__container">
					<div class="kt-login__logo">
						<a href="#">
							<img src="{{asset('media/logos/logo.png')}}">
						</a>
					</div>
					<div class="kt-login__signin ">
						<div class="kt-login__head">
							<h3 class="kt-login__title">Register</h3>
						</div>
						<form class="kt-form" method="POST" action="{{ route('register') }}" id="kt_login_form">
							{{ csrf_field() }}
							<div class="form-group">
								<input id="name" type="text" placeholder="Enter Your Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
							<div class="form-group">
								<input id="email" type="email"placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							</div>
							<div class="form-group">
								<input class="form-control" type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autocomplete="off">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input class="form-control" id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="new-password" autocomplete="off">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<!--begin::Action-->
							<div class="kt-login__actions">
								<button type="submit" id="kt_login_signin_submit" class="btn btn-primary btn-elevate kt-login__btn-primary">{{ __('Sign Up') }}</button>
							</div>
							<!--end::Action-->
                        </form>
                        <div class="kt-login__divider mt-4">
							<div class="kt-divider">
								<span></span>
								<span>OR</span>
								<span></span>
							</div>
                        </div>
                        <div class="kt-login__options mt-2 d-flex justify-content-center">
							<a href="login" class="btn btn-info kt-btn btn-sm">
								Login with Existing Account
							</a>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>


@endsection





















{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input  type="password" class="form-control"  required >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
