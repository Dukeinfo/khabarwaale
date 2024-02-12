@extends('layouts.master')
@section('title', 'Khabarwaale - Archive')
@section('desc', 'Khabarwaale - Archive News Portal')
@section('keywords', 'Khabarwaale -  Archive News Portal')
@section('content')
@livewire('frontend.archive.view-archive-news' , ['id' => $id])
@stop