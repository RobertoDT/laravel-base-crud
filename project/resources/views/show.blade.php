<ul>
  <li><img src="{{$book->image}}" alt=""></li>
  <li>{{$book->isbn}}</li>
  <li>{{$book->title}}</li>
  <li>{{$book->author}}</li>
  <li>{{$book->genre}}</li>
  <li>{{$book->edition}}</li>
  <li>{{$book->year}}</li>
  <li>{{$book->pages}}</li>
</ul>


<!-- form per la cancellazione -->
<form class="" action="{{route("books.destroy", $book->id)}}" method="POST">

  @method("DELETE")
  @csrf

  <!-- quando clicco sul bottone invio questo form che andrà a cancellare l'elemento -->
  <input type="submit" name="" value="Cancella">
</form>
