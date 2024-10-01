<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Imagens e Textos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar Imagem</h1>
        <form action="actions.php" method="POST" enctype="multipart/form-data">
            <label for="imagem">Selecione a Imagem:</label>
            <input type="file" name="imagem" required>
            <input type="hidden" name="action" value="uploadImage">
            <button type="submit">Enviar</button>
        </form>

        <h1>Cadastrar Texto</h1>
        <form action="actions.php" method="POST">
            <label for="texto">Insira o Texto:</label>
            <textarea name="texto" rows="4" required></textarea>
            <input type="hidden" name="action" value="addText">
            <button type="submit">Enviar</button>
        </form>

        <a href="index.php" class="button">Voltar</a>
    </div>

</body>
</html>

