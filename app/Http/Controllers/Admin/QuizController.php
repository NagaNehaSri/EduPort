<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
  public function index(Request $request)
  {
    $chapter_id = $request->chapter_id;
    $data = Quiz::where('chapter_id', $chapter_id)->get();
    return view('admin.quiz.index', compact('data', 'chapter_id'));
  }
  public function create(Request $request)
  {
    $chapter_id = $request->chapter_id;

    return view('admin.quiz.create', compact("chapter_id"));
  }

  public function store(Request $request)
  {
    // dd($request->all());
    $data = $this->validate($request, [
      'chapter_id' => 'required',

      'priority' => 'required|integer',
      'question' => 'required',
      'option_1' => 'nullable',
      'option_2' => 'nullable',
      'option_3' => 'nullable',
      'option_4' => 'nullable',
      'image_1' => 'nullable',
      'image_2' => 'nullable',
      'image_3' => 'nullable',
      'image_4' => 'nullable',
      'correct_answer' => 'required',




    ]);
    if ($request->hasFile('image_1')) {
      $image_1 = 'image_1_' . rand() . '.' . $request->image_1->extension();
      $data['image_1'] = $image_1;
      $request->image_1->move(public_path('uploads/quiz'), $image_1);
  }
  
  if ($request->hasFile('image_2')) {
      $image_2 = 'image_2_' . rand() . '.' . $request->image_2->extension();
      $data['image_2'] = $image_2;
      $request->image_2->move(public_path('uploads/quiz'), $image_2);
  }
  
  if ($request->hasFile('image_3')) {
      $image_3 = 'image_3_' . rand() . '.' . $request->image_3->extension();
      $data['image_3'] = $image_3;
      $request->image_3->move(public_path('uploads/quiz'), $image_3);
  }
  
  if ($request->hasFile('image_4')) {
      $image_4 = 'image_4_' . rand() . '.' . $request->image_4->extension();
      $data['image_4'] = $image_4;
      $request->image_4->move(public_path('uploads/quiz'), $image_4);
  }
    if ($request->hasFile('question_image')) {
      $question_image = 'question_image_' . rand() . '.' . $request->question_image->extension();
      $data['question_image'] = $question_image;
      $request->image_4->move(public_path('uploads/quiz'),$question_image);
  }


    Quiz::create($data);
    return redirect()->route('quiz.index', ['chapter_id' => $request->chapter_id])->with('success', 'New  Quiz  Added');
  }

  public function edit($id)
  {
    $data = Quiz::where('id', $id)->first();
    return view('admin.quiz.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      //   'chapter_id' => 'required',

      'priority' => 'required|integer',

      'priority' => 'required|integer',
      'question' => 'required',
      'option_1' => 'nullable',
      'option_2' => 'nullable',
      'option_3' => 'nullable',
      'option_4' => 'nullable',
   
      'image_1' => 'nullable',
      'image_2' => 'nullable',
      'image_3' => 'nullable',
      'image_4' => 'nullable',
      'correct_answer' => 'required',

    ]);

    $image = Quiz::find($id);
    if ($request->hasFile('image_1')) {
      if ($image->image_1) {
        $oldPath = public_path('uploads/chapters/' . $image->image_1);
        if (file_exists($oldPath)) {
          unlink($oldPath); // Delete the old file
        }
      }

      $image_1 = 'image_1_' . uniqid() . '.' . $request->image_1->extension();
      $data['image_1'] = $image_1;
      $request->image_1->move(public_path('uploads/quiz'), $image_1);
    }

    if ($request->hasFile('image_2')) {
      if ($image->image_2) {
        $oldPath = public_path('uploads/quiz/' . $image->image_2);
        if (file_exists($oldPath)) {
          unlink($oldPath); // Delete the old file
        }
      }

      $image_2 = 'image_2_' . uniqid() . '.' . $request->image_2->extension();
      $data['image_2'] = $image_2;
      $request->image_2->move(public_path('uploads/quiz'), $image_2);
    }

    if ($request->hasFile('image_3')) {
      if ($image->image_3) {
        $oldPath = public_path('uploads/quiz/' . $image->image_3);
        if (file_exists($oldPath)) {
          unlink($oldPath); // Delete the old file
        }
      }

      $image_3 = 'image_3_' . uniqid() . '.' . $request->image_3->extension(); // Fixed typo: Changed $request->image_2 to $request->image_3
      $data['image_3'] = $image_3;
      $request->image_3->move(public_path('uploads/quiz'), $image_3);
    }

    if ($request->hasFile('image_4')) {
      if ($image->image_4) {
        $oldPath = public_path('uploads/quiz/' . $image->image_4);
        if (file_exists($oldPath)) {
          unlink($oldPath); // Delete the old file
        }
      }

      $image_4 = 'image_4_' . uniqid() . '.' . $request->image_4->extension();
      $data['image_4'] = $image_4;
      $request->image_4->move(public_path('uploads/quiz'), $image_4);
    }
        if ($request->hasFile('question_image')) {
      if ($image->image_4) {
        $oldPath = public_path('uploads/quiz/' . $image->question_image);
        if (file_exists($oldPath)) {
          unlink($oldPath); // Delete the old file
        }
      }

      $question_image = 'question_image' . uniqid() . '.' . $request->question_image->extension();
      $data['question_image'] = $question_image;
      $request->question_image->move(public_path('uploads/quiz'), $question_image);
    }


    $image->update($data);

    return redirect()->route('quiz.index', ['chapter_id' => $image->chapter_id])->with('primary', 'Quiz Updated Successfully');
  }
  function destroy($id)
  {
    $image = Quiz::findOrFail($id);
    // Delete the old video file if it exists

    $image->delete();
    return redirect()->back()->with('danger', 'Quiz  Deleted Successfully');
  }
}
