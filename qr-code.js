//var _scannerIsRunning = false;
/*
function showModal(){
    var element = document.getElementById('modal');
    element.classList.add('show-modal');
}

function camera(){
        if (_scannerIsRunning) {
            Quagga.stop();
        } else {
            capturar();
        }
}*/


function capturar(){
    Quagga.init({
        inputStream : {
            name : "Live",
            type : "LiveStream",
            target: document.querySelector('#camera')    // Or '#yourElement' (optional)
        },
        decoder : {
            readers : ["ean_reader"]
        }
        
        }, function(err) {
            if (err) {
                console.log(err);
                return
            }
            console.log("Inicialização finalizada. Pronto para começar!");
            Quagga.start();            
        });
    
        Quagga.onDetected(function (data){
            console.log(data);
            let res = document.querySelector("[id='barcode']").value = data.codeResult.code;            
        });
        
}

/*
function showModal(){
    var element = document.querySelector('.modal');
    element.classList.add('show-modal');
    //capturar();


}*/


