<?php
require("conn.php");
require("assets/class/contacts.class.php");

$registerContact = new RegisterContacts($pdo);

if (!empty($_GET["id_contact"])) {
    $id_contact = $_GET["id_contact"];
    $list = $registerContact->queryRecordToEdit($id_contact);
} else {
    $list = null;
}

if (!empty($_POST["name"]) || !empty($_POST["secondname"])) {
    if (!empty($_GET["id_contact"])) {
        $id_contact = addslashes($_GET["id_contact"]);
        $registerContact->setId($id_contact);
    }
    $name = addslashes($_POST["name"]);
    $secondname = addslashes($_POST["secondname"]);
    $cpf = addslashes($_POST["cpf"]);
    $registerContact->setName($name);
    $registerContact->setSecondname($secondname);
    $registerContact->setCpf($cpf);



    if ($registerContact->checkCPF() == true) {
        echo "<div class='alert alert-danger' role='alert'> CPF JÁ EXISTE! </div>";
    } else {
        if ($registerContact->save() == false) {
            echo "<div class='alert alert-danger' role='alert'> CPF INVÁLIDO! </div>";
        } else {
            header('location: index.php');
        }
    }
}
