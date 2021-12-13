<?php
class Settings
{

    public function __construct()
    {
        $this->blade = TemplateBlade::GetInstance();
    }

    /**
     * Metedo que devuelve un objeto de la misma clase Settings
     *
     * @return objet
     */
    public static function getInstance()
    {
        return new self;
    }

    
    /**
     * FormularioSettins
     *
     * @return void
     */
    public function FormularioSettins()
    {
        return $this->blade->render('form_setting', [
            'type' => $_SESSION['type'], 'error' => "",
            'theme' => $_SESSION['theme'],
            'listT' =>  $_SESSION['listT'],
            'listU' => $_SESSION['listU']
        ]);
    }
    
    /**
     * GuardarSettins
     *
     * @return void
     */
    public function GuardarSettins()
    {
        $error = new GestorErrores('<span style="color:red">', '</span>');
        require_once 'models/filter/setting_errors.php';
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
