<?php

namespace App\Http\Controllers\mdd\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class generateuqid extends Controller
{
    public function generateNine() {

        $uniqueSTR = '';

        for ($i = 0; $i < 5; $i++) {

            $uniqueSTR .= chr(mt_rand(97, 122)); 
       }

            $uniqueINT = str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT); 

        return $uniqueINT.''.$uniqueSTR;

    }

    // public function generateUser() {

    //     $uniqueSTR = '';

    //     for ($i = 0; $i < 5; $i++) {

    //         $uniqueSTR .= chr(mt_rand(97, 122)); 
    //    }

    //         $uniqueINT = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT); 

    //     return $uniqueSTR.''.$uniqueINT;

    // }
}
