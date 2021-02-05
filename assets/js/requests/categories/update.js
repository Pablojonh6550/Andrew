function editCategory(id) {
    var data = {
        id,
        spend_target : $(`#spend_target_${id}`).val(),
        method : 'PUT',
    };

    $.post(categories_URL, data, function(answer) {
        var data = JSON.parse(answer);

        if (typeof data['error'] == "undefined") {
            if (typeof data['warning'] == "undefined") {
                $.growl.notice({
                    message : data.success
                });
            } else {
                $.growl.warning({
                    message : data.warning
                });
            }
        } else {
            $.growl.error({
                message : data.error
            });
        }
    })
}