<?php
class Flash {
    public function push($key, $value) {
        $_SESSION["flash_$key"] = $value;
    }
    public function get($key) {
        if($value = $_SESSION["flash_$key"]) {
        return $value;
    }
    return false;
}
}
?>