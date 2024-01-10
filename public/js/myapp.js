
// Script de control propio



new DataTable('#datatable');


function controlAlertas(){
    setTimeout(function() {
        $(".alert").fadeOut("slow");
    }, 10000); // 10 segundos
}

$(document).ready(function() {
    controlAlertas();
});
