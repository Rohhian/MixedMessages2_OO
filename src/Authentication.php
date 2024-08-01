<?php

namespace MixedMessages2;

use MixedMessages2\Models\UserModel;

class Authentication {
    public function isAuthenticated() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['isAuthenticated']) && $_SESSION['isAuthenticated'] === true) {
            return true;
        }
        
        if (isset($_POST['email']) && isset($_POST['pwd'])) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $user = (new UserModel())->getUser($email, $_POST['pwd']);
            if (!empty($user)) {
                session_regenerate_id(true);
                $_SESSION['isAuthenticated'] = true;
                $_SESSION['firstName'] = $user[0]['first_name'];
                $_SESSION['lastName'] = $user[0]['last_name'];
                
                return true;
            }
        }
        return false;
    }
}
