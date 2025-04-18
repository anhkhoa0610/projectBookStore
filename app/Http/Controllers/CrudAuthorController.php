<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
class CrudAuthorController extends Controller
{

    /**
     * Display a listing of authors.
     */
    public function listAuthor()
    {
        $authors = Author::all();
        return view('crud_author.list', compact('authors'));
    }

    /**
     * Show the form for creating a new author.
     */
    public function createAuthor()
    {
        return view('crud_author.create');
    }

    /**
     * Store a newly created author in storage.
     */
    public function postAuthor(Request $request)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        Author::create($request->all());

        return redirect()->route('authors.list')->with('status', 'Author created successfully!');
    }

    /**
     * Show the form for editing the specified author.
     */
    public function editAuthor($id)
    {
        $author = Author::findOrFail($id);
        return view('crud_author.edit', compact('author'));
    }

    /**
     * Update the specified author in storage.
     */
    public function updateAuthor(Request $request, $id)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $author = Author::findOrFail($id);
        $author->update($request->all());

        return redirect()->route('authors.list')->with('status', 'Author updated successfully!');
    }

    /**
     * Remove the specified author from storage.
     */
    public function deleteAuthor($id)
    {
        Author::destroy($id);
        return redirect()->route('authors.list')->with('status', 'Author deleted successfully!');
    }

    /**
     * Display the specified author.
     */
    public function readAuthor($id)
    {
        $author = Author::findOrFail($id);
        return view('crud_author.read', compact('author'));
    }
}
