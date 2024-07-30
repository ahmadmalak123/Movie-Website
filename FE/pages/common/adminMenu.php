
<?php
session_start();
if(isset($_SESSION['name'])) {
    $welcome_message = "Welcome, ".$_SESSION['name']."!";
?>
<!-- ***** Menu Start ***** -->
<ul class="nav">
<li><?php echo $welcome_message; ?></li>
  <li><a href="../pages/activateMovie.php">Activate/Deactivate Movies</a></li>
  <li><a href="../pages/addMovie.php">Add Movie</a></li>
  <li><a href="../../BE/logout.php">Logout</a></li>
  <li><a href="../pages/signup.php">Add Admin</a></li>
</ul>
<a class='menu-trigger'>
  <span>Menu</span>
</a>

<?php
} else {
  header("Location: ../../index.php");
  exit;
}
?>
