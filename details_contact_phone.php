<?php
require("conn.php");
require("assets/class/phone.class.php");
$registerPhone = new Phone($pdo);


if (!empty($_GET["id_contact"])) {
    $id_contact = $_GET["id_contact"];
    $list_phone = $registerPhone->readRegister($id_contact);
} else {
    $list_phone = null;
}

if (!empty($_GET["id_phone"])){
    $id_phone = $_GET["id_phone"];
    $list_phone = $registerPhone->queryRecordToEdit($id_phone);
}




// if (!empty($_POST["number_phone"]) || !empty($_POST["id_contact"])) {
//     $id = addslashes($_POST["id_phone"]);
//     $number_phone = addslashes($_POST["number_phone"]);
//     $id_contact = addslashes($_POST["id_contact"]);

//     $registerPhone->setId($id);
//     $registerPhone->setNumber_phone($number_phone);
//     $registerPhone->setId_contact($id_contact);

//     $registerPhone->save();


//     header('location: index.php');
// }else{
//     $id_contact = $_GET["id_contact"];
//     $number_phone = addslashes($_POST["number_phone"]);
//     $id_contact_add = addslashes($_POST["id_contact"]);

//     $registerPhone->setNumber_phone($number_phone);
//     $registerPhone->setId_contact($id_contact);

//     $registerPhone->save();


// }


