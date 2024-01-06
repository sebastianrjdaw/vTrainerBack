
// Script de control propio


new DataTable('#users');

function controlAlertas(){
    setTimeout(function() {
        $(".alert").fadeOut("slow");
    }, 10000); // 10 segundos
}

$(document).ready(function() {
    controlAlertas();
});
