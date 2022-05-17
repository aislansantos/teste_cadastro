<?php
require("conn.php");
require("assets/class/phone.class.php");
$registerPhone = new Phone($pdo);



if (!empty($_GET["id_contact"])) {
    $id_contact = $_GET["id_contact"];
    $list_contact = $registerPhone->readRegister($id_contact);
} else {
    $list_phone = null;
}

if (!empty($_GET["id_phone"])) {
    $id_phone = $_GET["id_phone"];
    $list_phone = $registerPhone->queryRecordToEdit($id_phone);
}

if (isset($_GET["id_phone"]) || isset($_GET["id_contact"])) {
    if (!empty($_POST["number_phone"]) || !empty($_POST["id_contact"])) {
        $id_phone = $_GET["id_phone"];
        $number_phone = addslashes($_POST["number_phone"]);
        $id_contact = addslashes($_POST["id_contact"]);
        $registerPhone->setId($id_phone);
        $registerPhone->setNumber_phone($number_phone);
        $registerPhone->setId_contact($id_contact);
        $registerPhone->save();


        header('location: details_contact_html.php?id_contact=' . $_POST['id_contact']);
    }
}
