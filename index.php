<?php
require("conn.php");
require("assets/class/contacts.class.php");
$registerContacts = new RegisterContacts($pdo);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Conteudo Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


    <title>Teste - Relembrando PHP</title>
</head>

<body class="bg-light">
    <div class="container">
        <h1>Cadastro de Contatos</h1>
        <hr class="my-4">

        <table class="table table-striped table-dark table-hover tab">
            <thead>
                <th>Código</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Ação</th>
            </thead>
            <tbody>
                <?php
                $list = $registerContacts->readRegister();
                foreach ($list as $item) :
                ?>
                    <tr>
                        <td><?php echo $item["id"] ?></td>
                        <td><?php echo $item["name"]; ?></td>
                        <td><?php echo $item["secondname"]; ?></td>
                        <td>
                        <a href="<?php echo 'details_contact.php?id=' . $item['id']; ?>" class="btn btn-secondary btn-sm">CONSULTAR</a>
                        <a href="<?php echo 'fornecedor_Deletar.php?id=' . $item['id'] . '&name=' . $item['name']; ?>" class="btn btn-secondary btn-sm">EXCLUIR</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>