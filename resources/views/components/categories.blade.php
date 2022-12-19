 <div class="list-group mt-4 ">
     @foreach($categories as $category)
         <a class="list-group-item list-group-item-action  {{ $category->slug == $slug ? 'active':'' }}" href= "{{route('articlesbycategory',$category->slug)}}" >{{  strtoupper(str_replace('-',' ',$category->slug)) }}</a>
     @endforeach
 </div>

