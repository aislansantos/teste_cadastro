<?php

require("conn.php");
require_once("assets/class/phone.class.php");
$registerPhone = new Phone($pdo);

if (!empty($_GET['id_phone'])) {
    $id_phone = $_GET['id_phone'];
    $list_phone = $registerPhone->queryRecordToEdit($id_phone);

    $registerPhone->setId($id_phone);
    $registerPhone->deletePhone();

    header('location: details_contact_html.php?id_contact=' . $list_phone['id_contact']);
}
