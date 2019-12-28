<?php
session_start();
if (!isset($_SESSION['login_user']))
	
	{
		header("Location: index.html");
	}

?>
<div class="input-group">

</div>
<ul class="navbar-nav ml-auto ml-md-0">
      
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item"><?php echo $_SESSION['login_user'];?></a>
          <a class="dropdown-item" href="logout.php" >Logout</a>
        </div>
      </li>
    </ul>