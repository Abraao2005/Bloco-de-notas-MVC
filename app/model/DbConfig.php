<?php


namespace app\model;

use PDO;
use PDOException;

class DbConfig{
    
    public static function query_with_result($sql, $param = [])
    {
        //Conexão Banco de dados
        $db = new PDO('mysql:host=localhost' .
        ';dbname=nota'.
        ';charset=utf8', "root", "");


        //Operação
        try {
            $db->beginTransaction();
            $prepare = $db->prepare($sql);
            if (empty($param)) {
                $prepare->execute();
            } else {
                $prepare->execute($param);
            }
            $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
            $db->commit();
            return empty($result) ? '0': $result;
        } catch (PDOException $err) {
            $db->rollBack();
            return $err->getMessage();
        }
    }
    public static function query_non_result($sql, $param)
    {
        //Conexão Banco de dados
        $db = new PDO('mysql:host=localhost' .
            ';dbname=nota'.
            ';charset=utf8', "root", "");


        //Operação
        try {
            $db->beginTransaction();
            $prepare = $db->prepare($sql);
            if (empty($param)) {
                $prepare->execute();
            } else {
                $prepare->execute($param);
            }
            $db->commit();
            return 'Sucesso';
        } catch (PDOException $err) {
            $db->rollBack();
            return $err->getMessage();
        }
    }


}