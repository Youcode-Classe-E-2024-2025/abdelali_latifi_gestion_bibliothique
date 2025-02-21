<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // Afficher tous les livres
    public function index()
    {
        $books = Book::all();
        return view('admin', compact('books'));
    }
   
    // Enregistrer un nouveau livre
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
        ]);

        // Gestion de l'upload de l'image
        $photoPath = $request->file('photo') ? $request->file('photo')->store('books', 'public') : null;

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'photo' => $photoPath,
            'stock' => $request->stock,
        ]);

        return redirect()->route('dashboard')->with('success', 'Livre ajouté avec succès !');
    }

    // Mettre à jour un livre
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0',
        ]);
    
        if ($request->hasFile('photo')) {
            if ($book->photo) {
                Storage::disk('public')->delete($book->photo);
            }
            $book->photo = $request->file('photo')->store('books', 'public');
        }
    
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'stock' => $request->stock,
            'photo' => $book->photo,
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Livre mis à jour avec succès !');
    }
    
    // Supprimer un livre
    public function destroy(Book $book)
    {
        if ($book->photo) {
            Storage::disk('public')->delete($book->photo);
        }

        $book->delete();
        return redirect()->route('dashboard')->with('success', 'Livre ajouté avec succès !');
    }
}
