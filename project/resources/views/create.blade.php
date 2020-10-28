<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!-- l'action deve avere la rotta dello store ossia dove si salvano i dati e specifichiamo sempre il metodo-->
    <form class="" action="{{route('books.store')}}" method="POST">
      <!-- token -->
      @csrf
      <!-- specifichiamo il metodo di nuovo -->
      @method("POST")

      <div class="">
        <label for="title">Titolo</label>
        <input type="text" name="title" value="" placeholder="titolo" id="title" required>
      </div>

      <div class="">
        <label for="author">Autore</label>
        <input type="text" name="author" value="" placeholder="autore" id="author" required>
      </div>

      <div class="">
        <label for="edition">Edizione</label>
        <input type="text" name="edition" value="" placeholder="edizione" id="edition" required>
      </div>

      <div class="">
        <label for="genre">Genere</label>
        <input type="text" name="genre" value="" placeholder="genere" id="genre" required>
      </div>

      <div class="">
        <label for="image">Immagine URL</label>
        <input type="text" name="image" value="" placeholder="url immagine" id="image" required>
      </div>

      <div class="">
        <label for="year">Anno Pubblicazione</label>
        <input type="date" name="year" value="" placeholder="anno pubblicazione" id="year" required>
      </div>

      <div class="">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" value="" placeholder="isbn" id="isbn" required>
      </div>

      <div class="">
        <label for="pages">Pagine</label>
        <input type="number" name="pages" value="" placeholder="numero pagine" id="pages" required>
      </div>

      <input type="submit" name="" value="Salva">
    </form>

    <!-- validazione -->
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
    @endif

  </body>
</html>
