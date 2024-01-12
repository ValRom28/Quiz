<?php
declare(strict_types=1);

namespace Classes\Data;

class ExtractJson {
    protected $fileName;

    public function __construct(string $fileName) {
        $this->fileName = $fileName;
    }
    
    public function getData(): array {
        $json = file_get_contents($this->fileName);
        $data = json_decode($json, true);
        return $data;
    }
}

?>