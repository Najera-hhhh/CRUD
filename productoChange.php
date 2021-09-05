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
        <div class="panel">
            <form id="form-producto" class="mt-5">
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input type="text" class="form-control" name="idMaterial" id="id" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" required>
                </div>
                <div class="mb-3">
                    <label for="unidad" class="form-label">Unidad de medida</label>
                    <input type="text" class="form-control" name="unidadMedida" id="unidad" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" step="0.1" name="precio1" id="precio" required>
                </div>
                <div class="mb-3 mx-auto text-center">
                    <button id="change" class="btn btn-success delete"><i class="fa fa-save"></i></button>
                </div>
            </form>
            <div>
                <table class="table table-ligth w-75 mx-auto mt-5">
                    <thead>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Unidad de medida</th>
                        <th>Precio</th>
                        <th></th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


    <script>
        function recharge() {

            $.get("./Application/Controller/ProductosController.php", function(result) {

                })
                .done(function(result) {
                    var productsColumns = [];
                    $.each(JSON.parse(result), function(key, producto) {
                        productsColumns.push(`
                <tr>
                    <td>${producto['idMaterial']}</td>
                    <td>${producto['descripcion']}</td>
                    <td>${producto['unidadMedida']}</td>
                    <td>${producto['precio1']}</td>
                </tr>
            `);
                    })

                    $("tbody").html(productsColumns.join(""));
                })
        }

        $('form').on("submit", function(e) {
            e.preventDefault();

            let data = $('form').serialize() + "&updateId=" + $('#id').val();

            e.preventDefault();
            // Create an FormData object 
            console.log(data);
            $.post("./Application/Controller/ProductosController.php", data)
                .done(function(data) {
                    console.log(data);
                    recharge();
                });

            $('form')[0].reset();
        })

        recharge();
    </script>
</body>

</html>