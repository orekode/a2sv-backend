<?php
// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_name',
        'food_rating',
        'food_image',
        'restaurant_name',
        'restaurant_logo',
        'restaurant_status'
    ];
}