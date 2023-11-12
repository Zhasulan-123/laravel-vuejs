<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index($userId){
        try {
            $results =  Order::where('user_id', 'like', '%' . $userId . '%')->get();

            if ($results->isEmpty()) {
                return response()->json(['message' => 'Заказ не найден.'], 404);
            }

            return response()->json($results, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function create(Request $request){
        try {

            $userId = $request->user_id;
            $user = $request->email;
            $cart = $request->cart;
            foreach($cart as $item){
                Order::create([
                    'name' => $item['name'],
                    'category' => $item['category']['title'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'email' => $user,
                    'user_id' => $userId,
                ]);
            }

            return response()->json(Order::get(), 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function delete($userIds)
    {
        try {
            $results = Order::where('user_id', 'like', '%' . $userIds . '%')->delete();
            return response()->json($results, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

}