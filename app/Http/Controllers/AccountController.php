<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients_retail;
use App\Models\accounts;
use App\Models\products;
use App\Models\investments;
use App\Models\funds;

class AccountController extends Controller
{
    public function home(Request $request)
    {
        // verify logged in
        if ($request->session()->missing('userID')) {
          $request->session()->flush();
          return redirect()->route('welcome');
        }

        $userID = $request->session()->get('userID');

        // gather user details
        $user = clients_retail::where('id', $userID)
            ->first();
 
        // gather account & products details
        $account = accounts::where('client_id', $userID)
            ->first();

        $product = products::where('id', $account->product_id)
            ->first();

        // gather investments
        $investments = investments::where('associated_account', $account->id)->get();
        if($investments)
            foreach($investments as &$investment)
            {
                $investment->fund_name = funds::where('id', $investment->fund_id)
                    ->first()
                    ->value('name');;
            }

        return view('account.home', ['user' => $user, 'account' => $account, 'product' => $product, 'investments' => $investments]);
    }
}
