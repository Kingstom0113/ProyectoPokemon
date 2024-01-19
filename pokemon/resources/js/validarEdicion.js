"use strict"

//Validación del formulario de editar Pokemon

    document.addEventListener('DOMContentLoaded', function () {
        const formulario = document.getElementById('formulario_pokemon_edicion');

        formulario.addEventListener('submit', function (event) {
            if (!validarFormularioEdicion()) {
                event.preventDefault();
            }
        });

        function validarFormularioEdicion() {
            let name = document.getElementById('name').value;
            let type = document.getElementById('type').value;
            let subtype = document.getElementById('subtype').value;

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