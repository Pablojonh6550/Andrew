<?php

require_once "../classes/database/Connection.class.php";
class Spending 
{

    public const TABLE = "spending";
    
    /*======================================================================================*/

    public function store($data) 
    {
        $connect = new Connection();
        $connection = $connect->getConnection();

        try {
            $sql = "INSERT INTO " . self::TABLE . " 
                    VALUES (null, :category_fk, :amount, :date)";

            $stmt = $connection->prepare($sql);

            $stmt->bindValue(":category_fk", $data['category_fk']);
            $stmt->bindValue(":amount", $data['amount']);
            $stmt->bindValue(":date", $data['date']);
            $stmt->execute();

            return $stmt->rowCount();
            
        } catch (PDOException $e) {
            return "Error Store Category: " . $e->getMessage();
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    /*======================================================================================*/

    public function getAll() 
    {
        $connect = new Connection();
        $connection = $connect->getConnection();

        try {
            $sql = "SELECT " . self::TABLE . ".id, amount, title, period, spend_target, date
                    FROM " . self::TABLE . "
                    INNER JOIN categories ON category_fk = categories.id 
                    ";

            $stmt = $connection->prepare($sql);

            $stmt->execute();

            $categories = $stmt->fetchAll($connection::FETCH_ASSOC);
            
            if (is_array($categories) && count($categories) > 0) 
                return $categories;
            else
                return ['error' => "Nenhum registro encontrado!"];
            
        } catch (PDOException $e) {
            return "Error Read Category: " . $e->getMessage();
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    /*======================================================================================*/

}
?>