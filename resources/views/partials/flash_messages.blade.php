@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
    <div class="alert-text">{{ $message }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <div class="alert-icon"><i class="flaticon2-cross"></i></div>
    <div class="alert-text">{{ $message }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
@endif

@if ($message = Session::get('errors'))
@foreach($errors as $error_message)
<div class="alert alert-danger disappear_alert" role="alert">
    <div class="alert-icon"><i class="flaticon2-cross"></i></div>
    <div class="alert-text">{{ $error_message }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
@endforeach
@endif


@if ($errors->any())

@foreach ($errors->all() as $error)
<div class="alert alert-danger disappear_alert" role="alert">
    <div class="alert-icon"><i class="flaticon2-cross"></i></div>
    <div class="alert-text">{{ $error }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
@endforeach
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">{{ $message }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info" role="alert">
    <div class="alert-icon"><i class="
        flaticon-exclamation-1"></i></div>
    <div class="alert-text">{{ $message }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>

@endif

{{--@if ($errors->any())--}}
{{-- <div class="alert alert-danger" role="alert">--}}
{{-- <div class="alert-icon"><i class="flaticon-warning"></i></div>--}}
{{-- @foreach ($errors->all() as $error)--}}
{{-- <div class="alert-text">{{ $error }}</div>--}}
{{-- @endforeach--}}
{{-- <div class="alert-close">--}}
{{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{-- <span aria-hidden="true"><i class="la la-close"></i></span>--}}
{{-- </button>--}}
{{-- </div>--}}
{{-- </div>--}}
{{--@endif--}}
