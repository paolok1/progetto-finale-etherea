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
            </div>
        </div>

        <div class="row justify-content-center align-items-center py-3">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        Non sono stati inseriti articoli
                    </h3>
                </div>
            @endforelse
                
        </div>
    </div>
</x-layout>