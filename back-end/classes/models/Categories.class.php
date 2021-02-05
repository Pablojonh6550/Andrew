<?php

require_once "../classes/database/Connection.class.php";

class Categories 
{

    private object $MySQL;
    public const TABLE = "categories";

    public function __construct()
    {
        $this->MySQL = new Connection();
    }
    
    /*======================================================================================*/

    public function store($data) 
    {
        $connection = $this->MySQL->getConnection();

        try {
            $sql = "INSERT INTO " . self::TABLE . " 
                    VALUES (null, :title, :period, :spend_target)";

            $stmt = $connection->prepare($sql);

            $stmt->bindValue(":title", $data['title']);
            $stmt->bindValue(":period", $data['period']);
            $stmt->bindValue(":spend_target", $data['spend_target']);
            $stmt->execute();

            return $stmt->rowCount();
            
        } catch (PDOException $e) {
            return "Error Store Category: " . $e->getMessage();
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    /*======================================================================================*/

    public function getAll() {
        $connection = $this->MySQL->getConnection();

        try {
            $sql = "SELECT * FROM " . self::TABLE;

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

    public function edit($id, $spend_target) {
        $connection = $this->MySQL->getConnection();

        try {
            $sql = "UPDATE " . self::TABLE . " 
                    SET spend_target = :spend_target
                    WHERE id = :id";

            $stmt = $connection->prepare($sql);

            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":spend_target", $spend_target);
            $stmt->execute();
            
            return $stmt->rowCount();

        } catch (PDOException $e) {
            echo "Error Edit Category: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /*======================================================================================*/
}

?>