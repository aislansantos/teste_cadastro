<?php require("details_contact.php"); ?>
<?php require("details_contact_phone.php") ?>
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
    <title>Cadastrar Número</title>
</head>

<body>
    <div class="container">
        <h1>Cadastro de Contatos</h1>
        <hr class="my-4">
        <h2>Cadastro</h2>
        <br>
        <form action="" method="post" id="cadastro_phone">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php if (!empty($list_phone['id'])) {
                                                            echo $list_phone['id'];
                                                        }
                                                        ?>" />
                <input type="hidden" name="id_contact" value="<?php if (!empty($list_phone['id_contact'])) {
                                                                    echo $list_phone['id_contact'];
                                                                } else {
                                                                    echo $_GET['id_contact'];
                                                                } ?>" />
                <div class="col mb-1">
                    <label for="">Telefone:</label>
                    <input type="text" name="number_phone" id="number_phone" value="<?php if (!empty($list_phone['number_phone'])) {
                                                                                        echo $list_phone['number_phone'];
                                                                                    }
                                                                                    ?>" required placeholder="Telefone">
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <label for="">Nome do contato: <?php if (!empty($list_phone['name'])) {
                                                                            echo $list_phone['name'];
                                                                        } elseif($_GET['id_contact']) {
                                                                           echo $list['name'];
                                                                        } ?></label>

                    </div>
                </div>
                <input type="submit" value="Salvar" class="btn btn-success">
                <input type="button" value="Principal" class="btn btn-primary" onclick="window.location='index.php'">
        </form>
    </div>
</body>

</html>