<?php
class Phone
{
    private $id;
    private $number_phone;
    private $type_phone;
    private $id_contatc;

  
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

    

    public function getId_contatc()
    {
        return $this->id_contatc;
    }


    public function setId_contatc($id_contatc)
    {
        $this->id_contatc = $id_contatc;
    }
}