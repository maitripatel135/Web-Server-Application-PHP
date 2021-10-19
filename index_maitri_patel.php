<!Doctype HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>MySQL Using PhpMyAdmin</title>
    </head>
    <body>
    <h1>This form will take data from user and add it to the database <br /><br /></h1>
	<form id="form1" method="post" action="action.php" >
        <label for="givevalue">Enter First Name :</label><br/><br/>
		<input id="inputtext1" type="text" name="uservalue1" placeholder="" required="required"><br/><br/>
        <label for="givevalue">Enter Last Name :</label><br/><br/>
		<input id="inputtext2" type="text" name="uservalue2" placeholder="" required="required"><br/><br/>
        <label for="givevalue">Enter Midterm grade :</label><br/><br/>
		<input id="inputtext3" type="number" name="uservalue3" min="0" max="30" placeholder="" required="required"><br/><br/>
        <label for="givevalue">Enter Project grade :</label><br/><br/>
		<input id="inputtext4" type="number" name="uservalue4" min="0" max="30" placeholder="" required="required"><br/><br/>
        <label for="givevalue">Enter Final Exam grade :</label><br/><br/>
		<input id="inputtext5" type="number" name="uservalue5" min="0" max="40" placeholder="" required="required"><br/><br/>	
		<input id="inputsubmit1" type="submit" name="submit" value="SUBMIT" > 
	</form>
	<br />
    </body>
    </html>