const categories_URL  = "../back-end/controllers/ControllerCategories.php";

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
            });
        }
    });
}

getAllCategories()