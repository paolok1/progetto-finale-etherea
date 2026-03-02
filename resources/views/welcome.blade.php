<x-layout>
    <div class="container-fluid text-center">

            @if (session()->has('message'))
                <div class="alert alert-danger text-center shadow rounded w-50">
                {{ session('message') }}
                </div>
            @endif

            @if (session()->has('errorMessage'))
                <div class="alert alert-danger text-center shadow rounded w-50">
                    {{ session('errorMessage') }}
                </div>
            @endif
            
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-4">ETHEREA</h1>
                <div class="my-3 text-center">
                    @auth
                        <a href="{{ route('create.article') }}" class="btn btn-dark">Pubblica un articolo</a>
                    @endauth
                </div>
                <h1 class="testo-apparizione text-center">{{ __('ui.pleasure') }}</h1>
            </div>
        </div>


  

@if($lastArticles->count() > 0)
<div class="row justify-content-center my-4">
    <div class="col-12 col-md-4"> <div id="latestArticlesCarousel" class="carousel slide shadow-sm rounded overflow-hidden" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($lastArticles as $index => $article)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ $article->image ? Storage::url($article->image) : 'https://picsum.photos/400/200' }}" 
                             class="d-block w-100" 
                             style="height: 200px; object-fit: cover;" 
                             alt="{{ $article->title }}">
                        
                        <div class="carousel-caption d-block bg-dark bg-opacity-75 p-1 mb-0 rounded-bottom" style="left:0; right:0; bottom:0;">
                            <p class="m-0 small fw-bold text-white">{{ $article->title }}</p>
                            <a href="{{ route('article.show', $article) }}" class="link-light small" style="font-size: 0.7rem;">Dettagli</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#latestArticlesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 1.2rem;"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#latestArticlesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="width: 1.2rem;"></span>
            </button>
        </div>
    </div>
</div>
@endif
    </div>
</x-layout>