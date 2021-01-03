

    google.maps.event.addDomListener(window, "load", initialize);
    var placeSearch, autocomplete;

var componentForm = {
    street_number: "short_name",
    route: "long_name",
    locality: "long_name",
    administrative_area_level_1: "short_name",
    country: 'long_name',
    postal_code: "short_name"
};

function initialize() {
    var options = {
        componentRestrictions: {
            country: "au"
        }
    };

    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("autocomplete_search"),
        options,
        {
            types: ["geocode"]
        }
    );

    // autocomplete.setFields(['address_component']);
    // autocomplete.addListener('place_changed', fillInAddress);

    autocomplete.addListener("place_changed", function() {
        var place = autocomplete.getPlace();



        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];

            if (componentForm[addressType]) {
                var val =
                    place.address_components[i][componentForm[addressType]];

                if (addressType == "route") {
                    val =
                        place.address_components[0][
                            componentForm["street_number"]
                        ] +
                        " " +
                        place.address_components[i][componentForm[addressType]];
                }
                if (addressType != "street_number") {
                    document.getElementById(addressType).value = val;
                }
            }
        }




        $("#fullAddress").val(place.formatted_address);
        $("#lat").val(place.geometry["location"].lat());
        $("#long").val(place.geometry["location"].lng());
    });
}

$("input[required]").prev(".form-control-label").addClass("required");

function kt_sweetalert_delete(delurl) {

    swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then(function(result) {
        if (result.value) {

            window.location.href = delurl;
            swal.fire(
                'Deleted!',
                'Deleted Successfully!',
                'success'
            )
        }
    });
}

// Create a new password
$(".getNewPass").click(function() {
    var field = $(this).closest('div').find('input[rel="gp"]');
    field.val(randString(field));
});

function randString(id) {
    var dataSet = $(id).attr('data-character-set').split(',');
    var possible = '';
    if ($.inArray('a-z', dataSet) >= 0) {
        possible += 'abcdefghijklmnopqrstuvwxyz';
    }
    if ($.inArray('A-Z', dataSet) >= 0) {
        possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if ($.inArray('0-9', dataSet) >= 0) {
        possible += '0123456789';
    }
    if ($.inArray('#', dataSet) >= 0) {
        possible += '![]{}()%&*$#^<>~@|';
    }
    var text = '';
    for (var i = 0; i < $(id).attr('data-size'); i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    return text;
}

$(".disappear_alert").fadeTo(4000, 500).slideUp(500, function() {
    $(".disappear_alert").slideUp(500);
});

$('.toggle-password').on('click', function(e) {
    // console.log($('.toggle-password').prop('type'));
    e.preventDefault();
    if ($('.password').prop('type') === 'password') {
        $('.password').prop('type', 'text');
    } else $('.password').prop('type', 'password');
});


function userReadNotification() {

    $.ajax({
        type: "GET",
        url: '/user-read-notification',
        dataType: "JSON",

    });

}

function getFormattedDate(date) {
    return moment(date, 'YYYY-MM-DD').format(getDateFormat());
}

function getFormattedDateTime(date) {
    // console.log(moment(date, 'YYYY-MM-DD HH:mm:ss').format(getDateTimeFormat()));
    return moment(date, 'YYYY-MM-DD HH:mm:ss').format(getDateTimeFormat());
}

function getDateFormat() {
    return 'DD-MM-YYYY'
}

function getDateTimeFormat() {
    return 'DD-MM-YYYY HH:mm:ss'
}

// getFormattedDate('2020-03-30 18:43:19');
currentTabOpen();

function currentTabOpen() {
    $(document).ready(function() {
        if (location.hash) {
            $("a[href='" + location.hash + "']").tab("show");
        }
        $(document.body).on("click", "a[data-toggle='tab']", function(event) {
            location.hash = this.getAttribute("href");
        });
    });
    $(window).on("popstate", function() {
        var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
        $("a[href='" + anchor + "']").tab("show");
    });
}
