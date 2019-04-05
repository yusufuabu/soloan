<?php 

class Endorsements extends Db_object {
    protected static $db_table = "endorsement";
    protected static $db_table_fields = array('ip','timeClocked','nextTime');
    public $id;
    public $ip;
    public $timeClocked;
    public $nextTime;
    public function saveIp() {
        global $database;

        $result = mysqli_query($database->conn,"SELECT ip FROM endorsement where ip = '$this->ip'");
        $numRows = mysqli_num_rows($result);
            if($numRows == '0'){
                $this->create();
            } else {
                mysqli_query($database->conn, "UPDATE endorsement SET timeClocked = '$this->timeClocked' nextTime = '$this->nextTime' WHERE ip = '$this->ip'");
            }
        }

     public static function getIp($ip) {
        $sql = "SELECT * FROM  ".self::$db_table ." WHERE ip = '$ip' LIMIT 1";
        $the_result_array = self::find_this_query($sql);
            return !empty($the_result_array) ? array_shift($the_result_array) : false;
     }   
    }





?>