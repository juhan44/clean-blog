<?php

class Redirect
{
    private string $url;
    
    public static function to(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}