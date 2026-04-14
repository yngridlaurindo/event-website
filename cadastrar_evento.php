<?php
include('config.php');
session_start();

// Segurança: Só entra se for organizador
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'organizador') {
    header("Location: index.php");
    exit;
}

// Lógica para gerar ID Único automaticamente (Ex: NEXUS-1234)
$codigo_sugerido = "NEX-" . strtoupper(substr(uniqid(), -4));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Evento - NexusEvent</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Base do Design que aprovamos */
        body {
            background-color: #0f121d;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: white;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(168, 85, 247, 0.4); /* Seu roxo neon */
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.2);
        }

        h2 { text-align: center; color: #a855f7; margin-bottom: 30px; }

        .form-group { margin-bottom: 15px; }
        
        label { display: block; margin-bottom: 5px; font-size: 0.9rem; color: rgba(255,255,255,0.7); }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            background: rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 8px;
            color: white;
            box-sizing: border-box;
        }

        .btn-submit {
            background: #a855f7;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: 0.3s;
        }

        .btn-submit:hover { background: #9333ea; transform: scale(1.02); }

        /* Estilo para o link Início alinhado como fizemos antes */
        .btn-home {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            color: rgba(255,255,255,0.5);
            font-size: 0.9rem;
            margin-top: 20px;
            transition: 0.3s;
        }
        .btn-home:hover { color: #a855f7; }
        .btn-home i { line-height: 0; }
    </style>
</head>
<body>

<div class="glass-card">
    <h2><i class="fas fa-calendar-plus"></i> Novo Evento</h2>
    
    <form action="processa_evento.php" method="POST">
        <div class="form-group">
            <label>Código do Evento (ID Único)</label>
            <input type="text" name="codigo_evento" value="<?php echo $codigo_sugerido; ?>" readonly style="color: #a855f7; font-weight: bold;">
        </div>

        <div class="form-group">
            <label>Nome da Disciplina</label>
            <input type="text" name="disciplina" placeholder="Ex: Sistemas Operacionais" required>
        </div>

        <div class="form-group">
            <label>Nome do Professor</label>
            <input type="text" name="professor" required>
        </div>

        <div style="display: flex; gap: 10px;">
            <div class="form-group" style="flex: 1;">
                <label>Data</label>
                <input type="date" name="data_evento" required>
            </div>
            <div class="form-group" style="flex: 1;">
                <label>Hora</label>
                <input type="time" name="hora_evento" required>
            </div>
        </div>

        <div class="form-group">
            <label>Localização / Link</label>
            <input type="text" name="localizacao" placeholder="Sala 302 ou Link Meet">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao" rows="3"></textarea>
        </div>

        <button type="submit" class="btn-submit">CRIAR EVENTO</button>
    </form>

    <a href="painel_organizador.php" class="btn-home">
        <i class="fas fa-home"></i> Início
    </a>
</div>

</body>
</html>