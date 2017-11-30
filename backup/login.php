<html>
	<head>
		<style>	
			@import url("css/basicRoster_login.css");
		</style>	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>
	<body>		
		<table width="100%" height="100%" border="0">
	    <tr>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	    </tr>
	    <tr>
	        <td>&nbsp;</td>
	        <td class="login">
		        <form class="form-horizontal" method='post' action='login_ok.php'>
				  <div class="form-group">
				    <label for="user_id" class="col-sm-2 control-label" style="padding-top:4px;" ><img src="./img/id.png"></label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="user_id">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="user_pw" class="col-sm-2 control-label" style="padding-top:4px;" ><img src="./img/pw.png"></label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" name="user_pw" >
				    </div>
				  </div>				  
				  <div align="right">
				  	<button type="submit" class="btn btn-primary" >Login</button>
				</div>
				</form>
	        </td>
	        <td>&nbsp;</td>
	    </tr>
	    <tr>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	    </tr>
	</body>
	

</html>
