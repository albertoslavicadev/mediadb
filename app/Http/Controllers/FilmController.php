<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use willvincent\Rateable\Rating;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        return view('films.list')->with('films', $films);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $tags = Tag::all();
        $actors = Actor::all();
        return view('films.create')->with('actors', $actors)->with('tags', $tags)->with('genres', $genres);
        // Fare il compact per eliminare il resto
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
            'name_it' => 'required',
            'name_eng' => 'required',
            'release_date' => 'required',
            'trailer' => 'required'
        ]);
        $film = Film::create(['name_it' => $request->name_it, 'name_eng' => $request->name_eng, 'release_date' => $request->release_date]);
        $actor = $film->actors()->attach(1);
        $genre = $film->genres()->attach(1);
        $tag = $film->tags()->attach(1);
        return redirect()->route("films.index");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
    }

    public function star (Request $request, Film $films) {
        $rating = new Rating;
        $rating->user_id = Auth::id();
        $rating->rating = $request->input('star');
        $films->ratings()->save($rating);
        return redirect()->back();
    }
}
