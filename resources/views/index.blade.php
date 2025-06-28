<!DOCTYPE html>
<html lang="en">

@include('includes.head')


<body>
    <!-- Top Red Notification Bar -->
   
<div class="top-banner">
  <div class="banner-content justify-content-between align-items-center">
   
    <p class="message" id="message" style="margin-top:5px;">Enjoy Free Shipping!</p>
   
    <i class="ti-close close-btn" onclick="this.parentElement.parentElement.style.display='none';"></i>
  </div>
</div>

 <!-- Side Bar -->
   @include('includes.sidebar')

<div id="wrapper">

    <!-- Header Section -->
       @include('includes.header')

   <!-- Body Section-->

      
         @include('includes.shop')
       
    <!-- Footer Section-->

       
       @include('includes.footer')    


       
</div>
    <!-- Scripts Section -->
@include('includes.scripts')    

    
</body>

</html>
