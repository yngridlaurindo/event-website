<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Busca o usuário pelo e-mail
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch();

    // Verifica se o usuário existe e se a senha bate com a criptografia
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id_usuario'];
        $_SESSION['nome'] = $usuario['nome_completo'];
        $_SESSION['perfil'] = $usuario['perfil'];

        // Redireciona conforme o cargo
        if ($usuario['perfil'] == 'organizador') {
            header("Location: painel_organizador.php");
        } else {
            header("Location: painel_participante.php");
        }
        exit;
    } else {
        echo "<script>alert('E-mail ou senha incorretos!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - NexusEvent</title>
    <style>
        body, html { margin: 0; padding: 0; width: 100%; height: 100%; overflow: hidden; font-family: 'Segoe UI', sans-serif; background-color: #0d111a; }
        #particles-js { position: absolute; width: 100%; height: 100%; z-index: 1; }
        .wrapper { position: relative; z-index: 10; display: flex; justify-content: center; align-items: center; height: 100%; }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: 20px;
            padding: 40px;
            width: 380px;
            text-align: center;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.6);
        }

        h2 { color: white; margin-bottom: 30px; font-weight: 300; }
        h2 strong { color: #a855f7; font-weight: 600; }

        input {
            width: 100%;
            padding: 14px;
            background: rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            color: white;
            box-sizing: border-box;
            transition: 0.3s ease;
            margin-bottom: 15px;
        }

        input:focus {
            outline: none;
            border-color: #a855f7;
            background: rgba(168, 85, 247, 0.05);
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.2);
        }

        button {
            width: 100%;
            padding: 15px;
            background: #a855f7;
            border: none;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover { background: #9333ea; transform: translateY(-2px); }

        .extra-links { margin-top: 25px; font-size: 0.85rem; }
        .extra-links a { color: rgba(255, 255, 255, 0.6); text-decoration: none; transition: 0.3s; }
        .extra-links a:hover { color: #a855f7; }
        .divider { height: 1px; background: rgba(255, 255, 255, 0.1); margin: 15px 0; }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="wrapper">
        <div class="glass-card">
            <h2>Logar no <strong>NexusEvent</strong></h2>
            <form method="POST">
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">ENTRAR</button>
            </form>
            <div class="extra-links">
                <a href="esqueci_senha.php">Esqueceu sua senha?</a>
                <div class="divider"></div>
                <a href="cadastro.php" style="color: white; font-weight: 600;">Criar conta agora</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 70 },
                "color": { "value": "#a855f7" },
                "opacity": { "value": 0.3 },
                "size": { "value": 2 },
                "line_linked": { "enable": true, "distance": 150, "color": "#a855f7", "opacity": 0.2, "width": 1 },
                "move": { "enable": true, "speed": 1.5 }
            }
        });
    </script>
</body>
</html>