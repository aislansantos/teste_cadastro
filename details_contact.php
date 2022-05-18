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

if (!empty($_POST["name"]) || !empty($_POST["secondname"]) || !empty($_POST["telefone"])) {
    $id_contact = addslashes($_GET["id_contact"]);
    $name = addslashes($_POST["name"]);
    $secondname = addslashes($_POST["secondname"]);
    $cpf = addslashes($_POST["cpf"]);
    $email = addslashes($_POST["email"]);

    $registerContact->setId($id_contact);
    $registerContact->setName($name);
    $registerContact->setSecondname($secondname);
    $registerContact->setCpf($cpf);
    $registerContact->setEmail($email);

    if ($registerContact->checkCPF($cpf) == True){
        $registerContact->save();
    }else{
        echo "<div class='alert alert-danger' role='alert'> CPF JÁ EXISTE! </div>";
    }

    if ($registerContact->save() == False) {
        echo "<div class='alert alert-danger' role='alert'> CPF INVÁLIDO! </div>";
    } else {
        header('location: index.php');
    }
}
