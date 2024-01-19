<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body {
    min-height: 100vh;
}
a {
    text-decoration: none;
}
li {
    list-style: none;
}
h1,
h2 {
    color: #444;
}
h3 {
    color: #999;
}
.btn {
    background: #f05462;
    color: bleu;
    padding: 5px 10px;
    text-align: center;
}
.btn:hover {
    color: #f05462;
    background: white;
    padding: 3px 8px;
    border: 2px solid #f05462;
}
.title {
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 15px 10px;
    border-bottom: 2px solid #999;
}
table {
    padding: 10px;
}
th,
td {
    text-align: left;
    padding: 8px;
}
.side-menu {
    position: fixed;
    background: #f05462;
    width: 20vw;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
.side-menu .brand-name {
    height: 10vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.side-menu li {
    font-size: 24px;
    padding: 10px 40px;
    color: white;
    display: flex;
    align-items: center;
}
.side-menu li:hover {
    background: white;
    color: #f05462;
}
.container {
    position: absolute;
    right: 0;
    width: 80vw;
    height: 100vh;
    background: #f1f1f1;
}
.container .header {
    position: fixed;
    top: 0;
    right: 0;
    width: 80vw;
    height: 10vh;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
}
.container .header .nav {
    width: 90%;
    display: flex;
    align-items: center;
}
.container .header .nav .search {
    flex: 3;
    display: flex;
    justify-content: center;
}
.container .header .nav .search input[type=text] {
    border: none;
    background: #f1f1f1;
    padding: 10px;
    width: 50%;
}
.container .header .nav .search button {
    width: 40px;
    height: 40px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
}
.container .header .nav .search button img {
    width: 30px;
    height: 30px;
}
.container .header .nav .user {
    flex: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.container .header .nav .user img {
    width: 40px;
    height: 40px;
}
.container .header .nav .user .img-case {
    position: relative;
    width: 50px;
    height: 50px;
}
.container .header .nav .user .img-case img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.container .content {
    position: relative;
    margin-top: 10vh;
    min-height: 90vh;
    background: #f1f1f1;
}
.container .content .cards {
    padding: 20px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
.container .content .cards .card {
    width: 250px;
    height: 150px;
    background: white;
    margin: 20px 10px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.container .content .content-2 {
    min-height: 60vh;
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    flex-wrap: wrap;
}
.container .content .content-2 .recent-payments {
    min-height: 50vh;
    flex: 5;
    background: white;
    margin: 0 25px 25px 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    display: flex;
    flex-direction: column;
}
.container .content .content-2 .new-students {
    flex: 2;
    background: white;
    min-height: 50vh;
    margin: 0 25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    display: flex;
    flex-direction: column;
}
.container .content .content-2 .new-students table td:nth-child(1) img {
    height: 40px;
    width: 40px;
}
@media screen and (max-width: 1050px) {
    .side-menu li {
        font-size: 18px;
    }
}
@media screen and (max-width: 940px) {
    .side-menu li span {
        display: none;
    }
    .side-menu {
        align-items: center;
    }
    .side-menu li img {
        width: 40px;
        height: 40px;
    }
    .side-menu li:hover {
        background: #f05462;
        padding: 8px 38px;
        border: 2px solid white;
    }
}
@media screen and (max-width:536px) {
    .brand-name h1 {
        font-size: 16px;
    }
    .container .content .cards {
        justify-content: center;
    }
    .side-menu li img {
        width: 30px;
        height: 30px;
    }
    .container .content .content-2 .recent-payments table th:nth-child(2),
    .container .content .content-2 .recent-payments table td:nth-child(2) {
        display: none;
    }
}
    </style>
    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Admin</h1>
        </div>
        <ul>
            <a href="adminreservation.php"><li><img src="dashboard (2).png" alt="">&nbsp; <span>ALL Reservation</span> </li></a>
            <a href="admincontact.php"> <li><img src="reading-book (1).png" alt="">&nbsp;<span>Alll messages</span> </li></a>
            <a href="adminemploye.php"> <li><img src="teacher2.png" alt="">&nbsp;<span>ALL Employe</span> </li></a>
            <a href="adminclient.php"> <li><img >&nbsp;<span>ALL Clients</span> </li></a>
           
            <a href="loginadmin.php"> <li><img src="set" alt="">&nbsp;<span>Log Out</span></li></a>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
               
                <div class="user">
                    <a href="addclient.php" class="btn btn-success" >New client</a>
                    <p> <div style="margin-left:900px;"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
</svg>
<div style="margin-top:-23px;margin-left:20px;">
<?php
         
            if(isset($_SESSION["user"])){
                echo $_SESSION['user'];
            
            
            }else{
            
                echo "session expired";
            }
  ?> </div></div></p>
                    <div class="img-case">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1><?php 
                        
                        
                        echo $_SESSION['cll'];
                        ?></h1>
                        <h3>Client</h3>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php 
                        
                        echo $_SESSION['cpt'];
                        ?></h1>
                        <h3>Employe</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>6</h1>
                        <h3>Campus</h3>
                    </div>
                    <div class="icon-case">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php 
                        
                        echo $_SESSION['msgi'];
                        ?></h1>
                        <h3>messages</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Message</h2>
                        <a href="admincontact.php" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                        
                            <th>name</th>
                            <th>email</th>
                            <th>message</th>
                            
                        </tr>
                        <tbody>

        <?php
        include('connection.php');
   

        //create in instance of class Connection
        $connection = new Connection();
        
        
        //call the selectDatabase method
        $connection->selectDatabase('powerdata');
        include("client2.php");
        $clients=contact::selectAllClients('contact',$connection->conn);
        foreach($clients as $row) {
          echo " <tr>
           
           <td>$row[name]</td>
           <td>$row[email]</td>
           <td>$row[message]</td>
          
       </tr>";
       }
       
       ?>
       </tbody>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Clients</h2>
                        <a href="adminclient.php" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                        <th>id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                        <tbody>

<?php




$connection->selectDatabase('powerdata');
include("client.php");
$clients=client::selectAllClients('client',$connection->conn);
foreach($clients as $row) {
    echo "<tr>
    
    <td>{$row['id']}</td>
    <td>{$row['firstname']}</td>
    <td>{$row['lastname']}</td>
    
    
  
  </tr>";
}

?>
</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>