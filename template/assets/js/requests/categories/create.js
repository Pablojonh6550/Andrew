$("#btn-register_category").click(function(answer) {
    var data = {
        data : {
            title : $("#title").val(),
            period : $("#period").val(),
            spend_target : $("#spend_target").val(),
        },
        method : 'POST',
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