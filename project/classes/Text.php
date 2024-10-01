<?php

class Text {
    private $file = 'data/textos.txt';

    public function addText($text) {
        $text = trim($text); 
        file_put_contents($this->file, $text . PHP_EOL, FILE_APPEND); 
        return "Texto adicionado com sucesso.";
    }

    
    public function getAllTexts() {
        if (file_exists($this->file)) {
            return array_map('trim', file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
        }
        return [];
    }

    public function deleteText($text) {
        $textos = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        
        $textos = array_filter($textos, function($line) use ($text) {
            return trim($line) !== trim($text); 
        });


        file_put_contents($this->file, implode(PHP_EOL, $textos) . PHP_EOL);
        return "Texto deletado com sucesso.";
    }
}
?>

