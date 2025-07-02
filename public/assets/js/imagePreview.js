document.addEventListener("DOMContentLoaded", function () {
const productLogoInput = document.getElementById('productImage');
    const imagePreview = document.getElementById('imagePreview');
    const removeImageButton = document.getElementById('removeImage');

    productLogoInput.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
          const imgElement = document.createElement('img');
          imgElement.src = event.target.result;
          imagePreview.innerHTML = '';
          imagePreview.appendChild(imgElement);
          removeImageButton.style.display = 'block'; // Show the remove button
        };
        reader.readAsDataURL(file);
      }
    });

    removeImageButton.addEventListener('click', function() {
      productLogoInput.value = ''; // Clear the input
      imagePreview.innerHTML = '<span>Uploaded Image Preview</span>'; // Reset the preview
      removeImageButton.style.display = 'none'; // Hide the remove button
    });
    
    $("#reset").click(function () {
            $("#productForm")[0].reset(); // Reset all form fields
            $("#productForm").validate().resetForm(); // Reset validation messages
        });
      });