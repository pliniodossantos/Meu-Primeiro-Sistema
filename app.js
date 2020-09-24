var selec
function codAP() {
    selec = document.getElementById("apartamento").value
    if (selec == 'ap1') {
        document.getElementById('valordiaria').value = 155.77
    } else if (selec == 'ap2') {
        document.getElementById('valordiaria').value = 140.80
    }else if (selec == 'ap3') {
        document.getElementById('valordiaria').value = 120.70
    } else if (selec == 'ap4') {
        document.getElementById('valordiaria').value = 75,80
    }else if (selec == 'ap5') {
        document.getElementById('valordiaria').value = 280.40
    } else{
        document.getElementById('valordiaria').value = 0.00
    }   
}

function calcValorTotal(){
   var qtd = document.getElementById('qtddiarias').value
   document.getElementById('valortotal').value = document.getElementById('valordiaria').value * qtd
}

function onlyNumbers(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    } if (ch.length > 999) {
        ch -= '' 
    }
}