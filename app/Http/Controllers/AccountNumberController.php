<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\AccountNumber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AccountNumberController extends Controller
{
    public function generateAccount(): JsonResponse
    {
        
        $accountBanks = [];
        $randomNumber = "";
        $startWith = "90";
        
        for ($i = 0; $i < 20; $i++) {
            $randomNumber = mt_rand(10000000, 99999999);
            $accounNumber = $startWith . $randomNumber;
            array_push($accountBanks, $accounNumber);
        }
        
        DB::table("account_numbers")->truncate();

        foreach($accountBanks as $accountBank) {
            DB::table("account_numbers")->insertOrIgnore([
                [
                    "account_number" => $accountBank,
                ],
            ]);
        }

        $createdAccounts = AccountNumber::pluck("account_number");
        Storage::disk('local')->put("accountsCreated.txt", $createdAccounts);
        
        return response()->json(["accounts" => $createdAccounts], 200);
    }

    public function checkAccount(Request $request)
    {
        $fetchedAccount = AccountNumber::firstWhere(["account_number" => $request->account_number, "user_id" => $request->user_id]);

        if (!$fetchedAccount) {
            return response()->json(["message" => "Wrong account number"], 404);
        }

        return response()->json(["accounts_details" => $fetchedAccount], 200);
    }

    public function availableLoans(Request $request)
    {
        $currentAccount = AccountNumber::Where(["account_number" => $request->account_number, "user_id" => $request->user_id])->first();
        
        if (empty($currentAccount->loans) || count($currentAccount->loans) < 1) {
            return response()->json(["message" => "No Loan Found"], 404);
        }

        return response()->json(["current_loans" => $currentAccount->loans], 200);
    }

    public function acquireLoan(Request $request)
    {
        try {
            $loan = new Loan();
            $loan->name = $request->name;
            $loan->amount = $request->amount;
            $loan->status = $request->status;
            $loan->account_number_id = $request->account_number_id;
            $loan->user_id = $request->user_id;
            $loan->save();

            return response()->json(["current_loan" => $loan, 'message' => 'Loan Granted'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Loan Failed!'], 409);
        }
    }
}
