@extends('frontend.partials.master')

@section('content')
    <section class="section-home-intro">
        <div class="section section-intro">
            <div class="container-fluid">

                <div class="row nm">
                    {{-- left text  --}}

                    <div class="col-6 home-left-intro">

                        <div>{!! $siteSettings->intro_text !!}</div>






                        <a class="nav-link pl-0 pr-0 pt-5" href="{{ $siteSettings->button_href }}">
                            <div class="go_tech_buttons"><span>{{ $siteSettings->button_text }}</span> </div>
                        </a>


                    </div>
                    {{-- rigt place images --}}


                    <div class="col-6 right">







                        <div class="row-image-intro">
                            <div class="column-image-intro">
                                <img src="{{ asset($siteSettings->image1) }}" alt="Site intro">

                            </div>



                        </div>


                        <div class="col-4 p-1 ">



                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
    <section class="section-Properties">
        <div class="section">
            <div class="container-fluid">
                <div class="row nm">
                    <div class="col Properties-left-intro">
                        <div class="row pl-2 nm">
                            <span>
                                <h3 class=" text-uppercase section-title">{{ $siteSettings->properties_title }} </h3>
                            </span><i class="blockquote-footer"></i>
                        </div>

                        <div>{!! $siteSettings->properties_description !!}</div>
                    </div>
                </div>
                <div class="container">
                    <div class="row nm" id="cards-container">

                        @foreach ($cards->take(3) as $card)
                            <div class="card col-3 np m-5 border-0 rounded-cr" style="width: 18rem;">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach ($card->images as $key => $imagePath)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                                {{ $key == 0 ? 'class=active' : '' }}></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($card->images as $key => $imagePath)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset($imagePath) }}" alt="Card Image">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-target="#carouselExampleIndicators" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-target="#carouselExampleIndicators" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <h5 class="title-properties">{{ $card->title }}</h5>
                                    <p class="discrp-properties">{{ $card->description }}</p>

                                    <div class="row ">




                                        <h7 class="sym-properties">AED</h7>

                                        <span class="price-properties">{{ $card->price }}</span>

                                        <p class="text-right rt"> onplane</p>





                                    </div>

                                    <div class="Rectangle_7">
                                        <div class="row">
                                            <div class="col-6">
                                                <span>Quarterly</span>
                                                <p>paid returns</p>
                                            </div>
                                            <div class="col-6">
                                                <span>20%</span>
                                                <p>annual yield</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center button-properties">

                                        <a href="#" class="btn btn-primary ">Enquire Now</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>




                </div>

            </div>

        </div>




    </section>


    <section class="section-get-in">
        <div class="section get-in">
            <div class="container-fluid>">
                <div class="row nm">
                    <div class="col get-in-left-intro">
                        <div class="row pl-2 nm">
                            <span>
                                <h3 class=" text-uppercase section-title">Get in Touch </h3>
                            </span><i class="blockquote-footer"></i>
                        </div>

                        <h2 class="font-weight-bold section-dis">Interested To Know More? </h2>

                        <form name="message" method="post" action="{{ route('store.inbox') }}" class="form">
                            @csrf <!-- Add the CSRF token -->

                            <section>
                                <div style="float:left;margin-right:20px;">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" value="" name="name">
                                </div>

                                <div style="float:left;">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" value="" name="email">
                                </div>

                                <br style="clear:both;" />
                            </section>

                            <section>
                                <div style="float:left;margin-right:20px;">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" name="phone_number" id="phone_number" />
                                </div>

                                <div style="float:left;">
                                    <label for="Investment_Amount">Investment Amount</label>
                                    <input id="Investment_Amount" type="text" value="" name="investment_amount">
                                    <!-- Change the name to match the database column -->
                                </div>

                                <br style="clear:both;" />
                            </section>

                            <section>
                                <label for="message">Message</label>
                                <input id="message" type="text" value="" name="message"
                                    class="message-input">

                                <input type="submit">
                            </section>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection

@section('scripts')
    {{-- <script>
        window.onload = function() {
            if (window.jQuery) {
                // jQuery is loaded  
                alert("Yeah!");
            } else {
                alert("not work!");
                reload();
            }

        }
    </script> --}}


    <script>
        var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
            separateDialCode: true,
            preferredCountries: ["ae"],
            hiddenInput: "full",
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });

        $("form").submit(function() {
            var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
            $("input[name='phone_number[full]'").val(full_number);
            // No alert here, so it won't display an alert
        });
    </script>
@endsection
