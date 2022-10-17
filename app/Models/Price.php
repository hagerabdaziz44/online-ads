<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Price extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
         'auction_id',
         'price',

         
     ];
 
    public function auction()
    {
       
           return $this->belongsTo(Auction::class);
     
}
public function user()
    {
       
           return $this->belongsTo(User::class);
     
}


}