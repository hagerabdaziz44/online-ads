<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Price;
use App\Models\auction;

class PriceValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $auction_id;
    public function __construct($id)
    {
        $this->auction_id =$id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
   
    public function passes($attribute, $value)
    {
    // $count = Price::where('auction_id', $this->auction_id)->count();
     //dd($count);
     $price=Auction::where('id', $this->auction_id)->first();
     $min_price=$price->min_price;
     $maxprice= Price::where('auction_id', $this->auction_id)->max('price');
       
        return $value >  $maxprice 
        && $value >=  $min_price;
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $count = Price::where('auction_id', $this->auction_id)->count();
        $price=Auction::where('id', $this->auction_id)->first();
        $min_price=$price->min_price;
        $maxprice= Price::where('auction_id', $this->auction_id)->max('price');
        if ($count == 0 )
{
$last_price= $min_price;
}
else
{
    $last_price= $maxprice;
}
        return 'The Price must be greater than' ." " .$last_price;
    }
}
