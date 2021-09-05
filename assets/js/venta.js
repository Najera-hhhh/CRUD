$(document).ready(function() {

    $.get("./Application/Controller/ClienteController.php", function(result) {

        })
        .done(function(result) {
            var clientColumns = [];
            $.each(JSON.parse(result), function(key, cliente) {
                clientColumns.push(`
                <option value="${cliente['idCliente']}">${cliente['RFC']}</option>
        `);
            })

            $("#clientes").html(clientColumns.join(""));
        })


    function fillOptions() {
        $.get("./Application/Controller/ProductosController.php", function(result) {

            })
            .done(function(result) {
                var productsColumns = [];
                $.each(JSON.parse(result), function(key, producto) {
                    productsColumns.push(`
                    <option value="${producto['idMaterial']}">${producto['descripcion']}</option>
            `);
                })

                $('select[name="idMaterial[]"]').html(productsColumns.join(""));
                return productsColumns.join("");
            })
    }


    /**
     * Funcion para añadir una nueva fila en la tabla
     */
    $("#add").click(function() {
        options = fillOptions();
        var nuevaFila = `
        <tr>
            <td>
                <select class="form form-control" name="idMaterial[]" id="idMaterial">${options}</select>
            </td>
            <td>
                <input type="number" min="1" name="cantidad[]" class="form form-control" id="cantidad">
            </td>
            <td>
                <button  class="btn btn-danger del" type="button"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        `;
        console.log(nuevaFila)
        $("#table-products tbody").append(nuevaFila);
    });

    // evento para eliminar la fila
    $("#table-products").on("click", ".del", function() {
        $(this).parents("tr").remove();
    });



    $('#form-venta').on("submit", function(e) {
        e.preventDefault();

        let data = $('form').serialize();

        e.preventDefault();
        // Create an FormData object 
        console.log(data);
        $.post("./Application/Controller/VentaController.php", data)
            .done(function(data) {
                console.log(data);
            });

        $('form')[0].reset();
    })


    fillOptions();
});