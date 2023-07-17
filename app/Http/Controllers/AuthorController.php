<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::orderby('id')->paginate(15);
        return view('authors.index', compact(
            'authors'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        $file = $request->file('avatar');
        $upload_folder = 'public/authors';
        $filename = $file->getClientOriginalName(); // image.jpg
        Storage::putFileAs($upload_folder, $file, $filename);
        try {
            Author::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'avatar' => $filename
            ]);

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return redirect()->route('authors.index')->with('success', 'Автор успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('Authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $image = $request->file('avatar');
        if ($image != '') {
            $upload_folder = 'public/authors';
            $filename = $image->getClientOriginalName(); // image.jpg
            Storage::putFileAs($upload_folder, $image, $filename);
            $author->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'avatar' => $filename
            ]);
        } else {
            $author->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
        }
        return redirect()->route('authors.index')->with('success', 'Автор успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Автор успешно удален');

    }
}
