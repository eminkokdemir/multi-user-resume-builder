$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function (e) {
            /*init_loading();*/
        },
        complete: function (e) {
            /*destroy_loading();*/
        }
    });

    $(document).on("submit", ".form-ajax", function (e) {
        e.preventDefault();
        let action = $(this).attr("action");
        let method = $(this).attr("data-method");
        let data = new FormData(this);
        $("#validation-errors").css("display", "none");
        if (method === "put") {
            data.append("_method", "put")
        }
        $.ajax({
            url: action,
            method: "post",
            processData: false,
            contentType: false,
            data: data,
            success: function (data) {
                console.log(data);
                if (data.status === "validation") {
                    validation_error_viewer(data.errors);
                } else {
                    set_alert_toast(data.message, data.status);
                    if (typeof data.url !== "undefined") {
                        if (data.url === "reload"){
                            location.reload();
                        } else {
                            setTimeout(function () {
                                location.replace(data.url);
                            }, 1000);
                        }
                    }
                }
            },
        });
    });
});

function set_alert_toast(message, status = "success", title = "") {

    let loaderBg;
    if (status === "success") {
        loaderBg = "#f96868";
    } else {
        status = "error";
        loaderBg = "#f2a654";
    }
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr[status](message);
}

function scroll_top(second = 600) {
    $("html, body").animate({
        scrollTop: 0
    }, second);
}

function number_format(number, decimals = 2, decPoint = ",", thousandsSep = ".") {

    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    let n = !isFinite(+number) ? 0 : +number
    let prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    let sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    let dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    let s = ''

    let toFixedFix = function (n, prec) {
        if (('' + n).indexOf('e') === -1) {
            return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
        } else {
            let arr = ('' + n).split('e')
            let sig = ''
            if (+arr[1] + prec > 0) {
                sig = '+'
            }
            return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
        }
    }

    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || ''
        s[1] += new Array(prec - s[1].length + 1).join('0')
    }

    return s.join(dec)
}

function validation_error_viewer(errors) {
    $("#validation-errors").css("display", "").find("ul").empty();
    $.each(errors, function (key, value) {
        $("#validation-errors").find("ul").append('<li>' + value + '</li>')
    });
    scroll_top();
}
