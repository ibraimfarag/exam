@extends('layout.backend.app', [
    'title' => 'home page exam',
    'pageTitle' => 'home page exam',
])
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .text-editor {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            height: 200px;
            width: 100%;
        }

        .image-uploader {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .property-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
    <!-- Content Row -->
    <div class="container-fluid">
        <div class="container">

            <form action="{{ route('submit-form') }}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Section 1: Site Settings -->
                <div class="section">
                    <h2>Site Settings</h2>
                    <label for="site_title">Site Title:</label>
                    <input type="text" id="site_title" name="site_title"
                        value="{{ $siteSettings->site_title ?? old('site_title') }}"><br>

                    <label for="site_meta">Site Meta:</label>
                    <input type="text" id="site_meta" name="site_meta"
                        value="{{ $siteSettings->site_meta ?? old('site_meta') }}"><br>

                    <label for="site_description">Site Description:</label>
                    <input type="text" id="site_description" name="site_description"
                        value="{{ $siteSettings->site_description ?? old('site_description') }}"><br>

                    <label for="site_logo">Site Logo:</label>
                    <input type="file" id="site_logo" name="site_logo"
                        value="{{ $siteSettings->site_logo ?? old('site_logo') }}"><br>

                    <label for="site_favicon">Site Favicon:</label>
                    <input type="file" id="site_favicon" name="site_favicon"
                        value="{{ $siteSettings->site_favicon ?? old('site_favicon') }}"><br>

                    <label for="hotline_number">Hotline Number:</label>
                    <input type="text" id="hotline_number" name="hotline_number"
                        value="{{ $siteSettings->hotline_number ?? old('hotline_number') }}"><br>
                </div>

                <!-- Section 2: Home Intro -->
                <div class="section">
                    <h2>Home Intro</h2>
                    <label for="intro_text">Text Editor:</label>
                    <textarea class="text-editor" id="intro_text" name="intro_text">{{ $siteSettings->intro_text ?? old('intro_text') }}</textarea>

                    <label for="button_href">Button Href:</label>
                    <input type="text" id="button_href" name="button_href"
                        value="{{ $siteSettings->button_href ?? old('button_href') }}"><br>

                    <label for="button_text">Button Text:</label>
                    <input type="text" id="button_text" name="button_text"
                        value="{{ $siteSettings->button_text ?? old('button_text') }}"><br>

                    <div class="image-uploader">
                        <h3>Image Uploader</h3>
                        <input type="file" id="image1" name="image1"><br>

                    </div>
                </div>


                <div class="section">
                    <h2>Properties </h2>
                    <label for="properties_title">properties title:</label><br>
                    <input type="text" id="properties_title" name="properties_title"
                        value="{{ $siteSettings->properties_title ?? old('properties_title') }}"><br>
                    <br><br> <label for="properties_description">Text Editor:</label>
                    <textarea class="text-editor" id="properties_description" name="properties_description">{{ $siteSettings->properties_description ?? old('properties_description') }}</textarea>


                </div>


                <!-- Add Submit Button -->
                <button type="submit">Submit</button>
            </form>


        </div>
    </div>


@stop
