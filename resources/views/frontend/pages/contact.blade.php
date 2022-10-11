@extends('layouts.frontend.master')
@section('title')
@endsection
@section('keyword')
@endsection
@section('description')
@endsection
@section('head')
@endsection
@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section id="subheader" class="text-light" data-bgimage="url(https://www.designesia.com/themes/priva/images/background/subheader4.jpg) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12 text-center">
                            <h1>Contact Us</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    </section>
    <!-- section close -->
    

    <section aria-label="section">
        <div class="container">
                <div class="row">
                    
                    <div class="col-lg-8 mb-sm-30">
                    <h3>Do you have any question?</h3>
                    
                    <form name="contactForm" id="contact_form" class="form-border" method="post" action="https://www.designesia.com/themes/priva/email.php">
                        <div class="field-set">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" />
                        </div>

                        <div class="field-set">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" />
                        </div>

                        <div class="field-set">
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" />
                        </div>

                        <div class="field-set">
                            <textarea name="message" id="message" class="form-control" placeholder="Your Message"></textarea>
                        </div>

                        <div class="spacer-half"></div>

                        <div id="submit">
                            <input type="submit" id="send_message" value="Submit Form" class="btn btn-custom" />
                        </div>
                        <div id="mail_success" class="success">Your message has been sent successfully.</div>
                        <div id="mail_fail" class="error">Sorry, error occured this time sending your message.</div>
                    </form>
                </div>
                
                <div class="col-lg-4">

                    <div class="padding40 box-rounded mb30 bg-primaryColor" data-bgcolor="#F2F6FE">
                        <h3>{!! $contact_title !!}</h3>
                        <address class="s1">
                            <span><i class="id-color fa fa-map-marker fa-lg"></i>{!! $contact_location !!}</span>
                            <span><i class="id-color fa fa-phone fa-lg"></i>{!! $contact_phone !!}</span>
                            <span><i class="id-color fa fa-envelope-o fa-lg"></i><a href="mailto:contact@example.com">{!! $contact_email !!}</a></span> 
                        </address>
                    </div>

                </div>
                    
                </div>
            </div>

    </section>

    </div>
    <!-- content close -->

    <a href="#" id="back-to-top"></a>
@endsection
@section('scripts')
    <script></script>
@endsection
