var HOST_URL = "https://keenthemes.com/metronic/tools/preview";
var KTAppSettings = {
    "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200},
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#F3F6F9",
                "dark": "#212121"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#ECF0F3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#212121",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#ECF0F3",
            "gray-300": "#E5EAEE",
            "gray-400": "#D6D6E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#80808F",
            "gray-700": "#464E5F",
            "gray-800": "#1B283F",
            "gray-900": "#212121"
        }
    },
    "font-family": "Poppins"
};

$("form select").attr('data-live-search', true).selectpicker({
    noneSelectedText: 'Seçim Yapılmadı'
});

$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'tr'
});

$('.mobile-phone-number').inputmask('(999) 999-99-99', {placeholder: '(___) ___-__-__'});

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$(window).on('load', function () {
    $("#loader").fadeOut(250);
});

$(".languageSelector").click(function () {
    var language = $(this).data('lang');
    $(".changeLanguage").prop("disabled", false);
    $(this).prop("disabled", true);
    $.ajax({
        type: "post",
        url: '/language',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            language: language
        },
        success: function (response) {
            response === 'success' ? location.reload() : toastr.warning(response.data);
        }
    });
});
