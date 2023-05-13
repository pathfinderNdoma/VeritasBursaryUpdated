<!doctype html>
<html lang="en">

<head>

  <title>Veritas University Bursary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link href="images/logo1.png" rel="icon">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/boostrap.min.css">

 <!-- Google Fonts -->
 <link href="https://fonts.gstatic.com" rel="preconnect">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <!-- Vendor CSS Files -->
 
 <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
 <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
 <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
 <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
 <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
 <script src="js/jquery-3.2.1.js"></script>

 <!-- Template Main CSS File -->
 <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <!-- //Adding the side bar -->
    @include ('sidebar')
    <section class="section dashboard">
      <div class="card-header text-center" style="color:#034927; font-weight:bolder">
        <h4 style="font-weight: bold;">Account Statement</h4>
      </div>

      <div class="card-group">
        <div class="card info-card sales-card" style="background-color:#00a8ff  ;">
          <div class="text-center">
              <div class="card-body d-flex flex-column align-items-center p-2">
                  <h5 style="color: white; font-weight: bold;">Initial Account</h5>
  
                  <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <img src="dashboardicons/1.png" width="50" height="50">
                      </div>
                  </div>
                  <div class="d-flex align-items-center mt-2">
                      <div class="ps-3">
                          <h6 style="color: white; font-size: 20px;">&#8358;{{number_format($intialAccount)}}</h6>
                      </div>
                  </div>
  
                  <div class="d-flex align-items-center mt-2">
                      <div class="ps-3">
                        <span class="text-muted small"><p style="color:#FFFFFF; font-weight:bolder; font-size:14px">As at:
                         {{date('M-d-Y', strtotime($initiaAccountStartDate))}}</p></span>
                      </div>
                  </div>
              </div>
          </div>
      </div>

        <div class="card info-card sales-card" style="background-color:#FFC107;">
          <div class="text-center">
            <div class="card-body d-flex flex-column align-items-center p-2">
              <h5><span style="font-weight:bold; color:#000000">Income</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <img src="dashboardicons/2.png" width="50" height="50">
                </div>

                
              </div>
              <div class="d-flex align-items-center mt-2">
                <div class="ps-3">
                  <h6 style="font-size:20px;color:#000000">&#8358;{{number_format($totalIncome)}}</h6>
                </div>
              </div>

              <div class="d-flex align-items-center mt-2">
                <div class="ps-3">
                  <span class="text-muted small"><p style="color:black; font-weight:bolder; font-size:14px">As at {{date('M-d-Y')}}</p></span>
                </div>
              </div>
                </div>
              </div>
        </div>

        <div class="card info-card sales-card" style="background-color:#E91E63;">
          <div class="text-center">
            <div class="card-body d-flex flex-column align-items-center p-2">
              <h5><span style="font-weight:bold; color:white">Expenditure</span></h5>

              
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <img src="dashboardicons/3.png" width="50" height="50">
                </div>

                
              </div>
              <div class="d-flex align-items-center mt-2">
                <div class="ps-3">
                  <h6 style="font-size:20px; color:white">&#8358;{{number_format($totalExpenditure)}}</h6>
                </div>
              </div>

              <div class="d-flex align-items-center mt-2">
                <div class="ps-3">
                  <span class="text-muted small"><p style="color:#FFFFFF; font-weight:bolder; font-size:14px">As at {{date('M-d-Y')}}</p></span>
                </div>
              </div>

                </div>
              </div>
        </div>

        <div class="card info-card sales-card" style="background-color:#4CAF50; color:#fff">
          <div class="text-center">
            <div class="card-body d-flex flex-column align-items-center p-2">
              <h5><span style="font-weight:bold; color:white">Final Account</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <img src="dashboardicons/4.png" width="50" height="50">
                </div>

              </div>
              <div class="d-flex align-items-center mt-2">
                <div class="ps-3">
                  <h6 style="font-size:20px; color:white">&#8358;{{number_format($finalAccount)}}</h6>
                </div>
              </div>
              <div class="d-flex align-items-center mt-2">
                <div class="ps-3" >
                  <span class="text-muted small"><p style="color:#FFFFFF; font-weight:bolder; font-size:14px">As at {{date('M-d-Y')}}</p></span>
                </div>
              </div>
                </div>
              </div>
            </div>
      </div>
{{-- ************************************************************INCOME ROW**************************************************** --}}
<p></p>
    <div class="row">
        <div class="col-lg-6" style="width:100%">
            
              <div class="card top-selling overflow-auto">

                
                <p class="card-header text-center" style="font-weight:bolder; font-size:18px; color:black; ">Income</p>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Source</th>
                        <th scope="col">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <th>School Fees</th>
                        <th>&#8358;{{number_format($totalSchoolFees)}}</th>
                      
                      </tr>

                      <tr>
                        <th scope="row">2</th>
                        <th>Enterprises</th>
                        <th>&#8358;{{number_format($totalenterprises)}}</th>
                      </tr>
                      {{-- <tr>
                        <th scope="row">3</th>
                        <th>Rents</th>
                        <th>$59</th>
                      </tr> --}}
                      <tr>
                        <th scope="row">4</th>
                        <th>Donations</th>
                        <th>&#8358;{{number_format($totalDonations)}}</th>
                      <tr>
                        <th scope="row">5</th>
                        <th>Pledges</a></th>
                        <th>&#8358;{{number_format($totalPledge)}}</th>
                      </tr>

                      <tr>
                        <th scope="row">6</th>
                        <th>Grants</a></th>
                        <th>&#8358;{{number_format($totalgrants)}}</th>
                      </tr>
                    </tbody>
                  </table>

                </div>

            
            </div><!-- End Top Selling -->
        </div>


        <div class="col-lg-6" style="width:100%">
            
          <div class="card top-selling overflow-auto">

            
            <p class="card-header text-center" style=" color:black; font-weight:bolder; font-size:18px">Expenditure</p>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Outlet</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <th>Salaries</th>
                    <th>&#8358;{{number_format($totalProcurrment)}}</th>
                  
                  </tr>

                  <tr>
                    <th scope="row">2</th>
                    <th>Procurments</th>
                    <th>&#8358;{{number_format($totalProcurrment)}}</th>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <th>Impress</th>
                    <th>&#8358;{{number_format($totaldisbursment)}}</th>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <th>Scholarships</th>
                    <th>&#8358;{{number_format($totalscholarships)}}</th>
                 
                  <tr>
                    <th scope="row">5</th>
                    <th>Donations</a></th>
                    <th>&#8358;{{number_format($totalOutDonations)}}</th>
                  </tr>
                </tbody>
              </table>

            </div>

        
        </div><!-- End Top Selling -->
    </div>

        
    </div>

        {{-- ************************************************************BUDGET ROW**************************************************** --}}
