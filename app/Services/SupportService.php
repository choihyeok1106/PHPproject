<?php
/**
 * Author: hyeokchoi
 * Date: 03/01/2019 8:36 PM
 * File: SupportService.php
 */

namespace App\Services;


class SupportService
{
    public static function store(string $name, string $email, int $phone, string $content)
{
    return Service::make()->post('/v1/vbo/support/contact',
        [
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
                "content" => $content
        ]);
}
}