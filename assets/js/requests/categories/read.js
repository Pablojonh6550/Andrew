const categories_URL  = "back-end/controllers/ControllerCategories.php";

function getAllCategories()
{
    $.get(categories_URL, (answer) => {
        var data = JSON.parse(answer);

        // console.log(data);

        if (typeof data['error'] == "undefined") {
            $("#id_category").html(`
                <option disabled selected value="">Selecione uma Categoria</option>
            `);

            $.each(data, function(idx, value) {
                $("#id_category").append(`
                    <option value="${value.id}">${value.title}</option>
                `);

                $("#tbody_categories").append(`
                    <tr>
                        <td>${value.id}</td>
                        <td>${value.title}</td>
                        <td>${value.period}</td>
                        <td>
                            <input type='text' id="spend_target_${value.id}" value="${value.spend_target}">
                        </td>
                        <td>
                            <button onClick="editCategory(${value.id})" >
                                Salvar Meta
                            </button>
                        </td>
                    </tr>
                `);
            });
        }
    });
}

getAllCategories();

$("#store_spend").click(function() {
    getAllCategories();
});