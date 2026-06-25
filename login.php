<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>24ª Campanha de Verão Muffatão</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        #video-background {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            object-fit: cover;
        }

        #video-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.4);
            z-index: -1;
        }

        #content-wrapper {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        #main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1200px;
            width: 100%;
        }

        #logo-section {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        #logo-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 350px;
            height: 350px;
        }

        #logo {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
            animation: bounceInEnhanced 1.5s ease-out;
        }

        @keyframes bounceInEnhanced {
            0% {
                opacity: 0;
                transform: scale(0.3) rotate(-30deg);
            }
            20% {
                transform: scale(1.2) rotate(10deg);
                opacity: 0.7;
            }
            40% {
                transform: scale(0.9) rotate(-5deg);
            }
            60% {
                transform: scale(1.05) rotate(3deg);
                opacity: 1;
            }
            80% {
                transform: scale(0.97) rotate(-2deg);
            }
            100% {
                transform: scale(1) rotate(0deg);
            }
        }

        #login-section {
            flex-grow: 1;
            display: flex;
            justify-content: center;
        }

        .card-blur {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-group {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .input-group input {
            width: calc(100% - 60px);
            padding: 12px 20px 12px 40px;
            border: none;
            border-radius: 50px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .input-group input:focus {
            outline: none;
            background-color: #fff;
        }
        
        .input-group .icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .input-group input::placeholder {
            color: #aaa;
        }

        #forgot-password {
            font-size: 14px;
            color: #666;
            text-decoration: none;
            margin-bottom: 25px;
            align-self: flex;
            transition: color 0.3s;
        }

        #forgot-password:hover {
            color: #444;
        }

        #login-button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 50px;
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        #login-button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        #support-links {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #support-links span {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        #support-links a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            font-size: 24px;
        }

        #support-links a i {
            transition: color 0.3s;
        }

        #support-links a:hover i {
            color: #007bff;
        }

        #footer {
            text-align: center;
            margin-top: 50px;
            color: #333;
            font-size: 16px;
            width: 100%;
        }

        #footer a {
            text-decoration: none;
            margin: 0 5px;
            font-size: 22px;
        }

        @media (max-width: 768px) {
            #main-container {
                flex-direction: column;
                gap: 30px;
            }
            .card-blur {
                padding: 30px;
            }
        }
    </style>
</head>

<body>
    <?php include "administrar/conexao.php";?>

    <video id="video-background" autoplay muted loop>
        <source src="videos/video_fundo_login.mp4" type="video/mp4">
    </video>

    <div id="video-overlay"></div>

    <div id="content-wrapper">
        <div id="main-container">
            <div id="logo-section">
                <div id="logo-container">
                    <img id="logo" src="images/logo.png" class="animate__animated animate__bounce">
                </div>
            </div>

            <div id="login-section">
                <div class="card-blur">
                    <div class="input-group">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="TxCPF" id="TxCPF" placeholder="Login">
                    </div>
                    <div class="input-group">
                        <span class="icon"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="TxSenha" id="TxSenha" placeholder="Senha de acesso">
                    </div>

                    <button id="login-button" onClick="Logar()">Entrar</button>

                    <div id="support-links">
                        <span>Dúvidas? Fale com nosso suporte:<a href="https://wa.me/554791574177" target="_blank"><i class="fab fa-whatsapp" style="color:#25D366;"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <a href="https://www.linkedin.com/company/muffat%C3%A3o-atacado-distribuidor/?viewAsMember=true" target="_blank" style="color: #0a66c2"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.youtube.com/@Muffat%C3%A3oAtacado" target="_blank" style="color: red"><i class="fab fa-youtube"></i></a>
            <p>© 2025 Pedro Muffatto. Todos os direitos reservados.</p>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function Logar() {
            var cpf = $('#TxCPF').val();
            var senha = $('#TxSenha').val();
            window.open('conecta.php?TxCPF=' + cpf + '&TxSenha=' + senha, "_self");
        }
    </script>
</body>
</html>