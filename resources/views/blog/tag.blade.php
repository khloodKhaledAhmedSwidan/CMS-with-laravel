@extends('layouts.blog')





@section('content')



<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear">
      <div class="fl_left">
           <h2 class="title">Search </h2>
        <div id="hpage_quicklinks">


<form class="form-inline md-form mr-auto mb-4" action="" method="get" >
  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search" value="{{request()->query('search')}}">
  <button class="btn btn-elegant btn-rounded btn-sm my-0" type="submit">Search</button>
</form>

        </div>


        <h2 class="title">Category</h2>
        <div id="hpage_quicklinks">
          <ul class="clear">
            @foreach($categories as $category)
            <li><a href="#">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </div>
        <h2 class="title">Tags</h2>
       <div id="hpage_quicklinks">
          <ul class="clear">
            @foreach($tags as $tag)
            <li><a href="#">{{$tag->name}}</a></li>
            @endforeach
          </ul>
        </div>

      </div>
      <!-- ############### -->
      <div class="fl_right">
        <h2 class="title">Posts</h2>
        <div id="hpage_latestnews">
          <ul>
            @forelse($posts as $post)
            <li>
              <div class="imgl"><img src="{{$post->image}}" alt="" width="160px" height="80px" /></div>
              <center>{{$post->title}}</center>
 <p class="latestnews">{{$post->content}}</p>
              <p class="readmore"><a href="{{route('post.show',$post->id)}}">Continue Reading &raquo;</a></p>
            </li>
@empty
<p class="text-center">
  No results
</p>
@endforelse


          </ul>
        </div>
     <center><p>{{$posts->appends(['search'=>request()->query('search')])->links()}}</p></center>
      </div>
    </div>
    <!-- ####################################################################################################### --> 
  </div>
</div>
<!-- ####################################################################################################### -->

@endsection








