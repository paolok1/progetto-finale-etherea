<x-layout>
    <div class="container-fluid pt-5">
        <div class="row mb-4">
            <div class="col-12 col-md-4">
                <div class="rounded shadow bg-body-tertiary p-3">
                    <h1 class="display-5 text-center">Revisor Dashboard</h1>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-6 alert alert-success text-center shadow rounded">
                {{ session('message') }}
            </div>
        </div>
        @endif

        @if ($article_to_check)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    @foreach ($article_to_check->images as $key => $image)
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded-start" alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                                </div>
                                <div class="col-md-5 ps-3">
                                    <div class="card-body">
                                        <h5>Labels</h5>
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                #{{ $label }},
                                            @endforeach
                                        @else
                                            <p class="fst-italic">No labels</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8 ps-3">
                                    <div class="card-body">
                                        <h5>Ratings</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-2"><div class="text-center mx-auto {{ $image->adult }}"></div></div>
                                            <div class="col-10">adult</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2"><div class="text-center mx-auto {{ $image->violence }}"></div></div>
                                            <div class="col-10">violence</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2"><div class="text-center mx-auto {{ $image->spoof }}"></div></div>
                                            <div class="col-10">spoof</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2"><div class="text-center mx-auto {{ $image->racy }}"></div></div>
                                            <div class="col-10">racy</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2"><div class="text-center mx-auto {{ $image->medical }}"></div></div>
                                            <div class="col-10">medical</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4 ps-md-4 d-flex flex-column justify-content-between">
                <div>
                    <h1>{{ $article_to_check->title }}</h1>
                    <h3>Autore: {{ $article_to_check->user->name }}</h3>
                    <h4>{{ $article_to_check->price }} €</h4>
                    <h4 class="fst-italic {{ $article_to_check->category ? 'text-muted' : 'text-danger' }}">
                        #{{ $article_to_check->category?->name ?? 'Categoria mancante' }}
                    </h4>
                    <p class="h6">{{ $article_to_check->description }}</p>
                </div>

                <div class="d-flex pb-4 justify-content-around mt-4">
                    <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger py-2 px-4 fw-bold shadow">Rifiuta</button>
                    </form>
                    <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success py-2 px-4 fw-bold shadow">Accetta</button>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="row justify-content-center align-items-center text-center min-vh-50">
            <div class="col-12">
                <h1 class="fst-italic display-4">Nessun articolo da revisionare</h1>
                <a href="{{ route('homepage') }}" class="btn btn-primary mt-3">Torna all'homepage</a>
            </div>
        </div>
        @endif
    </div>
</x-layout>