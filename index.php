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

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>

    <title>Cadastro de Contato - Consulta</title>
</head>

<body class="bg-light">
    <div class="container">
        <h1>Cadastro de Contatos</h1>
        <hr class="my-4">
        <h2>Consulta de Registros</h2>
        <br>
        <input type="button" value="Cadastro" class="btn btn-primary" onclick="window.location='details_contact.php';">
        <table id="contato" name="contato" class="table table-hover">
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
                        <td><?php echo $item["id"]; ?></td>
                        <td><?php echo $item["name"]; ?></td>
                        <td><?php echo $item["secondname"]; ?></td>
                        <td>
                            <a href="<?php echo 'details_contact.php?id=' . $item['id']; ?>" class="btn btn-secondary btn-sm">CONSULTAR</a>
                            <a href="<?php echo 'delete_contact.php?id=' . $item['id']; ?>" class="btn btn-secondary btn-sm">EXCLUIR</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#contato').DataTable({

                    scrollY: '60vh',
                    scrollCollapse: true,
                    paging: false,


                    "language": {
                        "lengthMenu": "Mostrando _MENU_ registros por pagina",
                        "zeroRecords": "Nada encontrado",
                        "info": "",
                        "infoEmpty": "Nenhum registro disponivel",
                        "infoFiltered": "(Filtrado de _MAX_ total registros)",
                        "search": "Pesquisar:",
                    }


                });
            });
        </script>
    </div>
</body>

</html>