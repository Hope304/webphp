<?php
require_once('connection.php');  // Nhúng kết nối cơ sở dữ liệu (Database)

class ProductModel
{
  public $product_id;
  public $product_name;
  public $product_price;  
  public $product_image; 
  public $sizes;
  public $total_quantity;
  public $product_status;

  public function __construct($product_id, $product_name, $product_price, $product_image, $product_status,$product_quantity)
  {
    $this->product_id = $product_id;
    $this->product_name = $product_name;
    $this->product_price = $product_price;
    $this->product_image = $product_image;
    $this->sizes = [];
    $this->total_quantity = $product_quantity;
    $this->product_status = $product_status;
  }

  public static function getAllProducts()
{
    $conn = Database::getInstance();
    $sql = "
        SELECT p.product_id, 
       p.name, 
       p.price, 
       p.image_url, 
       p.status,  -- Thêm cột status từ bảng product
       GROUP_CONCAT(s.size SEPARATOR ', ') AS sizes, 
       GROUP_CONCAT(ps.quantity SEPARATOR ', ') AS quantities, 
       SUM(ps.quantity) AS total_quantity  -- Tổng số lượng
FROM product p
LEFT JOIN product_size ps ON p.product_id = ps.product_id
LEFT JOIN size s ON ps.size_id = s.size_id
GROUP BY p.product_id;

    ";
    $result = $conn->query($sql);
    $products = [];

    // Lặp qua kết quả và tạo các đối tượng ProductModel
    foreach ($result->fetchAll() as $item) {
        $product = new ProductModel(
            $item['product_id'], 
            $item['name'], 
            $item['price'], 
            $item['image_url'],
            $item['status'],
            $item['total_quantity']
        );
        
        // Format lại giá
        $product->product_price = number_format($product->product_price, 0, ',', '.');
        
        // Thêm thông tin size và quantity vào đối tượng sản phẩm
        $sizes = explode(', ', $item['sizes']);
        $quantities = explode(', ', $item['quantities']);
        
        // Tạo một mảng size với số lượng tương ứng
        $product_sizes = [];
        foreach ($sizes as $key => $size) {
            $product_sizes[$size] = $quantities[$key];
        }

        // Gán mảng size và quantity cho sản phẩm
        $product->sizes = $product_sizes;
        
        // Thêm sản phẩm vào danh sách
        $products[] = $product;
    }

    return $products;
}
  //get Featured products
public static function getFeaturedProducts()
{
    $conn = Database::getInstance();
    $sql = "
         SELECT p.product_id, 
              p.name, 
              p.price, 
              p.image_url, 
              p.status,  -- Thêm cột status từ bảng product
              GROUP_CONCAT(s.size SEPARATOR ', ') AS sizes, 
              GROUP_CONCAT(ps.quantity SEPARATOR ', ') AS quantities, 
              SUM(ps.quantity) AS total_quantity  -- Tổng số lượng
        FROM product p
        LEFT JOIN product_size ps ON p.product_id = ps.product_id
        LEFT JOIN size s ON ps.size_id = s.size_id
        GROUP BY p.product_id;
        LIMIT 5;
    ";
    $result = $conn->query($sql);
    $products = [];

    // Lặp qua kết quả và tạo các đối tượng ProductModel
    foreach ($result->fetchAll() as $item) {
        $product = new ProductModel(
            $item['product_id'], 
            $item['name'], 
            $item['price'], 
            $item['image_url'],
            $item['status'],
            $item['total_quantity']
        );
        
        // Format lại giá
        $product->product_price = number_format($product->product_price, 0, ',', '.');
        
        // Thêm thông tin size và quantity vào đối tượng sản phẩm
        $sizes = explode(', ', $item['sizes']);
        $quantities = explode(', ', $item['quantities']);
        
        // Tạo một mảng size với số lượng tương ứng
        $product_sizes = [];
        foreach ($sizes as $key => $size) {
            $product_sizes[$size] = $quantities[$key];
        }

        // Gán mảng size và quantity cho sản phẩm
        $product->sizes = $product_sizes;
        
        // Thêm sản phẩm vào danh sách
        $products[] = $product;
    }

    return $products;
}

  //get product by id
  public static function getProductById($id)
  {
    $conn = Database::getInstance();
    $sql = "SELECT * FROM product WHERE product_id = $id";
    $sql = "
        SELECT p.product_id,
        p.name,
        p.price,
        p.image_url,
        p.status,
        GROUP_CONCAT(s.size SEPARATOR ', ') AS sizes,
        GROUP_CONCAT(ps.quantity SEPARATOR ', ') AS quantities,
        SUM(ps.quantity) AS total_quantity
        FROM product p
        LEFT JOIN product_size ps ON p.product_id = ps.product_id
        LEFT JOIN size s ON ps.size_id = s.size_id
        WHERE p.product_id = $id
        GROUP BY p.product_id;";
    $result = $conn->query($sql);
    $product = [];
    foreach ($result->fetchAll() as $item){
       $product = new ProductModel(
            $item['product_id'], 
            $item['name'], 
            $item['price'], 
            $item['image_url'],
            $item['status'],
            $item['total_quantity']
        );
      $product->product_price = number_format($product->product_price, 0, ',', '.');
    }
    return $product;
  }
  public static function updateProduct($id, $name, $price, $status)
    {
        $db = Database::getInstance();
        $sql = "UPDATE product SET name = :name,  price = :price, status = :status WHERE product_id = :id";
        $stmt = $db->prepare($sql);

        // Thực hiện câu lệnh UPDATE và trả về kết quả
        return $stmt->execute([
            'name' => $name,
            'price' => $price,
            'status' => $status,
            'id' => $id
        ]);
    }


    public static function uploadImage($file, $product_id) {
    // Đặt đường dẫn thư mục lưu ảnh
        $target_dir = "uploads/images/";
        $image_name = "img" . $product_id . ".jpg";  // Đổi tên ảnh theo định dạng img{product_id}.jpg
        $target_file = $target_dir . $image_name;

        // Kiểm tra xem ảnh có phải là một file hình ảnh thực sự hay không
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            // Nếu là ảnh, di chuyển file vào thư mục uploads/images
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return true;  // Tải ảnh thành công
            } else {
                return false;  // Không thể di chuyển file
            }
        }
        return false;  // Không phải file hình ảnh
    }
    public static function addProduct($name, $price, $status, $image_url = null)
    {
        $db = Database::getInstance();
        $sql = "INSERT INTO product (name, price, status, image_url) VALUES (:name, :price, :status, :image_url)";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([
            'name' => $name,
            'price' => $price,
            'status' => $status,
            'image_url' => $image_url
        ])) {
            return $db->lastInsertId();
        }

        return false;
    }

    public static function updateProductImage($product_id)
    {
        $target_dir = "uploads/images/";
        $image_name = "img" . $product_id . ".jpg";  // Đổi tên ảnh theo định dạng img{product_id}.jpg
        $image_url = $target_dir . $image_name;
        $db = Database::getInstance();
        $sql = "UPDATE product SET image_url = :image_url WHERE product_id = :product_id";
        $stmt = $db->prepare($sql);

        return $stmt->execute([
            'image_url' => $image_url,
            'product_id' => $product_id
        ]);
    }
    public static function deleteProduct($product_id)
{
    $db = Database::getInstance();
    $sql = "DELETE FROM product WHERE product_id = :product_id";
    $stmt = $db->prepare($sql);

    // Thực hiện câu lệnh DELETE và trả về kết quả (true nếu thành công, false nếu không thành công)
    return $stmt->execute([
        'product_id' => $product_id
    ]);
}

}
?>