<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body>
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
 @include('layouts.nav')
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    @include('layouts.sidebar')
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        @include('flash::message')
        @yield('content')
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      @include('layouts.footer')
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- End custom js for this page-->
@yield('script')
</body>

</html>