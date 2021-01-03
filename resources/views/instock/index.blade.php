@extends('layouts.index')
@section('content')
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand fa fa-store-alt"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            In Stock
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <a href="{{ route('instock.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-plus"></i>
                                    New Stock Entry
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @include('instock.partials.table')
            </div>
        </div>
    </div>
    @endsection
@section('scripts')
<script>
   $(document).ready(function() {
    initDatatable('/instock_table', 'instock_table');
    });
    </script>

@endsection
