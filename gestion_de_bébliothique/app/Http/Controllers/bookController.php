<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loans;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // Afficher tous les livres
    public function index()
    {
        $books = Book::all();
        return view('admin', compact('books'));
    }
   
    public function showClientBooks()
{
    $books = Book::all(); 
    return view('emprunt', compact('books'));
}

public function showGeusts()
{
    $books = Book::all(); 
    return view('welcome', compact('books'));
}


    // ajouter un livre
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

    // update un livre
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

    public function storeLoan(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        // Vérifier si l'utilisateur a déjà emprunté ce livre et s'il ne l'a pas encore retourné
        $existingLoan = Loans::where('user_id', Auth::id())
            ->where('book_id', $request->book_id)
            ->whereNull('returned_at') // Vérifie qu'il n'a pas encore retourné ce livre
            ->first();

        if ($existingLoan) {
            // Si un emprunt actif existe, afficher un message d'erreur
            return redirect()->route('client.dashboard')->with('error', 'Vous avez déjà emprunté ce livre.');
        }

        // Sinon, créer un nouvel emprunt
        Loans::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'borrowed_at' => now(),
        ]);

        return redirect()->route('client.dashboard')->with('success', 'Livre emprunté avec succès.');
    }

    public function showBorrowedBooks()
    {
        $loans = Loans::where('user_id', Auth::id())->whereNull('returned_at')->get();
    
        if ($loans->isEmpty()) {
            return view('borrowed_books', ['message' => 'Vous n\'avez aucun livre emprunté.']);
        }
    
        $books = $loans->map(fn($loan) => $loan->book)->filter();
    
        return view('borrowed_books', compact('books'));
    }
    

 
}


