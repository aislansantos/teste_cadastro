<?php
class RegisterContacts
{
        private $id;
        private $name;
        private $secondname;
        private $cpf;
        private $email;
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


        public function getName()
        {
                return $this->name;
        }
        public function setName($name)
        {
                $this->name = $name;
        }


        public function getSecondname()
        {
                return $this->secondname;
        }
        public function setSecondname($secondName)
        {
                $this->sobrenome = $secondName;
        }


        public function getCpf()
        {
                return $this->cpf;
        }
        public function setCpf($cpf)
        {
                $this->cpf = $cpf;
        }


        public function getEmail()
        {
                return $this->email;
        }
        public function setEmail($email)
        {
                $this->email = $email;
        }



        public function contactCreate()
        {
        }

        public function readRegister($register = "")
        {
                $sql = "SELECT * FROM contato";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                        return $stmt->fetchAll();
                } else {
                        return array();
                }
        }

        public function queryRecordToEdit($id_cad = null)
        {
                $sql = "SELECT * FROM WHERE id = :id_cad";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":id_cad",$id_cad, PDO::PARAM_INT);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                        return $stmt->fetch();
                }else{
                        return array();
                }
        }

        public function save()
        {

        }

}
