<?php

session_start();

function flash($name = '', $message = '', $class = 'my-2') {
   if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }

            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name]);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash" '
                    . 'style="color: #FFF;background-color: #9FCD2F;font-weight: 500;border: none;border-radius: 0.4rem;
    padding: 15px;">'
                    . '' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

function isLoggedIn() {
//        if(isset($_SESSION['user_id'])){
    if (isset($_SESSION['IDUSER'])) {
        return true;
    } else {
        return false;
    }
}
