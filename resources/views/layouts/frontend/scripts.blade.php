  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="{{ asset('frontend') }}/js/jquery-1.11.3/jquery.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jpreLoader.min.js"></script>
  <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('frontend') }}/js/wow.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.isotope.min.js"></script>
  <script src="{{ asset('frontend') }}/js/easing.js"></script>
  <script src="{{ asset('frontend') }}/js/owl.carousel.js"></script>
  <script src="{{ asset('frontend') }}/js/validation.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('frontend') }}/js/enquire.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.stellar.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.plugin.js"></script>
  <script src="{{ asset('frontend') }}/js/typed.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.countTo.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.countdown.js"></script>
  <script src="{{ asset('frontend') }}/js/typed.js"></script>
  <script src="{{ asset('frontend') }}/js/designesia.js"></script>

  <script>
      $(function () {
          // jquery typed plugin
          $(".typed").typed({
              stringsElement: $('.typed-strings'),
              typeSpeed: 100,
              backDelay: 1500,
              loop: true,
              contentType: 'html', // or text
              // defaults to false for infinite loop
              loopCount: false,
              callback: function () {
                  null;
              },
              resetCallback: function () {
                  newTyped();
              }
          });
      });
  </script>
