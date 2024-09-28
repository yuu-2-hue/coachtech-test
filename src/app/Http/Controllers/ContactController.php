<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name','last_name','gender','email','tel_first','tel_second','tel_third','address','building','content','detail']);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['first_name','last_name','gender','email','tell','address','building','content','detail']);
        Contact::create([
            'category_id' => $contact['content'],
            'first_name' => $contact['first_name'],
            'last_name' => $contact['last_name'],
            'gender' => $contact['gender'],
            'email' => $contact['email'],
            'tell' => $contact['tell'],
            'address' => $contact['address'],
            'building' => $contact['building'],
            'detail' => $contact['detail'],
        ]);
        return view('thanks');
    }

}
