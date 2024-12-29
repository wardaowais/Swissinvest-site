<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get(); // Eager load the category
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories =BookCategory::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_category_id' => 'required|exists:book_categories,id', // Validate the category
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'book_pdf' => 'nullable|mimes:pdf',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('images/books', $imageName); // Store image in 'images/books'
            $imagePath = 'images/books/' . $imageName; // Path for database
        } else {
            $imagePath = null;
        }
    
        // Handle PDF upload
        if ($request->hasFile('book_pdf')) {
            $file = $request->file('book_pdf');
            $pdfName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('pdfs/books', $pdfName); // Store PDF in 'pdfs/books'
            $pdfPath = 'pdfs/books/' . $pdfName; // Path for database
        } else {
            $pdfPath = null;
        }
    
        // Create a new book record
        Book::create([
            'book_category_id' => $request->book_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'book_pdf' => $pdfPath,
            'share_count' => 0,
            'status' => $request->status ? 1 : 0,
        ]);
    
        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }
    
    

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'book_pdf' => 'nullable|mimes:pdf',
        ]);

        // Handle file uploads (image and PDF)
        if ($request->hasFile('image')) {
            $book->image = $request->file('image')->store('images');
        }

        if ($request->hasFile('book_pdf')) {
            $book->book_pdf = $request->file('book_pdf')->store('books');
        }

        $book->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }

    public function bookspage()
    {
        $admin = auth()->user();
        $user = $admin->user;
      
        $categories = BookCategory::with('books')->get(); 

        return view('books', compact('user', 'categories'));
    }
    public function show($id)
    {
        $dycryptId = decrypt($id);
        $book = Book::findOrFail($dycryptId);

        return response()->file( $book->book_pdf, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'. $book->name .'.pdf"',
        ]);
    }



    public function bookspagePatient()
    {
        $admin = auth()->user();
        $user = $admin->user;
      
        $categories = BookCategory::with('books')->get(); 

        return view('patient.book-sharing', compact('user', 'categories'));
    }
    public function showBookpatient($id)
    {
        $dycryptId = decrypt($id);
        $book = Book::findOrFail($dycryptId);

        return response()->file( $book->book_pdf, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'. $book->name .'.pdf"',
        ]);
    }
}
