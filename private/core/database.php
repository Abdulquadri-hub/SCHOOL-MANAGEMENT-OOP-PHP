<?php

/**
 * database class
 */
class Database 
{
    # connect to databse
    private function connect() 
    {
        $string = DBDRIVER . ":host=".DBHOST.";dbname=".DBNAME;
        if (!$conn = new PDO($string,DBUSER,DBPASS)) {
            die("could no connect to database");
        }

        return $conn;
    }

    // function for query o run the database
    public function query($query, $data = array(), $data_type = "object")
    {
        $conn = $this->connect();
        // prepare the query
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $check = $stmt->execute($data);
            if ($check) {
                if ($data_type == "object") {
                    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                } else {
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }

                if (is_array($data) && count($data) > 0) {
                    return $data;
                }
                //return true;
            }
            
        }

        // if any of the if stmt fails
        return false;
    }
}
