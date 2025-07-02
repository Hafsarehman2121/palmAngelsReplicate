<!DOCTYPE html>
<html lang="en">
<!-- Head Section -->
      @include('adminDashboard.includes.head')
  <body>
    <div class="container-scroller">
      <!-- Sidebar Section -->
        @include('adminDashboard.includes.sidebar')  
      <div class="container-fluid page-body-wrapper">
        
      <!-- Navbar Section -->
        @include('adminDashboard.includes.navbar')  

      <!-- main panel -->
    <div class="main-panel">
          <div class="content-wrapper pb-0">
              @yield('content')  
       
          </div>
    </div>
    </div>
    </div>
  
     <!-- <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
            </div>
          </footer> -->
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('adminDashboard.includes.scripts')
 @stack('scripts')
  </body>
</html>