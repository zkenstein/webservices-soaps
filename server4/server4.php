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
		
		$con = conectar();
	
	    $sql = "select * from produtos";
		$result = mysqli_query($con,$sql);
				
		$produtos = array();
		
		$linha = mysqli_fetch_assoc($result);
		$total = mysqli_num_rows($result);
				
		$i =0;
		if($total > 0) {
			do {
				// echo "<br> Codigo:".$linha['codigo']." Produto: ".$linha['nome'];
				 $produtos[$i] = $linha;
				 $i++;
			}while($linha = mysqli_fetch_assoc($result));
		}

		return $produtos;
	}
		
	//requisição para uso do serviço
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ?
	$HTTP_RAW_POST_DATA : '';
	
	$server->service($HTTP_RAW_POST_DATA);
	
?>