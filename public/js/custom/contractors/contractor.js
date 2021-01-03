$('#kt_modal_1').on('hidden.bs.modal', function () {

    $('#kt_modal_1').find('form').trigger('reset');

});

    $('#filterit').on('click', function() {

        var fnServerParams = {
            
            "filter_pallet_log_contractor": $("#pallet_log_contractor").val(),
           
            "filter_pallet_log_driver": $("#pallet_log_driver").val(),
            "filter_pallet_log_vehicle": $("#pallet_log_vehicle").val(),
        }

        $('#kt_table_pallet_logs').DataTable().destroy();
        $('#kt_table_pallet_logs tbody').empty();
        initDatatable('pallet_logs/pallet_log_table', 'kt_table_pallet_logs', fnServerParams);
       


    });

    $('#kt_reset').on('click', function() {

        $('#Foo').find('input:text').val('');

        $('.kt-selectpicker').val('');
        $('.kt-selectpicker').selectpicker('refresh');


    });