<div class="card-header text-center" style="color:#034927; font-weight:bolder">
  <h4 style="font-weight:bolder">Budget Summary</h4>
</div>
<div class="card-group">
  <div class="card info-card sales-card" style="background-color:#FFC107; ">
    <div class="text-center">
      <div class="card-body d-flex flex-column align-items-center p-2">
        <h5><span style="font-weight:bold; color:#000000">Balance Brought Forward</span></h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <img src="dashboardicons/1.png" width="50" height="50">
          </div>
         
        </div>

        <div class="d-flex align-items-center mt-2">
          <div class="ps-3">
            <h6 style="color:#000000">&#8358;{{number_format($intialAccount)}}</h6>
            <div class="ps-3" >
              <span class="text-muted small"><p style="color:black; font-weight:bolder; font-size:14px">As at {{date('M-d-Y', strtotime($initiaAccountStartDate))}}</p></span>
                </div>
          </div>


        </div>
          </div>
        </div>
  </div>

  <div class="card info-card sales-card " style="background-color:#9C27B0; color:#fff">
    <div class="text-center">
      <div class="card-body d-flex flex-column align-items-center p-2">
        <h5><span style="font-weight:bold; color:#FFFFFF">Expected Income</span></h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <img src="dashboardicons/2.png" width="50" height="50">
          </div>
        </div>

        
        <div class="d-flex align-items-center mt-2">
          <div class="ps-3">
            <h6 style="color:#FFFFFF">&#8358;{{number_format($totalBudgetIncome)}}</h6>
            <div class="ps-3" >
                  <span class="text-muted small"><p style="color:#FFFFFF; font-weight:bolder; font-size:14px">As at {{date('M-d-Y')}}</p></span>
                </div>
          </div>
        </div>
          </div>
        </div>
  </div>

  <div class="card info-card sales-card " style="background-color: #E91E63;">
    <div class="text-center">
      <div class="card-body d-flex flex-column align-items-center p-2">
        
        <h6><span style="font-weight:bold; color:white; font-size:20px">Expected Expenditure</span></h6>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <img src="dashboardicons/3.png" width="50" height="50">
          </div>
        </div>

        <div class="d-flex align-items-center mt-2">
          <div class="ps-3">
            <h6 style="color:white">&#8358;{{number_format($totalBudgetExpenditure)}}</h6>
            <div class="ps-3" >
              <span class="text-muted small"><p style="color:#FFFFFF; font-weight:bolder; font-size:14px">As at {{date('M-d-Y')}}</p></span>
                </div>
          </div>
        </div>
          </div>
        </div>
  </div>

  <div class="card info-card sales-card " style="background-color:#4CAF50; color:#fff">
    <div class="text-center">
      <div class="card-body d-flex flex-column align-items-center p-2">
        <h5><span style="font-weight:bold; font-size:20px; color:#FFFFFF">Expected B/Cd</span></h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <img src="dashboardicons/4.png" width="50" height="50">
          </div>
        </div>
        <div class="d-flex align-items-center mt-2">

          <div class="ps-3">
            <h6 style="color:#FFFFFF">&#8358;{{number_format($expectBCd)}}</h6>
            <div class="ps-3" >
              <span class="text-muted small"><p style="color:#FFFFFF; font-weight:bolder; font-size:14px">As at {{date('M-d-Y')}}</p></span>
                </div>
          </div>
        </div>
          </div>
        </div>
      </div>
</div>
</div></div>
</div></div>
        
        
  

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Powered by <strong><span>Department of Software Engineering</span></strong>. All Rights Reserved
    </div>
  
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="j/bootstrap-filestyle.min.js"> </script>

  
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
<script>
  $(document).ready(function() {
    $("#empTable").dataTable();
    $('.file-upload').file_upload();
  });
</script>
<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>
</html>