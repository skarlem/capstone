<?php

    function addUser($data){
        //foreach ($data as $key => $users) {
            $res = pg_insert($db, 'admin' , $data);
            if ($res) {
              echo "Inserted user";
             // $is_inserted = true;
            } else {
              echo pg_last_error($db) . " <br />";
              $is_inserted = false;	
            }
        //}
        return $is_inserted;
    }
    
    function getAccount($where){
        $result = pg_query($db, "SELECT * FROM admin where id='$where'");
        if (!$result) {
            echo "An error occurred.\n";
            exit;
        }
        else{
            while($row = pg_fetch_array($result)){
                  $users[] = $row;
                }
        }
        //print into the json file
               
        return $users;
    }
    
    //update function
    function updateAccount($data,$where){
        $res = pg_update($db, 'admin', $data, $where);
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
        $res = pg_delete($db, 'admin', $where);	
        if ($res) {
          //echo "Deleted successfully.";
          $is_deleted = true;
        } else {
          //echo "Error in input..";
          $is_deleted = false;
        }	
        return $is_deleted ;
    }


?>