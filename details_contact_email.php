<?php
require("conn.php");
require("assets/class/email.class.php");
$registerEmail = new Email($pdo);



if (!empty($_GET["id_contact_email"])) {
    $id_contact_email = $_GET["id_contact_email"];
    $list_email = $registerEmail->readRegister($id_contact_email);
} else {
    $list_email = null;
}

if (!empty($_GET["id_email"])) {
    $id_email = $_GET["id_email"];
    $list_email =$registerEmail->queryRecordToEdit($id_email);
}


if (isset($_GET["id_email"]) || isset($_GET["id_contact"])) {
    if (!empty($_POST["end_email"]) || !empty($_POST["id_contact"])) {
        $id_email = $_GET["id_email"];
        $end_email = addslashes($_POST["end_email"]);
        $id_contact = addslashes($_POST["id_contact"]);
        $registerEmail->setId($id_email);
        $registerEmail->setEnd_email($end_email);
        $registerEmail->setId_contact_email($id_contact);
        $registerEmail->save();


        header('location: details_contact_html.php?id_contact=' . $_POST['id_contact']);
    }
}
