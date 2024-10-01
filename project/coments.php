<?php
require_once 'classes/Comment.php';
$comment = new Comment();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentários</title>
</head>
<body>
    <h1>Comentários</h1>
    <form action="actions.php" method="POST">
        <textarea name="comentario" rows="4" required></textarea>
        <input type="hidden" name="action" value="addComment">
        <button type="submit">Comentar</button>
    </form>

    <h2>Comentários Recentes</h2>
    <?php
    $comentarios = $comment->getAllComments();
    foreach ($comentarios as $c) {
        echo "<p>$c</p>";
    }
    ?>
    <a href="index.php">Voltar</a>
</body>
</html>
