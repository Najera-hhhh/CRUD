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
                        <td><button id="${producto['idMaterial']}" class="btn btn-danger delete"><i class="fa fa-trash"></i></button></td>
                    </tr>
                `);
            })

            $("tbody").html(productsColumns.join(""));
        })
}


$('form').on("submit", function(e) {
    e.preventDefault();

    let data = $('form').serialize();

    e.preventDefault();
    // Create an FormData object 
    console.log(data);
    $.post("./Application/Controller/ProductosController.php", data)
        .done(function(data) {
            recharge();
        });

    $('form')[0].reset();
})

$(document).on("click", ".delete", function() {

    $.ajax({
        url: "./Application/Controller/ProductosController.php",
        type: "POST",
        data: {
            deleteId: $(this).attr("id")
        },
        success: function(dataResult) {
            console.log(dataResult);
            recharge();
        }
    });
})

recharge();