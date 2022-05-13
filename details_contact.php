<?php
require("conn.php");
require("assets/class/contacts.class.php");
require("assets/class/phone.class.php");

$registerContact = new RegisterContacts($pdo);
$registerPhone = new Phone($pdo);

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $list = $registerContact->queryRecordToEdit($id);
    $list_phone = $registerContact->readRegister($id);
} else {
    $list = null;
    $list_phone = null;
}

if (!empty($_POST["name"]) || !empty($_POST["secondname"]) || !empty($_POST["telefone"])) {
    $id = addslashes($_POST["id"]);
    $name = addslashes($_POST["name"]);
    $secondname = addslashes($_POST["secondname"]);
    $cpf = addslashes($_POST["cpf"]);
    $email = addslashes($_POST["email"]);

    $registerContact->setId($id);
    $registerContact->setName($name);
    $registerContact->setSecondname($secondname);
    $registerContact->setCpf($cpf);
    $registerContact->setEmail($email);

    $registerContact->save();

    if ($registerContact->save() == False) {
        echo "<div class='alert alert-danger' role='alert'> CPF INVÁLIDO! </div>";
    } else {
        header('location: index.php');
    }
}

?>

