<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>





<div class="w3-sidebar w3-light-grey w3-bar-block w3-card-2" style="width:25%">
    <h3 class="w3-bar-item w3-black">
      <a href="home.php" class="w3-bar-item w3-black">CS143 Project 1B</a>
  </h3>

  <div class="w3-blue w3-card-2 w3-container">
    <p>Input New Information</p>
  </div>

  <a href="addActorDirector.php" class="w3-bar-item w3-button">Add Person</a>
  <a href="addMovie.php" class="w3-bar-item w3-button">Add Movie</a>
  <a href="addMovieActor.php" class="w3-bar-item w3-button">Add Movie Actor</a>
  <a href="addMovieDirector.php" class="w3-bar-item w3-button">Add Movie Director</a>

  <div class="w3-container w3-green w3-card-2">
    <p>Browse Information</p>
  </div>

  <a href="actorInfo.php" class="w3-bar-item w3-button">Actor Information</a>
  <a href="movieInfo.php" class="w3-bar-item w3-button">Movie Information</a>

  <div class="w3-container w3-red w3-card-2">
    <p>Search</p>
  </div>

  <a href="search.php" class="w3-bar-item w3-button">Search For Actor/Movie</a>

</div>
<?php
?>




<div class="w3-container w3-card-2" style="margin-left:26%">
    <div class="w3-container w3-card-2 w3-teal">
        <h1>Add Movie Actor</h1>
    </div>

    <br><br>

    <form action="./addMovieActor.php" id="addform" method="post">
        <label>Movie Title</label>
        <select class="w3-select w3-border" name="movietitle">
            <option value="" disabled selected>Choose Genre</option>
                        <?php  
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$query1="SELECT title,year,id from Movie";

$result1=mysql_query($query1,$db_connection);

while ($row=mysql_fetch_row($result1))
{

	       
echo "<option value=\"$row[2]\">$row[0] ($row[1])</option>";


}
	      
	       ?>
        </select>
        <br><br>

        <label>Actor</label>
        <select class="w3-select w3-border" name="actor">
            <option value="" disabled selected>Choose Genre</option>
            <?php  
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);


$query2="SELECT last,first,dob,id from Actor";


$result2=mysql_query($query2, $db_connection);

while ($row=mysql_fetch_row($result2))
{

	       
echo "<option value=\"$row[3]\">$row[1] $row[0] ($row[2])</option>";


}
	      
	       ?>
        </select>
        <br><br>

        <label>Role</label>
        <input class="w3-input w3-border w3-round" type="text" name="role" form="addform">


        <br><br>
        <input class="w3-btn w3-green" type="submit">
        <br><br>

    </form>
<?php
//$local_moviename=$_POST['movietitle'];
//$local_actor=$_POST['actor'];
$local_role=$_POST['role'];
$local_aid=$_POST['actor'];
$local_mid=$_POST['movietitle'];
echo $local_mid;
echo $local_aid;
echo $local_role;


$final_query="insert into MovieActor values($local_mid, $local_aid, '$local_role')";

$final_result=mysql_query($final_query,$db_connection);
//if (final_result) echo "successful insert";

?>
</div>
</body>
</html>
