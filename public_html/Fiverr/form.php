<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!--Material Script -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#"><img class="brand-navlogo" src="images/logoName.png"></a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="forms/add_user.php">Add User</a>
            </li>
            <li class="nav-item active ">
              <a class="nav-link" href="forms/add_user.php">Welcome,</a>
            </li>
          </ul>

          <iframe src="http://free.timeanddate.com/clock/i68ipsmn/n137/fn17/fs18/tct/pct/tt0/tw1/tm1/tb2" frameborder="0" width="305" height="24" allowTransparency="true"></iframe>
          <form action="sql/logout_sql.php" method="POST" class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Logout</button>
          </form>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-2 sidenav">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link secondary active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Parts</a>
            <a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Projects</a>
            <a class="nav-link" id="v-pills-partslists-tab" data-toggle="pill" href="#v-pills-partslists" role="tab" aria-controls="v-pills-partslists" aria-selected="false">Parts Lists</a>
            <a class="nav-link" id="v-pills-products-tab" data-toggle="pill" href="#v-pills-products" role="tab" aria-controls="v-pills-products" aria-selected="false">Products</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Work Orders</a>
          </div>
        </div>
        <div class="col-sm-10">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <h2 class="pull-right">Inventory</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9">
                      <a href="#" data-toggle="modal" data-target="#part_add_form" class="btn btn-success pull-right">Add New parts</a>
                    </div>
                    <div class="col-md-3">
                      <form action="index.php" method="GET" class="form-inline">
                        <div class="form-group mx-sm-6">
                          <input name="search_item" type="text" class="form-control"  placeholder="Search">
                        </div>
                        <div class="form-group mx-sm-6">
                          <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                        <span><a href="index.php">Clear Search</a></span>
                      </form>
                    </div>
                  </div>

                      <div class="row">
                          <div class="col-md-12">
                              <?php
                              // Include config file
                              require_once 'configs/database.php';

                              if(isset($_GET['search_item'])){
                                $search = mysqli_real_escape_string($conn,$_GET['search_item']);
                                $sql = "SELECT * FROM parts WHERE part_name LIKE '%$search%'
                                                             OR part_number LIKE '%$search%'
                                                             OR project_id LIKE '%$search%'";
                              } else {
                                $sql = "SELECT * FROM parts";
                              }

                              if($result = mysqli_query($conn, $sql)){
                                  if(mysqli_num_rows($result) > 0){
                                      echo "<table class='table table-bordered table-striped'>";
                                          echo "<thead>";
                                              echo "<tr>";
                                                  echo "<th>Project ID</th>";
                                                  echo "<th>Part Number</th>";
                                                  echo "<th>Part Name</th>";
                                                  echo "<th>Primary Loc.</th>";
                                                  echo "<th>Total Qty.</th>";
                                                  echo "<th>Unit</th>";
                                                  echo "<th>Secondary Loc.</th>";
                                                  echo "<th>Secondary Qty.</th>";
                                                  echo "<th>Action</th>";
                                              echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while($row = mysqli_fetch_array($result)){
                                              echo "<tr>";
                                                  echo "<td>" . $row['project_id'] . "</td>";
                                                  echo "<td>" . $row['part_number'] . "</td>";
                                                  echo "<td>" . $row['part_name'] . "</td>";
                                                  echo "<td>" . $row['part_primaryLocation'] . "</td>";
                                                  echo "<td>" . $row['part_quantity'] . "</td>";
                                                  echo "<td>" . $row['part_unitOfMeasurement'] . "</td>";
                                                  echo "<td>" . $row['part_secondaryLocation'] . "</td>";
                                                  echo "<td>" . $row['part_secondaryQuantity'] . "</td>";
                                                  echo "<td>";
                                                      echo "<a href='actions/part_read_action.php?part_id=". $row['part_id'] ."' title='Additional Information' data-toggle='tooltip'><span class='fab fa-readme fa-lg'></span></a>";
                                                      echo "<a href='actions/part_update_action.php?part_id=". $row['part_id'] ."' title='Update Record' data-toggle='tooltip'><span class='fas fa-edit fa-lg'></span></a>";
                                                      echo "<a href='actions/part_delete_action.php?part_id=". $row['part_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fas fa-minus-circle fa-lg'></span></a>";
                                                  echo "</td>";
                                              echo "</tr>";
                                          }
                                          echo "</tbody>";
                                      echo "</table>";
                                      // Free result set
                                      //mysqli_free_result($result);
                                  } else{
                                      echo "<p class='lead'><em>No records were found.</em></p>";
                                  }
                              } else{
                                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                              }

                              // Close connection
                            //  mysqli_close($conn);
                              ?>
                          </div>
                      </div>
                  </div>
            </div>

            <!-- Projects -->
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="page-header clearfix">
                              <h2 class="pull-left">Projects</h2>
                              <a href="#" data-toggle="modal" data-target="#form_project_add" class="btn btn-success pull-right">Add Project</a>
                          </div>
                          <?php
                          // Include config file
                          //require_once 'includes/database_inc.php';

                          // Attempt select query execution
                          $sqlb = "SELECT * FROM projects";
                          if($resultb = mysqli_query($conn, $sqlb)){
                              if(mysqli_num_rows($resultb) > 0){
                                  echo "<table class='table table-bordered table-striped'>";
                                      echo "<thead>";
                                          echo "<tr>";
                                              echo "<th>Lot#</th>";
                                              echo "<th>Project ID</th>";
                                              echo "<th>Part Name</th>";
                                              echo "<th>Description.</th>";
                                              echo "<th>Supplier</th>";
                                              echo "<th>Assigned: </th>";
                                              echo "<th>Qty</th>";
                                              echo "<th>Bom ID</th>";
                                              echo "<th>Bom Action</th>";
                                              echo "<th>Action</th>";
                                          echo "</tr>";
                                      echo "</thead>";
                                      echo "<tbody>";
                                      while($rowb = mysqli_fetch_array($resultb)){
                                          echo "<tr>";
                                              echo "<td>" . $rowb['project_lotNumber'] . "</td>";
                                              echo "<td>" . $rowb['project_projectID'] . "</td>";
                                              echo "<td>" . $rowb['project_itemNumber'] . "</td>";
                                              echo "<td>" . $rowb['project_description'] . "</td>";
                                              echo "<td>" . $rowb['project_supplier'] . "</td>";
                                              echo "<td>" . $rowb['project_assignedBy'] . "</td>";
                                              echo "<td>" . $rowb['project_qty'] . "</td>";
                                              echo "<td>" . $rowb['project_bomID'] . "</td>";
                                              echo "<td>";
                                                  echo "<a href='projects_bomReserve.php?project_id=". $rowb['project_id'] ."' title='Reserve parts' data-toggle='tooltip'><span class='fas fa-arrow-circle-down fa-lg'></span></a>";
                                                  echo "&nbsp;";
                                                  echo "&nbsp;";
                                                  echo "&nbsp;";
                                                  echo "<a href='projects_bomExpend.php?project_id=". $rowb['project_id'] ."' title='Expend parts' data-toggle='tooltip'><span class='fas fa-share-square fa-lg'></span></a>";
                                                  echo "&nbsp;";
                                                  echo "&nbsp;";
                                                  echo "&nbsp;";
                                                  echo "<a href='bom_review.php?project_bomID=". $rowb['project_bomID'] ."' title='Review parts' data-toggle='tooltip'><span class='fas fa-clipboard-list fa-lg'></span></a>";
                                              echo "</td>";
                                              echo "<td>";
                                                  echo "<a href='projects_read.php?project_id=". $rowb['project_id'] ."' title='Additional Information' data-toggle='tooltip'><span class='fab fa-readme fa-lg'></span></a>";
                                                  echo "<a href='projects_update.php?project_id=". $rowb['project_id'] ."' title='Update Record' data-toggle='tooltip'><span class='fas fa-edit fa-lg'></span></a>";
                                                  echo "<a href='projects_delete.php?project_id=". $rowb['project_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fas fa-minus-circle fa-lg'></span></a>";
                                              echo "</td>";
                                          echo "</tr>";
                                      }
                                      echo "</tbody>";
                                  echo "</table>";
                                  // Free result set
                                  mysqli_free_result($resultb);
                              } else{
                                  echo "<p class='lead'><em>No records were found.</em></p>";
                              }
                          } else{
                              echo "ERROR: Could not able to execute $sqlb. " . mysqli_error($conn);
                          }

                          // Close connection
                    //  mysqli_close($conn);
                          ?>
                      </div>
                  </div>
              </div>
            </div>
            <!--PROJECTS END -->

            <!--BoMs Start -->
            <div class="tab-pane fade" id="v-pills-partslists" role="tabpanel" aria-labelledby="v-pills-partslists-tab">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="page-header clearfix">
                              <h2 class="pull-left">Parts Lists</h2>
                              <a href="#" data-toggle="modal" data-target="#form_bom_add" class="btn btn-success pull-right">Add BoM</a>
                          </div>
                          <?php
                          // Include config file
                          //require_once 'includes/database_inc.php';
                          // Attempt select query execution
                          $sqlc = "SELECT * FROM boms";
                          if($resultc = mysqli_query($conn, $sqlc)){
                              if(mysqli_num_rows($resultc) > 0){
                                  echo "<table class='table table-bordered table-striped'>";
                                      echo "<thead>";
                                          echo "<tr>";
                                              echo "<th>BoM ID</th>";
                                              echo "<th>Project ID</th>";
                                              echo "<th>Part Number</th>";
                                              echo "<th>Qty. </th>";
                                              echo "<th>Notes</th>";
                                              echo "<th>Action</th>";
                                          echo "</tr>";
                                      echo "</thead>";
                                      echo "<tbody>";
                                      while($rowc = mysqli_fetch_array($resultc)){
                                          echo "<tr>";
                                              echo "<td>" . $rowc['bom_id'] . "</td>";
                                              echo "<td>" . $rowc['bom_projectID'] . "</td>";
                                              echo "<td>" . $rowc['bom_partNumber'] . "</td>";
                                              echo "<td>" . $rowc['bom_qty'] . "</td>";
                                              echo "<td>" . $rowc['bom_notes'] . "</td>";
                                              echo "<td>";
                                                  echo "<a href='parts_read.php?part_id=". $rowc['bom_id'] ."' title='Additional Information' data-toggle='tooltip'><span class='fab fa-readme fa-lg'></span></a>";
                                                  echo "<a href='update.php?part_id=". $rowc['bom_id'] ."' title='Update Record' data-toggle='tooltip'><span class='fas fa-edit fa-lg'></span></a>";
                                                  echo "<a href='parts_delete.php?part_id=". $rowc['bom_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fas fa-minus-circle fa-lg'></span></a>";
                                              echo "</td>";
                                          echo "</tr>";
                                      }
                                      echo "</tbody>";
                                  echo "</table>";
                                  // Free result set
                                  mysqli_free_result($resultc);
                              } else{
                                  echo "<p class='lead'><em>No records were found.</em></p>";
                              }
                          } else{
                              echo "ERROR: Could not able to execute $sqlc. " . mysqli_error($conn);
                          }

                          // Close connection
                        mysqli_close($conn);
                          ?>
                      </div>
                  </div>
              </div>
            </div>        <!--BOM END -->


            <div class="tab-pane fade" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab">
              <h1>products</h1>

            </div>

            <div class="tab-pane fade" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab">


            </div>
          </div>
        </div>


      </div>
    </div>


  </body>
</html>
