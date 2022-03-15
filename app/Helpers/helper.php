<?php
namespace App\Helpers;

class Helper {
    public static function format_rupiah($value){
        return "Rp. ".number_format($value,0,',','.');
    }
}

?>
