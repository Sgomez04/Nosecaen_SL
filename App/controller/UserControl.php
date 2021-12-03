<?php

include(MODEL_PATH . '/class/Employer.php');
// include(LIB_PATH . 'GestorErrores.php');
// include(LIB_PATH . 'Blade.php');
// include(HELPERS_PATH . 'form.php');

class UserController
{

    private $pag = 5;
    private $model;
    private $blade;

    public function __construct()
    {
        $this->model = new Employer();
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
        $user = $this->model->verTrabajador($_POST['user'], $_POST['password']);

        if (isset($_POST['submit'])) { // Comprobamos que recibimos los datos y que no están vacíos
            if ($user) {
                $usuariook = strtolower($user->user);
                $passok =  strtolower($user->password);

                //comprobamos que tipo de trabajador es el usuario
                if($user->type == "Administrador"){
                setcookie("type", "admin");  
                }elseif($user->type == "Operario"){
                setcookie("type", "operator");  
                }

                session_start();
                $_SESSION['logueado'] = $usuariook;
                $_SESSION['user'] = $usuariook;

                //Creamos un par de cookies para recordar el user/pass. Tcaducidad=15días
                if (isset($_POST['recuerdo']) && ($_POST['recuerdo'] == "on")) // Si está seleccioniado el checkbox...
                { // Creamos las cookies para ambas variables 
                    setcookie('user', $usuariook, time() + (15 * 24 * 60 * 60));
                    setcookie('password', $passok, time() + (15 * 24 * 60 * 60));
                    setcookie('recuerdo', $_POST['recuerdo'], time() + (15 * 24 * 60 * 60));
                } else {  //Si no está seleccionado el checkbox..
                    // Eliminamos las cookies
                    if (isset($_COOKIE['user'])) {
                        setcookie('usuario', "");
                    }
                    if (isset($_COOKIE['password'])) {
                        setcookie('password', "");
                    }
                    if (isset($_COOKIE['recuerdo'])) {
                        setcookie('recuerdo', "");
                    }
                }

                // Lógica asociada a mantener la sesión abierta 
                if (isset($_POST['abierta']) && ($_POST['abierta'] == "on")) // Si está seleccionado el checkbox...
                { // Creamos una cookie para la sesión 
                    setcookie('abierta', $_POST['user'], time() + (15 * 24 * 60 * 60));
                } else {  //Si no está seleccionado el checkbox..
                    // Eliminamos la cookie
                    if (isset($_COOKIE['abierta'])) {
                        setcookie('abierta', "");
                    }
                }

                // Redirigimos a la página de inicio de nuestro sitio  
                header("Location:" . BASE_URL . "list?pag=1");
                exit;

            } else {
                header("Location:" . BASE_URL . "login");
                exit;
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        setcookie('type', "");
        header("Location:". BASE_URL);
    }

    public function listarUsuarios()
    {
        return $this->model->todosTrabajadores();
    }
}
