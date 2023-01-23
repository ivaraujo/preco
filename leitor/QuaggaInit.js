latromi.formManager.setOnFormCreatedCallback( function(args) {
	// Coloque o código "Quagga.init" aqui
    (function () {
        // Elemento que recebe o video
        var container = document.createElement('div');
        container.id = 'video-container';
        
        // Botão para encerrar
        var closeButton = document.createElement('button');
        closeButton.type = 'button';
        closeButton.innerHTML = 'Fechar';
        closeButton.className = 'close-button';
        closeButton.addEventListener('click', scannerEnd);
        container.appendChild(closeButton);
        
        document.body.appendChild(container);
    })();
    
    function scannerInit (initializedCallback) {
        
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#video-container')
            },
            locate: true,
            halfSample: true,
            decoder: {
                readers: ["code_128_reader"]
            }
        }, function (err) {
            if (err) {
                alert('Error: ' + err);
                return
            }
            Quagga.start();
            if (initializedCallback)
                initializedCallback();
        });
    };
    
    function scannerStart() {
        scannerInit(function() {
            document.getElementById('video-container').style.display = 'block';
        });
    }
    
    function scannerEnd() {
        Quagga.stop();
        document.getElementById('video-container').style.display = 'none';
    }
    
    Quagga.onDetected(function (data) {
       scannerEnd();
       var code = data.codeResult.code;
        if (code !== null && code !== undefined) 
            latromi.formManager.getFormInstance().setFieldValue('barCode', code);
    });
});