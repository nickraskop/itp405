<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function index()
    {
      return redirect()
        ->route('question.show', ['id' => $id])
    }
}