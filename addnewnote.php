<?php
  if(isset($_POST['submit'])){
    $note_title=$_POST['note_title'];
    $note_text=$_POST['note_text'];

    if($note_title=="" || empty($note_title))
      echo "Title is mandatory";
    elseif($note_text=="" || empty($note_text))
      echo "Description is mandatory";
    else{
      $conn=mysqli_connect('localhost','root','','notes app');
      if($conn){
        $query="insert into data (note_title, note_text) values ('$note_title','$note_text')";
        $result=mysqli_query($conn,$query);
        if($result)
          echo "success";
        else
          echo "f";
      }
    }
}
?>

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
            <a class="nav-link active" href="addnewnote.php">+ Add New Note</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section>
    <form action="addnewnote.php" method="post">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Add a title..." name="note_title">
      </div>
      <div class="mb-3" id="bottom-border">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
          placeholder="Type something..." name="note_text"></textarea>
        <input type="submit" class="btn btn-outline-primary form-button" value="Submit" name="submit">
        <input type="reset" class="btn btn-outline-primary form-button" value="Reset">
      </div>
    </form>
  </section>
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