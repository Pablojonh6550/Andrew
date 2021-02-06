const spending_URL  = "/back-end/controllers/ControllerSpending.php";

function getAllSpending()
{
    $.get(spending_URL, (answer) => {
        var data = JSON.parse(answer);
        
        if (typeof data['error'] == "undefined") {
            $("#tbody_spending").html("");
            
            $.each(data, function(idx, value) {
                $("#tbody_spending").append(`
                    <tr>
                        <td style="color:black;">${value.id}</td>
                        <td style="color:black;">${value.title}</td>
                        <td style="color:black;">${value.period}</td>
                        <td style="color:black;">${value.spend_target}</td>
                        <td style="color:black;">${value.amount}</td>
                        <td style="color:black;">${value.date}</td>
                    </tr>
                `);
            });

            $("#table_spending").DataTable();
        }
    });
}

getAllSpending();

$("#Spending").click(function() {
    $("#table_spending").DataTable().destroy();
    getAllSpending();
});