@extends('layouts.index')
@section('content')
@if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<div class="kt-portlet kt-portlet--tabs">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Admin
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line   nav-tabs-line-right nav-tabs-line-brand"
                role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kt_portlet_tab_1_1" role="tab">
                        Users Info
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="tab-content">
            <div class="tab-pane active" id="kt_portlet_tab_1_1">
                @include('admin.partials.table')
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>

    
    $(document).ready(function() {
    initDatatable('/admin_table', 'admin_table');
    });


    </script>
@endsection
