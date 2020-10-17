<?php
    setlocale(LC_ALL, 'pt_BR.utf8');
    include('conexao.php');

   $numero = trim($_POST['txtNumero']);
   $descricao = trim($_POST['txtDescricao']);
   $versao = trim($_POST['txtVersao']);
   $corrigido = trim($_POST['txtCorrigido']);

   $Conn = new Connection;
   $sql1 = "SELECT MAX(id) from chamados;";
   $ins_result1 = $Conn->selectDB($sql1);

   $sql_insert = "INSERT INTO chamados (numero, descricao, versao, corrigido) VALUES ('$numero', '$descricao', '$versao', '$corrigido');";
   $result = $Conn->insertDB($sql_insert);

   $sql2 = "SELECT MAX(id) FROM chamados;";
   $ins_result2 = $Conn->selectDB($sql2);

   if ($ins_result1 != $ins_result2) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $from = 'nathaliaoliveiramc@gmail.com';
      $subject = "Solicitacao de Chamado Cadastrada !"  ;
      $message = "<h1>Ola,</h1><br/>
        <h3>Seu chamado foi cadastrado com sucesso, acompanhe o site para verificar se sua solitacao foi corrigida. </h3>
        <br/>
        <strong>Numero:</strong> $numero
        <br/>
        <strong>Descricao:</strong> $descricao
        <br/> 
        <strong>Versao Cadastrada:</strong> $versao
        <br/> 
        <strong>Site: </strong>crud.devplaycode.com.br
        <br/>
        <h6><span>Nao responda esse e-mail </span></h6>";
      $headers = 'From: ' . $from . "\r\n" .
          'Reply-To: ' . $from . "\r\n" .
          "Content-type:text/html;charset=UTF-8".
          "Content-Transfer-Encoding: base64".
          'X-Mailer: PHP/' . phpversion();

      if (mail('nathaliaoliveiramc@gmail.com', $subject, $message, $headers)) {
          echo "<script type='text/javascript'>alert('Email Enviado');</script>"; return header('location: ../index.php');
      } else {
          echo "<script type='text/javascript'>alert('Email N���o Enviado');</script>"; return header('location: ../index.php');
      }

  }
     
   } else {
     header('location: ../index.php?msg=1');
   }
?>
