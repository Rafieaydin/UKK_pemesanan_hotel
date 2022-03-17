<?php
namespace App\Helpers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
class Helper {
    public static function format_rupiah($value){
        return "Rp. ".number_format($value,0,',','.');
    }
    public static function getrangedate($start_date,$end_date){
        $date = CarbonPeriod::create($start_date, $end_date);
        return count($date->toArray()) - 1;
    }
}

?>
