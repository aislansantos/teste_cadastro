<?php
require("details_contact.php");
require("details_contact_phone.php");
require("details_contact_email.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Conteudo Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


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
        <form action="" method="post" id="cadastro_contato">
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
                        <img src="assets/img/icons8-email-aberto-50.png" alt="email" width="30" height="30" data-bs-toggle="modal" data-bs-target="#email" />
                        <a href="<?php echo 'details_contact_save_email_html.php?id_contact=' . $list['id']; ?>"><img src="assets/img/icons8-adicionar-envelope-aberto-50.png" width="30" height="30"></a>

                        <img src="assets/img/telefone.png" alt="telefones" width="30" height="30" data-bs-toggle="modal" data-bs-target="#phone" />
                        <a href="<?php echo 'details_contact_save_phone_html.php?id_contact=' . $list['id']; ?>"><img src="assets/img/receptor-de-telefone.png" alt="telefones" width="30" height="30" /></a>
                    </div>
                </div>
            </div>
            <br>
            <input type="submit" value="Salvar" class="btn btn-success">
            <input type="button" value="Voltar" class="btn btn-primary" onclick="window.location='index.php';">
        </form>
    </div>

    <!-- The Modal phone -->
    <div class="modal" id="phone">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Telefones: </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <table id="phone" name="phone" class="table table-hover">
                        <thead>
                            <th>Telefone</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($id_contact)) {
                                $list_phone = $registerPhone->readRegister($id_contact);
                                foreach ($list_phone as $item) :
                            ?>
                                    <tr>
                                        <td><?php echo $item['number_phone']; ?></td>
                                        <td><a href="<?php echo 'delete_phone.php?id_phone=' . $item['id']; ?>" class="btn btn-danger btn-sm">Excluir</a></td>
                                        <td><a class="btn btn-secondary btn-sm" href="<?php echo 'details_contact_save_phone_html.php?id_phone=' . $item['id']; ?>">Editar</a></td>
                                    </tr>
                                <?php endforeach;
                            } else { ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal email -->
    <div class="modal" id="email">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Telefones: </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <table id="phone" name="phone" class="table table-hover">
                        <thead>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($id_contact)) {
                                $list_email = $registerEmail->readRegister($id_contact);
                                foreach ($list_email as $item) :
                            ?>
                                    <tr>
                                        <td><?php echo $item['end_email']; ?></td>
                                        <td><a href="<?php echo 'delete_email.php?id_email=' . $item['id']; ?>" class="btn btn-danger btn-sm">Excluir</a></td>
                                        <td><a class="btn btn-secondary btn-sm" href="<?php echo 'details_contact_save_email_html.php?id_email=' . $item['id']; ?>">Editar</a></td>
                                    </tr>
                                <?php endforeach;
                            } else { ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>