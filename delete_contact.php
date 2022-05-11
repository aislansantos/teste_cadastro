<?php

require('conn.php');
require_once('assets/class/contacts.class.php');
$registerContact = new RegisterContacts($pdo);

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $registerContact->setId($id);
    $registerContact->deleteContact();
    header('location: index.php');
}


