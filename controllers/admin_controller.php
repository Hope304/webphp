<?php
// Đảm bảo rằng lớp User được bao gồm trước khi sử dụng
require_once('models/user.php');
require_once('controllers/adminBase_controller.php');
require_once('models/product.php');
require_once('models/order.php');

class AdminController extends AdminBaseController {
    public function __construct() {
        $this->folder = 'admin';
    }

    public function dashboard() {
        // Kiểm tra xem đối tượng user có tồn tại trong session và là thể hiện của lớp User không
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php?controller=pages&action=error');
            exit;
        }

        // Sử dụng đối tượng User trong session
        $totalOrders = OrderModel::getTotalOrders();
        $totalRevenue = OrderModel::getTotalRevenue();
        $totalProductsSold = OrderModel::getTotalProductsSold();

        // Lấy doanh thu theo ngày trong một khoảng thời gian
        $revenueByDateRange = OrderModel::getRevenueByDateRange('2024-11-01', '2024-12-30'); // Ví dụ: tháng 11

        // Gửi dữ liệu tới view
        $this->render('dashboard', [
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'totalProductsSold' => $totalProductsSold,
            'revenueByDateRange' => $revenueByDateRange
        ]);
    }

    public function listProduct() {
        $featured_products = ProductModel::getAllProducts();
        $data = array('featured_products' => $featured_products);
        $this->render('listProduct', $data);
    }
    // Tôi muốn tạo ra một function addProduct() đe thêm 1 sản phẩm mới vào cơ sở dữ liệu
    public function editProduct() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productData = ProductModel::getProductById($id);
            if ($productData) {
                // Hiển thị form chỉnh sửa sản phẩm với dữ liệu sản phẩm
                $this->render('editProduct', ['product' => $productData]);
            } else {
                // Nếu không tìm thấy sản phẩm, điều hướng đến trang lỗi
                header('Location: index.php?controller=pages&action=error');
            }
        } else {
            // Nếu không có id, điều hướng đến trang lỗi
            header('Location: index.php?controller=pages&action=error');
        }
    } 

    public function updateProduct() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy thông tin sản phẩm từ form
        $product_id = $_GET['id'];  // Lấy id từ URL
        $product_name = $_POST['product_name'];
        $product_price = str_replace('.', '', $_POST['product_price']);
        $product_status = $_POST['product_status'];

        // Xử lý ảnh nếu có
        if ($_FILES['product_image']['name']) {
            // Gọi phương thức uploadImage để tải ảnh lên và đổi tên
            $imageUploadSuccess = ProductModel::uploadImage($_FILES['product_image'], $product_id);
            if (!$imageUploadSuccess) {
                echo "Lỗi tải ảnh lên.";
                return;  // Nếu không tải ảnh thành công, dừng việc xử lý
            }
        }

        // Cập nhật thông tin sản phẩm
        $updated = ProductModel::updateProduct($product_id, $product_name, $product_price, $product_status);

        if ($updated) {
            // Chuyển hướng sau khi cập nhật thành công
            header("Location: index.php?controller=admin&action=listProduct");
            exit();
        } else {
            // Thông báo lỗi nếu không thể cập nhật
            echo "Cập nhật không thành công.";
        }
    }
}

public function addProduct()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Xử lý logic lưu sản phẩm khi gửi form
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $status = $_POST['product_status'];
        $file = $_FILES['product_image'];

        // Thêm sản phẩm vào database và xử lý upload ảnh
        $product_id = ProductModel::addProduct($name, $price, $status);
        if ($product_id) {
            ProductModel::updateProductImage($product_id);
            $uploadSuccess = ProductModel::uploadImage($file, $product_id);
            if ($uploadSuccess) {
                header('Location: index.php?controller=admin&action=dashboard&message=success');
                exit();
            } else {
                echo "Lỗi khi upload ảnh.";
            }
        } else {
            echo "Lỗi khi thêm sản phẩm.";
        }
    } else {
        // Hiển thị form khi truy cập bằng phương thức GET
        $this->render('addProduct');
    }
}

    public function listOrder() {
        $order = OrderModel::getAllOrders();
        $data = array('orders' => $order);
        $this->render('listOrder',$data);  
    }

    public function updateOrderStatus() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy thông tin từ form
        $order_id = $_GET['id'] ?? null;  // Lấy id từ URL
        $order_status = $_POST['order_status'] ?? null;

        if ($order_id && $order_status) {
            // Cập nhật trạng thái đơn hàng trong cơ sở dữ liệu
            $updated = OrderModel::updateOrderStatus($order_id, $order_status);

            if ($updated) {
                // Chuyển hướng sau khi cập nhật thành công
                header("Location: index.php?controller=admin&action=listOrder");
                exit();
            } else {
                // Thông báo lỗi nếu không thể cập nhật
                echo "Cập nhật trạng thái không thành công.";
            }
        } else {
            // Thông báo lỗi nếu dữ liệu không hợp lệ
            echo "Dữ liệu không hợp lệ. Vui lòng kiểm tra lại.";
        }
    } else {
        // Không chấp nhận các phương thức khác ngoài POST
        header("HTTP/1.1 405 Method Not Allowed");
        echo "Phương thức không được phép.";
    }
}

public function deleteProduct()
    {
        
            $product_id = $_GET['id'] ?? null;
            if($product_id){
                
                $result = ProductModel::deleteProduct($product_id);
    
                if ($result) {
                    header('Location: index.php?controller=admin&action=listProduct');  // Quay lại danh sách sản phẩm
                } else {
                    echo "Xóa sản phẩm thất bại.";
                }
            }
    }

    public function statistics() {
        $totalOrders = OrderModel::getTotalOrders();
        $totalRevenue = OrderModel::getTotalRevenue();
        $totalProductsSold = OrderModel::getTotalProductsSold();

        // Lấy doanh thu theo ngày trong một khoảng thời gian
        $revenueByDateRange = OrderModel::getRevenueByDateRange('2024-11-01', '2024-12-30'); // Ví dụ: tháng 11

        // Gửi dữ liệu tới view
        $this->render('statistics', [
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'totalProductsSold' => $totalProductsSold,
            'revenueByDateRange' => $revenueByDateRange
        ]);
    }
}
?>