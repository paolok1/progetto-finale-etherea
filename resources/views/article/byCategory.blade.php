<x-layout>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 pt-3">
                <h1 class="fs-3 text-center">Articoli della categoria <span class="fst-italic fw-bold">{{ $category->name }}</span>
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article )
                <div class="col-12 col-md-3">
                    <x-card :article="$article"/>
                </div>
                @empty
                <div class="col-12 text-center">
                    <h6>
                        Non sono ancora stati creati articoli in questa categoria
                    </h6>
                    @auth
                      <a class="btn btn-sensual my-5" href="{{ route('create.article') }}">Pubblica un articolo</a> 
                    @endauth
                </div>
            @endforelse
            </div>
        </div>
    
        </x-layout>
                