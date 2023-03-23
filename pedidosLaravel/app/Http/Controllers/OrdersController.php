<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Exception;
class OrdersController extends Controller
{
    public function getAllOrders()
    {
        $orders = Order::where('entregado', '=', '1')->get();
        return view('welcome', @compact('orders'));
    }
    public function getAllOrders2()
    {
        $orders = Order::where('entregado', '=', '1')->get();
        return view('detalle', @compact('orders'));
    }
    public function getFinishedOrders()
    {
        $orders = Order::where('entregado', '=', '0')->get();
        return view('finalizado', @compact('orders'));
    }
    public function creacion()
    {
        $orders = Order::all();
        return view('/crear', @compact('orders'));
    }
    public function crear(Request $request)
    {
        try {
            $request->validate([
                'direccion' => 'required',
                'entregado' => 'required',
                'comentario' => 'required',
                'hora_entrega' => 'required'
            ]);
            $newOrder = new Order();
            $newOrder->direccion = $request->direccion;
            $newOrder->entregado = $request->entregado;
            $newOrder->comentario = $request->comentario;
            $newOrder->hora_entrega = $request->hora_entrega;
            $newOrder->save();
            return back()->with('mensaje', 'Order added successfully');
        } catch (Exception $e) {
            return back()->with('mensaje', $e->getMessage());
        }
    }
    public function actualizar(Request $request, $id)
    {

        $request->validate([

                'entregado' => 'required',
                'comentario' => 'required',

            ]);
        $orderUpdate = Order::findOrFail($id);
        $orderUpdate->entregado = $request->entregado;
        $orderUpdate->comentario = $request->comentario;
        $orderUpdate->save();
        return back()->with('mensaje', 'Order updated');
    }
    public function buscar(Request $request)
    {
        $id = $request->id;
        $orders = Order::where('id', '=',  $id )->get();
        return view('detalle', @compact('orders'));
    }
}
