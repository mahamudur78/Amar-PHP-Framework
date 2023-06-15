<?php
    class Database extends PDO{
        
        public function __construct($dsn, $user, $password)
        {
            try {
                parent::__construct($dsn, $user, $password);
            } catch(PDOException $e) {
                echo "SQL Error Message: ".$e->getMessage();
                die();
            }
        }

        public static function DBPrefix( $taable ){
            return DB_TABLE_PREFIX.$taable;
        }

        //select
        public function select( $sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC ){
            $stmt = $this->prepare( $sql );

            foreach( $data as $key => $value){
                $stmt->bindParam( $key, $value);
            }
            $stmt->execute();
            return $stmt->fetchAll($fetchStyle);
        }

        //insert
        public function insert($table, $data){
            $keys = implode(", ", array_keys($data));
            $values = ":" .implode(", :", array_keys($data));

            $sql = "INSERT INTO $table($keys) VALUES($values)";
            $stmt = $this->prepare($sql);

            foreach($data as $key => $value){
                $stmt->bindValue(":$key", $value);
            }
            return $stmt->execute();

        }

        // Update
        public function update($table, $data, $cond){
            $updateKeys = null;
            foreach($data as $key => $value){
                $updateKeys .= "$key=:$key,";
            }
            $updateKeys = rtrim($updateKeys, ',');
 
            $sql = "UPDATE $table SET $updateKeys WHERE $cond";
            $stmt = $this->prepare($sql);

            foreach($data as $key => $value){
                $stmt->bindValue(":$key", $value);
            }
            return $stmt->execute();
        }

        //Delete
        public function delete($table, $cond, $limit){
            $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
            return $this->exec($sql);
        }

        public function affectedRows($sql, $username, $password){
            $stmt = $this->prepare($sql);
            $stmt->execute(array($username, $password));
            return $stmt->rowCount();
        }

        public function selectUser($sql, $username, $password){
            $stmt = $this->prepare($sql);
            $stmt->execute(array($username, $password));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>