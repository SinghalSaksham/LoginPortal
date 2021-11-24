<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>All Users</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php

        $server = "localhost";
        $username="root";
        $password = "";
        $database = "users";

        $conn = mysqli_connect($server,$username,$password,$database);

        $results_per_page = 3;

        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn,$sql);
        $number_of_results = mysqli_num_rows($result);
        // echo '<br>';
        
    
    $number_of_pages = ceil($number_of_results/$results_per_page);

    if(!isset($_GET['page']))
    {
        $page = 1;
    }
    else
    {
        $page = $_GET['page'];
    }

    $this_page_first_result = ($page - 1)* $results_per_page;

    $sql = "SELECT * FROM users LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn,$sql);

    echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">password</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile NO.</th>
    </tr>
  </thead>
  <tbody>';
      while($row = mysqli_fetch_array($result))
    {
        // echo $row['sno']. ' '. $row['username'] . ' '. $row['password'] . ' '. $row['name'] . ' '. $row['mobile'] . '<br>';
        echo '<tr>
        <th scope="row">' . $row['sno']. '</th>
        <td>' . $row['username'] . '</td>
        <td>' . $row['password'] . '</td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['mobile'] . '</td>
      </tr>';
    }

    
   echo ' 
  </tbody>
</table>';



    for($page=1;$page<=$number_of_pages;$page++)
    {
        echo '<a href="index.php?page=' . $page . '">' . $page .'</a> ';
    }

    ?>
    
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>