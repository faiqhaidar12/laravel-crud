<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::get();
        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_buku' => 'required|string',
            'nama' => 'required|string',
            'deskripsi' => 'required|string'
        ]);

        Books::create($validated);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Books::where('id', $id)->first();

        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama',
            'judul_buku',
            'deskripsi'
        ]);
        // return $validated;
        $data = [
            'nama' => $request->input('nama'),
            'judul_buku' => $request->input('judul_buku'),
            'deskripsi' => $request->input('deskripsi'),
        ];
        Books::where('id', $id)->update($data);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Books::where('id', $id)->delete();
        return redirect()->route('books.index');
    }
}
