$(document).ready(function(){
	mensagensProntas();
	cadastroMSGSprontas();
});
var contaDinamicos=0;
function mensagensProntas(){
	$(document).on('click', '#vermsgsprontas', function(){
		$("#linhaProntas").toggle();
		var valueBtMaisMSGSprontas = $("#btMaisMSGSprontas").val();
		$.ajax({
			url: 'confg.php',
			type: 'POST',
			data: {'vermsgsprontas': valueBtMaisMSGSprontas},
			dataType: 'json',
			success: function(retornado){
				$("#linhaTodasProntas").html(retornado);
			}
		});
	});
}
function enviaCadastroMSGSprontasDB(mensagemParaCadastro, assuntoMSGpronta, criadaPor, inputItensDinamicos1, inputItensDinamicos2, inputItensDinamicos3, inputItensDinamicos4, inputItensDinamicos5){
	$.ajax({
		url: 'confg.php',
		type: 'POST',
		data: {
			"mensagemParaCadastro": mensagemParaCadastro,
			"assuntoMSGpronta": assuntoMSGpronta,
			"criadaPor": criadaPor,
			"inputItensDinamicos1": inputItensDinamicos1,
			"inputItensDinamicos2": inputItensDinamicos2,
			"inputItensDinamicos3": inputItensDinamicos3,
			"inputItensDinamicos4": inputItensDinamicos4,
			"inputItensDinamicos5": inputItensDinamicos5
		},
		dataType: "json",
		success: function(retornado){
			alert(retornado);
		}
	});
}
function cadastroMSGSprontas(){
	$(document).on('click', '#btCadastrarMSGpronta', function(){		
		var mensagemParaCadastro = $("#mensagemParaCadastro").val();
		var assuntoMSGpronta = $("#assuntoMSGpronta").val();
		var criadaPor = $("#criadaPor").val();
		var inputItensDinamicos1 = "";var inputItensDinamicos2 = "";
		var inputItensDinamicos3 = "";var inputItensDinamicos4 = "";
		var inputItensDinamicos5 = "";
		if($("#inputItensDinamicos1").val()){
			var inputItensDinamicos1 = $("#inputItensDinamicos1").val();		
			if($("#inputItensDinamicos2").val()){
				var inputItensDinamicos2 = $("#inputItensDinamicos2").val();				
				if($("#inputItensDinamicos3").val()){
					var inputItensDinamicos3 = $("#inputItensDinamicos3").val();					
					if($("#inputItensDinamicos4").val()){
						var inputItensDinamicos4 = $("#inputItensDinamicos4").val();						
						if($("#inputItensDinamicos5").val()){
							var inputItensDinamicos5 = $("#inputItensDinamicos5").val();							
						}
					}
				}
			}
		}
		enviaCadastroMSGSprontasDB(mensagemParaCadastro, assuntoMSGpronta, criadaPor, inputItensDinamicos1, inputItensDinamicos2, inputItensDinamicos3, inputItensDinamicos4, inputItensDinamicos5);
	});	
	$(document).on('click', '#btmostracadprontas', function(){
		$("#linhaCadastromsgsprontas").toggle();
	});
	$(document).on('click', '#btVerMSGpronta', function(){
		var mensagemParaCadastro = $("#mensagemParaCadastro").val();
		var assuntoMSGpronta = $("#assuntoMSGpronta").val();		
		var criadaPor = $("#criadaPor").val();
		var mensagemParaVisualizar = mensagemParaCadastro;
		if($("#inputItensDinamicos1").val()){
			var inputItensDinamicos1 = $("#inputItensDinamicos1").val();
			mensagemParaVisualizar = mensagemParaCadastro.replace("#1", "{"+inputItensDinamicos1+"}");
			for(var conta=0; conta<4;conta++){mensagemParaVisualizar = mensagemParaVisualizar.replace("#1", "{"+inputItensDinamicos1+"}");}			
			if($("#inputItensDinamicos2").val()){
				var inputItensDinamicos2 = $("#inputItensDinamicos2").val();
				for(var conta=0; conta<4;conta++){mensagemParaVisualizar = mensagemParaVisualizar.replace("#2", "{"+inputItensDinamicos2+"}");}
				if($("#inputItensDinamicos3").val()){
					var inputItensDinamicos3 = $("#inputItensDinamicos3").val();
					for(var conta=0; conta<4;conta++){mensagemParaVisualizar = mensagemParaVisualizar.replace("#3", "{"+inputItensDinamicos3+"}");}
					if($("#inputItensDinamicos4").val()){
						var inputItensDinamicos4 = $("#inputItensDinamicos4").val();
						for(var conta=0; conta<4;conta++){mensagemParaVisualizar = mensagemParaVisualizar.replace("#4", "{"+inputItensDinamicos4+"}");}
						if($("#inputItensDinamicos5").val()){
							var inputItensDinamicos5 = $("#inputItensDinamicos5").val();
							for(var conta=0; conta<4;conta++){mensagemParaVisualizar = mensagemParaVisualizar.replace("#5", "{"+inputItensDinamicos5+"}");}
						}
					}
				}
			}												
		}else{
			alert("Deseja cadastrar sem Dinâmicos?");
		}
		$("#visualizandoMSGS").html(
			"<div class='border border-success m-3'>"+					
				"<p>Assunto: "+assuntoMSGpronta+"</p>"+
				"<p>"+mensagemParaVisualizar+"</p>"+
				"<p>Criada por: "+criadaPor+"</p>"+
			"</div>"
		);
	});
	$(document).on('click', '.btsFechaDinamicos', function(){
		var valorItemDinamico = $(this).val();
		$("#linha"+valorItemDinamico+"itensDinamicos").remove();		
		contaDinamicos--;
		switch(contaDinamicos){
			case 1:
				$("#fechaDinamico1").css("display", "block");
			break;case 2:
				$("#fechaDinamico2").css("display", "block");
			break;case 3:
				$("#fechaDinamico3").css("display", "block");				
			break;case 4:
				$("#fechaDinamico4").css("display", "block");
			break;case 5:
				$("#fechaDinamico5").css("display", "block");				
			break;
		}			
	});
	$(document).on('click', '#btAddDinamicos', function(){		
		if(contaDinamicos <5){			
			contaDinamicos++;
			$("#itensDinamicos").prepend(
				"<li class='border border-success mt-2' id='linha"+contaDinamicos+"itensDinamicos'>"+
					"<input type='text' name='' placeholder='Para Usar No Texto Digite: #"+contaDinamicos+"' class='form-control' id='inputItensDinamicos"+contaDinamicos+"'/>"+
					"<button type='button' id='fechaDinamico"+contaDinamicos+"' value='"+contaDinamicos+"' class='form-control btn btn-danger btsFechaDinamicos'>"+contaDinamicos+" ( X )</button>"+
				"</li>"
			);	
			switch(contaDinamicos){				
				case 2:
					$("#fechaDinamico1").css("display", "none");
				break;case 3:
					$("#fechaDinamico1").css("display", "none");
					$("#fechaDinamico2").css("display", "none");
				break;case 4:
					$("#fechaDinamico1").css("display", "none");
					$("#fechaDinamico2").css("display", "none");
					$("#fechaDinamico3").css("display", "none");
				break;case 5:
					$("#fechaDinamico1").css("display", "none");
					$("#fechaDinamico2").css("display", "none");
					$("#fechaDinamico3").css("display", "none");
					$("#fechaDinamico4").css("display", "none");
				break;
			}
		}else{
			alert("O Limite de Dinâmicos foi atingido!");
		}
		
	});	
}

// function chamaAtualizacao(){
// 	var funcaoTimersts = setInterval(function(){
// 		atualizatudo();
// 	}, 1000);		
// }

function carregar(){	
	location.reload();
};