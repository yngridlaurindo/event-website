<?php
session_start();
include('config.php');

// Proteção: Se não estiver logado ou não for organizador, volta para o login
if (!isset($_SESSION['usuario_id']) || $_SESSION['perfil'] != 'organizador') {
    header("Location: logar.php");
    exit;
}

$nome_usuario = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Organizador - NexusEvent</title>
    <style>
        /* Padronização NexusEvent */
        body, html { margin: 0; padding: 0; width: 100%; min-height: 100vh; font-family: 'Segoe UI', sans-serif; background-color: #0d111a; color: white; }
        #particles-js { position: fixed; width: 100%; height: 100%; z-index: 1; }
        
        .container { position: relative; z-index: 10; padding: 40px; max-width: 1000px; margin: 0 auto; }
        
        /* Header e Saudação */
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
        .header h1 { font-weight: 300; }
        .header h1 strong { color: #a855f7; }
        
        .logout-btn { color: #ff4d4d; text-decoration: none; font-size: 0.9rem; border: 1px solid #ff4d4d; padding: 8px 15px; border-radius: 8px; transition: 0.3s; }
        .logout-btn:hover { background: #ff4d4d; color: white; }

        /* Card de Vidro para Ações e Tabelas */
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(168, 85, 247, 0.2);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .btn-primary {
            background: #a855f7;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary:hover { background: #9333ea; transform: translateY(-2px); }

        /* Tabela Estilizada */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { text-align: left; color: #a855f7; padding: 15px; border-bottom: 1px solid rgba(168, 85, 247, 0.3); }
        td { padding: 15px; border-bottom: 1px solid rgba(255, 255, 255, 0.05); }
        
        .status-badge { background: rgba(168, 85, 247, 0.2); color: #a855f7; padding: 5px 10px; border-radius: 5px; font-size: 0.8rem; }
    </style>
</head>
<body>
    <div id="particles-js"></div>

    <div class="container">
        <div class="header">
            <h1>Bem-vindo, <strong><?php echo htmlspecialchars($nome_usuario); ?></strong></h1>
            <a href="logout.php" class="logout-btn">Sair do Sistema</a>
        </div>

        <div class="glass-panel">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Seus Eventos</h2>
                <a href="criar_evento.php" class="btn-primary">+ Criar Novo Evento</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Evento</th>
                        <th>Data</th>
                        <th>Local</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Workshop de PHP Avançado</td>
                        <td>25/04/2026</td>
                        <td>Auditório A</td>
                        <td><span class="status-badge">Confirmado</span></td>
                        <td><a href="#" style="color: white; font-size: 0.8rem;">Gerenciar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        /* Configuração de Partículas Padronizada */
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 80 },
                "color": { "value": "#a855f7" },
                "opacity": { "value": 0.2 },
                "size": { "value": 2 },
                "line_linked": { "enable": true, "distance": 150, "color": "#a855f7", "opacity": 0.1 },
                "move": { "enable": true, "speed": 1 }
            }
        });
    </script>
</body>
</html>