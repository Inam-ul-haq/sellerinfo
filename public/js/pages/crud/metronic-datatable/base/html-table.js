"use strict";
// Class definition

var KTDatatableHtmlTableDemo = function() {
	// Private functions

	// demo initializer
	var demo = function() {

		var datatable = $('.kt-datatable').KTDatatable({
			data: {
				saveState: {cookie: false},
			},
			columns: [
				{
					field: 'DepositPaid',
					type: 'number',
				},
				{
					field: 'SamId',
					type: 'number',
				},
				{
					field: 'OrderDate',
                    type: 'date',
					format: 'YYYY-MM-DD',
				},
			],
		});

	};

	return {
		// Public functions
		init: function() {
			// init dmeo
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	KTDatatableHtmlTableDemo.init();
});
