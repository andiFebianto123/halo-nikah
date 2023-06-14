<?php
use Illuminate\Support\Str;

if (! function_exists('mb_ucfirst')) {
    /**
     * Capitalize the first letter of a string,
     * even if that string is multi-byte (non-latin alphabet).
     *
     * @param  string  $string  String to have its first letter capitalized.
     * @param  encoding  $encoding  Character encoding
     * @return string String with first letter capitalized.
     */
    function mb_ucfirst($string, $encoding = false)
    {
        $string = $string ?? '';
        $encoding = $encoding ? $encoding : mb_internal_encoding();

        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);

        return mb_strtoupper($firstChar, $encoding).$then;
    }
}

if(! function_exists('product_rating')){
    function product_rating($rate = 0){
        $s = '<span class="ec-pro-rating">';
        for($i = 1; $i<=5; $i++){
            if($i <= $rate){
                $s .= '<i class="ecicon eci-star fill"></i>';
            }else{
                $s .= '<i class="ecicon eci-star"></i>';
            }
        }   
        $s .= '</span>';
        return $s;
    }
}

if(! function_exists('vendor_rating')){
    function vendor_rating($rate = 0){
        $s = '<span class="ec-pro-rating">';
        $s .= '<center>';
        for($i = 1; $i<=5; $i++){
            if($i <= $rate){
                $s .= '<i style="float:none;" class="ecicon eci-star fill"></i>';
            }else{
                $s .= '<i style="float:none;" class="ecicon eci-star"></i>';
            }
        }
        $s .= '</center>';
        $s .= '</span>';
        return $s;
    }
}

if(! function_exists('product_rating_2')){
    function product_rating_2($rate = 0){
        $s = '<div class="ec-quickview-rating">';
        for($i = 1; $i<=5; $i++){
            if($i <= $rate){
                $s .= '<i class="ecicon eci-star fill"></i>';
            }else{
                $s .= '<i class="ecicon eci-star"></i>';
            }
        }   
        $s .= '</div>';
        return $s;
    }
}

if(! function_exists('price_format')){
    function price_format($price){
        if($price == null){
            return '';
        }
        return "Rp " . number_format($price,0,',','.'); 
    }
}

if(! function_exists('str_limit')){
    function str_limit($str, $limit = 100){
        return Str::limit($str, $limit, '...');
    }
}

?>