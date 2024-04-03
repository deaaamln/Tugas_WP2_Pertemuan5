<?php
// Definisikan kelas Library
class Library {
    // Properti dan metode statis untuk mengelola perpustakaan
    private static $books = array();

    // Method untuk mencetak informasi tentang semua buku dalam perpustakaan
    public function printAllBooksInfo() {
        foreach (self::$books as $book) {
            // Polimorfisme: memanggil metode printBookInfo pada setiap objek tanpa peduli dengan jenis bukunya
            $book->printBookInfo();
        }
    }
}
?>