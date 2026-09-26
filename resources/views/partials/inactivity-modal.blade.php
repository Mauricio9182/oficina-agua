{{-- Modal de aviso de sesión por inactividad --}}
<div id="modalInactividad" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">
    <div style="background:#fff; border-radius:6px; max-width:400px; width:90%; box-shadow:0 4px 20px rgba(0,0,0,0.3);">
        <div style="background:#ffc107; padding:15px 20px; border-radius:6px 6px 0 0;">
            <h5 style="margin:0;">
                <i class="fas fa-exclamation-triangle"></i> Aviso de inactividad
            </h5>
        </div>
        <div style="padding:20px; text-align:center;">
            <p>Tu sesión se cerrará por inactividad en:</p>
            <h2 id="contadorRegresivo" style="color:#dc3545;">60</h2>
            <p>segundos.</p>
        </div>
        <div style="padding:15px 20px; text-align:center; border-top:1px solid #eee;">
            <button type="button" id="btnSeguirConectado" class="btn btn-primary">
                Seguir conectado
            </button>
        </div>
    </div>
</div>

<script>
    (function () {
       const TIEMPO_INACTIVIDAD_MS = 2 * 60 * 1000; // 2 minutos antes de mostrar el aviso
        const TIEMPO_CUENTA_REGRESIVA_SEG = 60;

        let timerInactividad;
        let intervaloRegresivo;
        let segundosRestantes = TIEMPO_CUENTA_REGRESIVA_SEG;

        const modalInactividad = document.getElementById('modalInactividad');
        const contadorRegresivo = document.getElementById('contadorRegresivo');
        const btnSeguirConectado = document.getElementById('btnSeguirConectado');

        function mostrarModalInactividad() {
            segundosRestantes = TIEMPO_CUENTA_REGRESIVA_SEG;
            contadorRegresivo.textContent = segundosRestantes;
            modalInactividad.style.display = 'flex';

            intervaloRegresivo = setInterval(function () {
                segundosRestantes--;
                contadorRegresivo.textContent = segundosRestantes;

                if (segundosRestantes <= 0) {
                    clearInterval(intervaloRegresivo);
                }
            }, 1000);
        }

        function reiniciarTimerInactividad() {
            clearTimeout(timerInactividad);
            timerInactividad = setTimeout(mostrarModalInactividad, TIEMPO_INACTIVIDAD_MS);
        }

        btnSeguirConectado.addEventListener('click', function () {
            clearInterval(intervaloRegresivo);
            modalInactividad.style.display = 'none';
            reiniciarTimerInactividad();
        });

        ['mousemove', 'keydown', 'click', 'scroll'].forEach(function (evento) {
            document.addEventListener(evento, reiniciarTimerInactividad);
        });

        reiniciarTimerInactividad();
    })();
</script>