<?php
class Comment {
    private $commentsDir = 'data/comments/'; // Diretório para armazenar comentários

    // Construtor para garantir que o diretório de comentários exista
    public function __construct() {
        if (!is_dir($this->commentsDir)) {
            mkdir($this->commentsDir, 0777, true);
        }
    }

    // Adicionar um comentário associado a um identificador (imagem ou texto)
    public function addComment($id, $comment) {
        $file = $this->commentsDir . $id . '.txt';
        file_put_contents($file, $comment . PHP_EOL, FILE_APPEND);
        return "Comentário adicionado com sucesso.";
    }

    // Obter todos os comentários para um determinado identificador (imagem ou texto)
    public function getComments($id) {
        $file = $this->commentsDir . $id . '.txt';
        if (file_exists($file)) {
            return file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        }
        return [];
    }

    // Obter todos os comentários (de todos os arquivos)
    public function getAllComments() {
        $allComments = [];
        foreach (glob($this->commentsDir . '*.txt') as $file) {
            $comments = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $allComments = array_merge($allComments, $comments);
        }
        return $allComments;
    }
}
?>
