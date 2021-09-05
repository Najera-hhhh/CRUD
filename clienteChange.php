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


        <div class="panel mt-5">
            <form class="card-body card">
                <div class="mb-3">
                    <label for="descripcion" class="form-label">id</label>
                    <input type="text" class="form-control" name="Act_id" id="Act_id" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Razon social</label>
                    <input type="text" class="form-control" name="Act_razon" id="Act_razon" required>
                </div>
                <div class="mb-3">
                    <label for="unidad" class="form-label">RFC</label>
                    <input type="text" class="form-control" name="Act_RFC" id="Act_RFC" required>
                </div>
                <div class="mb-3 mx-auto text-center">
                    <button id="change" class="btn btn-success delete"><i class="fa fa-save"></i></button>
                </div>
            </form>
            <div>
                <table class="table table-ligth w-75 mx-auto mt-5 card-body  text-center">
                    <thead class="text-center mx-auto">
                        <th>id</th>
                        <th>Razon social</th>
                        <th>RFC</th>
                    </thead >
                    <tbody id="clientes" class="text-center mx-auto">
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

<script>
    function rechargeCliente() {

        $.get("./Application/Controller/ClienteController.php", function(result) {

            })
            .done(function(result) {
                var clientColumns = [];
                $.each(JSON.parse(result), function(key, cliente) {
                    clientColumns.push(`
                <tr>
                    <td>${cliente['idCliente']}</td>
                    <td>${cliente['razonSocial']}</td>
                    <td>${cliente['RFC']}</td>
                </tr>
            `);
                })

                $("#clientes").html(clientColumns.join(""));
            })
    }


    $("form").on("submit", function(e) {
        e.preventDefault();

        $.post("./Application/Controller/ClienteController.php", {
                updateId: $('#Act_id').val(),
                razonSocial: $('#Act_razon').val(),
                RFC: $('#Act_razon').val()
            })
            .done(function(data) {
                rechargeCliente();
            });
        rechargeCliente();
    })

    rechargeCliente();
</script>

</html>