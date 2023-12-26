<?php

namespace App\Helper;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

function permission_can(string $permission)
{
    $role = auth()->user()->role;
    $ok = $role->hasPermission($permission);
    if (!$ok) {
        abort(403, "Unauthorized");
    }
}
