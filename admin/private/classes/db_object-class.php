<?php 
class Db_object {
    // read
    public static function find_all() {    
        $sql = "SELECT * FROM " . static::$db_table . " ";
        return static::find_by_query( $sql );
    }
    // read
    public static function find_by_id( $id ) {
        $sql = "SELECT * FROM " . static::$db_table . " ";
        $sql .= "WHERE id ='" . $id . "' ";
        $sql .= "LIMIT 1";
        $the_result_array = static::find_by_query($sql);
        return !empty($the_result_array) ? array_shift( $the_result_array ) : false;
    }

     // read
     public static function find_by_query( $sql ) {
        global $db;
        $result = $db->query($sql);
        $the_object_array = [];
        while( $row = mysqli_fetch_assoc( $result ) ) {
            $the_object_array[] = static::instantiation( $row );
        }
        return $the_object_array;
    }

    public static function instantiation( $found_record ) {
        $calling_class = get_called_class();
        $the_object = new $calling_class;
        
        // $the_object->id = $found_record['id'];
        // $the_object->username = $found_record['username'];
        // $the_object->first_name = $found_record['first_name'];
        // $the_object->last_name = $found_record['last_name'];

        foreach ( $found_record as $property => $value ) {
            if( $the_object->has_the_property( $property ) ) {
                $the_object->$property = $value;
            }
        }

        return $the_object;
    }

    private function has_the_property($property) {
        $object_properties = get_object_vars($this);
        return array_key_exists($property, $object_properties);
    }

    

    protected function properties() {
        // return get_object_vars($this);
        $properties = [];
        foreach (static::$db_table_fields as $db_field) {
            if(property_exists($this,  $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    protected function clean_properties() {
        global $db;
        $clean_properties = [];

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $db->escape_string($value);
        }

        return $clean_properties;

    }

    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    // create
    public function create() {
        global $db;
        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . static::$db_table . " ";
        $sql .= "( " . implode(",", array_keys($properties)) ." ) ";
        $sql .= "VALUES ( '" . implode("','", array_values($properties)) . "' )";
        // echo  $sql;
        $create_query = $db->query($sql);

        if($create_query) {
            $this->id = $db->the_insert_id();
            return true;
        } else {
            return false;
        }
    }
    // update
    public function update() {
        global $db;
        $properties = $this->clean_properties();
        $properties_pairs = [];

        foreach ($properties as $key => $value) {            
            $properties_pairs[] = "{$key}='{$value}'";
            
        }
        // return $properties_pairs;

        $sql = "UPDATE " . static::$db_table .  " SET ";
        $sql .= implode( ",",  $properties_pairs );
        // $sql .= "username= '" . $db->escape_string($this->username) . "', ";
        // $sql .= "password= '" . $db->escape_string($this->password) . "', ";
        // $sql .= "first_name= '" . $db->escape_string($this->first_name) . "', ";
        // $sql .= "last_name= '" . $db->escape_string($this->last_name) . "' ";
        $sql .= " WHERE id= '" . $db->escape_string($this->id) . "' LIMIT 1";
        // echo $sql;
        $db->query($sql);
        return mysqli_affected_rows($db->connection) === 1 ? true : false;
    }

    public function delete() {
        global $db;
        $sql = "DELETE FROM " . static::$db_table;
        $sql .= " WHERE id= '" . $db->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        // echo $sql;
        $db->query($sql);
        return mysqli_affected_rows($db->connection) == 1 ? true: false;
    }
}