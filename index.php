<?php
    try{
    	require_once('connect.php');
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
    	$error = $e->getMessage();
    }
    if(isset($_POST) & !empty($_POST)){
    	$sql = "INSERT INTO tblEmployees (strFirstName, strLastName, strTitle, strTitleOfCourtesy, strCity) 
                VALUES(:firstname, :lastname, :Title, :Courtesy, :strCity)";
    	$result = $conn->prepare($sql);
    	$res = $result->execute(array(' :firstname' 	=> $_POST['fname'],
									    ':lastname' 	=> $_POST['lname'],
                                        ':strTitle' 	=> $_POST['Title'],
                                        ':Courtesy' 	=> $_POST['Courtesy'],
									    ':strCity' 	    => $_POST['city']
									));
	 if($res){
	 	echo "Successfully inserted data";
	 }else{
	 	echo "failed to insert data";
	 }
    }
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Simple CRUD Application in PHP PDO - Create</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
                <h2>Create Operation in CRUD Application</h2>
                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                    <input type="text" name="fname"  class="form-control" id="input1" placeholder="First Name" />
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                    <input type="text" name="lname"  class="form-control" id="input1" placeholder="Last Name" />
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="input1" class="col-sm-2 control-label">Position</label>
                    <div class="col-sm-10">
                    <input type="text" name="Title"  class="form-control" id="input1" placeholder="Position" />
                    </div>
                </div>
    
                <div class="form-group" class="radio">
                <label for="input1" class="col-sm-2 control-label">Courtesy</label>
                <div class="col-sm-10">
                <label>
                    <input type="radio" name="Courtesy" id="optionsRadios1" value="male" checked> Miss
                </label>
                    <label>
                    <input type="radio" name="Courtesy" id="optionsRadios1" value="female"> Mrs.
                </label>
                </div>
                </div>
    
                <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">
                    <select name="city" class="form-control">
                        <option>Select Your city</option>
                        <option value="CH">Chonburi</option>
                        <option value="BK">Bankok</option>
                        <option value="CH">Changmai</option>
                    </select>
                </div>
                </div>
                <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
            </form>
        </div>
    </div>
    </body>
    </html>