<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha - NexusEvent</title>
    <style>
        /* Padronização */
        body, html { margin: 0; padding: 0; width: 100%; height: 100%; overflow: hidden; font-family: 'Segoe UI', sans-serif; background-color: #0d111a; }
        #particles-js { position: absolute; width: 100%; height: 100%; z-index: 1; }
        .wrapper { position: relative; z-index: 10; display: flex; justify-content: center; align-items: center; height: 100%; }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: 20px;
            padding: 40px;
            width: 350px;
            text-align: center;
        }

        h2 { color: white; font-weight: 300; margin-bottom: 10px; }
        h2 strong { color: #a855f7; }
        p.subtitle { color: rgba(255,255,255,0.5); font-size: 0.9rem; margin-bottom: 30px; }

        input {
            width: 100%;
            padding: 14px;
            background: rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            color: white;
            box-sizing: border-box;
            transition: 0.3s ease;
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
            margin-top: 20px;
            transition: 0.3s;
        }

        button:hover { background: #9333ea; }

        .back-link { margin-top: 25px; }
        .back-link a { color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.85rem; transition: 0.3s; }
        .back-link a:hover { color: #a855f7; }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="wrapper">
        <div class="glass-card">
            <h2>Recuperar <strong>Acesso</strong></h2>
            <p class="subtitle">Insira seu e-mail para validarmos sua identidade.</p>
            
            <form action="processa_recuperacao.php" method="POST">
                <input type="email" name="email" placeholder="E-mail de acesso" required>
                <button type="submit">DISPARAR E-MAIL</button>
            </form>

            <div class="back-link">
                <a href="logar.php">← Voltar para o Login</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        /* Mesma configuração minimalista */
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 60 },
                "color": { "value": "#a855f7" },
                "opacity": { "value": 0.3 },
                "size": { "value": 2 },
                "line_linked": { "enable": true, "distance": 150, "color": "#a855f7", "opacity": 0.2, "width": 1 },
                "move": { "enable": true, "speed": 1.2 }
            }
        });
    </script>
</body>
</html>