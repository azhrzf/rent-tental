<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::paginate(12);

        return view('routes.dashboard.catalogs', compact('tools'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $tools = Tool::search($keyword);

        return view('routes.dashboard.catalogs', compact('tools', 'keyword'));
    }
}
