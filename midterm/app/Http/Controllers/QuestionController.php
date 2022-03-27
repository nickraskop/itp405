<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    // public function index()
    // {
    //     $invoices = Invoice::with(['customer'])->get();
        
    //     return view('invoice.index', [
    //         'invoices' => $invoices
    //     ]);
    // }

    public function index()
    {
      $questions = Question::with('answers')->orderBy('created_at')->get();
      return view('question.index', [
        'questions' => $questions,
      ]);
    }

    public function show($id)
    {
      $question = Question::with('answers')->where('id', '=', $id)->first();
      return view('question.show', [
        'question' => $question,
      ]);
    }

    public function store(Request $request)
    {
      $request->validate([
        'body' => 'required|min:5|ends_with:?|unique:questions,body',
      ]);

      $question = new Question();
      $question->body = $request->input('body');
      $question->save();

      return redirect()
        ->route('question.show', ['id' => $question->id])
        ->with('success', "Your question \"{$question->body}\" was successfully posted.");
    }

    // public function show($id)
    // {
    //     $invoice = Invoice::with([
    //         'invoiceItems.track',
    //         'invoiceItems.track.album',
    //         'invoiceItems.track.album.artist',
    //     ])->find($id);

    //     return view('invoice.show', [
    //         'invoice' => $invoice,
    //     ]);
    // }
}