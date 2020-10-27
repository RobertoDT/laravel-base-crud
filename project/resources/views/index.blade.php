<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Books</title>
  </head>
  <body>

    @foreach($books as $book)
      <div class="card">
        <h2>{{$book->title}}</h2>
        <h3>{{$book->author}}</h3>
        <small>{{$book->edition}}</small>
        <img src="{{$book->image}}" alt="">
      </div>
    @endforeach

  </body>
</html>
