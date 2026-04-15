<?php
$nome = $_POST["nome"];
$cpf = $_POST["campocpf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereco"];
$mensagem = $_POST["mensagem"];
?>
<html>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Formulário Xbox - Finalizar Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #ffe600;
        }

        .preco {
            color: green;
        }

        .alerta {
            color: red;
        }
        .recibo {
            background-color: whitesmoke;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="text-center center">
                        <h3>Resumo do Pedido</h3>
                        <hr>
                        <h1>🎉</h1> <!-- pra digitar emoji é o windows + . kkkkkk -->
                        <img src="imagem/controle.png" alt="Sucesso" class="mb-4" style="width: 150px;">
                        <p>Parabéns <?php echo $nome; ?>, seu pedido foi recebido com sucesso e chegará em até 3 dias úteis após a confirmação do pagamento!</p><br>    
                    </div>
                    <div class="recibo col-md-5 mx-auto rounded">
                        <h1></h1>
                        <h3> Detalhes do Pedido </h3>
                        <p>Nome do destinatário: <?php echo $nome; ?></p>
                        <p>CPF do destinatário: <?php echo $cpf; ?></p>
                        <p>Email para confirmação: <?php echo $email; ?></p>
                        <p>Telefone para contato: <?php echo $telefone; ?></p>
                        <p>Endereço que será enviado: <?php echo $endereco; ?></p>
                        <?php if (!empty($mensagem)) { ?>
                            <p>Mensagem: <?php echo $mensagem; ?></p>
                        <?php } ?>
                    </div>
                    <div class="text-center center">
                    <p>Uma cópia desse pedido será enviado ao email: <?php echo $email; ?></p>
                    <h3> QR Code para Pagamento via Pix </h3>
                    <p>Tempo de duração do QR code:<div id="timer"></div></p>
                    <img src="imagem/qrcode.png" alt="Sucesso" class="mb-4" style="width: 150px;">
                    </div>  
                </div>
            </div>  
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

<!-- achei esse contador nesse link: https://pt.stackoverflow.com/questions/293747/contador-regressivo-em-javascript -->
    <script> 
    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.textContent = minutes + ":" + seconds;
        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}
window.onload = function () {
    var duration = 60 * 5; 
        display = document.querySelector('#timer');
    startTimer(duration, display); 
};
</script>

</html>