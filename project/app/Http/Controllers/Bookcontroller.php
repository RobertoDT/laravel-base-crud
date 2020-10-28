<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books = Book::all();

      return view("index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //puntiamo semplicemente una view
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //la variabile request è un oggetto che ha tutti i dati di inserimento del form
        // dd($request->all()); con all ci restituisce tutti i dati del form sottoforma di array associativo
        $data = $request->all();

        //adesso validiamo i dati spediti dall'utente
        $request->validate([
          "title" => "required|max:30",
          "author" => "required|max:50",
          "pages" => "required|integer",
          "edition" => "required|max:50",
          "year" => "required|date",
          "isbn" => "required|unique:books|max:13",
          "genre" => "required|max:30",
          "image" => "required",
        ]);

        //istanziamo l'oggetto libro
        $book = new Book;

        $book->title = $data["title"];
        $book->author = $data["author"];
        $book->pages = $data["pages"];
        $book->edition = $data["edition"];
        $book->year = $data["year"];
        $book->isbn = $data["isbn"];
        $book->genre = $data["genre"];
        $book->image = $data["image"];

        //salvataggio all'interno del nostro db
        $book->save();
        // dd($book);

        return redirect()->route('books.show', $book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        //find in automatico fa SELECT * FROM books WHERE id = $id;
        $book = Book::find($id);

        return view("show", ["book" => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $book = Book::find($id);

      return view("edit", ["book" => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //prendiamo tutti i dati
        $data = $request->all();

        //sempre la validazione
        $request->validate([
          "title" => "required|max:30",
          "author" => "required|max:50",
          "pages" => "required|integer",
          "edition" => "required|max:50",
          "year" => "required|date",
          "isbn" => [
            "required",
            "max:13",
            Rule::unique("books")->ignore($id)
          ],
          "genre" => "required|max:30",
          "image" => "required",
        ]);

        //andiamo a recuperare quel libro(facciamo una select su quel libro) lo andiamo a cercare in pratica perchè esiste già non lo dobbiamo creare di nuovo
        $book = Book::find($id);

        //andiamo a modificare i dati
        $book->title = $data["title"];
        $book->author = $data["author"];
        $book->pages = $data["pages"];
        $book->edition = $data["edition"];
        $book->year = $data["year"];
        $book->isbn = $data["isbn"];
        $book->genre = $data["genre"];
        $book->image = $data["image"];

        $book->update();

        return redirect()->route('books.show', $book);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cerchiamo sempre il libro
        $book = Book::find($id);
        //cancelliamo il libro
        $book->delete();
        //reindirizziamo alla pagina iniziale
        return redirect()->route("books.index");
    }
}
