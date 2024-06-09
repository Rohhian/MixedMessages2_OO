<?php

namespace MixedMessages2;

use MixedMessages2\Models\UserModel;

class Authentication {
    public function isAuthenticated() {
        //if (!($_SERVER['REQUEST_METHOD'] === 'POST')) {
        //    header('Location: login.html');
        //    exit;
        //}
        
        if (isset($_POST['email']) && isset($_POST['pwd'])) {
            $user = (new UserModel())->getUser($_POST['email'], $_POST['pwd']);
            if (!empty($user)) {
                $_SESSION['isAuthenticated'] = true;
                $_SESSION['firstName'] = $user[0]['first_name'];
                $_SESSION['lastName'] = $user[0]['last_name'];
            }
        }

        if ($_SESSION['isAuthenticated']) {
            return true;
        }
        return false;
    }
}
