<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tool_id' => 'required|exists:tools,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        $toolId = $request->input('tool_id');
        $quantity = $request->input('quantity', 1);

        OrderDetail::createWithTool($toolId, $userId, $quantity);

        return redirect()->back()->with('success', 'Alat berhasil ditambahkan ke keranjang.');
    }
}
