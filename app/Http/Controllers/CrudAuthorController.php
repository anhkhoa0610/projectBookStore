<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Str;
class CrudAuthorController extends Controller
{

    /**
     * Display a listing of authors.
     */
    public function listAuthor(Request $request)
    {
        $search = $request->input('search');

        $authors = Author::when($search, function ($query, $search) {
            $query->where('author_name', 'like', "%{$search}%")
                ->orWhere('hometown', 'like', "%{$search}%");
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
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'birth_date' => 'nullable|date|before_or_equal:today',
            'hometown' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'bio' => 'nullable|string|max:2000',
        ], [
            'author_name.required' => 'Author name is required.',
            'birth_date.date' => 'Birth date must be a valid date.',
            'hometown.string' => 'Hometown must be a string.',
            'cover_image.image' => 'Cover image must be an image file.',
            'cover_image.mimes' => 'Cover image must be a file of type: jpeg, png, jpg, svg.',
            'cover_image.max' => 'Cover image may not be greater than 2MB.',
            'bio.string' => 'Bio must be a string.',
            'bio.max' => 'Bio may not be greater than 2000 characters.',
        ]);

        // Xử lý ảnh nếu có upload
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $validated['cover_image'] = $filename;
        } else {
            $validated['cover_image'] = 'placeholder.png';
        }

        // Tạo mới Author
        Author::create($validated);

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
            'birth_date' => 'nullable|date|before_or_equal:today',
            'hometown' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'bio' => 'nullable|string|max:2000',
        ], [
            'author_name.required' => 'Author name is required.',
            'birth_date.date' => 'Birth date must be a valid date.',
            'birth_date.before_or_equal' => 'Birth date cannot be in the future.',
            'hometown.string' => 'Hometown must be a string.',
            'cover_image.image' => 'Cover image must be an image file.',
            'cover_image.mimes' => 'Cover image must be a file of type: jpeg, png, jpg, svg.',
            'cover_image.max' => 'Cover image may not be greater than 2MB.',
            'bio.string' => 'Bio must be a string.',
            'bio.max' => 'Bio may not be greater than 2000 characters.',
        ]);

        $author = Author::findOrFail($id);

        $author->fill($request->only(['author_name', 'birth_date', 'hometown', 'bio']));

        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($author->cover_image && file_exists(public_path('images/' . $author->cover_image))) {
                unlink(public_path('images/' . $author->cover_image));
            }

            // Save new image
            $file = $request->file('cover_image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $author->cover_image = $filename;
        }

        $author->save();

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
