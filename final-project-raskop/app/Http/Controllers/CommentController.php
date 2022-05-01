<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
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

      $comment = new Comment();
      $comment->body = $request->input('body');
      $comment->post_id = $id;
      $comment->save();

      return redirect()
        ->route('post.show', ['id' => $id])
        ->with('success', "Your answer \"{$comment->body}\" was successfully posted.");
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