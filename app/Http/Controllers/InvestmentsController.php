<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\funds;
use App\Models\accounts;
use App\Models\investments;

class InvestmentsController extends Controller
{
    public function invest(Request $request)
    {
        // verify logged in
        if ($request->session()->missing('userID')) {
            $request->session()->flush();
            return redirect()->route('welcome');
        }

        $userID = $request->session()->get('userID');

        $funds = funds::get();

        // gather account  details
        $account = accounts::where('client_id', $userID)
            ->first();

        return view('investment.invest', ['funds' => $funds, 'account' => $account]);
    }

    public function investtransact(Request $request)
    {
        // verify logged in
        if ($request->session()->missing('userID')) {
            $request->session()->flush();
            return redirect()->route('welcome');
        }

        $userID = $request->session()->get('userID');

        // verify inputs
        $invest_value = $_POST['invest_value'];
        $fund_id = $_POST['fund'];

        $account = accounts::where('client_id', $userID)
            ->first();

        if($invest_value < 1 || $invest_value > $account->balance)
        {
            echo "Error: Invalid investment value.";
        }

        if(!funds::where('id', $fund_id))
        {
            echo "Error: Selected fund not recognised.";
        }

        // all good, commit
        investments::insert([
            'fund_id' => $fund_id,
            'associated_account' => $account->id,
            'balance' => $invest_value
        ]);

        accounts::where('id', $account->id)
            ->decrement('balance', $invest_value);

        return redirect()->route('accountHome');
    }
}
