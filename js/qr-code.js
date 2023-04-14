function capturar(){
    var element = document.querySelector('.modal');
    element.classList.add('showModal');


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
        let contador = 0;
        Quagga.onDetected(function (data){
            //console.log(data);
            let res = document.querySelector("[id='barcode']").value = data.codeResult.code;

            contador++;
            console.log(contador);
            if (contador > 5){                
                fechar();
                contador = 0;
            }
            console.log(res);            
        });
        
}


function fechar(){
    Quagga.stop();
    var element = document.querySelector('.modal');
    element.classList.remove('showModal');
    var InputFocus = document.querySelector("[id='barcode']");
    InputFocus.focus();
}