<?php


namespace App\Http\Controllers\Api;


class Response
{

    public static function MethodNotAllowed($method, $content = null)
    {
        return [
            "progress_code" => "0000",
            "progress_type" => "error",
            "progress_message" => strtoupper($method) . " Method Not Allowed For This Api",
            "content" => $content
        ];
    }

    public static function EmptyTokenResponse($content = null)
    {
        return [
            "progress_code" => "0001",
            "progress_type" => "error",
            "progress_message" => "_token is required on header",
            "content" => $content
        ];
    }

    public static function WrongTokenResponse($content = null)
    {
        return [
            "progress_code" => "0002",
            "progress_type" => "error",
            "progress_message" => "_token is not correct",
            "content" => $content
        ];
    }

    public static function EmptyUserResponse($content = null)
    {
        return [
            "progress_code" => "0003",
            "progress_type" => "error",
            "progress_message" => "There is not found registered any user with this information",
            "content" => $content
        ];
    }

    public static function AlreadyExistResponse($content = null)
    {
        return [
            "progress_code" => "0004",
            "progress_type" => "error",
            "progress_message" => "This data already registered for this user on this date",
            "content" => $content
        ];
    }

    public static function EmptyVariableResponse($variable, $content = null)
    {
        return [
            "progress_code" => "0005",
            "progress_type" => "error",
            "progress_message" => "$variable is required",
            "content" => $content
        ];
    }

    public static function SuccessfullyRegisteredArrivalTimeResponse($content = null)
    {
        return [
            "progress_code" => "0006",
            "progress_type" => "success",
            "progress_message" => "Users arrival time registered successfully",
            "content" => $content
        ];
    }

    public static function SuccessResponse($content = null, $message = null)
    {
        return [
            "progress_code" => "A000",
            "progress_type" => "success",
            "progress_message" => "$message",
            "content" => $content
        ];
    }

    public static function FailedLoginResponse($content = null, $message = null)
    {
        return [
            "progress_code" => "0007",
            "progress_type" => "error",
            "progress_message" => "Your email address and password do not match",
            "content" => $content
        ];
    }

}
