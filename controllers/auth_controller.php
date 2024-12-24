<?php
require_once('base_controller.php');
require_once('models/user.php');

class AuthController extends BaseController {
  function __construct()
    {
        $this->folder = 'auth';
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Kiểm tra người dùng trong cơ sở dữ liệu
            $user = User::authenticate($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['role'] = $user->role;
                // Chuyển hướng dựa trên role của người dùng
                if ($user->role == 'admin') {
                    // Đổi hướng đến trang admin
                    header('Location: index.php?controller=admin&action=dashboard');
                    exit;
                } else {
                    // Đổi hướng đến trang chủ
                    header('Location: index.php?controller=pages&action=home');
                    exit;
                }
            } else {
                // Nếu đăng nhập không thành công, trả về thông báo lỗi
                $_SESSION['error'] = 'Invalid username or password';
                header('Location: index.php?controller=pages&action=error');
                exit;
            }
        }
        else {
            $this->render('login');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>