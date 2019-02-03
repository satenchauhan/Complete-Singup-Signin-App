<?php 

class Dashboard extends Dbcon{


	 public function dataview()
	 {
        $query = "SELECT * FROM `users`";
      	$stmt = $this->connect()->prepare($query);
      	$stmt->execute();

      	if($stmt->rowCount() > 0){
      		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          ?>
			   <tr>
				   <td><?php echo $row['id'];  ?></td>
				   <td><?php echo ucwords($row['fullname']);  ?></td>
				   <td><?php echo ucfirst($row['username']);  ?></td>
				   <td><?php echo $row['email'];  ?></td>
				   <td width="5%"><?php echo ucfirst($row['country']);  ?></td>
				   <td align="center" width="5%"><img src="dbpic/<?php echo $row['image'];  ?>" width="100px" ></td>
				   <td align="center" width="5%"><a href="update.php?edit_id=<?php echo $row['id'];  ?>" class="btn btn-primary btn-sm">Edit</a></td>
				   <td align="center" width="5%"><a href="delete.php?del_id=<?php echo $row['id'];  ?>" class="btn btn-danger btn-sm">Delete</a></td>
			   </tr>
        <?php
      		}

      	 }else {
      	 	?>
      	 	<tr>
      	 		<td>No Record Found</td>
      	 	</tr>
      	<?php
      	 }


	 }


}


