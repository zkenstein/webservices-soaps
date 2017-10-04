<?php
	//server
	//inclusao do arquivo NUSOAP
	require_once('conectar.php');
	require_once('lib/nusoap.php');
		
	//criacao de uma instanca do servidor
	$server = new soap_server;
	
	//registro do método
	$server->register('listaProdutos');
	
	//funcao lista produtos
	function listaProdutos(){
		
		$result = $this->mysqli->query("SELECT * FROM student");
		$this->mysqli->close();
		return $result->fetch_all(MYSQLI_ASSOC);

		
	}
		
	//requisição para uso do serviço
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ?
	$HTTP_RAW_POST_DATA : '';
	
	$server->service($HTTP_RAW_POST_DATA);
	
?>
