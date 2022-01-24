<?php

class SessionValidator {

    function validateUser($u_type) {
        if (isset($_SESSION['user_id'])) {
            if (isset($_SESSION['u_type']) && $_SESSION['u_type'] == $u_type) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function setSession($index, $value) {
        $_SESSION[$index] = $value;
    }

    function unsetSession($index) {
        unset($_SESSION[$index]);
    }

    function logout() {
        return session_destroy();
    }
}

?>