<?php

namespace App\Enums;

enum Roles: int
{
    case Admin = 1;
    case Moderator = 2;

    public static function toArray(): array
    {
        return array_column(Roles::cases(), 'value');
    }
}
