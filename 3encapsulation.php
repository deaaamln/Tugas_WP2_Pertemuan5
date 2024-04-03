<?php
// Kelas dengan enkapsulasi
// Definisikan kelas Book
class Book {
    private $title;
    private $author;
    private $year;
    private $isBorrowed;

    // Konstruktor untuk inisialisasi atribut
    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->isBorrowed = false; // Saat buku baru ditambahkan, status pinjam akan diatur sebagai false
    }

    // Getter untuk mendapatkan judul buku
    public function getTitle() {
        return $this->title;
    }

    // Getter untuk mendapatkan penulis buku
    public function getAuthor() {
        return $this->author;
    }

    // Getter untuk mendapatkan tahun terbit buku
    public function getYear() {
        return $this->year;
    }

    // Getter untuk mendapatkan status pinjam buku
    public function isBorrowed() {
        return $this->isBorrowed;
    }
}
?>
