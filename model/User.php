<?php

class User {
    private $id_usuari;
    private $nom;
    private $cognoms;
    private $correu;
    private $data_naixement;
    private $password;
    private $is_veterinari;
    private $created_at;
    private $modified_at;
    private $token;

    public function __construct($nom, $cognoms, $correu, $data_naixement, $password)
    {
        $this->nom = $nom;
        $this->cognoms = $cognoms;
        $this->correu = $correu;
        $this->data_naixement = DateTime::createFromFormat('Y-m-d', $data_naixement);
        $this->password = $password;
        $this->is_veterinari = false;
        $this->created_at = new DateTime();
        $this->modified_at = new DateTime();
    }

    /**
     * @return mixed
     */
    public function getIdUsuari()
    {
        return $this->id_usuari;
    }

    /**
     * @param mixed $id_usuari
     */
    public function setIdUsuari($id_usuari)
    {
        $this->id_usuari = $id_usuari;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getCognoms()
    {
        return $this->cognoms;
    }

    /**
     * @param mixed $cognoms
     */
    public function setCognoms($cognoms)
    {
        $this->cognoms = $cognoms;
    }

    /**
     * @return mixed
     */
    public function getCorreu()
    {
        return $this->correu;
    }

    /**
     * @param mixed $correu
     */
    public function setCorreu($correu)
    {
        $this->correu = $correu;
    }

    /**
     * @return DateTime|false
     */
    public function getDataNaixement()
    {
        return $this->data_naixement;
    }

    /**
     * @param DateTime|false $data_naixement
     */
    public function setDataNaixement($data_naixement)
    {
        $this->data_naixement = $data_naixement;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return false
     */
    public function getIsVeterinari()
    {
        return $this->is_veterinari;
    }

    /**
     * @param false $is_veterinari
     */
    public function setIsVeterinari($is_veterinari)
    {
        $this->is_veterinari = $is_veterinari;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param DateTime $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return DateTime
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
    }

    /**
     * @param DateTime $modified_at
     */
    public function setModifiedAt($modified_at)
    {
        $this->modified_at = $modified_at;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }




}

?>