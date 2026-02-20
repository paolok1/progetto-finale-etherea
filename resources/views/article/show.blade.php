<x-layout>
    <div class="container pt-5">
        <div class="row justify-content-center align-items-center text-center mb-5">
            <div class="col-12">
                <h1 class="display-4">Dettaglio dell'articolo: {{ $article->title }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                @if ($article->images->count() > 0)
                    <div id="carouselExample" class="carousel slide shadow rounded">
                            <div class="carousel-inner">
                                @foreach ($article->images as $key => $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100 rounded shadow"
                                            alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                    </div>
                                @endforeach
                            </div>
                    </div>

                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="https://picsum.photos/300/300" class="img-fluid rounded shadow" alt="Nessuna foto inserita">
                @endif
            </div>

            <div class="col-12 col-md-6 text-center">
                <h2 class="display-5"><span class="fw-bold">Titolo: </span>{{ $article->title }}</h2>
                <div class="d-flex flex-column justify-content-center h-75">
                    <h4 class="fw-bold mt-3">Prezzo: {{ $article->price }} €</h4>
                    <h5 class="mt-3 fw-bold">Descrizione:</h5>
                    <p class="px-3">{{ $article->description }}</p>
                </div>
            </div>
        </div>
    </div>

</x-layout>