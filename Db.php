<?php

abstract class Db
{

    /** @var PDO */
    static protected $pdo;

    static public function initPdo()
    {
        if (!isset(static::$pdo)) {
            static::$pdo = new PDO('sqlite:db.sq3');
            static::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
            $sql1 = 'DROP TABLE Animes';
            static::$pdo->query($sql1);
            $sql = 'SELECT * FROM sqlite_master';
            $tables = static::retourTableau($sql);
            if (empty($tables)) {
                static::creationTable();
            }
        }
    }

    static public function retourTableau($requete = null)
    {
        static::initPdo();
        $sth = static::$pdo->query($requete);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    static private function creationTable()
    {
        $sql = 'CREATE TABLE Animes('
                . 'Id INTEGER PRIMARY KEY,'
                . 'IdBeta INT NULL,'
                . 'IdTheTvDb INT NULL,'
                . 'SaisonBeta INT NULL,'
                . 'IdMal INT NULL,'
                . 'NomMal TEXT NULL,'
                . 'SynMal TEXT NULL,'
                . 'NomBeta TEXT NULL,'
                . 'EstFilm BOOLEAN)';
        $result = static::$pdo->query($sql);
    }

    static public function AjouterCorrespondanceAnime($idBeta = null, $idTheTvDb = null, $SaisonBeta = null, $idMal = null, $nomMal = null, $synMal = null, $nomBeta = null, $estFilm = false)
    {
        static::initPdo();
        $sth = static::$pdo->prepare('INSERT INTO Animes (Id, IdBeta, IdTheTvDb, SaisonBeta, IdMal, NomMal, SynMal, NomBeta, EstFilm)'
                . ' VALUES (last_insert_rowid()+1, :IdBeta, :IdTheTvDb, :SaisonBeta, :IdMal, :NomMal, :SynMal, :NomBeta, :EstFilm)');
        $sth->bindParam(':IdBeta', $idBeta, PDO::PARAM_INT);
        $sth->bindParam(':IdTheTvDb', $idTheTvDb, PDO::PARAM_INT);
        $sth->bindParam(':SaisonBeta', $SaisonBeta, PDO::PARAM_INT);
        $sth->bindParam(':IdMal', $idMal, PDO::PARAM_INT);
        $sth->bindParam(':NomMal', $nomMal, PDO::PARAM_STR);
        $sth->bindParam(':SynMal', $synMal, PDO::PARAM_STR);
        $sth->bindParam(':NomBeta', $nomBeta, PDO::PARAM_STR);
        $sth->bindParam(':EstFilm', $estFilm, PDO::PARAM_BOOL);
        $sth->execute();
        return $sth->fetchAll();
    }
}
