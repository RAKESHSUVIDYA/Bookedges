<?php

use App\Currency;
use DB;

//get the default currency
function get_current_currency()
{
    $currency=Currency::where('status','active')->first();

    if(!$currency){
        $data=([
            'name'=>'us dollar',
            'code'=> 'USD',
            'symbol'=>'$'
        ]);

        return $data;
    }
    else{
        $data=([
            'name'=>$currency->name,
            'code'=> $currency->code,
            'symbol'=>$currency->symbol
        ]);

        return $data;
    }

}

//get star rating
function get_star_rating($review_rate){
    
    for ($i = 0; $i < 5; $i++){
        if (floor($review_rate) - $i >= 1){
            //Full Start
            echo '<button class="str" type="button" class="btnrating btn btn-default btn-lg" data-attr="'.$i.'" id="rating-star-'.$i.'">';
            echo '<i class="fa fa-star" aria-hidden="true"> </i></button>';
        }
        
        else if ($review_rate - $i > 0){
            //Half Start
            echo '<button class="str" type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-{{$I=1}}">
                     <i class="fa fa-star" aria-hidden="true"> </i></button>';
        }
            
        else{
            //Empty Start
            echo '<i class="fa  fa-star-o"> </i>';
        }
    }    
                            
}

//returns 2 decimal value with . pointer
function two_decimal($number){
    return number_format((float)$number, 2, '.', '');
}

function getCategoryName($cat_id){
    $data = DB::table('categories')->where('id',$cat_id)->first();
    return $data->name;
}
         
    
