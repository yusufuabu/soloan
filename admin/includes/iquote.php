<?php 

class Iquote extends Db_object {
    protected static $db_table = "iquotes";
    protected static $db_table_fields = array('title','filename');
    public $id;
    public $title;
    public $filename;
    public $tmp_path;
    private $upload_directory = "images/quote";
    public $errors = array();

    public function getQuote() {
            global $database;
            $sql = mysqli_query($database->conn, "SELECT * FROM quotes ORDER BY RAND() LIMIT 1");
            while($row = mysqli_fetch_array($sql)){
                echo $row['quotes'];
            }
        
        }
     public function set_file($file){
         if(empty($file) || !$file || !is_array($file)){
             $this->errors[] = "There was no file uploaded";
             return false;   
         } else if ($file['error'] != 0){
             $this->errors[] = $file['error'];
         } else {
             $this->filename = basename($file['name']);
             $this->tmp_path = $file['tmp_name'];
         }
 
         
     }
 
     public function picture_path(){
         return $this->upload_directory .DS. $this->filename;
     }
 
     public function save() {
         if($this->id){
             $this->update();
             return true;
         } else {
             if(!empty($this->errors)){
                 return false;
             }
             if(empty($this->filename) || empty($this->tmp_path)) {
                 $this->errors[] =  "the file was not available";
                 return false;
             }
 
             $target_path = "../admin" .DS. $this->upload_directory .DS. $this->filename ;
 
             if(file_exists($target_path)){
                 $this->errors[] = "the file {$this->filename} already exist";
                 return false;
             }
 
             if(move_uploaded_file($this->tmp_path, $target_path)){
                 if($this->create()){
                     unset($this->tmp_path);
                     return true;
                 }
             } else {
                 $this->errors[] = "the file directory probably does not have permissions";
                 return false;
             }
             
         }
 
     }
 
     public function delete_photo() {
 
         if($this->delete()){
             $target_path = "../admin" .DS. $this->upload_directory .DS. $this->filename ;;
             return unlink($target_path)? true :false; 
         } else {
             return false;
         }
     }
 }
 
 ?>
 





