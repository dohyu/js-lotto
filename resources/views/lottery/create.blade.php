@extends('layouts.app')

<div class="container">
    <h1 class="page-header">1등 가즈아!!</h1>
    
    <ul>
        @foreach ($lists as $list)
        <li>{{ $list }}</li>
        @endforeach
    </ul>

</div>
