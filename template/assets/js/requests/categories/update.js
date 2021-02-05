$("#btn-register_category").click(function(answer) {
    var data = {
        id : $("#id").val(),
        spend_target : $("#spend_target").val(),
        method : 'PUT',
    };

    $.post(categories_URL, data, function(answer) {
        var data = JSON.parse(answer);

        if (typeof data['error'] == "undefined") {
            $.growl.notice({
                message : data.success
            });
        } else {
            $.growl.error({
                message : data.error
            });
        }
    })
});