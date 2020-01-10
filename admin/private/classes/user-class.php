<?php 
class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_fields = ['username', 'password', 'first_name', 'last_name', 'user_image'];
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = "img";
    public $image_placeholder = "http://via.placeholder.com/100";



    public function set_file($file) {
        // error checking just to make sure the file as uploaded
        if( empty($file) || !$file || !is_array($file) ) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif($file['error'] !=0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else { //success
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }

    public function image_path_and_placeholder() {
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }
   
   
    // read
    public static function verify_user($username, $password) {
        global $db;
        $username =  $db->escape_string($username);
        $password =  $db->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '" . $username . "' AND ";
        $sql .= "password = '" . $password . "' ";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_by_query($sql);
        return !empty($the_result_array) ? array_shift( $the_result_array ) : false;
    }


    public function save_user_and_image() {
        if($this->id) {
            $this->update();
        } else {
            if(!empty($this->errors)) {
                return false;
            }
            if(empty($this->user_image) || empty($this->tmp_path)) {
                $this->errors[] = "The file was not available";
                return false;
            }

            $target_path = IMG_PATH . DS . $this->user_image;

            if(file_exists($target_path)) {
                $this->errors[] = "The file {$this->user_image} already exists";
                return false;
            }
             // move_uploaded_file(tempfilename, destination);
            if(move_uploaded_file($this->tmp_path,  $target_path)) {
                if($this->create()) { // if its avable to create it
                    unset($this->tmp_path); // unset the tmp_path
                    return true;
                }
            } else {
                $this->errors[] = "The file directory probably does not have permission";
                return false;
            }
        }
    }

    

   

}