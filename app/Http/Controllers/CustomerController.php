<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){

        $customers = DB::table('customers')->get();

        return response()->json($customers);

    }

    public function getCustomer($id)
    {

        $customer = DB::table('customers')->where('id', '=', $id)->get();

        return response()->json($customer);

    }


    public function createCustomer(Request $request){

        $customer = DB::table('customers')->insert($request->all());

        return response()->json($customer);
    }

    public function deleteCustomer($id)
    {

        $customer = DB::table('customers')->where('id', '=', $id)->delete();

        return response()->json('Customer removed successfully');

    }

    public function updateCustomer(Request $request, $id){


        $updatedId = $request->input('id');
        $updatedFirstName = $request->input('first_name');
        $updatedLastName = $request->input('last_name');
        $updatedNumOfOrders = $request->input('num_of_orders');

        $customer = DB::table('customers')
                                ->where('id', '=', $id)
                                ->update(['id' => $updatedId,
                                    'first_name' => $updatedFirstName,
                                    'last_name' => $updatedLastName,
                                    'num_of_orders' => $updatedNumOfOrders]);

        return response()->json('Customer updated successfully');

    }
}
