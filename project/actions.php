<?php

require_once 'classes/Image.php';
require_once 'classes/Text.php';
require_once 'classes/Comment.php';

$image = new Image();
$text = new Text();
$comment = new Comment();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // Upload de Imagem
    if ($action === 'uploadImage') {
        echo $image->upload($_FILES['imagem']);
    }

    // Adicionar Texto
    if ($action === 'addText') {
        echo $text->addText($_POST['texto']);
    }

    // Adicionar Comentário
    if ($action === 'addComment') {
        $id = $_POST['id']; // Identificador da imagem ou texto
        $comentario = $_POST['comentario'];
        echo $comment->addComment($id, $comentario);
    }

    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'];

    // Deletar Imagem
    if ($action === 'deleteImage') {
        echo $image->delete($_GET['file']);
    }

    // Deletar Texto
    if ($action === 'deleteText') {
        echo $text->deleteText($_GET['text']);
    }

    header('Location: index.php');
    exit();
}
?>
