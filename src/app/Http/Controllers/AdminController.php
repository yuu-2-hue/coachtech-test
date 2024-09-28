<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::all();
        $contacts = Contact::Paginate(7);
        return view('admin', compact('categories', 'contacts'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::all();
        $contacts = Contact::Paginate(7);

        if($request->has('search'))
        {
            $contacts = Contact::with('category')->FirstNameSearch($request->data)->LastNameSearch($request->data)->EmailSearch($request->data)->genderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->created_at)->paginate(7);
            $categories = Category::all();
        }

        return view('admin', compact('contacts','categories'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }

}
