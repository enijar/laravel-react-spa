<?php

namespace App\App\Optimize;

class CollapseWhitespace
{
    public static function get(string $html): string
    {
        $replace = [
            "/\n([\S])/" => '$1',
            "/\r/" => '',
            "/\n/" => '',
            "/\t/" => '',
            "/ +/" => ' ',
            "/> +</" => '><',
        ];

        return preg_replace(array_keys($replace), array_values($replace), $html);
    }
}
