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
        <h1>Search for Actors and Movies</h1>
    </div>

    <br><br>

    <form action="search.php" id="addform" method="post">

        <label>Search</label>
        <input class="w3-input w3-border w3-round" type="text" name="search">

        <br>

        <input class="w3-btn w3-green" type="submit">

        <br><br>
    </form>

    <table class="w3-table-all" style="width:100%">
    <caption>Actors</caption>
    <tr>
    <th>Actor ID</th> <th>Name</th> <th>Date of Birth</th>
    </tr>



    <?php
        $search = $_POST['search'];
    
        if($search != '') {
            $db_connection = mysql_connect("localhost", "cs143", "");
            mysql_select_db("CS143", $db_connection);
            $actorquery = "Select full.id, full.name, full.dob From (Select Concat(`first`, ' ', `last`) as name, id, dob From Actor) as full Where full.name like '%$search%';";
            $result = mysql_query($actorquery, $db_connection);


            while($row = mysql_fetch_row($result)) {
                echo "<tr>";
                for($x = 0; $x < count($row); $x++) {
                    echo "<td> <a href=\"actorInfo.php?actorName=$row[1]&actorId=$row[0]\"> $row[$x] </a> </td>";
                }
                echo "</tr>";
            }

        }

    ?>
    </table>



    <br>
    <table class="w3-table-all" style="width:100%">
    <caption>Movies</caption>
    <tr>
    <th>Title</th> <th>Year</th>
    </tr>


    <?php
        $msearch = $_POST['search'];
    
        if($msearch != '') {
            $db_connection = mysql_connect("localhost", "cs143", "");
            mysql_select_db("CS143", $db_connection);
            $mquery = "Select title, year, id From Movie Where title like '%$msearch%';";
            $mresult = mysql_query($mquery, $db_connection);


            while($mrow = mysql_fetch_row($mresult)) {
                echo "<tr>";
                for($x = 0; $x < count($mrow) - 1; $x++) {
                    echo "<td> <a href=\"movieInfo.php?movieId=$mrow[2]\"> $mrow[$x] </a> </td>";
                }
                echo "</tr>";
            }

        }



    ?>



    </table>

    <br><br>



</div>
</body>
</html>
