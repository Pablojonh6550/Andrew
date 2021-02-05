<?php

require_once '../classes/models/Categories.class.php';
require_once 'functions.php';

$Categories = new Categories();

if ($_SERVER['REQUEST_METHOD'] == 'GET')
    echo json_encode($Categories->getAll());
else 
if (isset($_POST['method'])) {
    switch ($_POST['method']) {
        case 'POST':
            $data = (isset($_POST['data'])) ? $_POST['data'] : [];

            if ( checkRequiredFields($data, ['title', 'period', 'spend_target']) ) {
                if ($Categories->store($data)) {
                    $response = [ 'success' => 'Registro cadastrado com sucesso!' ];
                } else {
                    $response = [ 'error' => 'Não foi possível realizar o cadastro!' ];
                }
            } else {
                $response = [ 'error' => 'Preencha os campos obrigatórios' ];
            }
            echo json_encode($response);

            break;

        case 'PUT':
            $id = (isset($_POST['id'])) ? $_POST['id'] : false;
            $spend_target = (isset($_POST['spend_target'])) ? $_POST['spend_target'] : false;

            if ($id) {
                if ($spend_target) {
                    if ($Categories->edit($id, $spend_target)) {
                        $response = [ 'success' => 'Registro atualizado com sucesso!' ];
                    } else {
                        $response = [ 'warning' => 'Nenhum registro afetado!' ];
                    }
                } else {
                    $response = [ 'error' => 'Informe a nova meta de gasto!' ];
                }
            } else {
                $response = [ 'error' => 'O ID é obrigatório!' ];
            }
            echo json_encode($response);
            
            break;
    }
}

?>