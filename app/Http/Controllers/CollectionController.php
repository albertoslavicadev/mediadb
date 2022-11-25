<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Actor;
use App\Models\Collection;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Tag;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        $genres = Genre::all();
        $tags = Tag::all();
        $actors = Actor::all();
        $collections = Collection::all();
        return view('collections.list', compact('collections',
            'films', 'genres', 'tags', 'actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $films = Film::all();
        $collections = Collection::all();
        return view('collections.create', compact('collections', 'films'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'

        ]);
        $collection = Collection::create(['name' => $request->name]);
        $film = $collection->films()->sync($request->input('film'));
        return redirect()->route("collections.index");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Collection $collection
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {

        return view('collections.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Collection $collection
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        $film = Genre::all();
        return view('collections.edit')->with('film', $film);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Collection $collection
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $collection->update(['name' => $request->name]);
        $film = $collection->films()->sync($request->input('film[]'));
        return redirect('/') ->with('success', 'Collection updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Collection $collection
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Collection $collection)
    {
        $collection->films()->detach();
        $collection->delete();
        return redirect('/') ->with('success', 'Collection deleted successfully!');
    }

    public function __construct()	{
        $this->middleware('auth');
    }

    public function createReview(Request $request)
    {
        $collection_id = (int) $request->get('collection');
        $vote = (int) $request->get('vote');
        $review = new Review([
            'vote' => $vote,
            'collection_id' => $collection_id
        ]);
        $review->save();

        return response()->json(['saved' => true]);
    }
    public function single($slug)
    {
        $collection = Collection::where('slug', $slug)->first();

        if(is_null($collection)) {
            return redirect()->route('home');
        }

        $reviews = $collection->reviews;
        $total_reviews = count($reviews);
        $average = 0;

        if($total_reviews > 0) {
            $total_vote = 0;
            foreach($reviews as $review) {
                $total_vote += $review->vote;
            }

            $average = floor($total_vote / $total_reviews );
        }

        return view('single',[
            'title' => $collection->title . ' | E-commerce',
            'product' => $collection,
            'total_reviews' => $total_reviews,
            'average' => $average
        ]);
    }

    public function createComments()
    {
        $comments = Comment::all();
        return view('collections.create', compact( 'comments'));
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'name' => 'required'

        ]);
        $comments = Comment::create(['name' => $request->name]);
        return view('collections.create', compact( 'comments'));
    }

}


