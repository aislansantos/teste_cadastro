<?php

require('conn.php');
require_once('assets/class/contacts.class.php');
$registerContact = new RegisterContacts($pdo);

if (!empty($_GET['id_contact'])) {
    $id = $_GET['id_contact'];

    $registerContact->setId($id);
    $registerContact->deleteContact();
    header('location: index.php');
}
