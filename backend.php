<?php
  include 'db.inc.php';

  if(isset($_POST['id'])){
  $id=$_POST['id'];
  $value=$_POST['value'];
  $column=$_POST['column'];
  sleep(1);
  

  $sql="UPDATE employee SET $column=:value WHERE md5(id)=:id LIMIT 1";
  $query=$db->prepare($sql);
  $query->bindParam('value',$value);
  $query->bindParam('id',$id);
  if($query->execute()){
      echo "Succesfully updated $column to $value where encyrpted id=$id";

  }else{
      echo "failure";
  }

  }

?>
