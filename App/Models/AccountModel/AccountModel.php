<?php
class AccountModel extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function login($table){
        // transaction here
 
        $sql = 'SELECT * FROM '.$table.' WHERE username = :username AND password = :password';        	
        $statement = $this->conn->prepare($sql);
        $statement->execute(
        	[
        		':username'	=> $_POST['username'], 
        		':password'	=> md5($_POST['password'])
            ]
        );
        return $statement->rowCount(); 
    }


    function addUser($data){
        //foreach ($data as $key => $users) {
            $res = pg_insert($this->conn, 'admin' , $data);
            if ($res) {
              echo "Inserted user";
             // $is_inserted = true;
            } else {
              echo pg_last_error($this->conn) . " <br />";
              $is_inserted = false;	
            }
        //}
        return $is_inserted;
    }
    
    function getAccount($where){
        $result = pg_query($this->conn, "SELECT * FROM admin where id='$where'");
        if (!$result) {
            echo "An error occurred.\n";
            exit;
        }
        else{
            while($row = pg_fetch_array($result)){
                  $markers[] = $row;
                }
        }
        //print into the json file
               
        return $markers;
    }
    
    //update function
    function updateAccount($data,$where){
        $res = pg_update($this->conn, 'admin', $data, $where);
        if ($res) {
              //echo "Data is updated: $res";
            $is_updated = true;
        } else {
             //echo "error in input.. <br />";
             //echo pg_last_error($conn);
            $is_updated = false;
        }
        return $is_updated;
    }
    
    
    //delete function
    function deleteAdminn($where){
        $res = pg_delete($this->conn, 'admin', $where);	
        if ($res) {
          //echo "Deleted successfully.";
          $is_deleted = true;
        } else {
          //echo "Error in input..";
          $is_deleted = false;
        }	
        return $is_deleted ;
    }
}

?>