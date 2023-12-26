<?php

namespace App\Enums;
use App\Traits\Enumable;

enum UserTypes: string
{
    
    case ADMIN = 'Admin';
    case EDITOR = 'Editor';
    public static function toArray(): array
    {
        return array_map(function ($status) {
            return $status->value;
        }, UserTypes::cases());
    }
}