<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFirstNameSearch($query, $first_name)
    {
        if(!empty($first_name))
        {
            $query->where('first_name', 'like', '%' . $first_name . '%');
        }
    }

    public function scopeLastNameSearch($query, $last_name)
    {
        if(!empty($last_name))
        {
            $query->orWhere('last_name', 'like', '%' . $last_name . '%');
        }
    }

    public function scopeEmailSearch($query, $email)
    {
        if(!empty($email))
        {
            $query->orWhere('email', 'like', '%' . $email . '%');
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if(!empty($gender))
        {
            $query->orWhere('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if(!empty($category_id))
        {
            $query->orWhere('category_id', $category_id);
        }
    }

    public function scopeDateSearch($query, $created_at)
    {
        if(!empty($created_at))
        {
            $query->orWhereDate('created_at', $created_at);
        }
    }
}
