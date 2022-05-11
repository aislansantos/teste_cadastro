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
                $this->secondname = $secondName;
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
                $sql = "SELECT * FROM contato WHERE id = :id_cad";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":id_cad", $id_cad, PDO::PARAM_INT);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                        return $stmt->fetch();
                } else {
                        return array();
                }
        }

        public function save()
        {
                if (!empty($this->id)) {
                        $sql = "UPDATE contato SET name = :name, secondname = :secondname , cpf = :cpf, email = :email WHERE id = :id";
                        $stmt = $this->pdo->prepare($sql);
                        $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
                        $stmt->bindParam(":secondname", $this->secondname, PDO::PARAM_STR);
                        $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
                        $stmt->execute();
                }
                if ($this->checkContact() == True){
                        $sql="INSERT INTO contato (name, secondname, cpf, email) VALUES (:name, :secondname, :cpf, :email)";
                        $stmt = $this->pdo->prepare($sql);
                        $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
                        $stmt->bindParam(":secondname", $this->secondname, PDO::PARAM_STR);
                        $stmt->bindParam(":cpf", $this->cpf, PDO::PARAM_STR);
                        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
                        $stmt->execute();
                }

        }

        public function checkContact()
        {
            $sql = "SELECT * FROM contato WHERE name = :name";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() == 0) {
                return true;
            } else {
                return false;
            }
        }
}
