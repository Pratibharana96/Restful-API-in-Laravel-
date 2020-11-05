<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const AVAILABLE_PRODUCT= 'available';
    const UNAVAILABLE_PRODUCT= 'unavailable';
    protected $fillable=['name','description','quantity','status','image','seller_id'];

   public function isAvailable()
   {
    return $this->status == Product::AVAILABLE_PRODUCT;
   }
   //seller
   public function seller()
   {
       return $this->belongsTo(Seller::class);
   }
   //seller
   public function transactions()
   {
       return $this->hasMany(Transaction::class);
   }
   //category
   public function categories()
   {
       return $this->belongsToMany(Category::class);
   }

}
