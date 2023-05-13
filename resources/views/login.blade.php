<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/boostrap.min.css">

  <?php $loginInfo=""?>
    <title>Veritas University Bursary-Login</title>
</head>
<body>
    <div id="content" class="p-0 md-12 ">
        <!-- Adding the navbar -->
        <div >
          {{-- <span style="color: white"><img src="images/logo1.png" height="80px" width="150px"><br>{{$veritas}}</span>
        </div> --}}
        <br><br><br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style=" border: 1px solid rgb(3, 73, 39);">
                        <h5 class="card-header" style="background-color: rgb(3, 73, 39); text-align: center; color: white"><span style="color: white"><img src="images/logo1.png" height="80px" width="150px"><br>Veritas University Bursary</span>
                        </h5>
                        <div class="card-body" style="height: 315px">
                          <form method="POST" action="login">
                            @if (Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            @csrf
                            @csrf
                            <div class="form-control">
                              <span class="form-control"><b>Staff No.</b></span>
                              <input name="staffNo"  type="text" class="form-control lineColor" value="{{old('staffNo')}}" />
                              <span class="text-danger">@error('staffNo') {{$message}}@enderror</span>
           
                              <span class="form-control"><b>Password</b></span>
                              <input name="password"  type="password" class="form-control lineColor" value=""/><br>
                              <span class="text-danger">@error('password') {{$message}}@enderror</span>
                              <input  value="Login" type="submit" class="btn btn-success form-control veritasBack" style="color: white" />
                            {{-- <br><span class="form-control"><b>{{$loginInfo}}</b></span> --}}
                          </form>
                        </div>
                      </div>
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

<style>
  .lineColor {
    border: 1px solid rgb(190, 186, 167);
  }
  .veritasBack {
    background-color:  rgb(3, 73, 39);
  }
</style>
</html>