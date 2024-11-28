
<?php 
include('components/header.php'); 
include('components/navbar.php');
require_once '../../../backend/models/product.php';
$products = getAllProducts();
?>

<div class="container mt-4">
    <h2>Customers</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Kết nối cơ sở dữ liệu
            include('db_connection.php');
            
            $sql = "SELECT * FROM customers";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>
                        <a href='edit_customer.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
                        <a href='delete_customer.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No customers found</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>