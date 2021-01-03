@extends('web.layouts.index')

@section('title', 'All Notifications')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    All Notifications
                </h3>
                <!-- BreadCrumbs-->
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">All Notifications</span>
                </div>
                <!-- BreadCrumsbs end -->
            </div>

        </div>
    </div>
    <!-- end:: Content Head -->
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


        <!--begin::Portlet-->

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Notifications List
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <h1>sadasdasdasd</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!--begin::Timeline 1-->
                <div class="kt-list-timeline">
                    <div class="kt-list-timeline__items">
                        @foreach (Auth::user()->notifications as $notification)
                        <div class="kt-list-timeline__item">
                            <span class="kt-list-timeline__badge"></span>
                            <span class="kt-list-timeline__text"> {{$notification->data['actionText']}}

                                @if($notification->data['actionURL'] != '#')
                                <a href="{{$notification->data['actionURL']}}" download>Click Here</a>
                                @endif</span>
                            <span class="kt-list-timeline__time">{{$notification->created_at->diffForHumans()}}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!--end::Timeline 1-->

            </div>
        </div>
        <!--end::Portlet-->
    </div>
    <!-- end:: Content -->
</div>


@endsection
@section('scripts')

@endsection
