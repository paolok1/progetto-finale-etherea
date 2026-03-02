
  

<div class="card mx-auto shadow-sm" style="width: 12rem; height:21rem;"> <img style="height: 90px; object-fit:cover;" 
         src="{{ $article->images->isNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/200' }}" 
         class="card-img-top" alt="Immagine di {{ $article->title }}">
    
    <div class="card-body d-flex flex-column">
        <h5 class="card-title text-truncate">{{ $article->title }}</h5>
        <h6 class="card-subtitle mb-2 text-primary">{{ $article->price }} €</h6>
        
        <p class="card-text mb-1 text-center" style="font-size: 0.85rem;">
            <i class="bi bi-person"></i> Venduto da: <strong>{{ $article->user->name }}</strong>
        </p>

        <p class="card-text text-muted small text-truncate">{{ $article->description }}</p>
        
        <div class="mt-auto">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-sm btn-outline-danger w-100 mb-1">{{ __('ui.details') }}</a>
            <a href="{{ route('byCategory', ['category' => $article->category]) }}" 
               class="badge bg-secondary text-decoration-none w-100">
               {{__('ui.' . $article->category->name) }}
            </a>
        </div>
    </div>
</div>

