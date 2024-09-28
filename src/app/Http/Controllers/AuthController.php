<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthRequest;
use App\Models\Category;
use App\Models\Contact;

class AuthController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::all();
        $contacts = Contact::Paginate(7);
        return view('admin', compact('categories', 'contacts'));
    }
}
