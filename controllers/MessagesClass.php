<?php
class MessagesClass {
    public const RED_COLOR = "alert-danger";
    public const ORANGE_COLOR = "alert-warning";
    public const GREEN_COLOR = "alert-success";

    public static function addAlertMsg($message,$type){
        $_SESSION['alert'][]=[
            "message" => $message,
            "type" => $type
        ];
    }

}