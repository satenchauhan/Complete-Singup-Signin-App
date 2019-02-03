<?php

class Delete extends Dbcon{

       public function delete_data($data){

           // $user = new Update();
           // echo $user->data_by_id($del_id);

           $del_id = $_GET['del_id'];

           $sql = "DELETE FROM `users` WHERE `id`=?";

           $stmt = $this->connect()->prepare($sql);
           $stmt->bindParam(1,$del_id);
           $result = $stmt->execute();

           if ($result) {
           	 
           	 header("Location:dashboard.php?del");
           }
           else{

           	 $error = "<div class='alert alert-danger' style='color:red;'><b>Error:</b>User not deleted !!</div>";

           }


       }

}