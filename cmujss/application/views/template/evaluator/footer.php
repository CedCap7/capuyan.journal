           <br>
            <footer class="footer text-center"> 2024 © Waragud brought to you by <a
                    href="https://www.riguel.com/">riguel.com</a>
            </footer>
        </div>
    </div>
<div class="dark-transparent sidebartoggler"></div>
<script>
  function handleColorTheme(e) {
    $("html").attr("data-color-theme", e);
    $(e).prop("checked", !0);
  }
</script>
<!-- Import Js Files -->
<script src="<?php echo base_url("./assets/js/vendor.min.js")?>"></script>
<script src="<?php echo base_url("./assets/libs/js/jquery.min.js")?>"></script>
<script src="<?php echo base_url("./assets/js/app.min.js")?>"></script>
<!-- <script src="<?php echo base_url("./assets/js/app.dark.init.js")?>"></script> -->
<script src="<?php echo base_url("./assets/js/app.init.js")?>"></script>
<script src="<?php echo base_url("./assets/libs/js/bootstrap.bundle.min.js")?>"></script>
<script src="<?php echo base_url("./assets/libs/js/simplebar.min.js")?>"></script>
<script src="<?php echo base_url("./assets/libs/iconify-icon.min.js")?>"></script>
<script src="<?php echo base_url("./assets/js/sidebarmenu.js")?>"></script>
<script src="<?php echo base_url("./assets/js/theme.js")?>"></script>
<script src="<?php echo base_url("./assets/js/feather.min.js")?>"></script>
<script src="<?php echo base_url("./assets/libs/js/aos.js")?>"></script>

<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="<?php echo base_url("./assets/js/iconify-icon.min.js")?>"></script>
<script src="<?php echo base_url("./assets/libs/prism.js")?>"></script>
<script src="<?php echo base_url("./assets/js/ui-card-init.js?>")?>"></script>


<!-- End of main wrapper -->
<!-- <div class="dark-transparent sidebartoggler"></div> -->
<!-- Import Js Files -->
<!-- <script src="./assets/js/vendor.min.js"></script>
<script src="./assets/libs/js/jquery.min.js"></script>
<script src="./assets/js/app.min.js"></script>
<script src="./assets/js/app.init.js"></script> -->
<!-- <script src="./assets/js/app.dark.init.js"></script> -->
<!-- <script src="./assets/libs/js/bootstrap.bundle.min.js"></script>
<script src="./assets/libs/js/simplebar.min.js"></script>
<script src="./assets/libs/iconify-icon.min.js"></script>
<script src="./assets/js/sidebarmenu.js"></script>
<script src="./assets/js/theme.js"></script>
<script src="./assets/js/feather.min.js"></script> -->

<!-- <script src="./assets/libs/js/aos.js"></script> -->

<!-- solar icons -->
<!-- <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="./assets/js/iconify-icon.min.js"></script>
<script src="./assets/libs/prism.js"></script>
<script src="./assets/js/ui-card-init.js"></script> -->

<!-- <script>
    // Aos
    AOS.init({
      once: true,
  });
</script> -->

<!-- Add this script at the end of the body tag -->
<script>
document.getElementById('profilePicInput').addEventListener('change', function(event) {
    const file = event.target.files[0]; // Get the selected file
    const reader = new FileReader(); // Create a FileReader instance

    // When the file is loaded
    reader.onload = function(e) {
        const img = document.getElementById('profilePic'); // Get the img element
        img.src = e.target.result; // Set the src attribute of the img element to the file data
        
        // Set the width and height of the new image to match the profile picture dimensions
        img.style.width = '260px'; // Assuming the original profile picture width is 260px
        img.style.height = '260px'; // Assuming the original profile picture height is 260px
    };
    // Read the file as a data URL
    reader.readAsDataURL(file);
});
</script>

<script>
document.getElementById('articleImageInput').addEventListener('change', function(event) {
    const file = event.target.files[0]; // Get the selected file
    const reader = new FileReader(); // Create a FileReader instance

    // When the file is loaded
    reader.onload = function(e) {
        const img = document.getElementById('articleImage'); // Get the img element
        img.src = e.target.result; // Set the src attribute of the img element to the file data
        
        // Set the width and height of the new image to match the profile picture dimensions
        img.style.width = '300px'; // Assuming the original profile picture width is 260px
        img.style.height = '400px'; // Assuming the original profile picture height is 260px
    };
    // Read the file as a data URL
    reader.readAsDataURL(file);
});
</script>


<script>
$(document).ready(function() {
    // Handle delete button click
    $('.btn-delete').click(function(e) {
        e.preventDefault(); // Prevent the default behavior of the link

        var articleid = $(this).data('id');

        // Confirm deletion
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send delete request to the server
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('articles/delete'); ?>',
                    data: { articleid: articleid },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // If deletion is successful, show the success modal
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Record deleted successfully!!',
                                showConfirmButton: true,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                allowEnterKey: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Reload the page when the OK button is clicked
                                    location.reload();
                                }
                            });
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while processing your request. Please try again later.');
                    }
                });
            }
        });
    });
});
</script>

<script>
$(document).ready(function() {
    // Handle delete button click
    $('.btn-delete').on('click', function(e) {
        e.preventDefault(); // Prevent the default behavior of the link

        var userid = $(this).data('id');

        // Confirm deletion
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send delete request to the server
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('users/delete'); ?>', // Adjust the URL to match your delete function
                    data: { userid: userid },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // If deletion is successful, show the success modal
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'User deleted successfully!',
                                showConfirmButton: false,
                                timer: 1500,
                                allowOutsideClick: false
                            }).then(() => {
                                // Reload the page after the success message disappears
                                location.reload();
                            });
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while processing your request. Please try again later.');
                    }
                });
            }
        });
    });
});
</script>


<script>
  $(document).ready(function() {
    $('#successModal').modal('show');
  });
</script>

</body>

</html>