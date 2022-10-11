@extends('layouts.frontend.master')
@section('title')
    {{ !empty($menu['menu']) ? $menu['transtitle'] : '' }}
@endsection
@section('keyword')
    {{ !empty($menu['keyword']) ? $menu['transkeyword'] : '' }}
@endsection
@section('description')
    {{ !empty($menu['description']) ? $menu['transdescription'] : '' }}
@endsection
@section('head')
@endsection
@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="text-light"
            data-bgimage="url(https://www.designesia.com/themes/priva/images/background/subheader3.jpg) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h1>Careers</h1>
                            <p>We're always looking for great talents.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section aria-label="section" data-bgcolor="#ffffff">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-md-6">
                        <div class="de-images">
                            {{-- <img class="di-small-2" src="{{asset('frontend')}}/images/misc/e2.jpg" alt="" /> --}}
                            <img class="di-big img-fluid" src="{{ asset('frontend') }}/images/misc/e1.jpg" alt="" />
                        </div>
                    </div>

                    <div class="col-md-5 offset-md-1">
                        <h2>{{ $career->transname }}</h2>
                        <p>{{ $career->transdescription }}</p>
                    </div>

                </div>
            </div>
        </section>


        <section aria-label="section" data-bgcolor="#f8f8f8">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">

                        <div class="expand-list">
                            @forelse ($vacancies as $item)
                                <div class="expand-custom">
                                    <div class="ec-header">
                                        <div class="c1">
                                            <img src="images/misc/avatar-1.png" alt="">
                                        </div>
                                        <div class="c2">
                                            <h4>{{ $item->transname }}</h4>
                                        </div>
                                        <div class="c3">
                                            <span class="toggle"></span>
                                        </div>
                                    </div>



                                    <div class="details">
                                        <div class="row">
                                            {!! $item->transtext !!}

                                            <div class="spacer-single"></div>

                                            <div class="col-md-12">
                                                <button class="btn btn-custom apply apply-modal">Apply Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt40 pb40 bg-color-secondary">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 offset-md-1 mb-sm-30">
                        <h3 class="no-bottom">Do you want to join our team?</h3>
                    </div>

                    <div class="col-md-4 text-center">
                        <a href="#" class="btn-custom">Join Us</a>
                    </div>
                </div>
            </div>
        </section>

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <form action="">
                    <input type="text" placeholder="Ad">
                    <input type="text" placeholder="E-mail">
                    <input type="text" placeholder="Mobil nömrə">
                    <div class="choose-file_button">
                        <div class="cv">CV, Resume</div>
                        <input type="file" class="choose-file">
                    </div>
                    <textarea name="" id="" cols="10" rows="5"></textarea>
                    <button class="apply-button">Apply</button>
                </form>
            </div>

        </div>

    </div>
    <!-- content close -->

    <a href="#" id="back-to-top"></a>
@endsection
@section('scripts')
    <script>
        const modalOpen = document.querySelector(".apply-modal");
        const modal = document.getElementById("myModal");
        const modalClose = document.querySelector(".modal-content .close");

        modalOpen.addEventListener("click", () => modal.style.display = "block");
        modalClose.addEventListener("click", () => modal.style.display = "none");

        window.onclick = (e) => {
            if (e.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
