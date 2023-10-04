<!DOCTYPE html>
<html lang="pt">
   <head>
      <meta charset="utf-8">
      <title>Cadastros</title>
   </head>

   <body>

      <form>
         Nome: <input name="nome">
         <br />
         Endereço: <input name="endereco">
         <br />
         Telefone: <input name="telefone">
         <br />
         <button>Cadastrar</button>
      </form>

      <?php

         $host = "localhost";
         $usuario = "root";
         $senha = "";
         $banco = "aulaphp";
         $porta = 3306;

         $conexao = new PDO("mysql:host=$host;porta=$porta;dbname=$banco",$usuario,$senha);


         if (isset($_GET["nome"]) ) {

            $nome = $_GET["nome"];
            $endereco = $_GET["endereco"];
            $telefone = $_GET["telefone"];

            $sql = "INSERT INTO cadastro (nome,endereco,telefone) VALUES (:nome,:endereco,:telefone)";
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(":nome",$nome);
            $consulta->bindParam(":endereco",$endereco);
            $consulta->bindParam(":telefone",$telefone);
            $consulta->execute();
         }

         if (isset($_GET["acao"]) ) {
            $id = $_GET["id"];
            $sql = "DELETE FROM cadastro WHERE id = :id";
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(":id",$id);
            $consulta->execute();
         }



         $sql = "SELECT id,nome,endereco,telefone FROM cadastro";
         $consulta = $conexao->prepare($sql);
         $consulta->execute();
         $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
         echo "<table border=1><tr><td>ID</td><td>Nome</td><td>Endereco</td><td>Telefone</td><td>Ação</td></tr>";
         foreach( $resultados as $cadastro) {
            $id = $cadastro["id"];
            $nome = $cadastro["nome"];
            $endereco = $cadastro["endereco"];
            $telefone = $cadastro["telefone"];
            ?>
               <tr>
                  <td><?=$id?></td>
                  <td><?=$nome?></td>
                  <td><?=$endereco?></td>
                  <td><?=$telefone?></td>
                  <td><a href=bd7.php?acao=remover&id=<?=$id?>>Remover</a></td>
               </tr>                
            <?php
         }
         echo "</table>";