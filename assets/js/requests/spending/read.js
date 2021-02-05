const spending_URL  = "back-end/controllers/ControllerSpending.php";

function getAllSpending()
{
    $.get(spending_URL, (answer) => {
        var data = JSON.parse(answer);
        
        if (typeof data['error'] == "undefined") {
            $("#tbody_spending").html("");
            
            $.each(data, function(idx, value) {
                $("#tbody_spending").append(`
                    <tr>
                        <td>${value.id}</td>
                        <td>${value.title}</td>
                        <td>${value.period}</td>
                        <td>${value.spend_target}</td>
                        <td>${value.amount}</td>
                        <td>${value.date}</td>
                    </tr>
                `);
            });
        }
    });
}

getAllSpending();

$("#Store").click(function() {
    getAllSpending();
});