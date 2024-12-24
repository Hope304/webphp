<?php
class User {
    public $id;
    public $username;
    public $role;

    public function __construct($id, $username, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
    }

    public static function authenticate($username, $password) {
        $db = Database::getInstance();
        $stmt = $db->prepare('SELECT * FROM customer WHERE username = :username AND password = MD5(:password)');
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch();

        if ($user) {
            return new User($user['customer_id'], $user['username'], $user['role']);
            echo "dsdsd";
        }
        return null;
    }
}
?>