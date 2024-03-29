<?php
require_once('../../entities/dto/categoriap.php');

if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $categoria = new Categoria;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'dataset' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $categoria->readAll()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existen '.count($result['dataset']).' registros';
                } elseif (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay datos registrados';
                }
                break;

                case 'readOne':
                    if (!$categoria->setId($_POST['id_categoria_producto'])) {
                        $result['exception'] = 'Categoría incorrecta';
                    } elseif ($result['dataset'] = $categoria->readOne()) {
                        $result['status'] = 1;
                    } elseif (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                break;
                
            case 'search':

                $_POST = Validator::validateForm($_POST);
                if ($_POST['search'] == '') {
                    $result['exception'] = 'Ingrese un valor para buscar';
                } elseif ($result['dataset'] = $categoria->searchRows($_POST['search'])) {
                    $result['status'] = 1;
                    $result['message'] = 'Existen '.count($result['dataset']).' coincidencias';
                } elseif (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay coincidencias';
                }
                break;

                case 'create':
                    $_POST = Validator::validateForm($_POST);
                    if (!$categoria->setCategoria($_POST['categoria'])) {
                        $result['exception'] = 'Categoria incorrecta';
                    } elseif ($categoria->createRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'Categoria creada correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                break;


                case 'update':
                    $_POST = Validator::validateForm($_POST);
                    if (!$categoria->setId($_POST['id'])) {
                        $result['exception'] = 'id de categoria incorrecta';
                    } elseif (!$data = $categoria->readOne()) {
                        $result['exception'] = 'categoria inexistente';
                    } elseif (!$categoria->setCategoria($_POST['categoria'])) {
                        $result['exception'] = 'categoria incorrecto';
                    } elseif ($categoria->updateRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'categoria modificada correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                break;


            case 'delete':
                if (!$categoria->setId($_POST['id_categoria'])) {
                    $result['exception'] = 'Categoría incorrecta';
                } elseif (!$data = $categoria->readOne()) {
                    $result['exception'] = 'Categoría inexistente';
                } elseif ($categoria->deleteRow()) {
                    $result['status'] = 1;
                    if (Validator::deleteFile($categoria->getRuta(), $data['imagen_categoria'])) {
                        $result['message'] = 'Categoría eliminada correctamente';
                    } else {
                        $result['message'] = 'Categoría eliminada pero no se borró la imagen';
                    }
                } else {
                    $result['exception'] = Database::getException();
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Acceso denegado'));
    }
} else {
    print(json_encode('Recurso no disponible'));
}