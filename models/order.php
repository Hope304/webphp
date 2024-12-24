<?php 
require_once('connection.php');
class OrderModel
{
    public $order_id;
    public $customer_id;
    public $customer_name;
    public $order_date;
    public $total_amount;
    public $status;
    public $shipping_address;
    public $image_url;
    public $quantity;

    // Constructor khởi tạo thông tin đơn hàng
    public function __construct($order_id, $customer_id, $customer_name, $order_date, $total_amount, $status, $shipping_address, $image_url, $quantity)
    {
        $this->order_id = $order_id;
        $this->customer_id = $customer_id;
        $this->customer_name = $customer_name;
        $this->order_date = $order_date;
        $this->total_amount = $total_amount;
        $this->status = $status;
        $this->shipping_address = $shipping_address;
        $this->image_url = $image_url;
        $this->quantity = $quantity;
    }

    // Lấy tất cả đơn hàng
    public static function getAllOrders()
    {
        $conn = Database::getInstance();
        
        // Truy vấn lấy thông tin đơn hàng cùng với tên khách hàng và URL ảnh sản phẩm
        $sql = "
            SELECT o.order_id, 
                   o.customer_id, 
                   o.order_date, 
                   o.total_amount, 
                   o.status,
                   o.quantity,
                   o.shipping_address,
                   c.name AS customer_name,  -- Lấy tên khách hàng
                   p.image_url  -- Lấy URL ảnh sản phẩm
            FROM `orders` o
            JOIN `customer` c ON o.customer_id = c.customer_id  -- JOIN bảng customer
            LEFT JOIN `product` p ON o.product_id = p.product_id  -- JOIN bảng product để lấy ảnh sản phẩm
            ORDER BY o.order_date DESC;
        ";

        $result = $conn->query($sql);
        $orders = [];

        // Lặp qua kết quả và tạo các đối tượng OrderModel
        foreach ($result->fetchAll() as $item) {
            $orders[] = new OrderModel(
                $item['order_id'], 
                $item['customer_id'], 
                $item['customer_name'],  // Thêm tên khách hàng vào đối tượng
                $item['order_date'], 
                number_format($item['total_amount'], 0, ',', '.'), 
                $item['status'],
                $item['shipping_address'],
                $item['image_url'],
                $item['quantity']
            );
        }

        return $orders;
    }
    public static function updateOrderStatus($order_id, $status) {
        $db = Database::getInstance();  // Kết nối cơ sở dữ liệu
        $stmt = $db->prepare("UPDATE orders SET status = :status WHERE order_id = :order_id");
        return $stmt->execute([
            'status' => $status,
            'order_id' => $order_id
        ]);
    }
    public static function getTotalOrders() {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT COUNT(*) AS total_orders FROM orders");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_orders']; // Đảm bảo trả về số, không phải mảng
    }

    public static function getTotalRevenue() {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT SUM(total_amount) AS total_revenue FROM orders");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_revenue']; // Đảm bảo trả về số, không phải mảng
    }

    public static function getTotalProductsSold() {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT SUM(quantity) as total_quantity FROM orders");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_quantity'];
    }
     public static function getRevenueByDateRange($startDate, $endDate) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT DATE(order_date) as date, SUM(total_amount) as revenue 
                              FROM orders 
                              WHERE order_date BETWEEN :start_date AND :end_date
                              GROUP BY DATE(order_date)
                              ORDER BY DATE(order_date) ASC");
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>