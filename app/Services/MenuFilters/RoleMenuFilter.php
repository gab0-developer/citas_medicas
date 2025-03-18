<?php

namespace App\Services\MenuFilters;

use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Illuminate\Support\Facades\Auth;

class RoleMenuFilter implements FilterInterface
{
    public function transform($item)
    {
        if (isset($item['role']) && !Auth::user()->hasRole($item['role'])) {
            return false; // Oculta el ítem del menú si el usuario no tiene el rol
        }

        return $item;
    }
}
