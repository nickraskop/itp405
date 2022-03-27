<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Answer;

class AnswerController extends Controller
{
    // public function index()
    // {
    //     $invoices = Invoice::with(['customer'])->get();
        
    //     return view('invoice.index', [
    //         'invoices' => $invoices
    //     ]);
    // }


    public function store($id, Request $request)
    {
      $request->validate([
        'body' => 'required|min:5',
      ]);

      $answer = new Answer();
      $answer->body = $request->input('body');
      $answer->question_id = $id;
      $answer->save();

      return redirect()
        ->route('question.show', ['id' => $id])
        ->with('success', "Your answer \"{$answer->body}\" was successfully posted.");
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