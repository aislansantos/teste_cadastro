<?php

require('conn.php');
require_once('assets/class/contacts.class.php');
$registerContact = new RegisterContacts($pdo);

if (!empty($_GET['id_contact'])) {
    $id_contact = $_GET['id_contact'];

    $registerContact->setId($id_contact);
    $registerContact->deleteContact();

    header('location: index.php');
}
