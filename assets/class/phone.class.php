<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class Phone
{
    private $id;
    private $number_phone;
    private $id_contact;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNumber_phone()
    {
        return $this->number_phone;
    }


    public function setNumber_phone($number_phone)
    {
        $this->number_phone = $number_phone;
    }

    public function getId_contact()
    {
        return $this->id_contact;
    }


    public function setId_contact($id_contact)
    {
        $this->id_contact = $id_contact;
    }

    public function readRegister($id_contact)
    {
        $sql = "SELECT * FROM phone WHERE id_contact = :id_contact";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id_contact", $id_contact, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return array();
        }
    }

    public function queryRecordToEdit($id_cad = null)
    {
        $sql = "SELECT c.name, p.number_phone, p.id, p.id_contact FROM contato as c INNER JOIN phone as p on c.id = p.id_contact WHERE p.id = :id_cad";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id_cad", $id_cad, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return array();
        }
    }

    public function checkPhone()
    {
        $sql = "SELECT * FROM phone WHERE number_phone = :number_phone";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":number_phone", $this->number_phone, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            return True;
        } else {
            return False;
        }
    }


    public function save()
    {
        if (!empty($this->id)) {
            $sql = "UPDATE phone SET number_phone = :number_phone, id_contact = :id_contact WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":number_phone", $this->number_phone, PDO::PARAM_STR);
            $stmt->bindParam(":id_contact", $this->id_contact, PDO::PARAM_INT);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->execute();
            return True;
        } elseif ($this->checkPhone() == True) {
            $sql = "INSERT INTO phone (number_phone, id_contact) VALUES (:number_phone, :id_contact)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":number_phone", $this->number_phone, PDO::PARAM_STR);
            $stmt->bindParam(":id_contact", $this->id_contact, PDO::PARAM_INT);
            $stmt->execute();
            return True;
        }
        return False;
    }

    public function deletePhone(){
        $sql = "DELETE FROM phone WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return True;
    }
}
