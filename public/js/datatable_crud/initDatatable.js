"use strict";

var strurl;
var strtablename;
function initDatatable(url, tablename, filters) {


    tablename = '#' + tablename;

    var columns = [];


    $.ajax({
        url: url,
        success: function (data) {


            var columnNames = [];

            columnNames = Object.keys(data.aaData[0]);


            for (var i in columnNames) {
                columns.push({
                    data: columnNames[i]
                });
            }


        }, async: false
    });

    // begin first table
    // console.log();


    var table = $(tablename).DataTable({
        responsive: true,
        "order": [],
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }],
        buttons: [
            'print',
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
        ],
        processing: true,
        serverSide: true,
        ajax: {
            url: url,
            type: 'get',
            data: filters
        },

        columns: columns,


        "language": {
            processing: "<img class='img-fluid' src='https://thumbs.gfycat.com/WatchfulSnarlingBettong-max-1mb.gif'>"
        },

        "bDestroy": true,
    });



    table.on('change', '.kt-group-checkable', function () {

        var set = $(this).closest('table').find('td:first-child .kt-checkable');
        var checked = $(this).is(':checked');

        $(set).each(function () {
            if (checked) {
                $(this).prop('checked', true);
                table.rows($(this).closest('tr')).select();
            } else {
                $(this).prop('checked', false);
                table.rows($(this).closest('tr')).deselect();
            }
        });
    });
    // table.dataTable({
    //     "order": [],
    //     "columnDefs": [{
    //         "targets": 'no-sort',
    //         "orderable": false,
    //     }]
    // });

    // table.DataTable({

    //  });

    $('#reloadtable').on('click', function (e) {
        $(tablename).DataTable().ajax.reload();
    });

    $('#reload_' + tablename.substr(1)).on('click', function (e) {
        $(tablename).DataTable().ajax.reload();
    });

    $('#export_print').on('click', function (e) {
        e.preventDefault();
        $(tablename).DataTable().button(0).trigger();
    });

    $('#export_print_' + tablename.substr(1)).on('click', function (e) {
        e.preventDefault();
        table.button(0).trigger();
    });

    $('#export_copy').on('click', function (e) {
        e.preventDefault();
        $(tablename).DataTable().button(1).trigger();
    });

    $('#export_copy_' + tablename.substr(1)).on('click', function (e) {
        e.preventDefault();
        table.button(1).trigger();
    });

    $('#export_excel').on('click', function (e) {

        e.preventDefault();
        $(tablename).DataTable().button(2).trigger();
    });

    $('#export_excel_' + tablename.substr(1)).on('click', function (e) {
        e.preventDefault();
        table.button(2).trigger();
    });

    $('#export_csv').on('click', function (e) {
        e.preventDefault();
        $(tablename).DataTable().button(3).trigger();
    });

    $('#export_csv_' + tablename.substr(1)).on('click', function (e) {
        e.preventDefault();
        table.button(3).trigger();
    });

    $('#export_pdf').on('click', function (e) {
        e.preventDefault();
        $(tablename).DataTable().button(4).trigger();
    });

    $('#export_pdf_' + tablename.substr(1)).on('click', function (e) {
        e.preventDefault();
        table.button(4).trigger();
    });





};


