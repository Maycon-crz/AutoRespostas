$(document).ready(function(){
	prontas();
});

function prontas(){
	$(document).on('click', '#vermsgsprontas', function(){
		$("#linhaProntas").toggle();
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