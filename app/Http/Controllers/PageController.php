<?php

// `app/Http/Controllers/PageController.php`
namespace App\Http\Controllers;

use Inertia\Inertia;

class PageController extends Controller
{
    public function about()
    {
        return Inertia::render('About'); // Use 'About' with the correct case
    }
}
