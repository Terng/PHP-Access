<?php
    try{
        require_once('connect.php');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        $error = $e->getMessage();
    }
    
    if(isset($error)){ echo $error; }
    
    $sql = "SELECT * FROM tblEmployees";
    $result = $conn->query($sql);
 ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>CRUD - Read</title>
            <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Posiion</th>
                    <th>Courtesy</th>
                    <th>Data of Brith</th>
                    <th></th>
                </tr>
                <?php 
                while($r = $result->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $r['pkeyEmployeeID']; ?></td>
                    <td><?php echo $r['strFirstName'] . " " . $r['strLastName']; ?></td>
                    <td><?php echo $r['strTitle']; ?></td>
                    <td><?php echo $r['strTitleOfCourtesy']; ?></td>
                    <td><?php echo $r['dtmBirthDate']; ?></td>
                    <td><a href="update.php?id=<?php echo $r['pkeyEmployeeID']; ?>">Edit</a> <a href="delete.php?id=<?php echo $r['pkeyEmployeeID']; ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </body>
    </html>