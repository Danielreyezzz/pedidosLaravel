<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Administradores;
use App\Models\Usuarios;
use App\Models\Usuarios_direcciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Exception;

class PedidosController extends Controller
{
    public function getAllOrders2()
    {
        $orders = Pedidos::where('estado', '=', '0')->get();
        return view('detalle', @compact('orders'));
    }
    public function getFinishedOrders()
    {
        $id = $_SESSION['id'];
        $administrador = Administradores::find($_SESSION['id']);
        $pedidos = Pedidos::where('id_repartidor', $id)
            ->leftJoin('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id_usuario')
            ->leftJoin('usuarios_direcciones', 'pedidos.id_direccion', '=', 'usuarios_direcciones.id_direccion')
            ->leftJoin('pedidos_estados', 'pedidos_estados.id_pedido', '=', 'pedidos.id_pedido')
            ->select('pedidos.id_pedido', 'pedidos.fecha_entrega', 'usuarios.nombre as nombre_usuario', 'usuarios_direcciones.direccion')
            ->where('pedidos_estados.estado', 1)
            ->get();
        return view('finalizado', @compact('pedidos'));
    }
    public function creacion()
    {
        $orders = Pedidos::all();
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
            $newOrder = new Pedidos();
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
        $orderUpdate = Pedidos::findOrFail($id);
        $orderUpdate->entregado = $request->entregado;
        $orderUpdate->comentario = $request->comentario;
        $orderUpdate->save();
        return back()->with('mensaje', 'Order updated');
    }
    public function buscar(Request $request)
    {
        $id = $request->id;
        $orders = Pedidos::where('id', '=',  $id)->get();
        return view('detalle', @compact('orders'));
    }
    public function buscarFin(Request $request)
    {
        $id = $request->id;
        $orders = Pedidos::where('id', '=',  $id)->get();
        return view('detalleFin', @compact('orders'));
    }

    public function infpedidos()
    {
        $id = $_SESSION['id'];
        $administrador = Administradores::find($_SESSION['id']);
        $pedidos = Pedidos::where('id_repartidor', $id)
            ->leftJoin('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id_usuario')
            ->leftJoin('usuarios_direcciones', 'pedidos.id_direccion', '=', 'usuarios_direcciones.id_direccion')
            ->leftJoin('pedidos_estados', 'pedidos_estados.id_pedido', '=', 'pedidos.id_pedido')
            ->select('pedidos.id_pedido', 'pedidos.fecha_entrega', 'usuarios.nombre as nombre_usuario', 'usuarios_direcciones.direccion')
            ->where('pedidos_estados.estado', 0)
            ->get();

        return view('welcome', @compact('pedidos'));
    }
}
