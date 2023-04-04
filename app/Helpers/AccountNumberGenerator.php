<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class AccountNumberGenerator {
    public static function generateAccountNumber($accountNumber)
    {
        $accountBank = [];
        $accLength = 8;
        $randomNumber = "";
        $data = "123456123456789071234567890890";
        $startWith = "90";

        for ($i = 0; $i < 20; $i++) { 
            for ($i = 0; $i < $accLength; $j++) {
                $randomNumber .= substr($data, (rand() % (strlen($data))), 1);
            }
            $accounNumber = $startWith + $randomNumber;
            $accountBank.push($accounNumber);
        }

        Storage::disk('local')->put('accountBank.txt', $accountBank);
    }
}