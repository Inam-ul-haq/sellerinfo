<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Dashboard</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#kt_tabs_5_1" role="tab">Monthly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_tabs_5_3" role="tab">Yearly</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="kt_tabs_5_1" role="tabpanel">
                {{-- Monthly Table --}}
                <table class="table table-striped" id="dashboard_table">
                    <thead>
                        <tr>
                            <th title="Field #1">url</th>
                            <th title="Field #2">Product</th>
                            <th title="Field #3">Store</th>
                            <th title="Field #4">Status</th>
                            <th title="Field #5">Active</th>
                            <th title="Field #6">Action</th>
                        </tr>
                    </thead>

                </table>
            </div>

            <div class="tab-pane" id="kt_tabs_5_3" role="tabpanel">
                <table class="table table-striped" id="dashboard_table">
                    <thead>
                        <tr>
                            <th title="Field #1">url</th>
                            <th title="Field #2">Product</th>
                            <th title="Field #3">Store</th>
                            <th title="Field #4">Status</th>
                            <th title="Field #5">Active</th>
                            <th title="Field #6">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
