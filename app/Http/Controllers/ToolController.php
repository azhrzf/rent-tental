<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search', '');

        $query = Tool::with('orderDetails')
            ->where('status', 'available');

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        $tools = $query->paginate(12);

        return view('routes.dashboard.catalogs', compact('tools', 'keyword'));
    }
}
