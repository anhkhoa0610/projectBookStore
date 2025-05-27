<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
class CrudAuthorController extends Controller
{

    /**
     * Display a listing of authors.
     */
    public function listAuthor(request $request)
    {
        $search = $request->input('search');

        $authors = Author::when($search, function ($query, $search) {
            $query->where('author_name', 'like', "%{$search}%");
        })->paginate(10)->appends(['search' => $search]);
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
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'bio' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename); // Save the file to 'public/uploads'
            $data['cover_image'] = $filename; // Save the filename in the database
        } else {
            $data['cover_image'] = "placeholder.png"; // Default image if no file is uploaded
        }

        Author::created([
            'author_name' => $data['author_name'],
            'cover_image' => $data['cover_image'],
            'bio' => $data['bio'],
        ]);

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
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'bio' => 'nullable|string',
        ]);

        $author = Author::findOrFail($id);
        $author->update($request->all());

        if ($request->hasFile('cover_image')) {
            // Delete the old cover image if it exists
            if ($author->cover_image && file_exists(public_path('uploads/' . $author->cover_image))) {
                unlink(public_path('uploads/' . $author->cover_image));
            }

            // Save the new cover image
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $author->cover_image = $filename;
        }

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
