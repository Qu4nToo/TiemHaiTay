<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container mt-4">
    <h2>Orders</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Kết nối cơ sở dữ liệu
            include('db_connection.php');
            
            $sql = "SELECT orders.id AS order_id, customers.name AS customer_name, orders.total_amount, orders.status, orders.date 
                    FROM orders 
                    JOIN customers ON orders.customer_id = customers.id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['order_id']}</td>";
                    echo "<td>{$row['customer_name']}</td>";
                    echo "<td>{$row['total_amount']}</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "<td>{$row['date']}</td>";
                    echo "<td>
                        <a href='view_order.php?id={$row['order_id']}' class='btn btn-info btn-sm'>View</a>
                        <a href='delete_order.php?id={$row['order_id']}' class='btn btn-danger btn-sm'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No orders found</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>