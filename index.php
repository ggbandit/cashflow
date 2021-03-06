<?php include('registration/server.php'); 
  if (empty($_SESSION['username'])) {
    header('location:../cashflow/registration/login.php');
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Latest compiled and minified CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled and minified CSS -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <!-- Optional theme -->


  <!-- Latest compiled and minified JavaScript -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <script src="js/bootstrap.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- dataTable -->
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/script.js"></script>
  <script src="js/getDataGraph.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript" src="editorTable/jquery.tabledit.js"></script>
  <script type="text/javascript" src="editorTable/custom_table_edit.js"></script>

  <title>Cash Flow Synerry</title>
</head>

<body>
  <!-- <body data-spy="scroll" data-target=".navbar" data-offset="50"> -->
  <!-- Navigation -->
  <nav class="navbar navbar-expand-md fixed-top navbar-light" id="spnTop">
    <div class="container-fluid">
      <a class="logo">Cash Flow</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="mr-3 pt-2"><a class="icon" href="#home"><i class="fa fa-home"></i>  Home</a>
          </li>
          <li class="mr-3 pt-2"><a class="icon" href="#moneyin"><i class="fa fa-long-arrow-up"></i> Money In</a>
          </li>
          <li class="mr-3 pt-2"><a class="icon" href="#moneyout"><i class="fa fa-long-arrow-down"></i> Money Out</a>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user"></i> Login <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> 
                      <?php if (isset($_SESSION["username"])): ?>
                      <?php echo $_SESSION["username"]; ?>
                      <?php endif ?>
                    </a>
                </li>
                <li class="border-bottom1"></li>
                <li><a href="index.php?logout='1'"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
          </li> 
      </div>
    </div>
  </nav>
  <!-- Graph -->
  <div class="container-fluid bg1">
    <section id="home">
    <div class="row pt-4">
      <div class="col-sm-12 col-md-12 col-lg-9">
        <div class="form-control h-100 padding" id="chart-container" style="background-color: white;">
          <div class="form-inline" style="padding:10px;">
            <label>Choose Option</label>
            <select class="form-control ml-3" style="width:140px;" id="category_faq">
              <option value="1">Today</option>
              <option value="2">This Month</option>
              <option value="3">This Year</option>
            </select>
          </div>
          <canvas id="mycanvas" width="120vw" height="50vh" ></canvas>
        </div>
      </div>
      <div class="col-md-12 col-lg-3 margin">
        <div class="row h-100">
          <div class="col-md-12">
            <div class="card h-100">
              <div class="card-body">
                <div class="h4" style="border-bottom: 1px solid">รวมรายรับ</div>
                <div class="h1 card-text text-center" id="income">
                  <!-- data here -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 mt-2">
            <div class="card h-100">
              <div class="card-body">
                <div class="h4" style="border-bottom: 1px solid">รวมรายจ่าย</div>
                <div class="h1 card-text text-center" id="moneyOut">
                  <!-- data moneyOut here -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 mt-2">
            <div class="card h-100">
              <div class="card-body">
                <div class="h4" style="border-bottom: 1px solid">เงินคงเหลือ</div>
                <div class="h1 card-text text-center" id="total">
                  <!-- data total here -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- Graph -->
    <!-- button -->
    
    <!-- The Modal -->
    <section id="moneyin">
    <div class="row no-gutters mt-3">
      <div class="col-md-12 form-control p-1 " id="รายรับ" style="background-color: white;"><div class="table-responsive">
        <table class="display table table-striped table-sm" id="income_table"  style="width:100%">
          <!-- Button to Open the Modal -->
          <div class="row form-inline">
            <div class="col-md-3 text-center">
              <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#myModal">
                เพิ่มรายการ
              </button>
            </div>
            <div class="col-md-6 text-center pt-2">
              <h3>รายรับ</h3>
            </div>
            <div class="col-md-3"></div>
          </div>
          <thead>
            <tr class="text-center" style="background: #3964a3; color: rgba(255,255,255,.85);">
              <th>Id</th>
              <th class="text-center">รายรับ</th>
              <th>Jan</th>
              <th>Feb</th>
              <th>Mar</th>
              <th>Apr</th>
              <th>May</th>
              <th>Jun</th>
              <th>Jul</th>
              <th>Aug</th>
              <th>Sep</th>
              <th>Oct</th>
              <th>Nov</th>
              <th>Dev</th>
            </tr>
          </thead>
          <tbody>
            <?php
                include('editorTable/connect.php');
                $sql_query = "SELECT * FROM income";
                $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                while( $income = mysqli_fetch_assoc($resultset) ) {
                ?>
                <tr>
                <td><?php echo $income ['id']; ?></td>
                <td><?php echo $income ['list']; ?></td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1514739600 && $income["inputDate"] <= 1517417999)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1517418000 && $income["inputDate"] <= 1519837199)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1519837200 && $income["inputDate"] <= 1522515599)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1522515600 && $income["inputDate"] <= 1525107599)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1525107600 && $income["inputDate"] <= 1527785999)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1527786000 && $income["inputDate"] <= 1530377999)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1530378000 && $income["inputDate"] <= 1533056399)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1533056400 && $income["inputDate"] <= 1535734799)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1535734800 && $income["inputDate"] <= 1538326799)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1538326800 && $income["inputDate"] <= 1541005199)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1541005200 && $income["inputDate"] <= 1543597199)
                          echo $income["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($income["inputDate"] >= 1543597200 && $income["inputDate"] <= 1546275599)
                          echo $income["balance"]; 
                  ?>
                </td>

                </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <?php include('editorTable/connect.php'); ?>
            <tr class="table-active">
              <th>Id</th>
              <th class="text-center">รวมรายรับ</th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1514739600 AND 1517417999";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1517418000 AND 1519837199";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1519837200 AND 1522515599";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1522515600 AND 1525107599";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1525107600 AND 1527785999";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1527786000 AND 1530377999";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1530378000 AND 1533056399";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1533056400 AND 1535734799";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1535734800 AND 1538326799";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1538326800 AND 1541005199";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1541005200 AND 1543597199";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1543597200 AND 1546275599";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</section>

<section id="moneyout">
    <div class="row no-gutters mt-3">
      <div class="col-md-12 form-control p-1 " id="รายรับ" style="background-color: white;"><div class="table-responsive">
        <table class="display2 table table-striped table-sm" id="moneyout_table"  style="width:100%">
          <!-- Button to Open the Modal -->
          <div class="row form-inline">
            <div class="col-md-3 text-center">
              <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#myModal">
                เพิ่มรายการ
              </button>
            </div>
            <div class="col-md-6 text-center pt-2">
              <h3>รายจ่าย</h3>
            </div>
            <div class="col-md-3"></div>
          </div>
          <thead>
            <tr class="text-center" style="background: #3964a3; color: rgba(255,255,255,.85);">
              <th>Id</th>
              <th class="text-center">รายจ่าย</th>
              <th>Jan</th>
              <th>Feb</th>
              <th>Mar</th>
              <th>Apr</th>
              <th>May</th>
              <th>Jun</th>
              <th>Jul</th>
              <th>Aug</th>
              <th>Sep</th>
              <th>Oct</th>
              <th>Nov</th>
              <th>Dev</th>
            </tr>
          </thead>
          <tbody>
            <?php
                include('editorTable/connect.php');
                $sql_query = "SELECT * FROM moneyout";
                $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                while( $moneyout = mysqli_fetch_assoc($resultset) ) {
                ?>
                <tr>
                <td><?php echo $moneyout ['id']; ?></td>
                <td><?php echo $moneyout ['list']; ?></td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1514739600 && $moneyout["inputDate"] <= 1517417999)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1517418000 && $moneyout["inputDate"] <= 1519837199)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1519837200 && $moneyout["inputDate"] <= 1522515599)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1522515600 && $moneyout["inputDate"] <= 1525107599)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1525107600 && $moneyout["inputDate"] <= 1527785999)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1527786000 && $moneyout["inputDate"] <= 1530377999)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1530378000 && $moneyout["inputDate"] <= 1533056399)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1533056400 && $moneyout["inputDate"] <= 1535734799)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1535734800 && $moneyout["inputDate"] <= 1538326799)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1538326800 && $moneyout["inputDate"] <= 1541005199)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1541005200 && $moneyout["inputDate"] <= 1543597199)
                          echo $moneyout["balance"]; 
                  ?>
                </td>
                <td class="text-center"><?php 
                    if ($moneyout["inputDate"] >= 1543597200 && $moneyout["inputDate"] <= 1546275599)
                          echo $moneyout["balance"]; 
                  ?>
                </td>

                </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <?php include('editorTable/connect.php'); ?>
            <tr class="table-active">
              <th>Id</th>
              <th class="text-center">รวมรายจ่าย</th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1514739600 AND 1517417999";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1517418000 AND 1519837199";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1519837200 AND 1522515599";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1522515600 AND 1525107599";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1525107600 AND 1527785999";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1527786000 AND 1530377999";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1530378000 AND 1533056399";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1533056400 AND 1535734799";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1535734800 AND 1538326799";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1538326800 AND 1541005199";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1541005200 AND 1543597199";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
              <th class="text-center">
              <?php $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1543597200 AND 1546275599";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $Jan_total = $val['sum'];
              echo $Jan_total; ?> </th>
            </tr>
            <tr class="bg-dark" style="color:white;">
              <th>Id</th>
              <th class="text-center">เงินคงเหลือ</th>
              <?php 
              $conn = mysqli_connect("localhost","root","chanpreecha1!","cashflow");
              if ($conn-> connect_error) {
                die("Connection failed:".$conn-> connect_error);
              }
              $sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1514739600 AND 1517417999";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $IncomeJan_total = $val['sum'];
              $sqlFeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1517418000 AND 1519837199";
              $result = $conn-> query($sqlFeb);
              $val = $result -> fetch_array();
              $IncomeFeb_total = $val['sum'];
              $sqlMar = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1519837200 AND 1522515599";
              $result = $conn-> query($sqlMar);
              $val = $result -> fetch_array();
              $IncomeMar_total = $val['sum'];
              $sqlApr = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1522515600 AND 1525107599";
              $result = $conn-> query($sqlApr);
              $val = $result -> fetch_array();
              $IncomeApr_total = $val['sum'];
              $sqlMay = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1525107600 AND 1527785999";
              $result = $conn-> query($sqlMay);
              $val = $result -> fetch_array();
              $IncomeMay_total = $val['sum'];
              $sqlJun = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1527786000 AND 1530377999";
              $result = $conn-> query($sqlJun);
              $val = $result -> fetch_array();
              $IncomeJun_total = $val['sum'];
              $sqlJul = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1530378000 AND 1533056399";
              $result = $conn-> query($sqlJul);
              $val = $result -> fetch_array();
              $IncomeJul_total = $val['sum'];
              $sqlAug = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1533056400 AND 1535734799";
              $result = $conn-> query($sqlAug);
              $val = $result -> fetch_array();
              $IncomeAug_total = $val['sum'];
              $sqlSeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1535734800 AND 1538326799";
              $result = $conn-> query($sqlSeb);
              $val = $result -> fetch_array();
              $IncomeSeb_total = $val['sum'];
              $sqlOct = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1538326800 AND 1541005199";
              $result = $conn-> query($sqlOct);
              $val = $result -> fetch_array();
              $IncomeOct_total = $val['sum'];
              $sqlNov = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1541005200 AND 1543597199";
              $result = $conn-> query($sqlNov);
              $val = $result -> fetch_array();
              $IncomeNov_total = $val['sum'];
              $sqlDec = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1543597200 AND 1546275599";
              $result = $conn-> query($sqlDec);
              $val = $result -> fetch_array();
              $IncomeDec_total = $val['sum'];
              $sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1514739600 AND 1517417999";
              $result = $conn-> query($sqlJan);
              $val = $result -> fetch_array();
              $MoneyOutJan_total = $val['sum'];
              $sqlFeb = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1517418000 AND 1519837199";
              $result = $conn-> query($sqlFeb);
              $val = $result -> fetch_array();
              $MoneyOutFeb_total = $val['sum'];
              $sqlMar = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1519837200 AND 1522515599";
              $result = $conn-> query($sqlMar);
              $val = $result -> fetch_array();
              $MoneyOutMar_total = $val['sum'];
              $sqlApr = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1522515600 AND 1525107599";
              $result = $conn-> query($sqlApr);
              $val = $result -> fetch_array();
              $MoneyOutApr_total = $val['sum'];
              $sqlMay = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1525107600 AND 1527785999";
              $result = $conn-> query($sqlMay);
              $val = $result -> fetch_array();
              $MoneyOutMay_total = $val['sum'];
              $sqlJun = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1527786000 AND 1530377999";
              $result = $conn-> query($sqlJun);
              $val = $result -> fetch_array();
              $MoneyOutJun_total = $val['sum'];
              $sqlJul = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1530378000 AND 1533056399";
              $result = $conn-> query($sqlJul);
              $val = $result -> fetch_array();
              $MoneyOutJul_total = $val['sum'];
              $sqlAug = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1533056400 AND 1535734799";
              $result = $conn-> query($sqlAug);
              $val = $result -> fetch_array();
              $MoneyOutAug_total = $val['sum'];
              $sqlSeb = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1535734800 AND 1538326799";
              $result = $conn-> query($sqlSeb);
              $val = $result -> fetch_array();
              $MoneyOutSeb_total = $val['sum'];
              $sqlOct = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1538326800 AND 1541005199";
              $result = $conn-> query($sqlOct);
              $val = $result -> fetch_array();
              $MoneyOutOct_total = $val['sum'];
              $sqlNov = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1541005200 AND 1543597199";
              $result = $conn-> query($sqlNov);
              $val = $result -> fetch_array();
              $MoneyOutNov_total = $val['sum'];
              $sqlDec = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1543597200 AND 1546275599";
              $result = $conn-> query($sqlDec);
              $val = $result -> fetch_array();
              $MoneyOutDec_total = $val['sum'];
              $sumJan = $IncomeJan_total-$MoneyOutJan_total;
              $sumFeb = $IncomeFeb_total-$MoneyOutFeb_total;
              $sumMar = $IncomeMar_total-$MoneyOutMar_total;
              $sumApr = $IncomeApr_total-$MoneyOutApr_total;
              $sumMay = $IncomeMay_total-$MoneyOutMay_total;
              $sumJun = $IncomeJun_total-$MoneyOutJun_total;
              $sumJul = $IncomeJul_total-$MoneyOutJul_total;
              $sumAug = $IncomeAug_total-$MoneyOutAug_total;
              $sumSeb = $IncomeSeb_total-$MoneyOutSeb_total;
              $sumOct = $IncomeOct_total-$MoneyOutOct_total;
              $sumNov = $IncomeNov_total-$MoneyOutNov_total;
              $sumDec = $IncomeDec_total-$MoneyOutDec_total;
              $conn-> close();
              ?>
              <th class="text-center"><?php echo $sumJan;  ?></th>
              <th class="text-center"><?php echo $sumFeb;  ?></th>
              <th class="text-center"><?php echo $sumMar;  ?></th>
              <th class="text-center"><?php echo $sumApr;  ?></th>
              <th class="text-center"><?php echo $sumMay;  ?></th>
              <th class="text-center"><?php echo $sumJun;  ?></th>
              <th class="text-center"><?php echo $sumJul;  ?></th>
              <th class="text-center"><?php echo $sumAug;  ?></th>
              <th class="text-center"><?php echo $sumSeb;  ?></th>
              <th class="text-center"><?php echo $sumOct;  ?></th>
              <th class="text-center"><?php echo $sumNov;  ?></th>
              <th class="text-center"><?php echo $sumDec;  ?></th>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</section>
    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title modal-title-padding">เพิ่มรายการ</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">รายรับ</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">รายจ่าย</label>
            </div>
            <div class="form-group">
              <form class="form-inline pt-2" name="add_new" id="add_new">
                <label class="pr-3" for="datepicker">วันที่</label>
                <input id="datepicker" name="datepicker" width="276" />
                <script>
                  $('#datepicker').datepicker({
                    uiLibrary: 'bootstrap4',
                    format: 'dd-mm-yyyy'
                  });
                </script>

                <ol class="form-inline" id="dynamic_field">
                 <li class="mt-3">
                  <input class="form-control" style="width: 200px;" type="text" id="list" name="list[]" placeholder="รายการ">
                  <input class="form-control" style="width: 200px;" type="text" id="balance" name="balance[]" placeholder="ยอดเงิน">
                </li>
              </ol>
            </form>
          </div>
          <button type="button" class="btn btn-success btn-outline-white btn-rounded waves-effect waves-light float-right " id="clone" style="width: 100%;">
            <i class="fa fa-plus"></i>
          </button>
          <script>
            $(document).ready(function() {
              var index = 1;
              $("#clone").click(function() {
               index++;
               $("#dynamic_field").append('<li class="mt-3" id="row'+index+'"><input class="form-control"  style="width: 200px;" type="text" name="list[]" placeholder="รายการ"><input class="form-control ml-1" style="width: 200px;" type="text" name="balance[]" placeholder="ยอดเงิน"></li>');
             });
            });
          </script>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <input class="btn btn-primary" id="btnSubmit" type="button" data-submit="modal" value="Save">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- button -->
  <!-- table รายรับ-รายจ่าย -->

