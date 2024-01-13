@extends('layouts.master')
@section('title', 'Khabarwaale - News Portal')
@section('desc', 'Khabarwaale - News Portal')
@section('keywords', 'Khabarwaale - News Portal')
@section('content')
    {{-- @livewire('frontend.category.category-top-add') --}}
        @livewire('frontend.homepage.home-top-add')

    <!-- Other category page content -->
    @livewire('frontend.category.view-category' ,['id' =>$id ])
@stop