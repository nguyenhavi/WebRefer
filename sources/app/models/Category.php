<?php
class Category {
    static function all() {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM categories';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}

?>