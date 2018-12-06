

function taxaEntrega(taxa)	{
	if (taxa == 0){
		total = parseFloat(document.getElementById("totalProdutos").value);
		document.getElementById("taxaExibida").innerHTML = formataPreco(taxa);
		document.getElementById("totalExibido").innerHTML = formataPreco(total);		
	}
	else{
		total = parseFloat(document.getElementById("totalProdutos").value) + parseFloat(taxa);
		document.getElementById("taxaExibida").innerHTML = formataPreco(taxa);
		document.getElementById("totalExibido").innerHTML = formataPreco(total);		
	}
}	

function formataPreco(valor){
	valor = parseFloat(valor);
	return valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
}

function compraRapida(idProduto, nomeProduto, quantidade, valorFinal) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(idProduto).classList.add("noCarrinho"); 
            document.getElementById(idProduto).innerHTML = "no carrinho!";
            document.getElementById("numItensCarrinho").innerHTML = "("+ this.responseText+")"; // 
        }
    };
    xhttp.open("GET", "ajax/compraRapida.php?id="+idProduto+"&nome="+nomeProduto+"&quantidade="+quantidade+"&valorFinal="+valorFinal, true);
    xhttp.send();
}

function atualizaQuantidade(idProduto, quantidade, valorFinal) {
    console.log("Entrei aquii");

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this.status);
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp.responseText);
            document.getElementById("preco"+idProduto).innerHTML = formataPreco(parseInt(quantidade) * parseFloat(valorFinal)); // atualiza valor do item
            document.getElementById("precoTotal").innerHTML = formataPreco(this.responseText);
            //document.getElementById("qtd"+idProduto).innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "ajax/atualizaQtde.php?id="+idProduto+"&quantidade="+quantidade, true);
    xhttp.send();
}
