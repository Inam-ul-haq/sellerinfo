@extends('layouts.index')
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content" style="flex:none;">

        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <div class="kt-subheader__breadcrumbs">
                        <a href="" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>

                        <a href="{{ route('orders.index') }}" class="kt-subheader__breadcrumbs-link">
                            Orders </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>

                        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
                            Add Order
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
                        Add Order
                    </h3>
                </div>
                <div class="kt-section__content kt-section__content--solid mt-2">
                    <a href="{{ route('orders.index') }}" class="btn btn-default pull-right"
                        style="align-items: center;">Back</a>
                </div>
            </div>
            <!--begin::Form-->
            <form class="kt-form kt-form--label-right" action="{{ route('orders.store') }}" method="post" id="invoice_form">
                @csrf
                <div class="kt-portlet__body">
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="form-control-label">Enter Amazon ID</label>
                            <input type="text" class="form-control" name="amzid" required value="">
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="form-control-label">Enter Sam ID</label>
                            <input type="text" class="form-control" name="samid" required value="">
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="form-control-label">Enter Quantity</label>
                            <input type="number" class="form-control" name="quantity" required value="">
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="form-control-label">Enter Sam Quantity</label>
                            <input type="number" class="form-control" name="samq" required value="">
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="form-control-label">Enter Sam Price</label>
                            <input type="number" class="form-control" name="samp" required value="">
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="form-control-label">Enter Sam Email</label>
                            <input type="email" class="form-control" name="same" required value="">
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label class="form-control-label">Enter Product Name</label>
                            <input type="text" class="form-control" name="pname" required value="">
                        </div>
                    </div>
                    <div class="form-group form-group-last row">
                        <div class="col-lg-6 form-group-sub">
                            <label for="exampleTextarea">Note</label>
                            <textarea class="form-control" name="note" id="exampleTextarea" rows="3"
                                style="margin-top: 0px; margin-bottom: 0px; height: 130px;"></textarea>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary" id="submit">
                            Create
                        </button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
            <!-- </div> -->
        </div>
    </div>



@endsection
@section('scripts')

@endsection
