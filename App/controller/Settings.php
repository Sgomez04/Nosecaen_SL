<?php
class Settings
{
    /**
     * Constructor de la clase Settings
     *
     * @return void
     */
    public function __construct()
    {
        $this->blade = TemplateBlade::GetInstance();
    }

    /**
     * Metedo que devuelve un objeto de la misma clase Settings
     *
     * @return Settings
     */
    public static function getInstance()
    {
        return new self;
    }


    public function FormularioSettins()
    {
        return $this->blade->render('form_setting', [
            'type' => $_SESSION['type'], 'error' => "",
            'theme' => $_SESSION['theme'],
            'listT' =>  $_SESSION['listT'],
            'listU' => $_SESSION['listU']
        ]);
    }

    public function GuardarSettins()
    {
        $error = new GestorErrores('<span style="color:red">', '</span>');
        require_once 'models/setting_errors.php';
        if (!$error->HayErrores()) {
            $_SESSION['listT'] = ValorPost('listT');
            $_SESSION['listU'] = ValorPost('listU');
            $_SESSION['theme'] = ValorPost('theme');
            header("Location: " . BASE_URL . "list?pag=1");
            exit;
        } else {
            return $this->blade->render('form_setting', [
                'type' => $_SESSION['type'],
                'error' => $error,
                'theme' => ValorPost('theme'),
                'listT' => ValorPost('listT'),
                'listU' => ValorPost('listU')
            ]);
        }
    }
}
