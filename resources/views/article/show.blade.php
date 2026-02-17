<x-layout>

<div class="container">
      <div class="row justify-content-center align-items-center text-center">
        <div class="col-12">
          <h1 class="display-4">
            Dettaglio dell'articolo {{ $article->title }}
          </h1>
        </div>
      </div>
    <div class="row justify-content-center py-3">
     <div class="col-12 col-md-6 mb-3">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://picsum.photos/300" class="d-block w-50" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/301" class="d-block w-50" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/302" class="d-block w-50" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
     </div>
     <div class="col-12 col-md-6 mb-3 text-center">
          <h2 class="display-5"><span class="fw-bold">Titolo:</span>{{ $article->title }}</h2>
          <div class="d-flex flex-column justify-content-center h-75">
              <h4 class="fw-bold">Prezzo: {{ $article->price }} €</h4>
              <h5>Descrizione:</h5>
              <p>{{ $article->description }}</p>
          </div>
     </div>
    </div> 
</div>
</x-layout>