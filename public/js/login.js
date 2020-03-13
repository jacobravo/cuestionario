$(document).ready(function() {
    $("#ingresar").click(function() {
        login();
    })
});

function login() {
    $.post("login", {
        _token: $('meta[name="csrf-token"]').attr('content'),
        mail: $("#mail").val(),
        pass: $("#pass").val()
    }, function(data) {
        if (/1/.test(data)) {
            location.href = "redirigir";
        } else {
            Swal.fire(data);
        }
    });
}