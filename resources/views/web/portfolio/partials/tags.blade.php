<h3>Tags</h3>
@foreach($tags as $tag)
	<span class="badge badgeBlue">
		<a href="{{ route('web.search.tag', $tag->name )}}">
			{{ $tag->name }}
		</a>
	</span>
@endforeach
