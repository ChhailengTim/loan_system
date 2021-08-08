
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
{{--<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>--}}
<script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<!-- BEGIN PAGE LEVELs PLUGINS/CUSTOM SCRIPTS -->

{{--<script src="{{ asset('js/app.js')}} "></script>--}}
<script src="{{ asset('js/main/app.js') }}"></script>
<script>
    $(document).ready(function () {
      $(".carousel").carousel({
        interval: 3000,
      });
    });
    </script>
</html>
