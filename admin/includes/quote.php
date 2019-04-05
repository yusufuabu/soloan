<?php 

class Quote extends Db_object {
    protected static $db_table = "quotes";
    protected static $db_table_fields = array('quotes');
    public $id;
    public $quotes;

    public function getQuote() {
            global $database;
            $sql = mysqli_query($database->conn, "SELECT quotes FROM quotes ORDER BY RAND() LIMIT 1");
            while($row = mysqli_fetch_array($sql)){
                echo $row['quotes'];
            }
        
    }





}
?>