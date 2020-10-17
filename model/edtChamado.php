<?php
    include('conexao.php');

   $id = trim($_POST['id']);
   $numero = trim($_POST['txtNumero']);
   $descricao = trim($_POST['txtDescricao']);
   $versao = trim($_POST['txtVersao']);
   $corrigido = trim($_POST['txtCorrigido']);

   $sql ="UPDATE chamados SET numero='$numero', descricao='$descricao', versao='$versao', corrigido='$corrigido' WHERE id='$id';";
      $Conn = new Connection;
   $result = $Conn->updateDB($sql);

   if (!empty($result)) {
     header('location: ../index?msg=1');
   } else {
     header('location: ../index.php');
   }
?>
