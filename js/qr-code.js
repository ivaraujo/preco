var element = document.querySelector('.modal');

function capturar(){    
    element.classList.add('showModal');
    quagga();
}


function fecharModal(){
    element.classList.remove('showModal');
    var InputFocus = document.querySelector("[id='barcode']");    
    InputFocus.focus();    
}

function mudarFocus(){
    var PrecoFocus = document.querySelector("[id='preco']");
    PrecoFocus.focus();
}

function botaoFechar(){
    fecharModal();    
    window.location.reload();
    
}

function scanFechar(){
    Quagga.stop();
}

function quagga(){
    Quagga.init({
        inputStream : {
            name : "Live",
            type : "LiveStream",
            constraints: {
                width: 350,
                height: 350,
                //facingMode: "environment"
            },
            area: { // defines rectangle of the detection/localization area
                top: "0%",    // top offset
                right: "0%",  // right offset
                left: "0%",   // left offset
                bottom: "0%"  // bottom offset
            },
            singleChannel: true, // true: only the red color-channel is read
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
            let res = document.querySelector("[id='barcode']").value = data.codeResult.code;
            fecharModal();
            console.log(res);     
        });
}


