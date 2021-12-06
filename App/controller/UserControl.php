<?php

include(MODEL_PATH . '/class/Employer.php');
// include(LIB_PATH . 'GestorErrores.php');
// include(LIB_PATH . 'Blade.php');
// include(HELPERS_PATH . 'form.php');

class UserController
{

    private $pag = 1;
    private $model;
    private $blade;

    public function __construct()
    {
        $this->model = new Employer($this->pag);
        $this->blade = TemplateBlade::GetInstance();
    }

    public static function getInstance()
    {
        return new self();
    }

    public function login()
    {
        return $this->blade->render('user/login');
    }

    public function checkUser()
    {
        if ($_POST) { // Comprobamos que recibimos los datos y que no hay errores
            $user = $this->model->comprobarUser($_POST['user'], $_POST['password']);

            if ($user) { //si no hay errores comprobamos si el usuario existe
                // $usuariook = strtolower($user->user);
                // $passok =  strtolower($user->passwords);

                //comprobamos que tipo de trabajador es el usuario
                    $_SESSION['logueado'] = $user->user;
                    $_SESSION['names'] = $user->names;
                    $_SESSION['type'] = $user->types;
      
                // //Creamos un par de cookies para recordar el user/pass. Tcaducidad=15días
                // if (isset($_POST['recuerdo']) && ($_POST['recuerdo'] == "on")) // Si está seleccioniado el checkbox...
                // { // Creamos las cookies para ambas variables 
                //     setcookie('user', $usuariook, time() + (15 * 24 * 60 * 60));
                //     setcookie('password', $passok, time() + (15 * 24 * 60 * 60));
                //     setcookie('recuerdo', $_POST['recuerdo'], time() + (15 * 24 * 60 * 60));
                // } else {  //Si no está seleccionado el checkbox..
                //     // Eliminamos las cookies
                //     if (isset($_COOKIE['user'])) {
                //         setcookie('usuario', "");
                //     }
                //     if (isset($_COOKIE['password'])) {
                //         setcookie('password', "");
                //     }
                //     if (isset($_COOKIE['recuerdo'])) {
                //         setcookie('recuerdo', "");
                //     }
                // }

                // // Lógica asociada a mantener la sesión abierta 
                // if (isset($_POST['abierta']) && ($_POST['abierta'] == "on")) // Si está seleccionado el checkbox...
                // { // Creamos una cookie para la sesión 
                //     setcookie('abierta', $_POST['user'], time() + (15 * 24 * 60 * 60));
                // } else {  //Si no está seleccionado el checkbox..
                //     // Eliminamos la cookie
                //     if (isset($_COOKIE['abierta'])) {
                //         setcookie('abierta', "");
                //     }
                // }

                // Redirigimos a la página de inicio de nuestro sitio  
                header("Location:" . BASE_URL . "list?pag=1");
                exit;
            } else {
                header("Location:" . BASE_URL . "login");
                exit;
            }
        } else {
            header("Location:" . BASE_URL . "login");
            exit;
        }
    }

    public function profile()
    {
        return $this->blade->render('user/profile',['type' => $_SESSION['type'],
        'nombre' => $_SESSION['names'],
        'usuario' => $_SESSION['logueado']]);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location:" . BASE_URL);
        exit;
    }

    public function ListaUsuario()
    {
        setcookie('pagU', $_REQUEST['pagU']);
        return $this->blade->render('user/listU');
    }

    public function FormularioU()
    {
        $u = new Employer($this->pag);

        if (isset($_REQUEST['idU'])) {
            $u = $this->model->verUser($_REQUEST['idU']);
        }

        return  $this->blade->render('user/add_updU', [
            'id' => $u->id_employer,
            'user' => $u->user,
            'password' => $u->passwords,
            'type' => $u->types,
            'name' => $u->names,
            'error' => ''
        ]);
    }

    public function GuardarU()
    {
        $error = new GestorErrores('<span class="alert alert-danger" role="alert">', '</span>');
        require_once 'models/user_errors.php';

        if ($error->HayErrores()) {

            return $this->blade->render(
                'user/add_updU',
                [
                    'id' => ValorPost("id_employer"),
                    'user' => ValorPost("user"),
                    'password' => ValorPost("password"),
                    'name' => ValorPost("name"),
                    'type' =>  ValorPost("type"),
                    'error' => $error
                ]
            );
        } else {
            $user = new Employer($this->pag);

            $user->id_employer =  $_REQUEST['id'];
            $user->user =  ValorPost('user');
            $user->passwords =  ValorPost('password');
            $user->name =  ValorPost('name');
            $user->types =  ValorPost('type');


            if ($user->id_employer > 0) {
                $this->model->modificarUser($user);
            } else {
                $this->model->añadirUser($user);
            }

            header("Location: " . BASE_URL . "listU?pagU=1");
            exit;
        }
    }

    public function cEliminarU()
    {
        $this->pag = $this->model->mostrarPag();
        return $this->blade->render('user/deleteU', ['id' => $_REQUEST['idU']]);
    }

    public function EliminarU()
    {
        $this->model->borrarUser($_REQUEST['idU']);
        header("Location: " . BASE_URL . "listU?pagU=" . $_COOKIE["pagU"]);
        exit;
    }

    //VISTA
    public function listarUsuarios()
    {
        return $this->model->todosTrabajadores();
    }

    /**
     * Muestra el total de tareas encontradas
     *
     * @return void
     */
    public function tResultadosU()
    {
        return $this->model->mostrarTotalResultados();
    }

    /**
     * Muestra la paginacion de las tareas
     *
     * @return void
     */
    public function paginacionU()
    {
        return $this->model->mostrarPaginas();
    }
}
