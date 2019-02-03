@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-header">1등 가즈아!!</h1>
    
    <ol id="created">
        @foreach ($lists as $list)
            <li>{{ $list }}</li>
        @endforeach
    </ol>
</div>
@endsection

@section('script')
    @parent

    <script>
        $('#created li').each(function(idx) {
            if ((idx + 1) % 5 == 0) {
                $(this).addClass('li__has_margin');
            }
        });
    </script>
@endsection