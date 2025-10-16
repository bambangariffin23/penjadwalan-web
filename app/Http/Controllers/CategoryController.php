<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Tampilkan semua kategori
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Form tambah kategori
    public function create()
    {
        return view('categories.create');
    }

    // Simpan kategori baru
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255', // tetap dari form
    ]);

    // mapping dari input form ke kolom database
    Category::create([
        'nama_kategori' => $request->name
    ]);

    return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
}


    // Form edit kategori
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update kategori
   public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category->update([
        'nama_kategori' => $request->name
    ]);

    return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
}


    // Hapus kategori
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
