const spending_URL  = "../back-end/controllers/ControllerSpending.php";

function getAllSpending()
{
    $.get(spending_URL, (answer) => {
        var data = JSON.parse(answer);
        
        // console.log(data);
    });
}

getAllSpending()