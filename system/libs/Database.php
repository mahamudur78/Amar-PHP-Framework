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
    }

?>