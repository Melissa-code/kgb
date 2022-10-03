<?php

    class MessagesClass {

        public const RED_COLOR = "alert-danger";
        public const GREEN_COLOR = "alert-success";

        /**
         * Display the error / success alert
         *
         * @param [type] $message
         * @param [type] $type
         * @return void
         */
        public static function addAlertMsg($message, $type): void {

            $_SESSION['alert'][]=[
                "message" => $message,
                "type" => $type
            ];
        }

    }