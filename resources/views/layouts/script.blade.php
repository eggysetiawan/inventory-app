  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  {{-- toaster --}}
  <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
  {{-- select2 --}}
  <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('js/pre.js') }}"></script>


  @yield('script-footer')

  <script>
      $(document).ready(function() {
          $('.select2').select2();
      });
  </script>

  @if (session()->has('success'))

      <script>
          $(document).ready(function() {
              toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right top-rights",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
              }

              setTimeout(function() {
                  toastr.success("{{ session()->get('success') }}")
              }, 550);
          });
      </script>

  @endif
