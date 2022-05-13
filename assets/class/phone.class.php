<?php
class Phone
{
    private $id;
    private $number_phone;
    private $type_phone;
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


    public function getType_phone()
    {
        return $this->type_phone;
    }


    public function setType_phone($type_phone)
    {
        $this->type_phone = $type_phone;
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
        }else{
            return array();
        }
    }

    public function save(){
        
    }
}
