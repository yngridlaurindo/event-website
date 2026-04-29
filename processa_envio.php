<?php
include('config.php');

$nome_aluno    = $_POST['nome_aluno'] ?? '';
$ra_aluno      = $_POST['ra_aluno'] ?? '';
$disciplina    = $_POST['disciplina'] ?? '';
$codigo_evento = $_POST['codigo_evento'] ?? '';

if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === 0) {
    $diretorio = "uploads/";
    
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    $nome_original = basename($_FILES['arquivo']['name']);
    $extensao = pathinfo($nome_original, PATHINFO_EXTENSION);
    $novo_nome = time() . "_" . uniqid() . "." . $extensao;
    $caminho_final = $diretorio . $novo_nome;

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho_final)) {
        
        try {
            
            $sql = "INSERT INTO envios (nome_aluno, ra, disciplina, codigo_evento, arquivo_path) 
                    VALUES (:nome, :ra, :disciplina, :codigo, :caminho)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome', $nome_aluno);
            $stmt->bindParam(':ra', $ra_aluno);
            $stmt->bindParam(':disciplina', $disciplina);
            $stmt->bindParam(':codigo', $codigo_evento);
            $stmt->bindParam(':caminho', $caminho_final);
            
            $stmt->execute();
            
            ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>NexusEvent | Sucesso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: #0f172a;
            color: white;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        
        .bg-glow {
            position: fixed;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 50%, rgba(168, 85, 247, 0.1) 0%, transparent 70%);
            z-index: 1;
        }
        .success-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            padding: 50px;
            border-radius: 24px;
            text-align: center;
            border: 2px solid #a855f7;
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.2);
            z-index: 2;
            max-width: 400px;
        }
        i { font-size: 4rem; color: #a855f7; margin-bottom: 20px; text-shadow: 0 0 15px rgba(168, 85, 247, 0.5); }
        h2 { font-size: 2rem; margin: 10px 0; background: linear-gradient(to right, #fff, #a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        p { color: #94a3b8; line-height: 1.6; }
        .btn-voltar {
            display: inline-block;
            margin-top: 30px;
            padding: 14px 40px;
            background: #a855f7;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-voltar:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(168, 85, 247, 0.4); }
    
.btn-group {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    margin-top: 25px;
}


.btn-home {
    background: transparent;
    color: rgba(255, 255, 255, 0.5); 
    text-decoration: none;
    font-size: 0.9rem;
    display: flex;
    align-items: center;    
    justify-content: center; 
    transition: 0.3s;
    width: 100%;            
}
.btn-home:hover {
    color: #a855f7; 
}

.btn-home i {
    font-size: 1rem !important; 
    margin-right: 8px;
    color: inherit;
}

.btn-group {
    display: flex;
    flex-direction: column;
    align-items: center; 
    justify-content: center;
    gap: 15px;
    margin-top: 25px;
    width: 100%;
}

.btn-home {
    background: transparent;
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
    font-size: 0.9rem;
    display: flex;       
    align-items: center; 
    justify-content: center; 
    transition: 0.3s;
}

.btn-home {
    background: transparent !important;
    color: rgba(255, 255, 255, 0.5) !important;
    text-decoration: none;
    font-size: 0.9rem;
    display: flex !important;
    align-items: center !important;    
    justify-content: center !important; 
    gap: 8px;                         
    width: 100%;
    margin-top: 15px;
}


.btn-home i {
    font-size: 1.1rem !important;
    margin: 0 !important;             
    display: inline-flex;
    align-items: center;
    line-height: 1;
}
    </style>
</head>
<body>
    <div class="bg-glow"></div>
    <div class="success-card">
        <i class="fas fa-check-double"></i>
        <h2>Envio Concluído!</h2>
        <p>Sua atividade de <strong><?php echo htmlspecialchars($disciplina); ?></strong> foi recebida com sucesso.</p>
        
        <div class="btn-group">
    <a href="painel_participante.php" class="btn-voltar">Novo Envio</a>
    
    <a href="index.php" class="btn-home">
        <i class="fas fa-home"></i> Início
    </a>
</div>
    </div>
</body>
</html>
<?php

        } catch (PDOException $e) {
            echo "Erro no banco de dados: " . $e->getMessage();
        }

    } else {
        echo "Erro ao mover o arquivo para a pasta.";
    }
} else {
    echo "Erro: Nenhum arquivo foi selecionado ou o envio falhou.";
}
?>
