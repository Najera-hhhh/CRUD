<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <?php require_once "./partial/header.php" ?>
        <form id="form-venta" class="mt-5">
            <div class="mb-3">
                <label for="descripcion" class="form-label">Cliente</label>
                <select class="form form-control" name="idCliente" id="clientes" required></select>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">iva</label>
                <input type="text" name="iva" required>
            </div>

            <div class="options">
                <button type="button" class="btn btn-success" id="add" name="add">+</button>
            </div>
            <div class="mb-3">
                <table class="table table-ligth text-center mx-auto" id="table-products">
                    <thead>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th></th>
                    </thead>
                    <tbody >
                    </tbody>
                </table>
            </div>
            <div class="mb-3 mx-auto text-center">
                <button class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


    <script src="assets/js/cliente.js"></script>
    <script src="assets/js/venta.js"></script>
</body>

</html>