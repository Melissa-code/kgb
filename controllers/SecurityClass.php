<?php

    class SecurityClass {

        /**
         * Check if the Admin is logged-in
         *
         * @return boolean
         */
        public static function isloggedIn(): bool {
            return (!empty($_SESSION['connect'])); 
        }

    }