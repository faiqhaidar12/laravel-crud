<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $books = Books::where(function ($query) use ($keyword) {
            $query->where('nama', 'LIKE', '%' . $keyword . '%')
                ->orWhere('judul_buku', 'LIKE', '%' . $keyword);
        })->latest()->paginate(5);
        return view('pages.admin.dashboard.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_buku' => 'required|string',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_extension = $image->extension();
            $image_name = date('ymdhis') . "." . $image_extension;
            $image->move(public_path('images'), $image_name);

            $validated['image'] = $image_name;
        }

        Books::create($validated);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Books::findOrFail($id);
        return view('pages.admin.dashboard.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Books::where('id', $id)->first();

        return view('pages.admin.dashboard.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'judul_buku' => 'required|string',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        $book = Books::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_extension = $image->extension();
            $image_name = date('ymdhis') . "." . $image_extension;
            $image->move(public_path('images'), $image_name);

            File::delete(public_path('images') . '/' . $book->image);
            $validated['image'] = $image_name;
        } else {
            $validated['image'] = $book->image;
        }

        $book->update($validated);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Books::findOrFail($id);
        File::delete(public_path('images') . '/' . $book->image);
        $book->delete();
        return redirect()->route('books.index');
    }
}
