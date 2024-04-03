<?php
// Konstruktor untuk inisialisasi atribut
public function __construct($title, $author, $year) {
    $this->title = $title;
    $this->author = $author;
    $this->year = $year;
    $this->isBorrowed = false; // Saat buku baru ditambahkan, status pinjam akan diatur sebagai false
}

?>
