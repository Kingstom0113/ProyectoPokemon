import "bootstrap";

"use strict";

document.addEventListener('DOMContentLoaded', function () {
        const formulario = document.getElementById('formulario_pokemon');

        formulario.addEventListener('submit', function (event) {
            if (!validarFormulario()) {
                event.preventDefault();
            }
        });

        function validarFormulario() {
            const id = document.getElementById('id').value;
            const name = document.getElementById('name').value;
            const type = document.getElementById('type').value;
            const subtype = document.getElementById('subtype').value;

            if (id < 0 || id > 1025) {
                alert('El número de la Pokedex debe estar entre 0 y 1025.');
                return false;
            }

            if (name === '' || name.length > 16) {
                alert('El nombre debe tener entre 1 y 16 caracteres.');
                return false;
            }

            if (type === subtype) {
                alert('El tipo y el subtipo no pueden ser iguales.');
                return false;
            }

            return true;
        }
    });
