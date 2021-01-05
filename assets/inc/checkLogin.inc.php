<?php

    /**
     * checkLogin.inc.php
     * 
     * checks the current login of the user
     * @uses /assets/inc/userList.inc.php
     * @requires session to be already started
     */

    function checkLogin() {
        if ($_SESSION["logged_in"] == true && isset($userList[$_SESSION["username"]])) {
            return true;
        } else {
            return false;
        }
    }