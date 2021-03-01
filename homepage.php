<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyNotes App</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <style>
    .btn-outline-success {
      color: #0275d8;
      border-color: #0275d8;
    }

    .btn-outline-success:hover {
      background-color: #0275d8;
      border-color: #0275d8;
    }

    .mb-3 {
      width: 400px;
      margin-left: 30px;
      margin-top: 30px;
    }

    .form-button {
      margin-top: 15px;
    }

    .delete-link{
      float:right;
      margin-left: 7px;
    }

    #border{
      border-bottom: 1px solid black;
      width:400px;
      margin-left: 30px;  
      margin-top: 20px; 
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="homepage.php">MyNotes App✎<sup>TM</sup></a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="addnewnote.php">+ Add New Note</a>
          </li>
        </ul>
        <form class="d-flex" action="searchresult.php" method="post">
          <input class="form-control me-2" type="search" name="searchq" placeholder="Type here to search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name="search"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
  </nav>

<?php
    $conn=mysqli_connect('localhost','root','','notes app');
    if($conn){
        $query="select * from data";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("Database connection failed.mysqli_error()");
        }
        elseif(mysqli_num_rows($result) <= 0){
            echo "No notes found to be shown"."<br>"."Try adding new notes";
        }
        else{          
            while($row=mysqli_fetch_assoc($result)){
                $note_id=$row['note_id'];
                $note_title=$row['note_title'];
                $note_text=$row['note_text'];

      ?>

  <section>
      <form id="all-notes">
      <div class="mb-3">
        <label class="form-label">Title</label>
        <a href="homepage.php?delete= <?php echo $note_id; ?>" class="delete-link">Delete</a>
        <input type="text" class="form-control" value=<?php echo "'$note_title'";?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" class="form-control" rows="3"
          value=<?php echo "'$note_text'";?>></textarea>
      </div>
      <div id="border">
      </div>
    </form>
  </section> 

  <?php 
  }
}
}
?>

<?php
  if(isset($_GET['delete'])){
    $note_id_del=$_GET['delete'];
    $query="delete from data where note_id = '$note_id_del'";
    $result=mysqli_query($conn,$query);
    header("Location: homepage.php");
  }
?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
    integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
    integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
    crossorigin="anonymous"></script>
</body>
</html>