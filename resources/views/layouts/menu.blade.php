  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          {{-- <li class="active"><a href="{{route('index')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li> --}}
          <li class="active">
            <a href="{{url('/')}}">
                <span class="fa fa-home desktop-home"></span>
                <span class="mobile-show">Home</span>
            </a>
        </li>

          @foreach($menu as $value)
          @if(count($value->subcategory->where('status',1)) > 0)
              <li class="dropdown"> 
                <a href="{{route('getByCategory',$value->name)}}" class="dropdown-toggle {{ Request::is($subCat->name) ? 'active' : '' }}" data-toggle="dropdown" role="button" aria-expanded="false">{{$value->name}}</a>
                <ul class="dropdown-menu" role="menu">
                  @foreach ($value->subcategory->where('status',1) as $subCat)
                    <li><a href="{{route('getBySubCategory', $subCat->name)}}">{{$subCat->name}}</a></li>
                  @endforeach
                </ul>
             </li>
          @else
            {{-- <li><a href="{{route('getByCategory',$value->name)}}">{{$value->name}}</a></li> --}}
            <li><a href="{{route('getByCategory',$value->name)}}">{{$value->name}}</a></li>
          @endif
          @endforeach
        </ul>
      </div>
    </nav>
  </section>