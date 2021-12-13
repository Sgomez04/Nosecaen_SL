<?php
include_once (LIB_PATH . 'Paginator.php');

/**Clase tarea que extiende de la clase conexion
 * 
 * 
 */
class Employer
{
    //conexion
    public $user;
    public $passwords;
    public $names;
    public $types;
    public $id_employer;


    //Paginacion
    public $pag;

    function __construct($nPorPagina)
    {
        $this->pag = new Paginator($nPorPagina, "employer");
    }
    
    /**
     * listaUsuarios
     *
     * @return objet
     */
    function listaUsuarios()
    {
        try {
            $query =  Connection::Conex()->prepare('SELECT * FROM employer LIMIT :pos, :n');
            $query->execute(['pos' => $this->pag->getIndice(), 'n' => $this->pag->getResultadosPorPagina()]);

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function modificarUser(Employer $data)
    {
        try {
            $id = "'" . "$data->id_employer" . "'";
            $user = "'" . $data->user . "'";
            $password = "'" . $data->passwords . "'";
            $tipo = "'" . $data->types . "'";
            $nombre = "'" . $data->name . "'";

            $sql = "UPDATE employer SET user= " . $user . ", passwords= " . $password . ",
            types= " . $tipo . ", names= " . $nombre . " WHERE id_employer=  " . $id . ";";

            $sentencia =  Connection::Conex()->prepare($sql);

            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Elimina una tarea elegida
     * 
     * @param int $id_employer
     * @return boolean
     */
    function borrarUser($id_employer)
    {
        try {
            $query = Connection::Conex()->prepare('DELETE FROM employer WHERE id_employer = :id');

            $query->bindParam(':id', $id_employer);
            $query->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Añade una nueva tarea a la DataBase
     * 
     * @param Employer $data
     * @return boolean
     */
    function añadirUser(Employer $data)
    {
        try {
            $sql = "INSERT INTO employer(id_employer, user, passwords, types,
            names) VALUES ('',:user,:passwords,:types,:names);";

            $sentencia = Connection::Conex()->prepare($sql);

            $sentencia->bindParam(':user', $data->user);
            $sentencia->bindParam(':passwords', $data->passwords);
            $sentencia->bindParam(':types', $data->types);
            $sentencia->bindParam(':names', $data->name);
            
            $sentencia->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Comprueba si el usuario indicado con usuario y contraseña existe
     * 
     * @param string $user
     * @param string $password
     * @return objet
     */
    public function comprobarUser($user,$password)
    {
        try {
            $sentencia = Connection::Conex()->prepare("SELECT * FROM employer WHERE user = :user AND passwords = :passwords");
            $sentencia->bindParam(':user', $user);
            $sentencia->bindParam(':passwords', $password);

            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Devuelve todos los datos de un usuario especificio (segun una id)
     * 
     * @param int $id_employer
     * @return objet
     */
    public function verUser($id_employer)
    {
        try {
            $sentencia =  Connection::Conex()->prepare("SELECT * FROM employer WHERE id_employer = :id_employer");
            $sentencia->bindParam(':id_employer', $id_employer);

            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}