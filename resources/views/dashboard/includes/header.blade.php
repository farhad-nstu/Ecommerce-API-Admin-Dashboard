<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/dashlite.css?ver=1.9.2">
    <link id="skin-default" rel="stylesheet" href="{{ asset('/') }}assets/css/theme.css?ver=1.9.2">
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=1.9.2">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=1.9.2">
    <link rel="stylesheet" href="./assets/css/editors/summernote.css?ver=1.9.2">
</head>