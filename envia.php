<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>recebedados</title>
</head>

<body>
   <?php
   $conexao = mysqli_connect("localhost", "root", "", "teste");
   if (!$conexao) {
      echo "NÃO CONECTADO";
   }
   echo "CONECTADO AO BANCO>>>>>>>>>>>";

   $cpf = $_POST['cpf'];
   $cpf = mysqli_real_escape_string($conexao, $cpf);
   $sql = "SELECT cpf FROM teste.dados WHERE cpf= '$cpf' ";
   $retorno = mysqli_query($conexao, $sql);

   if (mysqli_num_rows($retorno) > 0) {
      echo "CPF JÀ CADASTRADO!<br>";
      echo "<a href='cadastro.html'>VOLTAR</a>";
   } else {
      $cpf = $_POST['cpf'];
      $idade = $_POST['idade'];
      $nome = $_POST['nome'];

      $sql = "INSERT INTO teste.dados(cpf, idade, nome) values('$cpf','$idade','$nome')";
      $resultado = mysqli_query($conexao, $sql);
      echo ">>USUÁRIO CADASTRADO COM SUCESSO!<br>";
      echo "<a href='cadastro.html'>VOLTAR</a>";
   }


   ?>
</body>

</html>