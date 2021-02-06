<?php
    class Connection 
    {

        function getConnection()
        {
            $host= "mysql:host=localhost;dbname=u421303045_project";
            $user= "u421303045_root_project";
            $pass= "9Yd/Kh+Ps";

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