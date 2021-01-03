@extends('layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content" style="flex:none;">

        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <div class="kt-subheader__breadcrumbs">
                        <a href="" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>

                        <a href="{{ route('instock.index') }}" class="kt-subheader__breadcrumbs-link">
                            In Stock </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>

                        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
                            Edit Stock
                        </span>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Update Stock
                    </h3>
                </div>
                <div class="kt-section__content kt-section__content--solid mt-2">
                    <a href="{{ route('orders.index') }}" class="btn btn-default pull-right"
                        style="align-items: center;">Back</a>
                </div>
            </div>
            <!--begin::Form-->
            <form class="kt-form kt-form--label-right" action="{{ route('instock.update',$instock->id)}}" method="POST"
                id="invoice_form">
                {{ csrf_field() }}
                <div class="kt-portlet__body">
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="form-control-label">Enter URL</label>
                            <input type="url" class="form-control" name="url" required value="{{$instock->url}}">
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="form-control-label">Enter Product Name</label>
                            <input type="text" class="form-control" name="product" required value="{{$instock->product}}">
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="form-control-label">Enter Store Name</label>
                            <input type="text" class="form-control" name="store" required value="{{$instock->store}}">
                        </div>
                    </div>
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
                                <input type="checkbox" name="status"  @if ($instock->status==1)
                                 checked="checked"
                                @endif /> Status
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
                                <input type="checkbox" name="active"   @if ($instock->active==1)
                                checked="checked"
                               @endif> Active
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary" id="submit">
                            Update
                        </button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
            <!-- </div> -->
        </div>
    </div>
@endsection
