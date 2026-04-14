<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexusEvent | Gestão Inteligente</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --bg-deep: #0f172a;
            --colab-color: #38bdf8; /* Azul */
            --part-color: #a855f7;  /* Roxo */
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: var(--bg-deep);
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .header-section { text-align: center; margin-bottom: 50px; }
        
        h1 {
            font-size: 3.5rem;
            margin: 0;
            background: linear-gradient(135deg, #818cf8 0%, #c084fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        .button-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            width: 100%;
            max-width: 900px;
        }

        /* Estrutura do Card com Borda 3D */
        .card-btn {
            background: #161b22;
            padding: 50px 30px;
            border-radius: 24px;
            text-decoration: none;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        /* A Borda Colorida (O efeito 3D que você pediu) */
        .card-btn::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 24px;
            padding: 2.5px; /* Espessura da borda */
            background: linear-gradient(135deg, var(--colab-color), transparent);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0.5;
            transition: opacity 0.3s;
        }

        .participante::before {
            background: linear-gradient(135deg, var(--part-color), transparent);
        }

        /* Efeito de Hover nas Bordas */
        .card-btn:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .card-btn:hover::before {
            opacity: 1;
            background: linear-gradient(135deg, var(--colab-color), #818cf8);
        }

        .participante:hover::before {
            background: linear-gradient(135deg, var(--part-color), #f472b6);
        }

        /* O brilho interno que segue o mouse */
        .glow-effect {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .participante .glow-effect {
            background: radial-gradient(circle, rgba(168, 85, 247, 0.2) 0%, transparent 70%);
        }

        .card-btn:hover .glow-effect { opacity: 1; }

        .icon-circle {
            width: 70px; height: 70px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.05);
            z-index: 2;
        }

        .btn-title { font-size: 1.5rem; font-weight: 700; color: white; z-index: 2; }
        .btn-desc { color: #94a3b8; margin-top: 15px; text-align: center; z-index: 2; font-size: 0.95rem; }
    </style>
</head>
<body>

    <div class="header-section">
        <h1>NexusEvent</h1>
        <p>Sincronizando ideais, gerenciando experiências.</p>
    </div>

    <div class="button-grid">
        <a href="logar.php" class="card-btn colaborador">
            <div class="glow-effect"></div>
            <div class="icon-circle">
                <i class="fas fa-briefcase" style="color: var(--colab-color);"></i>
            </div>
            <div class="btn-title">Área do Colaborador</div>
            <div class="btn-desc">Crie e monitore atividades em tempo real.</div>
        </a>

        <a href="painel_participante.php" class="card-btn participante">
            <div class="glow-effect"></div>
            <div class="icon-circle">
                <i class="fas fa-user-graduate" style="color: var(--part-color);"></i>
            </div>
            <div class="btn-title">Área do Participante</div>
            <div class="btn-desc">Acesse eventos e envie seus documentos.</div>
        </a>
    </div>

    <script>
        const cards = document.querySelectorAll('.card-btn');
        cards.forEach(card => {
            const glow = card.querySelector('.glow-effect');
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                glow.style.left = `${e.clientX - rect.left}px`;
                glow.style.top = `${e.clientY - rect.top}px`;
            });
        });
    </script>
</body>
</html>