<?php 

class Message extends Db_object {
    protected static $db_table = "message";
    protected static $db_table_fields = array('userId','subject','message','status','datesent','reply');
    public $id;
    public $userId;
    public $subject;
    public $message;
    public $status;
    public $datesent;
    public $reply;


    public static function getMessages(){
        global $database;

        $result = mysqli_query($database->conn, "SELECT * FROM " .self::$db_table. " WHERE status = 'unread'");
        return mysqli_num_rows($result);
    }

    public static function getRecentMessages() {
        $sql = "SELECT * FROM  ".self::$db_table ." WHERE status = 'unread' LIMIT 4";
        $the_result_array = self::find_this_query($sql);
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function find_all_messages(){
        return static::find_this_query("SELECT * FROM  ".static::$db_table ." ORDER BY 	datesent DESC ");
         
     }
}
?>