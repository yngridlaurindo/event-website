<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Informações | NexusEvent</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --bg-dark: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --accent-purple: #a855f7;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: white;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
            position: relative;
        }

        /* O Fundo Interativo que segue o mouse */
        #interactive-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 50%, rgba(168, 85, 247, 0.15) 0%, transparent 50%);
            z-index: 1;
            pointer-events: none;
        }

        .container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }

        .form-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        h2 {
            text-align: center;
            font-size: 2rem;
            background: linear-gradient(to right, #fff, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #94a3b8;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid #334155;
            border-radius: 12px;
            color: white;
            box-sizing: border-box;
            transition: all 0.3s;
        }

        input:focus {
            outline: none;
            border-color: var(--accent-purple);
            box-shadow: 0 0 0 2px rgba(168, 85, 247, 0.2);
        }

        .btn-enviar {
            width: 100%;
            padding: 14px;
            background: var(--accent-purple);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s, background 0.3s;
            margin-top: 10px;
        }

        .btn-enviar:hover {
            background: #9333ea;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div id="interactive-bg"></div>

    <div class="container">
        <div class="form-card">
            <h2>Enviar Informações</h2>
            
           <form action="processa_envio.php" method="POST" enctype="multipart/form-data">
    <div class="input-group">
        <label>Nome Completo</label>
        <input type="text" name="nome_aluno" placeholder="Seu nome" required>
    </div>

    <div class="input-group">
        <label>RA (Registro Acadêmico)</label>
        <input type="text" name="ra_aluno" placeholder="Digite apenas os números do RA" pattern="[0-9]+" title="Apenas números são permitidos" required>
    </div>

    <div class="input-group">
        <label>Disciplina</label>
        <input type="text" name="disciplina" placeholder="Ex: Algoritmos" required>
    </div>

    <div class="input-group">
        <label>Selecione a Atividade (PDF, ZIP, etc)</label>
        <input type="file" name="arquivo" required>
    </div>

    <div class="input-group">
        <label>Código do Evento (Token)</label>
        <input type="text" name="codigo_evento" placeholder="Digite o token" required>
    </div>

    <button type="submit" class="btn-enviar">
        <i class="fas fa-paper-plane"></i> Enviar Agora
    </button>
</form>
        </div>
    </div>
    <script>
        const bg = document.getElementById('interactive-bg');
        
        document.addEventListener('mousemove', (e) => {
            const x = (e.clientX / window.innerWidth) * 100;
            const y = (e.clientY / window.innerHeight) * 100;
            
            // Move o centro do gradiente radial para seguir o mouse
            bg.style.background = `radial-gradient(circle at ${x}% ${y}%, rgba(168, 85, 247, 0.2) 0%, transparent 60%)`;
        });
    </script>

</body>
</html>