<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Setting;
use App\Models\Quiz;
use App\Models\QuizResults;
use App\Models\QuizSummary;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
 public function index()
{
    $chapters = Chapter::with(['category', 'activePayment'])
        ->whereNotNull('chapters_name') // Filter out records where chapter_name is null
        ->orderBy('priority', 'asc')
        ->paginate(8);

    return view('frontend.chapters', compact('chapters'));
}

    public function quizinfo()
    {
        $uid = Session('uid');
        $quiz = Quiz::all()->count();
        $perPage = 10;




        $summary = QuizSummary::where('uid', $uid)->with('chapter')->paginate($perPage);

        // $summary=QuizSummary::where('ui',  $uid)->get();
        return view('frontend.quiz-info', compact('summary', 'quiz'));
    }

    public function searchChapters(Request $request)
    {
        $search = $request->input('search');
        $chapters = Chapter::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('chapters_name', 'like', "%{$search}%");
            })
            ->orderBy('priority', 'asc')
            ->paginate(8);

        return view('frontend.chapters', compact('chapters', 'search'));
    }

    public function view($slug)
    {

        $setting = Setting::first();
            $chapters = Chapter::with(['category', 'activePayment'])
        ->whereNotNull('chapters_name') // Filter out records where chapter_name is null
        ->orderBy('priority', 'asc')
        ->paginate(8);


        $chapter = Chapter::with('contents')->where('slug', $slug)->first();


        if (!$chapter) {
            abort(404, 'Chapter not found');
        }


        // $chapter->increment('views');


        $uid = session('uid');


        $questions = Quiz::where('chapter_id', $chapter->id)->get();

        $allQuestionsAttempted = true;

        foreach ($questions as $question) {
            $attemptExists = QuizResults::where('uid', $uid)
                ->where('chapter_id', $chapter->id)
                ->where('question_id', $question->id)
                ->exists();

            if (!$attemptExists) {
                $allQuestionsAttempted = false;
                break;
            }
        }


        return view('frontend.chapter-view', compact('chapter','chapters' ,'setting', 'allQuestionsAttempted'));
    }

    public function quiz($slug)
    {
        $setting = Setting::first();
        $chapter = Chapter::where("slug", $slug)->first();

        $questions = $chapter->quizzes()->orderBy('priority', 'asc')->get();

        return view("frontend.quiz", compact("chapter", "setting", "questions"));
    }


    public function getQuestion(Request $request)
    {
        $slug = $request->input('slug');
        //$currentQuestionId = $request->input('current_question_id');
        // dd($currentQuestionId );

        $chapter = Chapter::where('slug', $slug)->first();

        if (!$chapter) {
            return response()->json(['error' => 'Chapter not found'], 404);
        }

        $chapterId = $chapter->id;
        if (!Session::has('attempt')) {
            $maxAttempt = QuizResults::where('uid', session('uid'))
                ->where('chapter_id', $chapterId)
                ->max('attempt');

            $attempt = ($maxAttempt !== null) ? $maxAttempt + 1 : 1;
            Session::put('attempt', $attempt);
        } else {
            $attempt = Session::get('attempt');
        }

        // Ensure attempt is correctly stored
        // Session::put('attempt', $attempt);
        // dd(Session('attempt'));





        $question_id = Session::get('question_id');
        // dd($question_id);






        // dd( $count );



        // Retrieve the question ID from session after ensuring it's set
        $question_id = Session::get('question_id');


        if (!Session::has('question_id') && Session::get('question_id') == '') {
            $question = Quiz::where('chapter_id', $chapterId)->first();
            $currentQuestionId = $question->id;
            // dd($currentQuestionId);
            Session::put('question_id', $currentQuestionId);
            $question_id = Session::get('question_id');
        }

        // print_r($question_id);die;

        $question = Quiz::where('chapter_id', $chapterId)
            ->where('id', $question_id)
            ->first();

        // dd($question);


        $totalQuestions = Quiz::where('chapter_id', $chapterId)->count();



        $no = Quiz::where("chapter_id", $chapterId)->where('id', '<=', $question_id)->count();

        if ($question) {
            return response()->json([
                'id' => $question->id,
                'question' => $question->question,
           'question_image' => $question->question_image 
    ? asset('uploads/quiz/' . $question->question_image) 
    : null,

                'options' => [
                    [
                        'letter' => 'A',
                        'text' => $question->option_1,
                        'image' => $question->image_1
                    ],
                    [
                        'letter' => 'B',
                        'text' => $question->option_2,
                        'image' => $question->image_2
                    ],
                    [
                        'letter' => 'C',
                        'text' => $question->option_3,
                        'image' => $question->image_3
                    ],
                    [
                        'letter' => 'D',
                        'text' => $question->option_4,
                        'image' => $question->image_4
                    ],
                ],
                'correct_answer' => $question->correct_answer,
                'total_questions' => $no,
            ]);
        }

        // if ($question) {
        //     // Session::put('question_id',$question->id);
        //     return response()->json([
        //         'id' => $question->id,
        //         'question' => $question->question,
        //         'options' => [
        //             ['letter' => 'A', 'text' => $question->option_1],
        //             ['letter' => 'B', 'text' => $question->option_2],
        //             ['letter' => 'C', 'text' => $question->option_3],
        //             ['letter' => 'D', 'text' => $question->option_4],
        //         ],
        //         'correct_answer' => $question->correct_answer,
        //         'total_questions' =>$no,
        //     ]);
        // }

        Session::forget('question_id');
        Session::forget('attempt');
        Session::forget('question_count');

        return response()->json(['redirect' => route('quiz.results', ['slug' => $slug])]);
    }

    public function submitAnswer(Request $request)
    {
        // Retrieve inputs
        $questionId = $request->input('question_id');
        // dd("hi");
        $userAnswer = $request->input('answer');
        $userselectedletter = $request->input('letter');
        // dd( $userAnswer );
        // dd( $userAnswer);
        $uid = session('uid');
        $attempt = Session::get('attempt');

        // Fetch the question details
        $question = Quiz::find($questionId);


        if (!$question) {
            return response()->json(['error' => 'Question not found'], 404);
        }



        // dd(Session::get('attempt'));
        $isCorrect = ($userAnswer === $question->correct_answer);
        // dd(Session::get('attempt'));
        QuizResults::create([
            'uid' => $uid,
            'chapter_id' => $question->chapter_id,
            'question_id' => $questionId,
            'answer' => $userAnswer,
            'is_correct' => $isCorrect,
            'attempt' =>  $attempt,
        ]);
        // dd($nextqu);
        // Next question session set
        $nextqu = Quiz::where('id', '>', $questionId)->first();

        if (!$nextqu) {

            $question_id = Session::get('question_id') + 1;
            Session::put('question_id', $question_id);
            return response()->json(['message' => "Question Completed"]);
        }
        Session::put('question_id', $nextqu->id);







        return response()->json(['is_correct' => $isCorrect]);
    }

    public function calculateScore(Request $request)
    {
        $uid = $request->input('uid');
        $chapterId = $request->input('chapter_id');

        $results = QuizResults::where('uid', $uid)
            ->where('chapter_id', $chapterId)
            ->get();

        $totalQuestions = $results->count();
        $correctAnswers = $results->where('is_correct', true)->count();

        $percentage = ($totalQuestions > 0) ? ($correctAnswers / $totalQuestions) * 100 : 0;

        return response()->json(['percentage' => $percentage]);
    }

    public function showResults($slug)
    {
        // Get the logged-in user's UID from the session
        $uid = session('uid');

        // Fetch the chapter based on the slug
        $chapter = Chapter::where('slug', $slug)->first();

        if (!$chapter) {
            abort(404, 'Chapter not found');
        }

        $chapterId = $chapter->id;

        // Step 1: Find the maximum attempt for the given UID and chapter ID
        $maxAttempt = QuizResults::where('uid', $uid)
            ->where('chapter_id', $chapterId)
            ->max('attempt');
        // dd($maxAttempt);

        // Step 2: Fetch the latest attempt data
        $results = QuizResults::where('uid', $uid)
            ->where('chapter_id', $chapterId)
            ->where('attempt', $maxAttempt)
            ->get();
        // dd(  $results->attempt);

        // Step 3: Calculate total questions, correct answers, marks, and percentage
        $totalQuestions = Quiz::where('chapter_id', $chapterId)->count();
        $correctAnswers = $results->where('is_correct', true)->count();
        $marks = $correctAnswers; // Assuming 1 mark per correct answer
        $percentage = ($totalQuestions > 0) ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;

        // Define passing criteria
        $passingMarks = 9; // Fixed passing marks
        $passingPercentage = ($totalQuestions > 0) ? round(($passingMarks / $totalQuestions) * 100, 2) : 0; // Calculate passing percentage

        // Determine if the user passed
        $passed = ($marks >= $passingMarks);

        // Step 4: Store the summary in the quiz_summary table
        QuizSummary::updateOrCreate(
            [
                'uid' => $uid,
                'chapter_id' => $chapterId,
                'attempt_number' => $maxAttempt,
            ],
            [
                'score' => $marks,
                'percentage' => $percentage,
            ]
        );

        // Return the view with the calculated data
        return view('frontend.quiz-results', [
            'percentage' => $percentage,
            'marks' => $marks,
            'passingPercentage' => $passingPercentage,
            'passingMarks' => $passingMarks,
            'passed' => $passed,
            'chapterSlug' => $slug,
            'results' => $results, // Optional: Pass the results data to the view if needed
        ]);
    }

    public function reviewQuiz($slug)
    {
        // Get the logged-in user's UID from the session
        $uid = session('uid');

        // Fetch the chapter based on the slug
        $chapter = Chapter::where('slug', $slug)->first();

        if (!$chapter) {
            abort(404, 'Chapter not found');
        }

        $chapterId = $chapter->id;

        // Step 1: Find the maximum attempt for the given UID and chapter ID
        $maxAttempt = QuizResults::where('uid', $uid)
            ->where('chapter_id', $chapterId)
            ->max('attempt');
        // dd( $maxAttempt);

        // Step 2: Fetch the latest attempt data
        $results = QuizResults::where('uid', $uid)
            ->where('chapter_id', $chapterId)
            ->where('attempt', $maxAttempt)
            ->get();

        // Step 3: Fetch all questions for the chapter
        $questions = Quiz::where('chapter_id', $chapterId)->get();

        // Step 4: Attach the user's answers from the latest attempt to the questions
        foreach ($questions as $question) {
            $result = $results->where('question_id', $question->id)->first();
            $question->user_answer = $result ? $result->answer : null;
        }

        // Return the view with the questions and user answers
        return view('frontend.quiz-review', [
            'questions' => $questions,
            'chapterSlug' => $slug,
        ]);
    }
}
