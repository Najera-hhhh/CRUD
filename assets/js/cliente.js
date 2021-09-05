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
                        <td><button id="${cliente['idCliente']}" class="btn btn-danger delete"><i class="fa fa-trash"></i></button></td>
                    </tr>
                `);
            })

            $("#clientes").html(clientColumns.join(""));
        })
}


$(document).on("submit", "#form-producto", function(e) {
    e.preventDefault();

    let data = $('#form-producto').serialize();

    e.preventDefault();
    // Create an FormData object 
    console.log(data);
    $.post("./Application/Controller/ClienteController.php", data)
        .done(function(data) {
            rechargeCliente();
        });

    $('form')[0].reset();
})

$(document).on("click", ".delete", function() {

    $.ajax({
        url: "./Application/Controller/ClienteController.php",
        type: "POST",
        data: {
            deleteId: $(this).attr("id")
        },
        success: function(dataResult) {

            console.log(datos);
            rechargeCliente();
        }
    });
})












rechargeCliente();