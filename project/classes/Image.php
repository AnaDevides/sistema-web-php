<?php

class Image {
    private $uploadDir = 'uploads/';

    public function upload($file) {
        $target_file = $this->uploadDir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return "Imagem enviada com sucesso.";
        } else {
            return "Erro ao enviar imagem.";
        }
    }

    public function delete($filename) {
        $file = $this->uploadDir . $filename;
        if (file_exists($file)) {
            unlink($file);
            return "Imagem deletada com sucesso.";
        } else {
            return "Imagem não encontrada.";
        }
    }

    public function getAllImages() {
        return array_diff(scandir($this->uploadDir), array('.', '..'));
    }
}
?>
