<?php
require_once 'Connexio.php';

class InitService
{
    public static function createTables()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `protectora_animals` . `usuaris` (`id_usuari` INT NOT NULL AUTO_INCREMENT, `nom` VARCHAR(45) NOT NULL,  `cognoms` VARCHAR(45) NOT NULL, `correu` VARCHAR(25) NOT NULL, `data_naixement` DATETIME(6) NOT NULL, `password` VARCHAR(100) NOT NULL, `is_veterinari` BOOLEAN NOT NULL, `created_at` DATETIME(6) NOT NULL, `modified_at` DATETIME(6) NOT NULL, `token` VARCHAR(100) DEFAULT NULL, PRIMARY KEY (`id_usuari`)) ENGINE = InnoDB;
                CREATE TABLE IF NOT EXISTS `protectora_animals` . `adopcio` (`id_usuari` INT NOT NULL , `id_animal` INT NOT NULL , `data_adopcio` DATETIME(6) NOT NULL ) ENGINE = InnoDB;
                CREATE TABLE IF NOT EXISTS `protectora_animals` . `animals` (`id_animal` INT NOT NULL AUTO_INCREMENT , `tipus` VARCHAR(45) NOT NULL , `nom` VARCHAR(45) NOT NULL , `data_naixement` DATETIME(6) NOT NULL , `pes` DECIMAL(10,2) NOT NULL , `raça` VARCHAR(45) NOT NULL , `procedencia` VARCHAR(45) NOT NULL , `adoptat` TINYINT(1) NOT NULL , `data_portat` DATETIME(6) NOT NULL , PRIMARY KEY(`id_animal`)) ENGINE = InnoDB;
                CREATE TABLE IF NOT EXISTS `protectora_animals` . `revisio` (`id_veterinari` INT NOT NULL , `id_animal` INT NOT NULL , `hora_actual` DATETIME(6) NOT NULL , `pes` DECIMAL(10,2) NOT NULL , `informe` VARCHAR(100) NOT NULL ) ENGINE = InnoDB;
                ';
        $con = new Connexio();
        $con->queryDataBase($sql, []);
    }
}

?>