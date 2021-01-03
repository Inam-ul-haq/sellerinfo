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
					<div class="kt-login__signin">
						<div class="kt-login__head">
							<h3 class="kt-login__title">Sign In</h3>
						</div>
						<form class="kt-form" method="POST" action="{{ route('login') }}" id="kt_login_form">
							{{ csrf_field() }}
							<div class="form-group">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
							<div class="row kt-login__extra">
								<div class="col">
									<label class="kt-checkbox">
										<input type="checkbox" name="remember"> Remember me
										<span></span>
									</label>
								</div>
								<div class="col kt-align-right">
									<a href="#">Forget Password ?</a>
								</div>
                            </div>
							<!--begin::Action-->
							<div class="kt-login__actions">
								<button type="submit" id="kt_login_signin_submit" class="btn btn-primary btn-elevate kt-login__btn-primary">{{ __('Login') }}</button>
								<!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="#">

                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif -->
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
							<a href="register" class="btn btn-info kt-btn btn-sm">
								Create New account
							</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


@endsection
