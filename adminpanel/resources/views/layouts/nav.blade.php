<div class="blog-masthead">
    <div class="container">
      <nav class="nav blog-nav">
        <a class="nav-link active" href="/">Website</a>
        <a class="nav-link active" href="/admin">Home</a>
        @if (Auth::check())
        <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
                  <a class="nav-link" href="/create">Nieuw item</a>
        @endif
      </nav>
    </div>
</div>
