<?php
try {
    $conexao = new PDO('mysql:host=localhost;dbname=sistema_hotel', 'root', '');

    $query = " 
    SELECT * FROM tb_registros WHERE tb_registros.id =".$_POST['id'];


    
    $retorno = $conexao->query($query);
    $retornoedit = $retorno->fetchAll(PDO::FETCH_ASSOC);
    header('LOCATION: registros.php?retornoedit='.$_POST['id']);

} catch (PDOException $e) {
    echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
}

print_r($retornoedit);

