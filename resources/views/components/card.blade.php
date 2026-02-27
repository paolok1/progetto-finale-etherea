
  

            <div class="card mx-auto" style="width: 12rem; height:19rem;">
              <img style="height: 90px; object-fit:cover;" src="{{ $article->images->isNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/200' }}" 
              class="card-img-top" alt=" Immagine dell'articolo {{ $article->title }}">
              <div class="card-body">
                <h4 class="card-title">{{ $article->title }}</h5>
                <h6 class="card-subtitle">{{ $article->price }} €</h6>
                <p class="card-text">{{ $article->description }}</p>
                <a href="{{ route('article.show', compact('article')) }}" class="btn-sensual text-decoration-none">Dettaglio</a>
                <a href="{{ route('byCategory', ['category' => $article->category]) }}" 
                  class="btn anchor">{{ $article->category->name }}</a>
              </div>
            </div>

