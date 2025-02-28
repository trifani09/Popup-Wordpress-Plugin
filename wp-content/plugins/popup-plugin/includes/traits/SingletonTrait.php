<?php  
namespace PopupPlugin\Traits;  

trait SingletonTrait {
    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {}  
    private function __clone() {}  

    // Ubah visibilitas dari private ke public
    public function __wakeup() {
        throw new \Exception("Cannot unserialize singleton");
    }
}

?>