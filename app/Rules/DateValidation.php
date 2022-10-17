<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class DateValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $end;
    public $start;
  
    
    public function __construct($start,$end)
    {
        //
        $this->end=$end;
        $this->start=$start;
        
      
        // dd($this->$start);


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
        $c_value=Carbon::parse($this->start)->toDateTimeString();
        $c = carbon::createFromFormat('Y-m-d H:i:s', $c_value );
      
        $e_value=Carbon::parse($this->end)->toDateTimeString();
        $e = carbon::createFromFormat('Y-m-d H:i:s', $e_value );
        
        
        $different_Milliseconds = $e->diffInRealMilliseconds($c);
        // 172800000
        
        return $different_Milliseconds>= 172800000 
        && $different_Milliseconds<= 5904000000;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'end musrt be geater than start';
    }
}
