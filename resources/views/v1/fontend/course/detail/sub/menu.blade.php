<div class="col-md-3" style="padding: 0 !important">
  <nav class="docs-sidebar" data-spy="affix" data-offset-top="300" data-offset-bottom="200" role="navigation">
      <ul class="nav">
        @foreach($contents as $key => $val)
          <li><a href="{{ url()->current() }}#line{{$val->id}}">{{ $val->title }}</a></li>                  
        @endforeach
        <li><a href="{{ url()->current() }}#lineCopy">Copyright and license</a></li>
      </ul>
  </nav>
</div>