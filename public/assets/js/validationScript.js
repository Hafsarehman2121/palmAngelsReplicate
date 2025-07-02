
$(document).ready(function() {
  $('#productForm').validate({
    rules: {
      productName: {
        required: true,
        maxlength: 255
      },
      productCode: {
        required: true,
        maxlength: 255
      },
      productDescription: {
        maxlength: 255
      },
      productPrice: {
        required: true,
        number: true,
        min: 0
      },
      quantity: {
        required: true,
        digits: true,
        min: 1
      },
      productImage: {
        extension: "jpg|jpeg|png|webp"
      }
    },
    messages: {
      productName: {
        required: "Product name is required",
        maxlength: "Maximum 255 characters allowed"
      },
      productCode: {
        required: "Product code is required",
        maxlength: "Maximum 255 characters allowed"
      },
      productPrice: {
        required: "Enter product price",
        number: "Must be a valid number",
        min: "Price cannot be negative"
      },
      quantity: {
        required: "Enter quantity",
        digits: "Only whole numbers allowed",
        min: "Must be at least 1"
      },
      productImage: {
        extension: "Only jpg, jpeg, png, webp formats are allowed"
      }
    },
    errorElement: 'div',
    errorPlacement: function(error, element) {
      error.css('color', 'red');
      error.insertAfter(element);
    }
  });
});
$('#productForm').on('submit', function(e) {
  e.preventDefault();
 
});

