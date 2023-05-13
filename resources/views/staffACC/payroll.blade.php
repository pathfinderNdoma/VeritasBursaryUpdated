<!doctype html>
<html lang="en">

<head>

  <title>Veritas University Bursary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/boostrap.min.css">



</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <!-- //Adding the side bar -->
    @include('sidebar');
    <!-- //Adding the side bar -->

    <!-- Page Content  -->
    {{-- <div id="content" class="p-0 md-12 ">
      <!-- Adding the navbar -->
      <div style="background-color: rgb(3, 73, 39); height: 40px;" class="">
        <button type="button" alt="Collapse sidebar" id="sidebarCollapse" class="btn btn-info" style="background-color: rgb(3, 73, 39);">
          <i class="fa fa-bars"></i>
          <span class="sr-only fa fa-bars">Toggle Menu</span>
        </button><span style="color: white"> {{$veritas}}</span>
      </div> --}}

<form name="form" action="{{route('fetchpayroll')}}" enctype="multipart/form-data">
      <div id="content" class="p-4 md-12 ">
      
      
        <h4 >Payroll<hr></h4>
        <div class="row col-12">
          

          <div class="col-md4 col-xs-12 col-lg-4">
            <select type="text" name="year" id ="year" class="form-control  lineColor">
              <option>Select Financial Year</option>      
              @foreach ($financial_year as $fyear)
              <option>{{$fyear}}</option>
              @endforeach
          </select>
          </div>

          <div class="col-md4 col-xs-12 col-lg-4" id="displaymonth">
            
              <select type="text" name="year" id ="year" class="form-control lineColor">
                <option>Select Month</option>
                </select>
          </div>

          <div class="col-md4 col-xs-12 col-lg-4">
            
          <span style="color: white">' '</span>
          <input type="submit" name="generate" value="Generate" class="btn btn-primary">
          </div>
         

          
          
          
        </div>

      </form>
      <hr>
     
      <p class="d-none">{{$n=1}}</p>
      @if ((isset($month)))
      <p ><h4 class="text-center">Payroll for the month of {{ucfirst($month)}} {{$year}}</h4></p> 
      @endif
      <table class="table table-striped table-bordered table-responsive table-hover" id="empTable" style="color:#000; font-size:13px; text-align:center">
        <thead>
          <th>Sn</th>      
          <th>Staff No.</th> 
          <th>Name</th>

          <th>Grade Level</th>
          <th>Designation</th>
          <th>Department</th>

          <th>Basic Salary</th>
          <th>Housing Allowance</th>
          <th>Other Allowances</th>
          <th>Gross Pay</th>

          <th>Tax</th>
          <th>Pension</th>
          <th>NHIA</th>

          <th>NHF</th>
          <th>University Loan</th>
          <th>Cooperative Loan</th>

          <th>Commodity Loan</th>
          <th>Cooperative Contribution</th>
          <th>School Fees</th>

          
          <th>Net Pay</th>
          <th>Bank</th>
          <th>Branch</th>
          <th>Sort code</th>
          <th>Download payslip</th>
        </thead>
        <tbody>
          @if(isset($payroll))

            @foreach ($payroll as $data)
              <tr>
                <td>{{$n}}</td>
                <td>{{$data->staffNo}}</td>
                <td>{{$data->name}}</td>

                <td>{{$data->gradeLevel}}</td>
                <td>{{$data->designation}}</td>
                <td>{{$data->department}}</td>

                {{-- <td>&#8358;{{intval(round(number_format(($data->basicSalary)), 2))}}</td> --}}
               

                <td>&#8358;{{ number_format(round($data->basicSalary, 2), 2) }}</td>
                <td>&#8358;{{ number_format(round($data->houseAllowance, 2), 2) }}</td>
                <td>&#8358;{{ number_format(round($data->otherAllowance, 2), 2) }}</td>
                <td>&#8358;{{ number_format(round($data->grosspay, 2), 2) }}</td>

                <td>&#8358;{{ number_format(round($data->tax, 2), 2) }}</td>
                <td>&#8358;{{ number_format(round($data->pension, 2), 2) }}</td>
                <td>&#8358;{{ number_format(round($data->nhia, 2), 2) }}</td>
                

                <td>&#8358;{{ number_format(round($data->nhf, 2), 2) }}</td>
                <td>&#8358;{{ number_format(round($data->university_loan, 2), 2) }}</td>
                <td>&#8358;{{ number_format(round($data->cooperative_loan, 2), 2) }}</td>
                

                <td>&#8358;{{ number_format(round($data->commodity_loan, 2), 2) }}</td>
                <td>&#8358;{{ number_format(round($data->cooperative_contribution, 2), 2) }}</td>
                <td>&#8358;{{ number_format(round($data->school_fees, 2), 2) }}</td>
                <td>&#8358;{{ number_format(round($data->netpay, 2), 2) }}</td>

                
                

                <td>{{$data->bankName}}</td>
                <td>{{$data->branchAdd}}</td>
                <td>{{$data->sortCode}}</td>
                <td class="text-center"><a href="{{route('getPayslipPDF', ['year'=>$data->year, 'month'=>$tablename])}}"> 
                  <span type="button"  class="fa bi-download btn" style="font-weight:700; font-size:20px; color:blue"></a>
                  </span></td>
{{-- 
                <td>
                  <a href="{{route('getPayslipPDF', ['year'=>$data->year, 'month'=>$tablename])}}">
                  <h5 style="color:green; font-weight:bolder"><i class="bi bi-download"></i>
                  </h5>Download</span>
                </a>
              </td> --}}

              </tr>
              <?php $n++; ?>
            @endforeach
          @endif
        </tbody>
      </table>
      
      </div>
    </div>
  </div>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>

      <script src="js/jquery-3.2.1.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="j/bootstrap-filestyle.min.js"> </script>



     

  </body>

<script>
  $(document).ready(function() {
    
    $("#empTable").dataTable();
    $('.file-upload').file_upload();
  });

  //*************************************************************************************************************************
  // Listen for changes to the select element
  $('#year').on('change', function() {

        let year  = $(this).val()
        const url = "{{route('fetchmonths')}}";

        $.ajax({
            url: url,
            type: 'GET',
            data: { year: year },
            cache: false,
            success: function(response) { 
                $('#displaymonth').html(response);
            }
        });

    });
</script>

<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
</style>

</html>