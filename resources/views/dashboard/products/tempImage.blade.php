<div>
	@php
	$images = $product->image;
@endphp
@for($i = 0; $i < count($images); $i++)
	<img onclick="delete_confirm(`{{ $product->id }}`, `{{ $images[$i] }}`)" width="150px" height="150px" class="px-3" src="{{ asset($images[$i]) }}">
@endfor
</div>