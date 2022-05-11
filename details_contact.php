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

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


    <?php if (!empty($_GET['id'])) {
        echo "<title>Cadastro de Contatos - Editar</title>";
    } else {
        echo "<title>Cadastro de Contatos - Novo</title>";
    }
    ?>

</head>

<body class="bg-light" onload="$('#cpf').mask('000.000.000-00');">
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
                    <div class="col mb-3">
                        <input type="text" name="name" id="name" value="<?php if (!empty($list['name'])) {
                                                                            echo $list['name'];
                                                                        }
                                                                        ?>" required placeholder="Nome">
                    </div>
                    <div class="col mb-3">
                        <input type="text" name="secondname" id="secondname" value="<?php if (!empty($list['secondname'])) {
                                                                                        echo $list['secondname'];
                                                                                    }
                                                                                    ?>" placeholder="Sobrenome">
                    </div>
                    <div class="col mb-3">
                        <input type="text" name="cpf" id="cpf" value="<?php if (!empty($list['cpf'])) {
                                                                            echo $list['cpf'];
                                                                        }

                                                                        ?>" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00');">
                    </div>
                    <div class="col mb-3">
                        <input type="email" name="email" id="email" value="<?php if (!empty($list['email'])) {
                                                                                echo $list['email'];
                                                                            }
                                                                            ?>" placeholder="Email">
                    </div>
                    <div class="col mb-3">
                        <a href=""> <img src="assets/img/telefone.png" alt="telefones" width="30" height="30" /></a>
                    </div>
                </div>
            </div>
            <br>
            <input type="submit" value="Salvar" class="btn btn-success">
            <input type="button" value="Consultar" class="btn btn-primary">
        </form>

    </div>


</body>

</html>