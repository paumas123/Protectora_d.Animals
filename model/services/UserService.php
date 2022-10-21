<?php
require_once 'Connexio.php';

class UserService
{
    public static function addUserShop($user)
    {
        try {
            $sql = "INSERT INTO usuaris (nom, cognoms, correu, data_naixement, password, is_veterinari, created_at, modified_at) VALUES (:nom, :cognoms, :correu, :data_naixement, :password, :is_veterinari, :created_at, :modified_at)";
            $arr = [
                'nom' => $user->getNom(),
                'cognoms' => $user->getCognoms(),
                'correu' => $user->getCorreu(),
                'data_naixement' => $user->getDataNaixement()->format('Y-m-d'),
                'password' => $user->getPassword(),
                'is_veterinari' => 0,
                'created_at' => $user->getCreatedAt()->format('Y-m-d H:m:s'),
                'modified_at' => $user->getModifiedAt()->format('Y-m-d H:m:s'),
            ];
            $con = new Connexio();
            $con->queryDataBase($sql, $arr);
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
    }

    public static function deleteUserById($id)
    {
        $sql = "DELETE FROM users WHERE id_user = $id";
        $arr = [];
        $con = new Connexio();
        $con->queryDataBase($sql, $arr);
    }

    public static function selectAllUserShop()
    {
        $sql = "SELECT * FROM users";
        $arr = [];
        $con = new Connexio();
        $llista = $con->queryDataBase($sql, $arr)->fetchAll();
        return $llista;
//        echo "<pre>";
//        print_r($llista->fetchAll());
//        echo "</pre>";
    }

    public static function selectUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id_user = $id";
        $arr = [];
        $con = new Connexio();
        $llista = $con->queryDataBase($sql, $arr)->fetch();
        return $llista;
    }

    public static function selectUserByCorreu($correu)
    {
        $sql = "SELECT * FROM usuaris WHERE correu = '$correu'";
        $arr = [];
        $con = new Connexio();
        $llista = $con->queryDataBase($sql, $arr)->fetch();
        return $llista;
    }

    public static function getUserByCorreu($correu)
    {
        $sql = "SELECT * FROM usuaris WHERE correu = '$correu'";
        $arr = [];
        $con = new Connexio();
        $llista = $con->queryDataBase($sql, $arr)->fetch();
        $usr = new User($llista['nom'], $llista['cognoms'], $llista['correu'], $llista['data_naixement'], $llista['password']);
        $usr->setIdUsuari($llista['id_usuari']);
        $usr->setCreatedAt(new DateTime($llista['created_at']));
        $usr->setModifiedAt(new DateTime($llista['modified_at']));
        $usr->setIsVeterinari($llista['is_veterinari'] == 1);
        return $usr;
    }

    public static function getIdUserByEmail($email)
    {
        $sql = "SELECT id_user FROM users WHERE email = '$email'";
        $arr = [];
        $con = new Conexio();
        $llista = $con->queryDataBase($sql, $arr)->fetch();
        return $llista;
    }

    public static function getCountUsers()
    {
        $sql = "SELECT COUNT(*) total FROM users";
        $arr = [];
        $con = new Connexio();
        $llista = $con->queryDataBase($sql, $arr)->fetchColumn();
        return $llista;
    }

    public static function getEdat($id)
    {
        $sql = "SELECT birth_date FROM users where id_user = $id";
        $arr = [];
        $con = new Connexio();
        $result = $con->queryDataBase($sql, $arr);
//        $llista = DateTime::createFromFormat('Y-d-m', $con->queryDataBase($sql, $arr));
        $total = $result->fetchColumn();
//        echo gettype($total);
        return $total;
    }
}

?>