<?php 

class Support extends Db_object {
    protected static $db_table = "support";
    protected static $db_table_fields = array('userId','subject','message','status','date');
    public $id;
    public $userId;
    public $subject;
    public $message;
    public $status;
    public $date;
}
?>