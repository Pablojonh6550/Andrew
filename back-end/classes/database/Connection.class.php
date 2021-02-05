<?php
    class Connection 
    {

        function getConnection()
        {
            $host= "mysql:host=localhost;dbname=project";
            $user= "root";
            $pass= "";

            try {
                $pdo = new PDO($host, $user, $pass);

                return $pdo;
                
            } catch (PDOException $e) {
                echo "Error PDO: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

    }
?>