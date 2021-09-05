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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.71/pdfmake.min.js" integrity="sha512-q+jWnBtVH327w/3nlp2Th9Dtjmlfj3Mb4tXCGbYjYWUqtFyIhl1Ul8GXoMkzbWvdIRVlS0P1pyteYUzxArKYOg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
</head>

<body>

    <div class="container">
        <?php require_once "./partial/header.php" ?>

        <table class="table table-ligth w-75 mx-auto mt-5  card-body card-header">
            <thead>
                <th>id</th>
                <th>Razon social</th>
                <th>RFC</th>
            </thead>
            <tbody id="clientes">
            </tbody>
        </table>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


    <script>
        function rechargeCliente() {

            $.get("./Application/Controller/ClienteController.php", function(result) {

                })
                .done(function(result) {
                    var clientColumns = [];
                    $.each(JSON.parse(result), function(key, cliente) {
                        clientColumns.push(`
                        <tr>
                            <td id="idCliente">${cliente['idCliente']}</td>
                            <td>${cliente['razonSocial']}</td>
                            <td>${cliente['RFC']}</td>
                            <td><button id="${cliente['idCliente']}" class="btn btn-success report"><i class="fa fa-book"></i></button></td>
                        </tr>
                    `);
                    })

                    $("#clientes").html(clientColumns.join(""));
                })
        }

        rechargeCliente();

        $(document).on("click", ".report", function() {

            $.get("./Application/Controller/VentaController.php", {
                    id: $(this).attr("id")
                })
                .done(function(result) {
                    f = [
                        [{
                            text: "Reporte de ventas",
                            alignment: 'center',
                            colSpan: 6
                        }, "", "", "", "", ""],
                        ['Cliente', 'RFC', 'Razon social', 'Subtotal', 'Iva', 'Total']
                    ];


                    $.each(JSON.parse(result), function(key, producto) {
                        datos = [
                            producto["idCliente"],
                            producto["RFC"],
                            producto["razonSocial"],
                            producto["subtotal"],
                            producto["iva"],
                            producto["total"],
                        ]
                        f.push(datos);
                    })

                    var dd = {

                        content: [{
                            style: 'tableExample',
                            table: {
                                widths: ['*', '*', '*', '*', '*', '*'],
                                body: f
                            }

                        }]

                    }
                    var win = window.open('', '_blank');
                    pdfMake.createPdf(dd).open({}, win);
                    console.log(f);
                })
        })
    </script>
</body>

</html>