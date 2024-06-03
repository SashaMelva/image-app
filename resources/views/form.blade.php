@extends('layouts.app')

@section('content')

<form action="{{ route('image.add') }}" method="POST" enctype="multipart/form-data">
	@csrf 
	<input type="file" name="images[]" id="multiFile" accept="image/*" multiple>
    <button type="submit">Upload</button>
</form>
@if (session('images_result'))
     @foreach ( session('images_result') as $image )
          <p>{{ $image["file_name"] }}</p>
          <img class="rounded-4 col-md-6" src="{{ Storage::url($image["path"]) }}">
          
          @if (@empty( $image["path"]))
               <p>NO{{ $image["path"] }}</p>
          @else
               <p>{{ $image["path"] }}</p>
          @endif
     @endforeach
@endif

@endsection