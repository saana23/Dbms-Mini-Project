<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> form      </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  <div class="container">
    <h1 class="brand"><span>EaseMyVoyage</span></h1>
    <div class="wrapper">
      <div class="company-info">
        <h3>Contact Us</h3>
        <ul>
          <li><i class="fa fa-road"></i> Kadri,Mangalore</li>
          <li><i class="fa fa-phone"></i> 6362 678 287</li>
          <li><i class="fa fa-envelope"></i> etravelsrs@gmail.com </li>
        </ul>
      </div>
      <div class="contact">
        <h3>Trip Details</h3>
        <!--div class="alert">Your message has been sent</div-->
        <form id="contactForm" action="mail.php" method="POST">
          <p>
            <label>Name</label>
            <input type="text" name="name" id="name" required>
          </p>
          <p>
            <label for="Places">Choose Destination:</label>
              <select name="pid" id="places">
                <?php
                $servername='localhost';
                $username='root';
                $password='';
                $dbname = "easytravels";
                $conn=mysqli_connect($servername,$username,$password,"$dbname");
                if(!$conn){
                    die('Could not Connect My Sql:' .mysql_error());
                 }
                 $sql1="SELECT * from places ";
                 $result=mysqli_query($conn, $sql1);
                //  mysqli_close($conn);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    
                    echo "<option value=".$row["pid"].">".$row["pname"]."</option> ";
                  }
                } else {
                  echo "place doesnt exists";
                }
                mysqli_close($conn);
                ?>
                

                    
                   
             </select>
  <br><br>
 
          </p>
         
          <p>
            <label for="date">Date :</label>
            <input type="date" id="Date" name="date">
          </p>
          <p class="full">
            <label>Things to carry</label>
            <textarea name="message" rows="5" id="message"></textarea>
          </p>
           
            <label class="mt-3">Email Addresses to be notified</label><br>
            <div class="conatiner">
            <div class="row">
              <div class="col">
                <input type="email" name="email1" id="email" placeholder="Email 1" required>
              </div>
              <div class="col">
                <input type="email" name="email2" id="email"  placeholder="Email 2" required>
              </div>
            </div>
          </div>
            <div class="container">
           <button class="btn btn-lg btn-primary " type="submit">Submit</button>
           <a href="index.html" class="btn btn-lg btn-primary ">Go back</a>
            </div>
            <!-- <input type="submit" class=""> -->

        </form>
      </div>
    </div>
  </div>

  <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
  <script src="main.js"></script>
</body>
</html>