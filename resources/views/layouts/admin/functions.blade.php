<script>
    $(document).ready(function() {
        function mostrarSaludo() {
            var texto = "";
            var ahora = new Date();
            var hora = ahora.getHours();

            if (hora >= 6 && hora < 12) {
                texto = "{{ __('es.Hola_Buenos_dias') }}";
            } else if (hora >= 12 && hora < 19) {
                texto = "{{ __('es.Hola_Buenas_tardes') }}";
            } else {
                texto = "{{ __('es.Hola_Buenas_noches') }}";
            }
            $("#saludo").prepend(texto + ' ');

        }
        mostrarSaludo();
    });

    function cargarReloj() {

        // Haciendo uso del objeto Date() obtenemos la hora, minuto y segundo 
        var fechahora = new Date();
        var hora = fechahora.getHours();
        var minuto = fechahora.getMinutes();
        console.log(fechahora);
        // Variable meridiano con el valor 'AM' 
        var meridiano = "AM";


        // Si la hora es igual a 0, declaramos la hora con el valor 12 
        if (hora == 0) {

            hora = 00;
            meridiano = "AM";

        }

        // Si la hora es mayor a 12, restamos la hora - 12 y mostramos la variable meridiano con el valor 'PM' 
        if (hora > 12) {

            hora = hora - 12;

            // Variable meridiano con el valor 'PM' 
            meridiano = "PM";

        }
        if (hora == 12) {
            meridiano = "PM";
        }

        // Formateamos los ceros '0' del reloj 
        hora = (hora < 10) ? "0" + hora : hora;
        minuto = (minuto < 10) ? "0" + minuto : minuto;
        // meridiano = (hora >= 12) ? "PM" : "AM";

        // Enviamos la hora a la vista HTML 
        var tiempo = hora + ":" + minuto + meridiano;
        document.getElementById("relojnumerico").innerText = tiempo;
        document.getElementById("relojnumerico").textContent = tiempo;

        // Cargamos el reloj a los 500 milisegundos 
        setTimeout(cargarReloj, 30000);

    }
    // Ejecutamos la función 'CargarReloj' 
    cargarReloj();
    $(document).on('show.bs.modal', '#confirm-delete', function(e) {
        var data = $(e.relatedTarget).data();
        $("#form-eliminar").attr('action', data.bsAction);
        $('#id').val(data.bsRecordId);
        $('.title', this).text(data.bsRecordTitle);
        $('.btn-ok', this).data('recordId', data.bsRecordId);
    });
    // FUNCIONES LOADING
    $(document).on('ajaxStart', function() {
        loading_show();
    })

    $(document).on('ajaxStop', function(start) {
        loading_hide();
    });

    function loading_show() {
        $('body').loadingModal({
            text: 'Por favor espere...',
            animation: 'circle',
        });
        $('body').loadingModal('show');
    }

    function loading_hide() {
        $('body').loadingModal('hide');
    }

    // FIN FUNCIONES LOADING
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                $('#scrolltop').fadeIn(); // Usa fadeIn para animar la aparición
            } else {
                $('#scrolltop').fadeOut(); // Usa fadeOut para animar la desaparición
            }
        });

        $('#scrolltop').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 3000); // Anima el scroll durante 500 milisegundos
        });
    });

    const intro = introJs().setOptions({
        steps: [{
                title: 'Bienvenido',
                intro: 'Bienvenido al sistema Salud Integral 360'
            },
            {
                title: "Barra informativa",
                element: document.querySelector('.first'),
                intro: 'Muestra información para acceso rápido'
            },
            {
                title: "Menu",
                element: document.querySelector('.second'),
                intro: 'Panel de navegación del sistema'
            }
        ],
    });

    document.getElementById('iniciarIntroBtn').addEventListener('click', () => {
        intro.start();
    });

    introJs().addHints();
</script>
