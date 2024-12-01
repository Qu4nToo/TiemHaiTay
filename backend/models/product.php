    <?php
    require_once __DIR__ . '/../config/database.php';
    function getAllProducts() {
        $conn = getDatabaseConnection();
        $result = $conn->query("SELECT * FROM product");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    function getProductById($id) {
        $conn = getDatabaseConnection();
        $stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    function addProduct($data) {
        $conn = getDatabaseConnection();
        $randomId = substr(uniqid('prod_', true), 0, 32);
        $stmt = $conn->prepare("INSERT INTO product (id, product_type, product_name, ram, rom, warranty, price, card, status, description, image) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "sssssdissss", // Thêm 's' cho image
            $randomId, 
            $data['product_type'], 
            $data['product_name'], 
            $data['ram'], 
            $data['rom'], 
            $data['warranty'], 
            $data['price'], 
            $data['card'], 
            $data['status'], 
            $data['description'], 
            $data['image'] // Trường mới
        );
        return $stmt->execute();
    }
    
    function updateProduct($id, $data) {
        $conn = getDatabaseConnection();
        $stmt = $conn->prepare("UPDATE product SET 
                                product_type = ?, product_name = ?, ram = ?, rom = ?, warranty = ?, price = ?, card = ?, status = ?, description = ?, image = ? 
                                WHERE id = ?");
        $stmt->bind_param(
            "sssssdissss", // Thêm 's' cho image
            $data['product_type'], 
            $data['product_name'], 
            $data['ram'], 
            $data['rom'], 
            $data['warranty'], 
            $data['price'], 
            $data['card'], 
            $data['status'], 
            $data['description'], 
            $data['image'], // Trường mới
            $id
        );
        return $stmt->execute();
    }
    

    function deleteProduct($id) {
        $conn = getDatabaseConnection();
        $stmt = $conn->prepare("DELETE FROM product WHERE id = ?");
        $stmt->bind_param("s", $id);
        return $stmt->execute();
    }
    ?>
