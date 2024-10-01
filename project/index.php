<?php
require_once 'classes/Image.php';
require_once 'classes/Text.php';
require_once 'classes/Comment.php';

$image = new Image();
$text = new Text();
$comment = new Comment();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Imagens e Textos com Comentários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="titles-container">
            <h1>Imagens e Textos Cadastrados</h1>
        </div>
        <div class="images-section">
            <?php
            $imagens = $image->getAllImages();
            foreach ($imagens as $img) {
                $shareUrl = urlencode("http://seusite.com/uploads/$img");

                echo "<div class='item-list'><img src='uploads/$img' alt='Imagem'><br>";
                echo "<a href='actions.php?action=deleteImage&file=$img'>Deletar</a><br>";
                echo "<a href='https://api.whatsapp.com/send?text=$shareUrl' target='_blank'>Compartilhar no WhatsApp</a> | ";
                echo "<a href='https://www.facebook.com/sharer/sharer.php?u=$shareUrl' target='_blank'>Compartilhar no Facebook</a> | ";
                echo "<a href='https://twitter.com/share?url=$shareUrl' target='_blank'>Compartilhar no Twitter</a>";
            
                echo "<h3>Comentários:</h3>";
                $imageComments = $comment->getComments($img);
                foreach ($imageComments as $c) {
                    echo "<p>$c</p>";
                }

                echo "<form action='actions.php' method='POST'>
                        <textarea name='comentario' rows='2' required></textarea>
                        <input type='hidden' name='action' value='addComment'>
                        <input type='hidden' name='id' value='$img'>
                        <button type='submit'>Comentar</button>
                      </form>";
                echo "</div>";
            }
            ?>
        </div>

        <div class="texts-section">
            <?php
            $textos = $text->getAllTexts();
            foreach ($textos as $t) {
                $encodedText = urlencode($t);

                echo "<div class='item-list'><p>$t</p>";
                echo "<a href='actions.php?action=deleteText&text=$t'>Deletar</a><br>";
                // Link para compartilhar
                echo "<a href='https://api.whatsapp.com/send?text=$encodedText' target='_blank'>Compartilhar no WhatsApp</a> | ";
                echo "<a href='https://www.facebook.com/sharer/sharer.php?u=$encodedText' target='_blank'>Compartilhar no Facebook</a> | ";
                echo "<a href='https://twitter.com/share?url=$encodedText' target='_blank'>Compartilhar no Twitter</a>";

                echo "<h3>Comentários:</h3>";
                $textComments = $comment->getComments(md5($t)); 
                foreach ($textComments as $c) {
                    echo "<p>$c</p>";
                }

                echo "<form action='actions.php' method='POST'>
                        <textarea name='comentario' rows='2' required></textarea>
                        <input type='hidden' name='action' value='addComment'>
                        <input type='hidden' name='id' value='" . md5($t) . "'>
                        <button type='submit'>Comentar</button>
                      </form>";
                echo "</div>";
            }
            ?>
        </div>
        <a href="cadastro.php" class="button">Adicionar Imagem ou Texto</a>
    </div>
</body>
</html>
