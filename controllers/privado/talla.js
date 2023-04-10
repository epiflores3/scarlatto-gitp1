// Constante para completar la ruta de la API.
const TALLA_API = 'business/privado/talla.php';
//Constante para cambiarle el titulo a el modal
const MODAL_TITLE = document.getElementById('modal-title');
// Constantes para cuerpo de la tabla
const TBODY_ROWS = document.getElementById('tbody-rows');
const RECORDS = document.getElementById('records');

//Método para que cargue graficamente la tabla
document.addEventListener('DOMContentLoaded', () => {
    // Llamada a la función para llenar la tabla con los registros disponibles.
    fillTable();
});

//Funcion para traer los registros disponibles de la base a el sistema
async function fillTable(form = null) {
    // Se inicializa el contenido de la tabla.
    TBODY_ROWS.innerHTML = '';
    RECORDS.textContent = '';
    // Se verifica la acción a realizar.
    (form) ? action = 'search' : action = 'readAll';
    // Petición para obtener los registros disponibles.
    const JSON = await dataFetch(TALLA_API, action, form);
    // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
    if (JSON.status) {
        // Se recorre el conjunto de registros fila por fila.
        JSON.dataset.forEach(row => {
            // Se crean y concatenan las filas de la tabla con los datos de cada registro.
            TBODY_ROWS.innerHTML += `
            <tr>
                <td>${row.talla}</td>
                <td>

                    <button onclick="openReport(${row.id_talla})" type="button" class="btn btn-success">
                        <img height="20px" width="20px" src="../../resources/img/imgtablas/ojo.png" alt="ver">
                    </button>

                    <button onclick="openUpdate(${row.id_talla})" type="button" class="btn btn-info" data-bs-toggle="modal"
                        data-bs-target="#editartalla"><img height="20px" width="20px" src="../../resources/img/imgtablas/update.png"
                            alt="actualizar">
                    </button>

                    <button onclick="openDelete(${row.id_talla})" class="btn btn-danger"><img height="20px"
                            width="20px" src="../../resources/img/imgtablas/delete.png" alt="eliminar">
                    </button>


                </td>
            </tr>
            `;
        });

        RECORDS.textContent = JSON.message;
    } else {
        sweetAlert(4, JSON.exception, true);
    }
}

function openCreate() {

    // Se asigna título a la caja de diálogo.
    MODAL_TITLE.textContent = 'Crear Talla';
}

async function openDelete(id) {
    // Llamada a la función para mostrar un mensaje de confirmación, capturando la respuesta en una constante.
    const RESPONSE = await confirmAction('¿Desea eliminar la categoría de forma permanente?');
    // Se verifica la respuesta del mensaje.
    if (RESPONSE) {
        // Se define una constante tipo objeto con los datos del registro seleccionado.
        const FORM = new FormData();
        FORM.append('id_talla', id);
        // Petición para eliminar el registro seleccionado.
        const JSON = await dataFetch(TALLA_API, 'delete', FORM);
        // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
        if (JSON.status) {
            // Se carga nuevamente la tabla para visualizar los cambios.
            fillTable();
            // Se muestra un mensaje de éxito.
            sweetAlert(1, JSON.message, true);
        } else {
            sweetAlert(2, JSON.exception, false);
        }
    }
}