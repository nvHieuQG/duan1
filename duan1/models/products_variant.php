<?php
class products_variant extends database {
    protected $table = "product_variants";
    public function renderVariants($color,$product_id){
        $sql = "SELECT * FROM `product_variants` WHERE color = '$color' AND product_id = '$product_id';";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function select_color_size($size,$color,$product_id){
        $sql = "SELECT * FROM product_variants where size = '$size' and color = '$color' and product_id = $product_id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
   public function sum_variant($product_id){
    $sql = "SELECT SUM(product_variants.stock_quantity) as tong FROM product_variants WHERE product_id = $product_id;";
    $stmt = $this->conn->query($sql);
    $stmt->execute();
    return $stmt->fetch();
    
   }
    
    
}