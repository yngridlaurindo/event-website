<?php
include('config.php');
session_start();

// Verifica se o ID do evento foi enviado e se quem está logado é organizador
if (isset($_GET['id']) && $_SESSION['perfil'] == 'organizador') {
    $id_evento = $_GET['id'];
    $id_organizador = $_SESSION['usuario_id'];

    try {
        // Só exclui se o evento realmente pertencer a esse organizador (segurança)
        $sql = "DELETE FROM eventos WHERE id_evento = :id AND id_organizador = :id_org";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id_evento, ':id_org' => $id_organizador]);

        header("Location: painel_organizador.php?msg=excluido");
    } catch(PDOException $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
}
?>