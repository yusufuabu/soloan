<?php 

class Claims extends Db_object {
    protected static $db_table = "claims";
    protected static $db_table_fields = array('userId','dateclaimed');
    public $id;
    public $userId;
    public $dateclaimed;

    public function saveClaims($userId){
        global $database;
        $sql = mysqli_query($database->conn,"SELECT * FROM claims WHERE userId = '$userId'");
        $numRows = mysqli_num_rows($sql);
        if($numRows == '0'){
            $this->create();
        } else {
           while($row = mysqli_fetch_array($sql)){
               $this->id = $row['id'];
               $this->update();
           }

        }
    }

    public function checkdate($userId){
        global $database;
    $sql = mysqli_query($database->conn,"SELECT * FROM claims WHERE userId = '$userId'");
    $numRows2 = mysqli_num_rows($sql);

    if($numRows2 == '0'){
        return true;
    } else {
        while($row = mysqli_fetch_array($sql)){
            $dateclaimed = $row['dateclaimed'];
            $datecheck = date('Y-m-d');
            if($datecheck > $dateclaimed ){
                return true;
            } else {
                return false;
            }
        }
     }
    }
    

}
?>