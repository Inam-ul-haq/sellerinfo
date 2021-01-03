

new Morris.Bar({
    element: 'kt_morris_3',
    data: [{
            y: 'Complete',
            a: 80


        },
        {
            y: 'Incomplete',
            b: 30


        }


    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Complete: 80', 'Incomplete: 30'],
    barColors: ['#2abe81', '#24a5ff']
});
new Morris.Bar({
    element: 'kt_morris_13',
    data: [{
            y: 'Total',
            a: 80


        },
        {
            y: 'On Time',
            b: 30


        },
        {
            y: 'Late',
            c: 10


        }


    ],
    xkey: 'y',
    ykeys: ['a', 'b','c'],
    labels: ['Total Consignments: 80', 'On Time Consignments: 30','Late Consignments: 10'],
    barColors: ['#2abe81', '#24a5ff','#dc3545']
});

    new Morris.Donut({
        element: 'kt_morris_6',
        data: [{
                label: "Todays Invoices",
                value: 12
            },
            {
                label: "Total Invoices this Week",
                value: 30
            },
            {
                label: "Total Invoices this Month",
                value: 60

            }
        ],
        colors: ['#593ae1', '#6e4ff5', '#9077fb']
    });

    new Morris.Donut({
        element: 'kt_morris_7',
        data: [
            {
                label: "Assigned",
                value: 30
            },
            {
                label: "Unassigned",
                value: 20

            }
        ],
        colors: ['#593ae1', '#6e4ff5']
    });

    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'kt_morris_2',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [{
                y: '2006',
                a: 100,
                b: 90
            },
            {
                y: '2007',
                a: 75,
                b: 65
            },
            {
                y: '2008',
                a: 50,
                b: 40
            },
            {
                y: '2009',
                a: 75,
                b: 65
            },
            {
                y: '2010',
                a: 50,
                b: 40
            },
            {
                y: '2011',
                a: 75,
                b: 65
            },
            {
                y: '2012',
                a: 100,
                b: 90
            }
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'y',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['a', 'b'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Values A', 'Values B'],
        lineColors: ['#6e4ff5', '#f6aa33']
    });

    function myFunction() {
        document.getElementById("track_consignment").innerHTML = "INV-0100 is at 77 Corporate Drive and is expected to be delivered at 29-05-2020";
      }
    