<?php

include(MODEL_PATH . '/class/Employer.php');

class UserController
{

    private $pag = PAGINATOR;
    private $model;
    private $blade;
    private $e_profile = "";


    /**
     * Constructor de la clase UserController
     *
     * @return void
     */
    public function __construct()
    {
        if ($_SESSION) {
            $this->pag = $_SESSION['listU'];
        }
        $this->model = new Employer($this->pag);
        $this->blade = TemplateBlade::GetInstance();
    }

    /**
     * Metedo que devuelve un objeto de la misma clase UserController
     *
     * @return UserController
     */
    public static function getInstance()
    {
        return new self();
    }

    /**
     * Metodo que comprueba si el usuario existe y si es asi, crea una sesion con todos sus datos
     *
     * @return void
     */
    public function checkUser()
    {
        $error = new GestorErrores('<span class="error">', '</span>');
        if ($_POST) { // Comprobamos que recibimos los datos y que no hay errores
            $user = $this->model->comprobarUser($_POST['user'], $_POST['password']);
            require_once 'models/user_errors.php';

            if ($user) { //si no hay errores comprobamos si el usuario existe
                // $usuariook = strtolower($user->user);
                // $passok =  strtolower($user->passwords);

                $_SESSION['logueado'] = $user->user;
                $_SESSION['names'] = $user->names;
                $_SESSION['type'] = $user->types;
                $_SESSION['id'] = $user->id_employer;
                $_SESSION['ulogo'] = mt_rand(1, 8);
                $_SESSION['theme'] = "theme1";
                $_SESSION['listT'] = PAGINATOR;
                $_SESSION['listU'] = PAGINATOR;




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
                return $this->blade->render(
                    'user/login',
                    [
                        'error' => $error,
                        'user' => ValorPost("user"),
                        'password' => ValorPost("password")
                    ]
                );
            }
        } else {
            return $this->blade->render(
                'user/login',
                [
                    'error' => $error,
                    'user' => "",
                    'password' => ""
                ]
            );
        }
    }

    /**
     * Metodo que cierra la sesion y te envia a la pantalla de login
     *
     * @return void
     */
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location:" . BASE_URL);
        exit;
    }

    /**
     * Metodo que renderiza la vista lista de tareas
     *
     * @return void
     */
    public function ListaUsuario()
    {
        return $this->blade->render('user/listU');
    }

    /**
     * Metodo que carga la vista del formulario de empleados
     *
     * @return void
     */
    public function FormularioU()
    {
        $u = new Employer($this->pag);
        if (isset($_REQUEST['eprofile'])) {
            $this->e_profile = "hidden";
        } else {
            $this->e_profile = "";
        }

        if (isset($_REQUEST['idU'])) {
            $u = $this->model->verUser($_REQUEST['idU']);
        }

        return  $this->blade->render('user/add_updU', [
            'id' => $u->id_employer,
            'user' => $u->user,
            'password' => $u->passwords,
            'type' => $u->types,
            'name' => $u->names,
            'eprofile' => $this->e_profile,
            'error' => ''
        ]);
    }

    /**
     * Metodo que recoge los datos del formulario de empleados y comprueba si tiene errores. Si no los tiene 
     * añade o modifica al empleado incluido en el formulario en la base de datos.
     *
     * @return void
     */
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
                    'eprofile' => $this->e_profile,
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

            if($_SESSION['type'] == "admin"){
                header("Location: " . BASE_URL . "listU?pagU=1");
                exit;
            } else{
                header("Location: " . BASE_URL . "list?pag=1");
                exit; 
            }

        }
    }

    /**
     * Metodo que elimina un empleado segun su ID
     *
     * @return void
     */
    public function EliminarU()
    {
        $this->model->borrarUser($_REQUEST['id']);
        header("Location: " . BASE_URL . "listU?pagU=1");
        exit;
    }


    //VISTA
    /**
     * Metodo que carga la vista de login
     *
     * @return void
     */
    public function login()
    {
        return $this->blade->render(
            'user/login',
            [
                'error' => "",
                'user' => "",
                'password' => "",
                'listU' => ""
            ]
        );
    }

    /**
     * Metodo que carga la vista de confirmacion para eliminacion de un empleado
     *
     * @return void
     */
    public function cEliminarU()
    {
        return $this->blade->render('user/deleteU', ['id' => $_REQUEST['idU'], 'type' => $_SESSION['type']]);
    }

    /**
     * Metodo que carga la vista del perfil del empleado logeado
     *
     * @return void
     */
    public function profile()
    {
        return $this->blade->render('user/profile', [
            'type' => $_SESSION['type'],
            'nombre' => $_SESSION['names'],
            'usuario' => $_SESSION['logueado']
        ]);
    }

    /**
     * Metodo que recoge los datos de la lista de empleados desde la base de datos
     *
     * @return void
     */
    public function listarUsuarios()
    {
        return $this->model->listaUsuarios();
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
