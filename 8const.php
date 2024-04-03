<?php
class Book {
    private $title;
    private $author;
    private $year;
    private $isBorrowed; // Konstanta untuk menandai status pinjam buku

    // Konstruktor untuk inisialisasi atribut
    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->isBorrowed = false; // Saat buku baru ditambahkan, status pinjam akan diatur sebagai false
    }

    // Getter untuk mendapatkan status pinjam buku
    public function isBorrowed() {
        return $this->isBorrowed;
    }

    // Method untuk meminjam buku
    public function borrowBook() {
        if ($this->isBorrowed) {
            echo "Buku '{$this->getTitle()}' sudah dipinjam.\n";
        } else {
            $this->isBorrowed = true;
            echo "Buku '{$this->getTitle()}' berhasil dipinjam.\n";
        }
    }

    // Method untuk mengembalikan buku
    public function returnBook() {
        if ($this->isBorrowed) {
            $this->isBorrowed = false;
            echo "Buku '{$this->getTitle()}' berhasil dikembalikan.\n";
        } else {
            echo "Buku '{$this->getTitle()}' belum dipinjam.\n";
        }
    }
}

?>