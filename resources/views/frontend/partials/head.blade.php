<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $siteSettings->site_description }}">
    <meta name="keywords" content="{{ $siteSettings->site_meta }}">
    <!-- /* ----------------------------------------------------------------------- */
    /* -------------------------------- start css ------------------------------- */
    /* -------------------------------------------------------------------------- */-->
    <!--/* --------------------------------- Favicon -------------------------------- */-->
    <link rel="icon" type="image/x-icon" href="{{ asset($siteSettings->site_favicon) }}">




    <!--    /* ------------------------------ Bootstrap CSS ----------------------------- */-->

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap/bootstrap.min.css') }}">



    <!--   /* ------------------------------- Global css ------------------------------- */-->

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>


    <!-- /* --------------------------------- End Css -------------------------------- */-->





    <!--/* ------------------------------ Website Title ----------------------------- */-->
    <title>{{ $siteSettings->site_title }}</title>

</head>

<body>
    @include('frontend.partials.header')
