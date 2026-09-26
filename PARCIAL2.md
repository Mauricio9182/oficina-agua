# Segundo Parcial Práctico — Mejoras Implementadas

**Rama:** feature/parcial2

## Mejora #6 — Contador de caracteres

Ubicación: contadores/create.blade.php y contadores/edit.blade.php

El campo direccion_servicio (VARCHAR 255) ahora muestra un contador en tiempo real ("X/255 caracteres") mientras el usuario escribe, con cambio de color al acercarse al límite (amarillo en 200, rojo en 255).

## Mejora #10 — Aviso de sesión por inactividad

Ubicación: partials/inactivity-modal.blade.php, incluido en contadores/edit.blade.php

Tras 2 minutos sin actividad del usuario, se muestra un modal con cuenta regresiva de 60 segundos y botón "Seguir conectado" que cancela el aviso.
