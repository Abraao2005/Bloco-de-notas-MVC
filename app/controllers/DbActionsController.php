<?php

namespace app\controllers;

use app\model\DbConfig;

class DbActionsController
{

    private DbConfig $db;
    public function __construct()
    {
        $this->db = new DbConfig();
    }
    public function index()
    {
        header("location: " . DIR_PATH);
    }

    public function insert()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            die("Página não encontrada");
        }

        if (isset($_POST["title"]) && isset($_POST["description"])) {
            $this->db->query_non_result("INSERT INTO dados(titulo,descricao) VALUES(:titulo,:descricao)", [":titulo" => $_POST["title"], ":descricao" => $_POST["description"]]);
        }
        header("location: " . DIR_PATH);
    }
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            die("Página não encontrada");
        }

        print_r($_POST);
        if (isset($_POST["title"]) && isset($_POST["description"])) {
            $this->db->query_non_result(
                "UPDATE dados SET titulo= :titulo, descricao =  :descricao WHERE id=:id",
                [
                    ":titulo" => $_POST["title"],
                    ":descricao" => $_POST["description"],
                    ":id" => $_POST["id"]
                ]

            );
        }
        header("location: " . DIR_PATH);

    }
    public function get()
    {
        return $this->db->query_with_result("SELECT * FROM dados");
    }
    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            die("Página não encontrada");
        }


        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $this->db->query_non_result("DELETE from dados WHERE id = :id", [":id" => $_POST["id"]]);
        }

        header("location: " . DIR_PATH);
    }
}
