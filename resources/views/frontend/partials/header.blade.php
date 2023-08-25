<header>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#"><img src="{{ asset($siteSettings->site_logo) }}" alt="Site Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Comparison <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bond</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>



                </ul>
                <div class="my-2 my-lg-0">
                    <a class="nav-link" href="#">
                        <div class="call_buttons"><img src="{{ asset('assets/frontend/img/contact-phone.png') }}"
                                alt="Logo"><span>{{ $siteSettings->hotline_number }}</span> </div>
                    </a>

                </div>

            </div>

        </nav>
    </div>

</header>
