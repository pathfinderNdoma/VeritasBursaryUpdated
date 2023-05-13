<!doctype html>
<html lang="en">

<head>

  <title>Veritas University Bursary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/boostrap.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <!-- //Adding the side bar -->
    @include ('sidebar')
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


      <div id="content" class="p-4 md-12 ">
<h4 >Update your Bursary Information<hr></h4>
<form method="POST" action="staffReg">
  @if (Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif
  @if (Session::has('fail'))
      <div class="alert alert-danger">{{Session::get('fail')}}</div>
  @endif
  @csrf
          <div class="input-group ">
            <span class="input-group-text"><b>Staff No.</b></span>
            <input disabled  type="text" name="staffNo" class="form-control lineColor" value="{{$data1->staffNo}}" />
          {{-- </div> --}}
          {{-- <br>
          <div class="input-group "> --}}
               </div>
          <br>
          {{-- <div class="input-group ">
            <span class="input-group-text"><b>First Name</b></span>
            <input disabled type="text" name="fname" class="form-control lineColor" value="{{$data1->fname}}" />
          
          
            <span class="input-group-text"><b>Last Name</b></span>
            <input disabled type="text" name="lname" class="form-control lineColor" value="{{$data1->lname}}" />
          
          
            <span class="input-group-text"><b>Other Name</b></span>
            <input disabled type="text" name="oname" class="form-control lineColor" value="{{$data1->oname}}" />
          </div>
          <br>
          <div class="input-group">
          <span class="input-group-text"><b>Sex</b></span>
          <input disabled type="text" name="sex" class="form-control lineColor" value="{{$data1->sex}}" />
          <span class="input-group-text"><b>Tel.1</b></span>
          <input disabled type="text" name="tel1" class="form-control lineColor" value="{{$data1->email}}" />
          <span class="input-group-text"><b>Tel.2</b></span>
          <input disabled type="text" name="tel2" class="form-control lineColor" value="{{$data1->email}}" />
       
          <span class="input-group-text"><b>Email</b></span>
          <input disabled type="text" name="email" class="form-control lineColor" value="{{$data1->email}}" />
        </div> --}}
        {{-- <br> --}}
          <div class="input-group ">
            <span class="input-group-text"><b>Department</b></span>
            <input disabled type="text" name="dept" class="form-control lineColor" value="{{$data1->department}}" />

            <span class="input-group-text"><b>Faculty</b></span>
            <input disabled type="text" name="faculty" class="form-control lineColor" value="{{$data1->faculty}}" />
          </div>
          <br>
          <div class="input-group ">
            <span class="input-group-text"><b>Designation</b></span>
            <input disabled type="text" name="designation" class="form-control lineColor" value="{{$data1->designation}}"/>
          
            <span class="input-group-text"><b>Grade Level</b></span>
            <input disabled type="text" name="gradeLevel" class="form-control lineColor" value="{{$data1->grade_level}}" />
          </div>
          <br>
      
          <div class="input-group ">
            <span class="input-group-text"><b>Account No.</b></span>
            <input {{isset($data2)?'disabled':''}} type="text" name="accountNo" id="accountNo" class="form-control lineColor" value="{{old('accountNo', isset($data2)?$data2->accountNo:'')}}" /></div>
            <span class="text-danger">@error('accountNo') {{$message}}@enderror</span>
           
          
          <br>
          <div class="input-group ">
            <span class="input-group-text"><b>Bank Name</b></span>
            <input {{isset($data2)?'disabled':''}} type="text" name="bankName" id="bankName" class="form-control lineColor" value="{{old('bankName', isset($data2)?$data2->bankName:'')}}" />
          </div><span class="text-danger">@error('bankName') {{$message}}@enderror</span>
           
          <br>
          <div class="input-group ">
            <span class="input-group-text"><b>Branch Address</b></span>
            <input {{isset($data2)?'disabled':''}} type="text" name="branchAddress" id="branchAddress" class="form-control lineColor" value="{{old('bankAddress', isset($data2)?$data2->branchAdd:'')}}" />
          </div><span class="text-danger">@error('branchAddress') {{$message}}@enderror</span>
           
          <br>
      
          <div class="input-group ">
            <span class="input-group-text"><b>Sort Code</b></span>
            <input {{isset($data2)?'disabled':''}} type="text" name="sortCode" id="sortCode" class="form-control lineColor" value="{{old('sortCode', isset($data2)?$data2->sortCode:'')}}"/>
          </div><span class="text-danger">@error('sortCode') {{$message}}@enderror</span>
           
          <br>
      
          <div class="input-group ">
            <span class="input-group-text"><b>Pension PFA</b></span>
            <input {{isset($data2)?'disabled':''}} type="text" name="pfa" id="pfa" class="form-control lineColor" value="{{old('pfa', isset($data2)?$data2->PFA:'')}}" />
          </div><span class="text-danger">@error('pfa') {{$message}}@enderror</span>
          <br>
          <div class="input-group ">
            <span class="input-group-text"><b>Pension RSA PIN</b></span>
            <input {{isset($data2)?'disabled':''}} type="text" name="rsapin" id="rsapin" class="form-control lineColor" value="{{old('rsapin', isset($data2)?$data2->rsaPIN:'')}}" />
          </div><span class="text-danger">@error('rsapin') {{$message}}@enderror</span>
           
          <br>
          <div class="input-group">
            <input name="save" value='Save' type="submit" class="form-control btn btn-primary" />
            <input id="save" onclick="but()" value='Edit Record' type="button" class="form-control btn btn-primary" />
         
          </div>
</form>
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
</script>
<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
  .error {
    color: red;
  }
</style>
<script>
  function but ()
  {
    $("#accountNo").attr('disabled',false)
    $("#bankName").attr('disabled',false)
    $("#branchAddress").attr('disabled',false)
    $("#sortCode").attr('disabled',false)
    $("#pfa").attr('disabled',false)
    $("#rsapin").attr('disabled',false)
  }
</script>
</html>