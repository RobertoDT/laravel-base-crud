<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form class="" action="{{route('books.store')}}" method="POST">
      @csrf
      @method("POST")

      <div class="">
        <label for="title">Titolo</label>
        <input type="text" name="title" value="" placeholder="titolo" id="title">
      </div>

      <div class="">
        <label for="author">Autore</label>
        <input type="text" name="author" value="" id="author">
      </div>

      <div class="">
        <label for="edition">Edizione</label>
        <input type="text" name="edition" value="" id="edition">
      </div>

      <div class="">
        <label for="genre">Genere</label>
        <input type="text" name="genre" value="" id="genre">
      </div>

      <div class="">
        <label for="image">Immagine URL</label>
        <input type="text" name="image" value="" id="image">
      </div>

      <div class="">
        <label for="year">Anno Pubblicazione</label>
        <input type="date" name="year" value="" id="year">
      </div>

      <div class="">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" value="" id="isbn">
      </div>

      <div class="">
        <label for="pages">Pagine</label>
        <input type="number" name="pages" value="" id="pages">
      </div>

      <input type="submit" name="" value="Salva">
    </form>

  </body>
</html>
