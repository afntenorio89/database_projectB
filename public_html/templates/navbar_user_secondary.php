<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><img class="brand-navlogo" src="../images/logoName.png"></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="forms/add_user.php">Add User</a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link" href="forms/add_user.php">Welcome, <?php echo $_SESSION['u_uid'] ?></a>
      </li>
    </ul>

    <iframe src="http://free.timeanddate.com/clock/i68ipsmn/n137/fn17/fs18/tct/pct/tt0/tw1/tm1/tb2" frameborder="0" width="305" height="24" allowTransparency="true"></iframe>
    <form action="sql/logout_sql.php" method="POST" class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Logout</button>
    </form>
  </div>
</nav>
