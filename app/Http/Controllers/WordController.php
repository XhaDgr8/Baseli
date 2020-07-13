<?php

namespace App\Http\Controllers;

use App\Word;
use App\Synonyms;
use App\Events\NewWord;
use App\Jobs\SyncMedia;
use Illuminate\Http\Request;
use App\Http\Requests\WordStoreRequest;
use App\Http\Requests\WordUpdateRequest;

class WordController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $words = Word::all();
        return view('word.index', compact('words'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Word $word
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Word $word)
    {
        return view('word.show', compact('word'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('word.create');
    }

    /**
     * @param \App\Http\Requests\WordStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WordStoreRequest $request)
    {
        $word = Word::create($request->all());

        SyncMedia::dispatch($word);

        event(new NewWord($word));

        $request->session()->flash('word.word', $word->word);

        return redirect()->route('word.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Word $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Word $word)
    {
        return view('word.edit');
    }

    /**
     * @param \App\Http\Requests\WordUpdateRequest $request
     * @param \App\Word $word
     * @return \Illuminate\Http\Response
     */
    public function update(WordUpdateRequest $request, Word $word)
    {
        $word->update([]);

        SyncMedia::dispatch($word);

        event(new NewWord($word));

        $request->session()->flash('word.word', $word->word);

        return redirect()->route('word.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Word $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Word $word)
    {
        $word->delete();

        return redirect()->route('back');
    }
}
