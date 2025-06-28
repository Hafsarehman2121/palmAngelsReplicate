<!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
<script>
  const messages = [
    "Enjoy Free Shipping!",
    "New Arrivals Just Dropped!",
    "Limited Time Offer!",
    "Shop the Latest Collection!"
  ];

  let index = 0;
  const messageDiv = document.getElementById("message");

  setInterval(() => {
    index = (index + 1) % messages.length;
    messageDiv.textContent = messages[index];
  }, 3000); // 3000 milliseconds = 3 seconds
</script>