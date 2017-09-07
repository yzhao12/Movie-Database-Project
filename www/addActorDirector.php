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











<div class="w3-container w3-card-2" style="margin-left:26%">
    <div class="w3-container w3-card-2 w3-teal">
        <h1>Add New Actor/Director</h1>
    </div>

  
    <form action="./addActorDirector.php" id="addform" method="post">
  
  <br>

    <input class="w3-radio" type="radio" name="persontype" value="Actor" checked>
    <label>Actor</label>

    <input class="w3-radio" type="radio" name="persontype" value="Director">
    <label>Director</label>

    <br><br>




      <label>First Name</label>
        <input class="w3-input w3-border w3-round" type="text" name="firstname" form="addform">

        <label>Last Name</label>
        <input class="w3-input w3-border w3-round" type="text" name="lastname" form="addform">

        <br><br>

        <input class="w3-radio" type="radio" name="gender" value="Male" checked>
        <label>Male</label>

        <input class="w3-radio" type="radio" name="gender" value="Female">
        <label>Female</label>

        <br><br><br>

        <label>Date of Birth</label>
        <input class="w3-input w3-border w3-round" type="text" name="dob" form="addform">

        <label>Date of Death</label>
        <input class="w3-input w3-border w3-round" type="text" name="dod" form="addform">
	<input type="hidden" name="hide" value="1">

        <br><br>
        <input class="w3-btn w3-green" type="submit">
        <br><br>

    </form>
<?php
   $flag=$_POST["hide"];

   $local_persontype=$_POST['persontype'];
   $local_gender=$_POST['gender'];
   $local_firstname=$_POST['firstname'];
   $local_lastname=$_POST['lastname'];
   $local_dob=$_POST['dob'];
   $local_dod=$_POST['dod'];


   if ($local_lastname!="")
{

   
   $db_connection = mysql_connect("localhost", "cs143", "");
   mysql_select_db("CS143", $db_connection);
   $query1="SELECT * FROM MaxPersonID";
   $result1=mysql_query($query1, $db_connection);
   $row=mysql_fetch_row($result1);
   $local_pid=$row[0]+1;
   echo $local_pid;
   

   if ($local_persontype=="Director")
   {

   if ($local_dod!="")
{
//   echo "dod is not empty";
   $query2="INSERT INTO Director values($local_pid, '$local_lastname', '$local_firstname', '$local_dob', '$local_dod')";

} 
   else $query2="INSERT INTO Director values($local_pid, '$local_lastname', '$local_firstname', '$local_dob', NULL)";
   echo $query2;
   $result2=mysql_query($query2, $db_connection);

//   echo "its a director";
   if ($result2)
   {
   $query3="update MaxPersonID set id=$local_pid";
   $result3=mysql_query($query3, $db_connection);
   }

 }
   


   else if ($local_persontype=="Actor")
   {
   if ($local_dod!="")
{
   $aquery2="INSERT INTO Actor values($local_pid,'$local_lastname','$local_firstname','$local_gender','$local_dob','$local_dod');";
}
   else $aquery2="INSERT INTO Actor values($local_pid,'$local_lastname','$local_firstname','$local_gender\
','$local_dob',NULL);";
   echo $aquery2;
   $aresult2=mysql_query($aquery2,$db_connection);
   if ($aresult2)
   {
   $aquery3="update MaxPersonID set id=$local_pid";
   $aresult3=mysql_query($aquery3,$db_connection);
   }


  // echo "its an actor";
   }



   echo $local_persontype;
   echo $local_gender;
   echo $local_firstname;
   echo $local_lastname;
   echo $local_dob;
   echo $local_dod;
}
?>


</div>
</body>
</html>
