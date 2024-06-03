<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * URI, которые следует исключить из проверки CSRF.
     *
     * @var array
     */
    protected $except = [
        'http://127.0.0.1:8000/image/add'
    ];
}
