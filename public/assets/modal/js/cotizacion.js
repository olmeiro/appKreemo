function valor_total()
{
    var cantidad = document.getElementById('MetrosCubicos').value;
    var valor = document.getElementById('ValorMetro').value;
    document.getElementById('AIU').value= (cantidad*valor)*(0.05);
    document.getElementById('Subtotal').value= (cantidad*valor);
    document.getElementById('IvaAIU').value= ((cantidad*valor)*(0.05))*(0.19);
    document.getElementById('ValorTotal').value= ((cantidad*valor)*(0.05))*(0.19)+(cantidad*valor);
}

$(document).ready(function(){

    $(".solo_numeros").on("keyup",function(){
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    $(".solo_letras").on("keyup",function(){
        this.value = this.value.replace(/[0-9]/g,'');
    });
});
