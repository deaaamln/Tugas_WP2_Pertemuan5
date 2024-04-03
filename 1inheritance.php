<?php
// Definisikan kelas Ebook yang mewarisi kelas Book
class Ebook extends Book {
    // Properti tambahan untuk format ebook
    private $format;

    // Konstruktor untuk inisialisasi atribut
    public function __construct($title, $author, $year, $format) {
        // Memanggil konstruktor kelas induk
        parent::__construct($title, $author, $year);
        $this->format = $format;
    }

    // Override method printBookInfo dari kelas Book
    public function printBookInfo() {
        // Memanggil method printBookInfo dari kelas induk
        parent::printBookInfo();
        echo "Format: {$this->format}\n";
    }
}
?>
