<p>post: {{$article->id}}  
    code: {{$article->symbol_code}}
</p>
<h2>{{$article->name}}</h2>
<p>{{$article->content}}</p>
<p>{{$article->creation_time." ".$article->author}}</p>
<span>tags: </span>
@foreach ($article->tags as $tag)
    <span>{{$tag->name}}</span>
@endforeach
<?php echo '<br>'.'<br>'.'<br>'?>