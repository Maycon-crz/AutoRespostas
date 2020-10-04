<?php require_once("include/conn.php");?>
<?php

	class msgsProntas{
		function cadastrandoMSGSprontas($con, $ferramentas, $mensagemParaCadastro, $assuntoMSGpronta, $criadaPor, $inputItensDinamicos1, 
		$inputItensDinamicos2, $inputItensDinamicos3, $inputItensDinamicos4, $inputItensDinamicos5){
			$mensagemParaCadastro = $ferramentas->filtrando($mensagemParaCadastro);
			$assuntoMSGpronta = $ferramentas->filtrando($assuntoMSGpronta);
			$criadaPor = $ferramentas->filtrando($criadaPor);
			$inputItensDinamicos1 = $ferramentas->filtrando($inputItensDinamicos1);
			$inputItensDinamicos2 = $ferramentas->filtrando($inputItensDinamicos2);
			$inputItensDinamicos3 = $ferramentas->filtrando($inputItensDinamicos3);
			$inputItensDinamicos4 = $ferramentas->filtrando($inputItensDinamicos4);
			$inputItensDinamicos5 = $ferramentas->filtrando($inputItensDinamicos5);
			$sqlInsertMSGSprontas = 
				"INSERT INTO mensagensprontas(mensagemparacadastro, assuntomsgpronta, criadapor, inputitensdinamicos1,
				inputitensdinamicos2, inputitensdinamicos3, inputitensdinamicos4, inputitensdinamicos5) 
				VALUES(:mensagemparacadastro, :assuntomsgpronta, :criadapor, :inputitensdinamicos1,
				:inputitensdinamicos2, :inputitensdinamicos3, :inputitensdinamicos4, :inputitensdinamicos5)"
			;
			$insertMSGSprontas = $con->prepare($sqlInsertMSGSprontas);			
			$insertMSGSprontas->bindParam(":mensagemparacadastro", $mensagemParaCadastro);
			$insertMSGSprontas->bindParam(":assuntomsgpronta", $assuntoMSGpronta);
			$insertMSGSprontas->bindParam(":criadapor", $criadaPor);
			$insertMSGSprontas->bindParam(":inputitensdinamicos1", $inputItensDinamicos1);
			$insertMSGSprontas->bindParam(":inputitensdinamicos2", $inputItensDinamicos2);
			$insertMSGSprontas->bindParam(":inputitensdinamicos3", $inputItensDinamicos3);
			$insertMSGSprontas->bindParam(":inputitensdinamicos4", $inputItensDinamicos4);
			$insertMSGSprontas->bindParam(":inputitensdinamicos5", $inputItensDinamicos5);

			if($insertMSGSprontas->execute()){
				echo json_encode("Mensagem cadastrada com sucesso!");
			}else{
				echo json_encode("Erro ao cadastrar!");
			}
		}
	}
	class ferramentas{
		function filtrando($dados){
			$dados = trim($dados);
			$dados = htmlspecialchars($dados);			
			$dados = addslashes($dados);
			return $dados;		
		}
	}
	
	class inicia{
		function iniciando(){
			$banco = new banco;
			$con = $banco->conexao();

			$ferramentas = new ferramentas;			
			$msgsProntas = new msgsProntas;			
	
			if( isset($_POST['mensagemParaCadastro']) || isset($_POST['assuntoMSGpronta']) || isset($_POST['criadaPor']) || 
				isset($_POST['inputItensDinamicos1']) || isset($_POST['inputItensDinamicos2']) || isset($_POST['inputItensDinamicos3']) || 
				isset($_POST['inputItensDinamicos4']) || isset($_POST['inputItensDinamicos5']) ){				
				$msgsProntas->cadastrandoMSGSprontas($con, $ferramentas, $_POST['mensagemParaCadastro'], $_POST['assuntoMSGpronta'], $_POST['criadaPor'], $_POST['inputItensDinamicos1'], $_POST['inputItensDinamicos2'], $_POST['inputItensDinamicos3'], $_POST['inputItensDinamicos4'], $_POST['inputItensDinamicos5']);
			}
		}
	}		
	$inicia = new inicia;	
	$inicia->iniciando();
?>