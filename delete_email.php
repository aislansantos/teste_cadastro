<?php

require("conn.php");
require_once("assets/class/email.class.php");
$registerEmail = new Email($pdo);

if (!empty($_GET['id_email'])) {
    $id_email = $_GET['id_email'];
    $list_email = $registerEmail->queryRecordToEdit($id_email);

    $registerEmail->setId($id_email);
    $registerEmail->deleteEmail();

    header('location: details_contact_html.php?id_contact=' . $list_email['id_contact_email']);
}
