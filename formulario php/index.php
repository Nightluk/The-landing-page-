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
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active"><img src="imagem/controle.png" class="d-block w-100" alt="Controle"></div>
                                <div class="carousel-item"><img src="imagem/controle2.png" class="d-block w-100" alt="Controle"></div>
                                <div class="carousel-item"><img src="imagem/controle3.png" class="d-block w-100" alt="Controle"></div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3 class="text-center">Controle Xbox Wireless</h3>
                        <h1 class="preco text-center">R$ 348,00</h1>
                        <p>Eleve sua experiência de jogo com o Controle de Xbox Carbon, um acessório que
                            combina
                            design sofisticado, conforto excepcional e tecnologia de ponta. Com seu
                            acabamento
                            em
                            carbono, ele oferece um visual moderno e premium, perfeito para quem busca
                            estilo e
                            funcionalidade.</p>
                        <p class="alerta text-center small">Pagamento somente via Pix.</p>

                        <form action="result.php" method="POST" id="formCadastro">
                            <div id="msgErro" class="alert alert-danger d-none"></div>

                            <div class="mb-2">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">CPF</label>
                                <input type="text" class="form-control" name="campocpf" id="campocpf">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Telefone</label>
                                <input type="text" class="form-control" name="telefone" id="telefone">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Endereço</label>
                                <input type="text" class="form-control" name="endereco" id="endereco">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Mensagem</label>
                                <input type="text" class="form-control" name="mensagem" id="mensagem">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-3">Comprar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#campocpf").inputmask("999.999.999-99");
            $("#telefone").inputmask({
                mask: ["(99) 9999-9999", "(99) 99999-9999"],
                keepStatic: true
            });

            function TestaCPF(cpf) {
                let limpo = cpf.replace(/\D/g, '');
                if (limpo.length !== 11 || /^(\d)\1{10}$/.test(limpo)) return false;
                let soma = 0,
                    resto;
                for (let i = 1; i <= 9; i++) soma += parseInt(limpo[i - 1]) * (11 - i);
                resto = (soma * 10) % 11;
                if (resto === 10 || resto === 11) resto = 0;
                if (resto !== parseInt(limpo[9])) return false;
                soma = 0;
                for (let i = 1; i <= 10; i++) soma += parseInt(limpo[i - 1]) * (12 - i);
                resto = (soma * 10) % 11;
                if (resto === 10 || resto === 11) resto = 0;
                if (resto !== parseInt(limpo[10])) return false;
                return true;
            }

            $("#formCadastro").on("submit", function(e) {
                e.preventDefault(); 

                let nome = $("#nome").val().trim();
                let cpf = $("#campocpf").val().trim();
                let email = $("#email").val().trim();
                let telefone = $("#telefone").val().trim();
                let endereco = $("#endereco").val().trim();
                if (nome === "" || cpf === "" || email === "" || telefone === "" || endereco === "") {
                    $("#msgErro").text("Preencha todos os campos obrigatórios!").removeClass("d-none");
                    return;
                }
                if (!TestaCPF(cpf)) {
                    $("#msgErro").text("CPF inválido!").removeClass("d-none");
                    return;
                }
                $("#msgErro").addClass("d-none");
                this.submit(); // tive que reaprender as funções de mascara e validação porque meu codigo antigo tava errado, porém funcionava.
            });
        });
    </script>

</body>

</html>