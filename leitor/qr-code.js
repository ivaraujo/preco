
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
        let resultado = document.querySelector('div#resultado')
        resultado.innerHTML = `Código: ${data.codeResult.code}`;
        //let res = data.codeResult.code;
        //window.alert(`Código: ${res}`)
    });



