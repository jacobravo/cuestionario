$(document).ready(function() {
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(grafico);
});


function grafico() {
    var si = Number($("#estSi").val());
    var no = Number($("#estNo").val());
    var MoM = Number($("#estMoM").val());

    var data = google.visualization.arrayToDataTable([
        ['Respuesta 2', 'Cantidad de respuestas por alternativa'],
        ['Si', si],
        ['No', no],
        ['Mas o menos', MoM]
    ]);

    var options = { 'title': 'Proporción de respuestas dadas en pregunta 2', 'width': 550, 'height': 400 };

    var chart = new google.visualization.PieChart(document.getElementById('grafico'));
    chart.draw(data, options);
}

function guardar() {

    var pregunta2 = "";
    var pregunta3 = "";

    if ($("#pregunta1").val() == "") {
        Swal.fire("Por favor ingrese una respuesta en pregunta 1");
        return false;
    }

    var cont = 0;
    $(".pregunta2").each(function(index, element) {
        if (element.checked == true) {
            cont = 1;
            pregunta2 = $(element).val();
        }
    });

    if (cont == 0) {
        Swal.fire("Por favor seleccione una alternativa en la pregunta 2");
        return false;
    }

    var cont2 = 0;
    $(".pregunta3").each(function(index, element) {
        if (element.checked == true) {
            cont2 = 1;
            pregunta3 = $(element).val();
        }
    });

    if (cont2 == 0) {
        Swal.fire("Por favor seleccione una alternativa en la pregunta 3");
        return false;
    }

    $.post("guardar", {
        _token: $('meta[name="csrf-token"]').attr('content'),
        respuesta0: $("#pregunta1").val(),
        respuesta1: pregunta2,
        respuesta2: pregunta3
    }, function(data) {
        Swal.fire({
            icon: 'success',
            title: data,
            onClose: () => {
                location.reload();
            }
        })
    });
}