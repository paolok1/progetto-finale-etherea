<nav class="nav-head navbar" style="background-color: #945259;"> 
  <div class="container-fluid px-4">
    <a class="navbar-brand" href="{{ route('homepage') }}" style="font-family: 'Cinzel', serif;">Etherea</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
        <li class="nav-item">
          <a aria-current="page" href="{{ route('homepage') }}" class="nav-link active">Home</a>
        </li>
        <li class="nav-item"><a class="dropdown-item" href="{{ route('article.index') }}">Tutti gli articoli</a></li>

        @auth
          @if(Auth::user()->is_revisor)
            <li class="nav-item">
              <a href="{{ route('revisor.index') }}" class="nav-link btn btn-sensual btn-sm position-relative w-sm-25">
                Zona revisore
                <span class="position-absolute top-0 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}</span>
              </a>
            </li>
          @endif

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ciao, {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu"> 
              <li>
                <a class="dropdown-item" href="#" 
                      onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
              </li>
              <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">@csrf</form>   
              <li><a class="dropdown-item" href="{{ route('create.article') }}">Crea articolo</a></li>
              
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">link</a></li>
            </ul>  
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#">
              Ciao Utente!
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item  d-flex" href="{{ route('login') }}">Accedi</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item  d-flex" href="{{ route('register') }}">Registrati</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown text-center d-flex mr-auto">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#"
            aria-expanded="false">
              Categorie
            </a>
            <ul class="dropdown-menu">
              @foreach ($categories as $category)
              <li><a class="dropdown-item d-flex fs-6 ms-auto" href="{{ route('byCategory', ['category'=>$category]) }}">{{ $category->name }}</a></li>
              @if(!$loop->last)
              <li><hr class="dropdown-divider"></li>
              @endif
              @endforeach
            </ul>
          </li>
          @endauth
        </ul>
        <form class="d-flex ms-auto" role="search" style="max-width: 300px; width: 100%;">
          <input class="form-control me-2" type="search" placeholder="Cerca..." aria-label="Search"/>
          <button class="btn btn-outline-light" type="submit">Cerca</button>
        </form>
    </div>
  </div>      
</nav>
                
                



              
            