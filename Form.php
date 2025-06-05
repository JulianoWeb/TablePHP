<?php
$erro = "";
$sucesso = "";
$ip = $_SERVER['REMOTE_ADDR'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);

    if (empty($nome) || empty($email)) {
        $erro = "Preencha todos os campos!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "E-mail inválido!";
    } else {
        $sucesso = "Obrigado, $nome! Seu e-mail foi registrado com sucesso.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário com IP</title>
    <style>
        body { background: #111; color: #eee; font-family: monospace; text-align: center; padding-top: 40px; }
        input, button { padding: 10px; margin: 10px; border: none; border-radius: 5px; }
        .msg { margin-top: 20px; color: #0f0; }
        .erro { color: #f00; }
    </style>
</head>
<body>
    <h1>Formulário Simples</h1>
    <p>Seu IP: <strong><?= $ip ?></strong></p>

    <form method="post" action="">
        <input type="text" name="nome" placeholder="Seu nome"><br>
        <input type="email" name="email" placeholder="Seu e-mail"><br>
        <button type="submit">Enviar</button>
    </form>

    <?php if ($erro): ?>
        <p class="erro"><?= $erro ?></p>
    <?php endif; ?>

    <?php if ($sucesso): ?>
        <p class="msg"><?= $sucesso ?></p>
    <?php endif; ?>
</body>
</html>
