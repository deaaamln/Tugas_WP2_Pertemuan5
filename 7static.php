<?php
// Definisikan kelas Library
class Library {
    // Properti dan metode statis untuk mengelola perpustakaan
    private static $books = array();

    public static function addBook($book) {
        self::$books[] = $book;
        echo "Buku '{$book->getTitle()}' berhasil ditambahkan ke dalam perpustakaan.\n";
        echo str_repeat("-", 60) . "\n";
    }
}

?>