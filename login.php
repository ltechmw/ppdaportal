<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>PPDA Portal Login</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>

<!-- partial:index.partial.html -->
<div class="login-page">

  <div class="form">
    <p style = "color:#ff0000;">Invalid login, please try again</p>
    <form class="login-form" action="loginn.php" method="post">
      <input type="text" name="username" placeholder="username" required />
      <input type="password" name="password" placeholder="password" required />
	  <button>Login</button>
      
    </form>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>