$("#btn-register_spent").click(function(answer) {
    var data = {
        data : {
            category_fk : $("#id_category").val(),
            amount : $("#amount_spent").val(),
            date : $("#date").val(),
        },
        method : 'POST',
    };

    $.post(spending_URL, data, function(answer) {
        var data = JSON.parse(answer);

        if (typeof data['error'] == "undefined") {
            $.growl.notice({
                message : data.success
            });
            $("#table_spending").DataTable().destroy();
            getAllSpending();
        } else {
            $.growl.error({
                message : data.error
            });
        }
    })
});