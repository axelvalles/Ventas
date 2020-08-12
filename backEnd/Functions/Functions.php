<?php 

    function cleanVar($var) {

        $newVar = $var;
        $newVar = trim($newVar);
        $newVar = strtoupper( filter_var($newVar, FILTER_SANITIZE_STRING) );
        if(empty($newVar)){
        throw new Exception("Error de campos obligatorios", 1);
            
        }
        return $newVar;
    }

    function destroySession(){
        session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finalmente, destruir la sesión.
        session_destroy();
        
        echo ' <script> window.location = "/"</script>';
    }

    function checkSession() {

        session_start();

        if (empty($_SESSION)  || empty($_SESSION['user'])) {
            
            echo ' <script> window.location = "/dimeca/"</script>';
        }
    }

    // destroySession();