<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function adminIndex(Request $request)
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

        return view('routes.dashboard.manage-tools', compact('tools', 'keyword'));
    }

    public function show($id)
    {
        $tool = Tool::where('id', $id)->firstOrFail();

        return view('routes.dashboard.catalogs-detail', compact('tool'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_number' => 'required|string|max:255|unique:tools,product_number',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'total_quantity' => 'required|integer|min:0',
            'status' => 'required|in:available,unavailable',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/tools'), $imageName);
            $data['image'] = $imageName;
        }

        Tool::create($data);

        return redirect()->route('manage.tools.index')
            ->with('success', 'Tool berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->back()->with('danger', 'Anda tidak memiliki akses untuk mengubah alat ini.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'total_quantity' => 'required|integer|min:0',
            'status' => 'required|in:available,unavailable',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tool = Tool::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($tool->image && file_exists(public_path('images/tools/' . $tool->image))) {
                unlink(public_path('images/tools/' . $tool->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/tools'), $imageName);
            $data['image'] = $imageName;
        }

        $tool->update($data);

        return redirect()->route('catalogs.show', $tool->id)
            ->with('success', 'Alat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->back()->with('danger', 'Anda tidak memiliki akses untuk menghapus alat ini.');
        }

        $tool = Tool::findOrFail($id);

        $activeRentals = $tool->orderDetails()
            ->whereHas('order', function ($query) {
                $query->where('status', 'paid')
                      ->whereNull('actual_return_date');
            })
            ->exists();

        if ($activeRentals) {
            return redirect()->back()->with('danger', 'Tidak dapat menghapus alat ini karena masih ada yang sedang disewa dan belum dikembalikan.');
        }

        if ($tool->image && file_exists(public_path('images/tools/' . $tool->image))) {
            unlink(public_path('images/tools/' . $tool->image));
        }

        $tool->delete();

        return redirect()->route('manage.tools.index')
            ->with('success', 'Alat berhasil dihapus.');
    }
}
