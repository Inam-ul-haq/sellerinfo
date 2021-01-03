<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

	<!-- begin:: Header Menu -->

	<!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->
	<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
		<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
			<ul class="kt-menu__nav ">
			</ul>
		</div>
	</div>

	<!-- end:: Header Menu -->

	<!-- begin:: Header Topbar -->
	<div class="kt-header__topbar">

		<!--begin: Search -->

		<!--begin: Search -->

		<!--end: Search -->
		<!--end: Notifications -->
		<!-- dd(Auth::user()->unreadNotifications); -->
		<div class="kt-header__topbar-item dropdown">
			<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true" onclick="userReadNotification();stopTone()">
				<span class="kt-header__topbar-icon kt-pulse kt-pulse--brand">

					@if(count(Auth::user()->unreadNotifications) > 0)
					<i class="fa fa-bell" id="staff_bell" style="color:#fd397a;"></i>
					<span class="kt-pulse__ring"></span>

					@else
					<i class="fa fa-bell" id="staff_bell"></i>
					@endif

				</span>


			</div>
			<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">

				<!--begin: Head -->
				<div class="kt-head kt-head--skin-dark kt-head--fit-x  pd-4" style="background-image: url(/media/misc/bg-1.jpg)">
					<h3 class="kt-head__title">
						User Notifications
						&nbsp;


						<span class="btn btn-success btn-sm btn-bold btn-font-md" id="staff_notification_count">{{count(Auth::user()->unreadNotifications)}}</span>
					</h3>

				</div>

				<!--end: Head -->
				<div class="tab-content">
					<div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll staff_notifications" data-scroll="true" data-height="300" data-mobile-height="200">
						@foreach (Auth::user()->unreadNotifications as $notification)

						<div class="kt-notification__item" style="cursor:pointer" >

							<div class="kt-notification__item-details" >
								<div class="kt-notification__item-title" >
									{!!$notification->data['message']!!}


								</div>
								<div class="kt-notification__item-time">
									{{$notification->created_at->diffForHumans()}}
								</div>
							</div>

						</div>

						@endforeach
						@if(!count(Auth::user()->unreadNotifications) > 0)
						<div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle mt-5" id="empty_notification" f>
							<div class="kt-grid__item kt-grid__item--middle kt-align-center">
								All caught up!
								<br>No new notifications.
							</div>
						</div>
						@endif
					</div>
				</div>

				<!--begin: Navigation -->
				<div class="kt-notification">

					<center>
						<div style="text-align: center; padding:2%">
							{{-- <a href="{{route('user.all.notifications')}}" class="kt-link kt-link--state kt-link--info">See All</a> --}}
						</div>
					</center>
				</div>

				<!--end: Navigation -->
			</div>
		</div>
		<!--end: Notifications -->
		<!--begin: User Bar -->
		<div class="kt-header__topbar-item kt-header__topbar-item--user">
			<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
				<div class="kt-header__topbar-user">
					<span class="kt-header__topbar-username kt-hidden-mobile">{{auth()->user()->name}}</span>
					<img class="kt-hidden" alt="Pic" src="{{asset('media/users/300_25.jpg')}}" />

					<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{substr(auth()->user()->name, 0, 1)}}</span>
				</div>
			</div>
			<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

				<!--begin: Head -->
				<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(/media/misc/bg-1.jpg)">
					<div class="kt-user-card__avatar">
						<img class="kt-hidden" alt="Pic" src="{{asset('media/users/300_25.jpg')}}" />

						<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
						<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{substr(auth()->user()->name, 0, 1)}}</span>
					</div>
					<div class="kt-user-card__name">
						{{auth()->user()->name}}
					</div>

				</div>

				<!--end: Head -->

				<!--begin: Navigation -->
				<div class="kt-notification">
					<div class="kt-notification__custom kt-space-between">

						<a class="btn btn-label btn-label-brand btn-sm btn-bold" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
							Logout
						</a>
                        <div class="kt-notification__custom kt-space-between">

                            <a class="btn btn-label btn-label-brand btn-sm btn-bold" href="{{ route('changepassword') }}">
                                Change Password
                            </a>

                        </div>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>

					</div>
				</div>

				<!--end: Navigation -->
			</div>
		</div>

		<!--end: User Bar -->
	</div>

	<!-- end:: Header Topbar -->
</div>
