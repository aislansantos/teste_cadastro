<?php
class Email
{
    private $id;
    private $end_email;
    private $id_contact_email;
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

    public function getEnd_email()
    {
        return $this->end_email;
    }

    public function setEnd_email($end_email)
    {
        $this->end_email = $end_email;
    }

    public function getId_contact_emaill()
    {
        return $this->id_contact_email;
    }

    public function setId_contact_email($id_contact_email)
    {
        $this->id_contact_email = $id_contact_email;
    }

    public function readRegister($id_contact_email)
    {
        $sql = "SELECT * FROM email WHERE id_contact_email = :id_contact";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id_contact", $id_contact_email, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return array();
        }
    }

    public function deleteEmail()
    {
        $sql = "DELETE FROM email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return True;
    }


    public function queryRecordToEdit($id_cad = null)
    {
        $sql = "SELECT c.name, e.end_email, e.id, e.id_contact_email FROM contato as c INNER JOIN email as e on c.id = e.id_contact_email WHERE e.id = :id_cad";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id_cad", $id_cad, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return array();
        }
    }

    public function checkEmail()
    {
        $sql = "SELECT * FROM email WHERE end_email = :end_email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":end_email", $this->end_email, PDO::PARAM_STR);
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
            $sql = "UPDATE email SET end_email = :end_email, id_contact_email = :id_contact_email WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":end_email", $this->end_email, PDO::PARAM_STR);
            $stmt->bindParam(":id_contact_email", $this->id_contact_email, PDO::PARAM_INT);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->execute();
            return True;
        } elseif ($this->checkEmail() == True) {
            $sql = "INSERT INTO email (end_email, id_contact_email) VALUES (:end_email, :id_contact_email)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":end_email", $this->end_email, PDO::PARAM_STR);
            $stmt->bindParam(":id_contact_email", $this->id_contact_email, PDO::PARAM_INT);
            $stmt->execute();
            return True;
        }
        return False;
    }
}
