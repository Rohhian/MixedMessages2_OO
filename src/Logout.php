<?php

namespace MixedMessages2;

class Logout {
    public function __construct() {
        $_SESSION = array();
        session_destroy();

        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 42000, '/');
        }

        echo json_encode(['status' => 'success']);
    }
}
