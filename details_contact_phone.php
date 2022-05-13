<?php
require("conn.php");
require("assets/class/phone.class.php");
$registerPhone = new Phone($pdo);

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $list_phone = $registerPhone->readRegister($id);
} else {
    $list_phone = null;
}


if (!empty($_POST["number_phone"]) || !empty($_POST["id_contact"])) {
    $id = addslashes($_POST["id"]);
    $number_phone = addslashes($_POST["number_phone"]);
    $id_contact = addslashes($_POST["id_contact"]);
    echo $id;
    exit;

    $registerPhone->setId($id);
    $registerPhone->setNumber_phone($number_phone);
    $registerPhone->setId_contact($id_contact);

    $registerPhone->save();


    header('location: index.php');
}


?>