</div>
<script>
  $(document).ready( function () {
    $('table.display').DataTable();
    $('table.display2').DataTable();
  });
</script>
<!-- table รายรับ-รายจ่าย -->
<script>
  $(document).ready(function() {
  var sections = $('section')
  var nav = $('nav'); 
  var nav_height = nav.outerHeight();

  $(window).on('scroll', function () {
    var cur_pos = $(this).scrollTop();
    
    sections.each(function() {
      var top = $(this).offset().top - nav_height,
          bottom = top + $(this).outerHeight();
      
      if (cur_pos >= top && cur_pos <= bottom) {
        nav.find('a').removeClass('active');
        sections.removeClass('active');
        
        $(this).addClass('active');
        nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
      }
    });
  });

  nav.find('a').on('click', function () {
    var $el = $(this)
      , id = $el.attr('href');
    
    $('html, body').animate({
      scrollTop: $(id).offset().top - nav_height
    }, 500);
    
    return false;
  });
});
</script>

<!-- select option show graph and data -->
<script>
  $(document).ready(function() {
    $('select option[value="2"]').attr("selected",true);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        var totalThisMonth = myObj[4]-myObj[5];
        document.getElementById("income").innerHTML = myObj[4];
        document.getElementById("moneyOut").innerHTML = myObj[5];
        document.getElementById("total").innerHTML = totalThisMonth;
      }
    };
    xmlhttp.open("GET", "dataGraph.php", true);
    xmlhttp.send();
    $('#category_faq').change(function() {
      //Use $option (with the "$") to see that the variable is a jQuery object
      var $option = $('#category_faq').val();
      var $option = $(this).find('option:selected');
      //Added with the EDIT
      var optionText = $option.text();//to get <option>Text</option> content
      if(optionText == "Today"){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            var totalToday = myObj[2]-myObj[3];
            if (myObj[2] == null){
              document.getElementById("income").innerHTML = "ไม่มีรายรับ";
            }else {
              document.getElementById("income").innerHTML = myObj[2];  
            }
            if (myObj[3] == null){
              document.getElementById("moneyOut").innerHTML = "ไม่มีรายจ่าย";
            }else {
              document.getElementById("moneyOut").innerHTML = myObj[3];  
            }
            if (myObj[2] == null && myObj[3] == null) {
              document.getElementById("total").innerHTML = "ไม่มีเงินคงเหลือ";  
            } else {
               document.getElementById("total").innerHTML = totalToday; 
            } 
          }
        };
        xmlhttp.open("GET", "dataGraph.php", true);
        xmlhttp.send();
      }
      else if (optionText == "This Month") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            var totalThisMonth = myObj[4]-myObj[5];
            document.getElementById("income").innerHTML = myObj[4];
            document.getElementById("moneyOut").innerHTML = myObj[5];
            document.getElementById("total").innerHTML = totalThisMonth;
          }
        };
        xmlhttp.open("GET", "dataGraph.php", true);
        xmlhttp.send();
      }
      else if (optionText == "This Year") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            var totalThisYear = myObj[6]-myObj[7];
            document.getElementById("income").innerHTML = myObj[6];
            document.getElementById("moneyOut").innerHTML = myObj[7];
            document.getElementById("total").innerHTML = totalThisYear;
          }
        };
        xmlhttp.open("GET", "dataGraph.php", true);
        xmlhttp.send();
      }
    });
  });
</script>
</body>
</html>
