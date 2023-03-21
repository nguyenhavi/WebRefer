<?php
class Product {
    static function all() {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM products';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    static function total_products() {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM products';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }
    static function select_type($type_id) {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM products WHERE type_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $type_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    static function select_saleoff() {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM products WHERE saleoff = 1';
        $stmt = $conn->prepare($sql);
//         $stmt->bind_param("i", $type_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    static function select_category($cate) {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM products WHERE category_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $cate);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    static function select_cate_type($cate,$type_id) {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM products WHERE category_id = ?  AND type_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $cate,$type_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    static function total_1() {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM products WHERE category_id = 1';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }
    
    static function total_2() {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM products WHERE category_id = 2';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }

    static function total_3() {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM products WHERE category_id = 3';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }
    static function select_product_by_id($id) {
        $conn= DB::getInstance();
        $sql = 'SELECT * FROM products WHERE id=?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
    static function select_products_in_cart($products_in_cart) {
        $conn= DB::getInstance();
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $conn->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
        $arrayKeys = array_keys($products_in_cart);
        $stmt->bind_param(str_repeat("s", count($arrayKeys)), ...$arrayKeys);
        $stmt->execute();
        return $stmt->get_result();
    }

    static function select_hot_product() {
        $conn = DB::getInstance();
        $sql = 'SELECT * FROM products WHERE type_id = 1';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
