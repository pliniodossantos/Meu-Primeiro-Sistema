<?php

	//print_r($_POST);

if ($_POST['nome'] != null and $_POST['cpf'] != null and $_POST['ano'] != null and $_POST['mes'] != null and $_POST['dia'] != null and $_POST['apartamento'] != null and $_POST['valordiaria'] != null and $_POST['qtddiarias'] != null and $_POST['total'] != null) {
	$ano = $_POST['ano'];
	$mes = $_POST['mes'];
	$dia = $_POST['dia'];


	try {
		$conexao = new PDO('mysql:host=localhost;dbname=sistema_hotel', 'root', '');
	
        $query = "
            UPDATE `tb_registros` SET `nome` = '{$_POST['nome']}', `cpf` = '{$_POST['cpf']}', `data` = '{$ano}-{$mes}-{$dia}', `apartamento` = '{$_POST['apartamento']}', `valor_diaria` = '{$_POST['valordiaria']}', `qtd_diarias` = '{$_POST['qtddiarias']}', `valor_total` = '{$_POST['total']}' WHERE `tb_registros`.`id` = {$_POST['id']};	
		";
	
		
		$retorno = $conexao->exec($query);
		header('LOCATION: registros.php?editmsg=sucesso');
		
	
	
	} catch (PDOException $e) {
		echo 'Erro: '.$e->getCode().' Mensagem: '.$e->getMessage();
	}
}else{
	header('LOCATION: registros.php?editmsg=erro');
}




?>