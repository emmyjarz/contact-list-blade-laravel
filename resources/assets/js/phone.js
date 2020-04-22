$(document).ready(function () {
    // Phone validation
    $('#phone').bind('change keyup', function () {
        let val = $(this).val();
        const regex = /\D+$/g;

        if (val.match(regex) || val.length >= 10) {
            val = val.replace(regex, "");
            $(this).val(val);
        }
        if (val.length >=10) {
            $(this).val(val.slice(0,10))
        }
    });
});