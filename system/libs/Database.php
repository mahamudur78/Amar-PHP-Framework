<?php
    class Database extends PDO{
        
        public function __construct($dsn, $user, $password)
        {
            parent::__construct($dsn, $user, $password);
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
                $stmt->bindParam(":$key", $value);
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
                $stmt->bindParam(":$key", $value);
            }
            return $stmt->execute();
        }

        //Delete
        public function delete($table, $cond, $limit){
            $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
            return $this->exec($sql);
        }
    }

?>