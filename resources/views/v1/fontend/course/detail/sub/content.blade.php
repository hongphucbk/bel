@foreach($contents as $key => $val)
  <section id="line{{$val->id}}">
      <div class="row">
          <div class="col-md-12 left-align">
              <h4 class="dark-text">{{ $val->title }} <a href="{{ url()->current() }}#top">#back to top</a>
                @if(is_admin_edit_content_course(Auth::user()))
                <a href="v1/admin/content/edit/{{$val->id}}">edit</a>
                @endif
              <hr></h4>
          </div>
          <!-- end col -->
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-md-12 .cke_editable">
          {!! $val->content !!}
          
         
        </div>
        <!-- <textarea name="content" id="editor">{!! htmlspecialchars($val->content) !!}</textarea> -->

      </div>
  </section>
@endforeach