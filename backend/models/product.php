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
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    function addProduct($data) {
        $conn = getDatabaseConnection();
        $stmt = $conn->prepare("INSERT INTO product (product_type, product_name, ram, rom, warranty, price, card, status, description) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "sssssdiss",
            $data['product_type'], 
            $data['product_name'], 
            $data['ram'], 
            $data['rom'], 
            $data['warranty'], 
            $data['price'], 
            $data['card'], 
            $data['status'], 
            $data['description']
        );
        return $stmt->execute();
    }

    function updateProduct($id, $data) {
        $conn = getDatabaseConnection();
        $stmt = $conn->prepare("UPDATE product SET 
                                product_type = ?, product_name = ?, ram = ?, rom = ?, warranty = ?, price = ?, card = ?, status = ?, description = ? 
                                WHERE id = ?");
        $stmt->bind_param(
            "sssssdissi", 
            $data['product_type'], 
            $data['product_name'], 
            $data['ram'], 
            $data['rom'], 
            $data['warranty'], 
            $data['price'], 
            $data['card'], 
            $data['status'], 
            $data['description'], 
            $id
        );
        return $stmt->execute();
    }

    function deleteProduct($id) {
        $conn = getDatabaseConnection();
        $stmt = $conn->prepare("DELETE FROM product WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    ?>
