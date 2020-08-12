<?php

function checkSession() {

        session_start();

        if (empty($_SESSION)  || empty($_SESSION['user'])) {
            
            echo ' <script> window.location = "/dimeca/"</script>';
        }
    }