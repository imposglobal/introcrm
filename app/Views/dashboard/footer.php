  <!-- partial:partials/_footer.html -->
  <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <script>document.write(new Date().getFullYear())</script> DDS. All rights reserved.</span>
            
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo $baseURL; ?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo $baseURL; ?>/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo $baseURL; ?>/assets/js/off-canvas.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/js/template.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/js/settings.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo $baseURL; ?>/assets/js/dashboard.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/js/Chart.roundedBarCharts.js"></script>
  
    <script>
        $(document).ready(function(){
          $('#loader').hide();
            // Event handler for the search button click
            $("#searchCustomer").click(function(){
              $('#loader').show();
              $('#searchCustomer').hide();
                // Get the search query from the input field
                var searchQuery = $("#searchQuery").val();
                if (searchQuery.trim() === "") {
                  $('#searchCustomer').show();
                  $('#loader').hide();
                    // If the search query is empty, show an error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Please enter an email address to search for the customer.',
                    });
                    return; // Exit the function
                }

                // Construct the URL with the search query
                var url = "<?$baseURL?>/customer/search?searchQuery=" + searchQuery;

                // Make the AJAX request
                $.ajax({
                    url: url,
                    type: "POST",
                    dataType: "json", // Assuming the response is in JSON format
                    success: function(response) {
                        if(response.message == "No Duplicate Customer Found"){
                          Swal.fire({
                            icon: 'success',
                            title: response.message,
                            text: searchQuery + ' Not Found in database.',
                        });
                        }else{
                          Swal.fire({
                            icon: 'warning',
                            title: response.message,
                            text: searchQuery + ' Found in database.',
                        });
                        }
                        $('#searchCustomer').show();
                        $('#loader').hide();
                        // For example, you can update the DOM with the response data
                        $("#result").html(JSON.stringify(response));
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        // Display an error message using SweetAlert2
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'There was an error with your AJAX request.',
                        });
                        console.error("Error:", error);
                    }
                });
            });
        });
        $('#myModal').modal('show');
    </script>
    
</body>
</html>

