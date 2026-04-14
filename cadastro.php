<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta - NexusEvent</title>
    <style>
        /* Reset e Fundo Padronizado */
        body, html { margin: 0; padding: 0; width: 100%; height: 100%; overflow: hidden; font-family: 'Segoe UI', sans-serif; background-color: #0d111a; }
        #particles-js { position: absolute; width: 100%; height: 100%; z-index: 1; }
        .wrapper { position: relative; z-index: 10; display: flex; justify-content: center; align-items: center; height: 100%; }
        
        /* Card de Vidro Minimalista */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: 20px;
            padding: 30px 40px;
            width: 380px;
            text-align: center;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.6);
        }

        h2 { color: white; margin-bottom: 25px; font-weight: 300; }
        h2 strong { color: #a855f7; font-weight: 600; }

        .form-group { margin-bottom: 15px; text-align: left; }
        label { color: rgba(255,255,255,0.5); font-size: 0.8rem; margin-left: 5px; }

        /* Inputs com transição para roxo */
        input, select {
            width: 100%;
            padding: 12px;
            background: rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            color: white;
            box-sizing: border-box;
            transition: 0.3s ease;
            margin-top: 5px;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #a855f7;
            background: rgba(168, 85, 247, 0.05);
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.2);
        }

        select option { background: #1a1a1a; color: white; }

        button {
            width: 100%;
            padding: 15px;
            background: #a855f7;
            border: none;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.3s;
        }

        button:hover { background: #9333ea; transform: translateY(-2px); }

        /* Links com a linha divisória */
        .divider { height: 1px; background: rgba(255, 255, 255, 0.1); margin: 15px 0; }
        .back-link { font-size: 0.85rem; color: rgba(255,255,255,0.5); }
        .back-link a { color: white; text-decoration: none; font-weight: 600; }
        .back-link a:hover { color: #a855f7; }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="wrapper">
        <div class="glass-card">
            <h2>Criar <strong>Nova Conta</strong></h2>
            <form action="registrar.php" method="POST">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" placeholder="Seu nome" required>
                </div>
                <div class="form-group">
                    <label>E-mail Acadêmico</label>
                    <input type="email" name="email" placeholder="seu@email.com" required>
                </div>
                <div class="form-group">
                    <label>Crie uma Senha</label>
                    <input type="password" name="senha" placeholder="••••••••" required>
                </div>
                <div class="form-group">
                    <label>Você é:</label>
                    <select name="perfil">
                        <option value="participante">Participante (Aluno)</option>
                        <option value="organizador">Organizador (Professor/Líder)</option>
                    </select>
                </div>
                <button type="submit">FINALIZAR CADASTRO</button>
            </form>
            <div class="divider"></div>
            <div class="back-link">
                <p>Já tem uma conta? <a href="logar.php">Faça Login</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        /* Configuração de Partículas Minimalistas */
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 70, "density": { "enable": true, "value_area": 800 } },
                "color": { "value": "#a855f7" },
                "shape": { "type": "circle" },
                "opacity": { "value": 0.3 },
                "size": { "value": 2, "random": true },
                "line_linked": { "enable": true, "distance": 150, "color": "#a855f7", "opacity": 0.2, "width": 1 },
                "move": { "enable": true, "speed": 1.5 }
            },
            "interactivity": { "events": { "onhover": { "enable": true, "mode": "grab" } } },
            "retina_detect": true
        });
    </script>
</body>
</html>