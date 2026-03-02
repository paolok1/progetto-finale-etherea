<nav class="nav-head navbar navbar-expand-lg" style="background-color: #945259;"> 
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
        <li class="nav-item">
          <a class="nav-link" href="{{ route('article.index') }}">{{ __('ui.allArticles') }}</a>
        </li>

        @auth
          @if(Auth::user()->is_revisor)
            <li class="nav-item">
              <a href="{{ route('revisor.index') }}" class="nav-link position-relative w-sm-25">
                {{ __('ui.revisor') }}
                <span class="position-absolute top-0 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}</span>
              </a>
            </li>
          @endif

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             {{ __('ui.hello') }} {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu"> 
              <li>
                <a class="dropdown-item" href="#" 
                      onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
              </li>
              <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">@csrf</form>   
              <li><a class="dropdown-item" href="{{ route('create.article') }}">Crea articolo</a></li>
            </ul>  
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#">
              {{ __('ui.helloUser') }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item  d-flex" href="{{ route('login') }}">{{ __('ui.login') }}</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item  d-flex" href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown text-center d-flex mr-auto">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#"
            aria-expanded="false">
              {{ __('ui.categories') }}
            </a>
            <ul class="dropdown-menu">
              @foreach ($categories as $category)
              <li><a class="dropdown-item d-flex ms-auto" href="{{ route('byCategory', ['category'=>$category]) }}">{{__('ui.' . $category->name) }}</a></li>
              @if(!$loop->last)
              <li><hr class="dropdown-divider"></li>
              @endif
              @endforeach
            </ul>
          </li>
          @endauth
        </ul>
        <form class="d-flex ms-auto search-bar" role="search" action="{{ route('article.search') }}" method="GET" style="max-width: 300px; width: 100%;">
          <input class="form-control me-2" type="search" name="query" placeholder="{{ __('ui.search') }}" aria-label="Search"/>
          <button class="btn btn-sensual input-group-text" type="submit">{{ __('ui.search') }}</button>
        </form>
    </div>
    <x-_locale lang="it" />
    <x-_locale lang="en" />
  </div>      
</nav>
                
                



              
            