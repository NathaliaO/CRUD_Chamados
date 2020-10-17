<?php
    include('conexao.php');

   $id = trim($_REQUEST['txtId']);

   $sql ="DELETE FROM chamados WHERE id='$id';";
   $Conn = new Connection;
   $result = $Conn->deleteDB($sql);

   if (!empty($id)) {
     header('location: ../index.php');

   } else {
      header('location: ../index?msg=1');
   }
?>
