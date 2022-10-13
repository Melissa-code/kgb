<?php

    class SecurityClass {

        /**
         * Prevent the special characters 
         *
         * @param string $typing
         * @return string
         */
        public static function secureHtml(string $typing): string {
            $typing = trim($typing); 
            $typing = stripslashes($typing); 
            $typing = htmlentities($typing); 
            return $typing; 
        }

        /**
         * Check if the Admin is logged-in
         *
         * @return boolean
         */
        public static function isloggedIn(): bool {
            return (!empty($_SESSION['connect'])); 
        }

    }