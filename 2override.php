<?php
// Override method printBookInfo dari kelas Book
public function printBookInfo() {
    // Memanggil method printBookInfo dari kelas induk
    parent::printBookInfo();
    echo "Format: {$this->format}\n";
}

?>
