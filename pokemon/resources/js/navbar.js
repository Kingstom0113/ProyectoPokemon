"use strict"


//El código es para que dependiendo de la hora del dia, el boton home de la landing page cambie de color.
document.addEventListener('DOMContentLoaded', function () {
            cambiarEstiloSegunHora();
        });

        function cambiarEstiloSegunHora() {
            const horaActual = new Date().getHours();
            const homeLink = document.getElementById('navbarLink');

            if (horaActual >= 6 && horaActual < 14) {
                homeLink.style.backgroundColor = 'lightblue';
                homeLink.style.color = 'black';
            } else if (horaActual >= 14 && horaActual < 21) {
                homeLink.style.backgroundColor = 'orange';
            } else {
                homeLink.style.backgroundColor = 'darkblue';
            }
        }