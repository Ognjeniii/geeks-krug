<?php

class EmailSender
{
    public static function sendEmail(): string
    {
        $num = self::generateNumber();
        return $num;
    }

    private static function generateNumber(): string
    {
        $number = "";
        for ($i = 0; $i < 4; $i++) {
            $number .= strval(rand(0, 9));
        }
        return $number;
    }
}
