<?php
require("conn.php");
require("assets/class/contacts.class.php");

$registerContact = new RegisterContacts($pdo);

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $list = $registerContact->queryRecordToEdit($id);
} else {
    $list = null;
}

if (!empty($_POST["name"]) || !empty($_POST["secondname"]) || !empty($_POST["telefone"])) {
    $id = addslashes($_POST["id"]);
    $name = addslashes($_POST["name"]);
    $secondname = addslashes($_POST["secondname"]);
    $cpf = addslashes($_POST["cpf"]);
    $email = addslashes($_POST["email"]);

    $registerContact->setId($id);
    $registerContact->setName($name);
    $registerContact->setSecondname($secondname);
    $registerContact->setCpf($cpf);
    $registerContact->setEmail($email);

    $registerContact->save();

    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Conteudo Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <title>Cadastro de Contatos - Novo</title>

</head>

<body class="bg-light">
    <div class="container">
        <h1>Cadastro de Contatos</h1>
        <hr class="my-4">
        <h2>Cadastro</h2>
        <br>

        <form action="" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php if (!empty($list['id'])) {
                                                            echo $list['id'];
                                                        }
                                                        ?>">
                <div class="row">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" value="<?php if (!empty($list['name'])) {
                                                                        echo $list['name'];
                                                                    }
                                                                    ?>" required>

                    <label for="secondname">Sobrenome</label>
                    <input type="text" name="secondname" id="secondname" value="<?php if (!empty($list['secondname'])) {
                                                                                    echo $list['secondname'];
                                                                                }
                                                                                ?>">
                </div>
            </div>
        </form>

    </div>

</body>

</html>