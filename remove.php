<?php


try {
    $conexao = new PDO('mysql:host=localhost;dbname=sistema_hotel', 'root', '');

    $query = " 
    DELETE FROM tb_registros WHERE tb_registros.id =".$_POST['id'];


    
    $conexao->exec($query);
    header('LOCATION: registros.php');
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
}