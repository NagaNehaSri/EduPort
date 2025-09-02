<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Category;
use App\Models\ChapterPayments;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ChapterController extends Controller
{
    public function index()
    {
        // $data = Chapter::with(['activePayment'])->get();
        $data = Chapter::all();

        // $chepterpayment = ChapterPayments::where('chapter_id', $data['chapter_id'])
        // ->where('status', 'active') 
        // ->whereDate('end_date', '>=', now()->toDateString())
        // ->first(); 
        // $data[] =  $chepterpayment ;


        return view('admin.chapters.index', compact("data"));
    }

    public function create() 
    {
        $categories=Category::all();
        return view('admin.chapters.create',compact('categories'));
    }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'chapter_category' => 'nullable',
    //         'chapters_name' => 'nullable',
    //         'chapter_link'=> 'nullable',
    //         'author_name' => 'nullable',
    //         'chapter_amount'=> 'nullable',
    //         'priority' => 'nullable',
    //         'chapter_page_short_description' => 'nullable',
    //         'thumbnail_image' => 'nullable|mimes:jpg,png,jpeg,svg,webp',
    //         'view_image' => 'nullable|mimes:jpg,png,jpeg,svg,webp',
    //         'chapter_description' => 'nullable',
    //     ]);

    //     if ($request->hasFile('thumbnail_image')) {
    //         $thumbnail_image = 'thumbnail_image_' . rand() . '.' . $request->thumbnail_image->extension();
    //         $data['thumbnail_image'] = $thumbnail_image;
    //         $request->thumbnail_image->move(public_path('uploads/chapters'), $thumbnail_image);
    //     }

    //     if ($request->hasFile('view_image')) {
    //         $view_image = 'view_image_' . rand() . '.' . $request->view_image->extension();
    //         $data['view_image'] = $view_image;
    //         $request->view_image->move(public_path('uploads/chapters'), $view_image);
    //     }
    //     $data['slug'] = Str::slug($request->chapters_name, '-');
    //     Chapter::create($data);

    //     return redirect()->route('chapters.index')->with('success', 'Chapter data saved successfully!');
    // }


public function store(Request $request)
{
    $data = $request->validate([
        'chapter_category' => 'nullable|string|max:255',
        'chapters_name' => 'nullable|string|max:255',
        'chapter_link'=> 'nullable|string|max:255',
        'author_name' => 'nullable|string|max:255',
        'chapter_amount'=> 'nullable|numeric',
        'priority' => 'nullable|integer',
        'chapter_page_short_description' => 'nullable|string',
        'thumbnail_image' => 'nullable|mimes:jpg,png,jpeg,svg,webp',
        'view_image' => 'nullable|mimes:jpg,png,jpeg,svg,webp',
        'chapter_description' => 'nullable|string',
    ]);

    $data['chapter_category'] = $data['chapter_category'] ?: 'General';
    $data['chapters_name'] = $data['chapters_name'] ?: 'Untitled Chapter';
    $data['chapter_link'] = $data['chapter_link'] ?: null;
    $data['author_name'] = $data['author_name'] ?: 'Unknown Author';
    $data['chapter_amount'] = $data['chapter_amount'] ?? 0;
    $data['priority'] = $data['priority'] ?? 0;
    $data['chapter_page_short_description'] = $data['chapter_page_short_description'] ?: 'No short description available.';
    $data['chapter_description'] = $data['chapter_description'] ?: 'No detailed description available.';

    if ($request->hasFile('thumbnail_image')) {
        $thumbnail_image = 'thumbnail_image_' . uniqid() . '.' . $request->thumbnail_image->extension();
        $data['thumbnail_image'] = $thumbnail_image;
        $request->thumbnail_image->move(public_path('uploads/chapters'), $thumbnail_image);
    }


    if ($request->hasFile('view_image')) {
        $view_image = 'view_image_' . uniqid() . '.' . $request->view_image->extension();
        $data['view_image'] = $view_image;
        $request->view_image->move(public_path('uploads/chapters'), $view_image);
    }

    $data['slug'] = Str::slug($data['chapters_name'], '-');

    Chapter::create($data);

    return redirect()->route('chapters.index')->with('success', 'Chapter data saved successfully!');
}


    public function edit($id)
    {
        $data = Chapter::findOrFail($id);
        $categories = Category::all();
        return view('admin.chapters.edit', compact('data','categories'));
    }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         'chapter_category' => 'nullable',
    //         'chapter_link'=> 'nullable',
    //         'chapters_name' => 'nullable',
    //         'author_name' => 'nullable',
    //         'priority' => 'nullable',
    //         'chapter_amount'=> 'nullable',
    //         'chapter_page_short_description' => 'nullable',
    //         'thumbnail_image' => 'nullable|mimes:jpg,png,jpeg,svg,webp',
    //         'view_image' => 'nullable|mimes:jpg,png,jpeg,svg,webp',
    //         'chapter_description' => 'nullable',
    //     ]);

    //     $chapter = Chapter::findOrFail($id);

    //     if ($request->hasFile('thumbnail_image')) {
    //         if ($chapter->thumbnail_image) {
    //             $oldPath = public_path('uploads/chapters/' . $chapter->thumbnail_image);
    //             if (file_exists($oldPath)) {
    //                 unlink($oldPath);
    //             }
    //         }

    //         $thumbnail_image = 'thumbnail_image_' . rand() . '.' . $request->thumbnail_image->extension();
    //         $data['thumbnail_image'] = $thumbnail_image;
    //         $request->thumbnail_image->move(public_path('uploads/chapters'), $thumbnail_image);
    //     }

    //     if ($request->hasFile('view_image')) {
    //         if ($chapter->view_image) {
    //             $oldPath = public_path('uploads/chapters/' . $chapter->view_image);
    //             if (file_exists($oldPath)) {
    //                 unlink($oldPath);
    //             }
    //         }

    //         $view_image = 'view_image_' . rand() . '.' . $request->view_image->extension();
    //         $data['view_image'] = $view_image;
    //         $request->view_image->move(public_path('uploads/chapters'), $view_image);
    //     }
    //     $data['slug'] = Str::slug($request->chapters_name, '-');
    //     $chapter->update($data);

    //     return redirect()->route('chapters.index')->with('success', 'Chapter data updated successfully!');
    // }
    

public function update(Request $request, $id)
{
    $data = $request->validate([
        'chapter_category' => 'nullable|string|max:255',
        'chapter_link' => 'nullable|string|max:255',
        'chapters_name' => 'nullable|string|max:255',
        'author_name' => 'nullable|string|max:255',
        'priority' => 'nullable|integer',
        'chapter_amount' => 'nullable|numeric',
        'chapter_page_short_description' => 'nullable|string',
        'thumbnail_image' => 'nullable|mimes:jpg,png,jpeg,svg,webp',
        'view_image' => 'nullable|mimes:jpg,png,jpeg,svg,webp',
        'chapter_description' => 'nullable|string',
    ]);

    $chapter = Chapter::findOrFail($id);

    $data['chapter_category'] = $data['chapter_category'] ?: 'General';
    $data['chapters_name'] = $data['chapters_name'] ?: 'Untitled Chapter';
    $data['chapter_link'] = $data['chapter_link'] ?: null;
    $data['author_name'] = $data['author_name'] ?: 'Unknown Author';
    $data['priority'] = $data['priority'] ?? 0;
    $data['chapter_amount'] = $data['chapter_amount'] ?? 0;
    $data['chapter_page_short_description'] = $data['chapter_page_short_description'] ?: 'No short description available.';
    $data['chapter_description'] = $data['chapter_description'] ?: 'No detailed description available.';

    if ($request->hasFile('thumbnail_image')) {
        if ($chapter->thumbnail_image) {
            $oldPath = public_path('uploads/chapters/' . $chapter->thumbnail_image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $thumbnail_image = 'thumbnail_image_' . uniqid() . '.' . $request->thumbnail_image->extension();
        $data['thumbnail_image'] = $thumbnail_image;
        $request->thumbnail_image->move(public_path('uploads/chapters'), $thumbnail_image);
    }

    if ($request->hasFile('view_image')) {
        if ($chapter->view_image) {
            $oldPath = public_path('uploads/chapters/' . $chapter->view_image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $view_image = 'view_image_' . uniqid() . '.' . $request->view_image->extension();
        $data['view_image'] = $view_image;
        $request->view_image->move(public_path('uploads/chapters'), $view_image);
    }

    $data['slug'] = Str::slug($data['chapters_name'], '-');

    $chapter->update($data);

    return redirect()->route('chapters.index')->with('success', 'Chapter data updated successfully!');
}


    public function destroy($id)
    {
        $chapter = Chapter::findOrFail($id);

        // Delete thumbnail image
        if ($chapter->thumbnail_image) {
            $oldPath = public_path('uploads/chapters/' . $chapter->thumbnail_image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        // Delete view image
        if ($chapter->view_image) {
            $oldPath = public_path('uploads/chapters/' . $chapter->view_image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $chapter->delete();

        return redirect()->route('chapters.index')->with('success', 'Chapter data deleted successfully!');
    }
}
