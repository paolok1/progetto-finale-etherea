


<div class="card mx-auto" style="width: 18rem;">
  <img src="https://picsum.photos/200" class="card-img-top" alt="...">
  <div class="card-body">
    <h4 class="card-title">{{ $article->title }}</h4>
    <h6 class="card-subtitle">{{ $article->price }} €</h6>
    <p class="card-text">{{ $article->description }}</p>
    <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">Dettaglio</a>
    <a href="{{ route('byCategory', ['category' => $article->category]) }}" 
      class="btn btn-sensual">{{ $article->category->name }}</a>
  </div>
</div>
