<?php 

class Level extends Db_object {
    protected static $db_table = "level";
    protected static $db_table_fields = array('name','amount');
    public $id;
    public $name;
    public $amount;

    public static function getLimit($id){
        $the_result_array =  static::find_this_query("SELECT * FROM  ".static::$db_table ." WHERE name = '$id' ");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }






}
?>