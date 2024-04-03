<?php

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

    // Method untuk mencetak informasi tentang buku
    public function printBookInfo() {
        echo "Judul: {$this->getTitle()}\n";
        echo "Penulis: {$this->getAuthor()}\n";
        echo "Tahun Terbit: {$this->getYear()}\n";
        echo "Status Pinjam: " . ($this->isBorrowed() ? "Dipinjam" : "Tersedia") . "\n";
        echo "\n";
    }
}

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

// Definisikan kelas Library
class Library {
    // Properti dan metode statis untuk mengelola perpustakaan
    private static $books = array();

    public static function addBook($book) {
        self::$books[] = $book;
        echo "Buku '{$book->getTitle()}' berhasil ditambahkan ke dalam perpustakaan.\n";
        echo str_repeat("-", 60) . "\n";
    }

    // Method untuk mencetak informasi tentang semua buku dalam perpustakaan
    public function printAllBooksInfo() {
        foreach (self::$books as $book) {
            // Polimorfisme: memanggil metode printBookInfo pada setiap objek tanpa peduli dengan jenis bukunya
            $book->printBookInfo();
        }
    }

    // Method untuk meminjam buku dari perpustakaan
    public function borrowBook($bookTitle) {
        $found = false;
        foreach (self::$books as $book) {
            if ($book->getTitle() == $bookTitle) {
                $book->borrowBook();
                $found = true;
                break;
            }
        }
        if (!$found) {
            echo "Buku dengan judul '{$bookTitle}' tidak ditemukan dalam perpustakaan atau sudah dipinjam.\n";
        }
    }

    // Method untuk mengembalikan buku ke perpustakaan
    public function returnBook($bookTitle) {
        $found = false;
        foreach (self::$books as $book) {
            if ($book->getTitle() == $bookTitle) {
                $book->returnBook();
                $found = true;
                break;
            }
        }
        if (!$found) {
            echo "Buku dengan judul '{$bookTitle}' tidak ditemukan dalam perpustakaan atau sudah dipinjam.\n";
        }
    }

    // Method untuk mencetak daftar buku yang tersedia dalam perpustakaan
    public function printAvailableBooks() {
        echo str_pad("Selamat Datang di Perpustakaan MEI", 60, " ", STR_PAD_BOTH) . "\n";
        echo str_repeat("-", 60) . "\n";
        echo str_repeat("-", 60) . "\n";
        foreach (self::$books as $book) {
            if (!$book->isBorrowed()) {
                echo "- {$book->getTitle()}\n";
            }
        }
        echo str_repeat("-", 60) . "\n";
        echo str_repeat("-", 60) . "\n";
    }
}

// Contoh penggunaan sistem perpustakaan
$library = new Library();

// Menambahkan beberapa buku ke perpustakaan
$book1 = new Book("Pemrograman PHP", "John Doe", 2020);
$book2 = new Book("Dasar-Dasar Algoritma", "Jane Smith", 2018);
$book3 = new Book("HTML & CSS: Design and Build Websites", "Jon Duckett", 2011);
$book4 = new Book("JavaScript and JQuery: Interactive Front-End Web Development", "Jon Duckett", 2014);
$book5 = new Book("Learning PHP, MySQL & JavaScript", "Robin Nixon", 2018);
$book6 = new Book("Node.js Design Patterns", "Mario Casciaro", 2014);
$book7 = new Book("Vue.js: Up and Running", "Callum Macrae", 2018);

// Menambahkan judul selamat datang
echo str_pad("Selamat Datang di Perpustakaan MEI", 60, " ", STR_PAD_BOTH) . "\n";
echo str_repeat("-", 60) . "\n";
echo str_repeat("-", 60) . "\n";

$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);
$library->addBook($book4);
$library->addBook($book5);
$library->addBook($book6);
$library->addBook($book7);

// Mencetak informasi tentang semua buku dalam perpustakaan
$library->printAllBooksInfo();

// Meminjam buku dari perpustakaan
$library->borrowBook("Pemrograman PHP");
$library->borrowBook("Dasar-Dasar Algoritma");

// Mengembalikan buku ke perpustakaan
$library->returnBook("Pemrograman PHP");

// Mencetak kembali daftar buku yang tersedia dalam perpustakaan
echo "-----------------------------------------------------------------------\n";
$library->printAvailableBooks();
?>
