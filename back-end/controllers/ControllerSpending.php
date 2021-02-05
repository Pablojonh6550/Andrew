<?php

require_once '../classes/models/Spending.class.php';
require_once 'functions.php';

$Spending = new Spending();

if ($_SERVER['REQUEST_METHOD'] == 'GET')
    echo json_encode($Spending->getAll());
else 
if (isset($_POST['method'])) {
    switch ($_POST['method']) {
        case 'POST':
            $data = (isset($_POST['data'])) ? $_POST['data'] : [];

            if ( checkRequiredFields($data, ['category_fk', 'amount', 'date']) ) {
                if ($Spending->store($data)) {
                    $response = [ 'success' => 'Registro cadastrado com sucesso!' ];
                } else {
                    $response = [ 'error' => 'Não foi possível realizar o cadastro!' ];
                }
            } else {
                $response = [ 'error' => 'Preencha os campos obrigatórios' ];
            }
            echo json_encode($response);

            break;
    }
}

?>