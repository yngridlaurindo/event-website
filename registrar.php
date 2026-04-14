<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografia profissional
    $perfil = $_POST['perfil'];

    try {
        $sql = "INSERT INTO usuarios (nome_completo, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha,
            ':perfil' => $perfil
        ]);

        echo "<script>
                alert('Conta criada com sucesso! Redirecionando para o login...');
                window.location.href='logar.php';
              </script>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Erro de e-mail duplicado
            echo "<script>alert('Este e-mail já está cadastrado!'); window.history.back();</script>";
        } else {
            echo "Erro ao cadastrar: " . $e->getMessage();
        }
    }
}
?>