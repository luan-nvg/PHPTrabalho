function getCities(){

	if($("#comboEstado").val() != "-1"){
		$("#comboCidade").empty();
		$("#comboCidade").append("<option value='-1' >Carregando...</option>");
		
	//alert($("#comboEstado").val());
	$.ajax({
 	 url: "./cidades.php",
  	data: {id:$("#comboEstado").val()},
 	success: function(pData, pStatus, pJqXHR ) {
 	 	$("#comboCidade").empty();
		$("#comboCidade").append("<option value='-1' >Selecione a cidade</option>");
 	 		for (i = 0; i < pData.length; i++) {
 			var option = $("<option />");
 			option.attr("value",pData[i].id);
 			option.text(pData[i].nome); 
 			$("#comboCidade").append(option);
 			//alert(pData[i].nome);	
 	 		};
 	 },
 	 dataType: "json"
});
}
}