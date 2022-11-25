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
        $genres = Genre::all();
        $tags = Tag::all();
        $actors = Actor::all();
        return view('films.list')->with('films', $films)->with('actors', $actors)->with('tags', $tags)->with('genres', $genres);
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
        $film = Film::create(['name_it' => $request->name_it, 'name_eng' => $request->name_eng, 'release_date' => $request->release_date, 'trailer' => $request->trailer]);
//        dd($request->input('actor'));
        $film->actors()->sync($request->input('actor'));
        $film->genres()->sync($request->input('genre'));
        $film->tags()->sync($request->input('tag'));
        return redirect()->route("films.index");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tmdb::getMoviesApi()->getMovie($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        $genres = Genre::all();
        $tags = Tag::all();
        $actors = Actor::all();
        return view('films.edit')->with('film', $film)->with('actors', $actors)->with('tags', $tags)->with('genres', $genres);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Film $film
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'name_it' => 'required',
            'name_eng' => 'required',
            'release_date' => 'required',
            'trailer' => 'required'
        ]);
        $film->update(['name_it' => $request->name_it, 'name_eng' => $request->name_eng, 'release_date' => $request->release_date]);
        $actor = $film->actors()->sync($request->input('actor[]'));
        $genre = $film->genres()->sync($request->input('genre[]'));
        $tag = $film->tags()->sync($request->input('tag[]'));
        return redirect('/films') ->with('success', 'Film updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Film $film)
    {
        $film->actors()->detach();
        $film->genres()->detach();
        $film->tags()->detach();
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film eliminato con successo.');

    }

    public function formSubmit(Request $request)

    {

        return response()->json([$request->all()]);

    }
}
