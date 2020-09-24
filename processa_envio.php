<?php

	//print_r($_POST);

if ($_POST['nome'] != null and $_POST['cpf'] != null and $_POST['ano'] != null and $_POST['mes'] != null and $_POST['dia'] != null and $_POST['apartamento'] != null and $_POST['valordiaria'] != null and $_POST['qtddiarias'] != null and $_POST['total'] != null) {
	$ano = $_POST['ano'];
	$mes = $_POST['mes'];
	$dia = $_POST['dia'];


	try {
		$conexao = new PDO('mysql:host=localhost;dbname=sistema_hotel', 'root', '');
	
		$query = "
			insert into tb_registros(nome, cpf, data, apartamento, valor_diaria, qtd_diarias, valor_total) values ('{$_POST['nome']}', '{$_POST['cpf']}','{$ano}/{$mes}/{$dia}','{$_POST['apartamento']}','{$_POST['valordiaria']}', '{$_POST['qtddiarias']}', '{$_POST['total']}')
		";
	
		
		$retorno = $conexao->exec($query);
		header('LOCATION: index.php?retorno=sucesso');
		
	
	
	} catch (PDOException $e) {
		echo 'Erro: '.$e->getCode().' Mensagem: '.$e->getMessage();
	}
}else{
	header('LOCATION: index.php?retorno=erro');
}

	
