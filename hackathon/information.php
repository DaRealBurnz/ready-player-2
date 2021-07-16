<?php
$dbc = mysqli_connect('localhost', 'root', 'password', 'hackathon_testing');
if (!$dbc) exit('Could not connect');
include("verify_user_function.php");
$res = mysqli_query($dbc, "SELECT id, first_name, last_name, discord, interests, dislikes, comp, skill FROM users WHERE id=".$_SESSION['user_id']);
$usrInfo = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit your info</title>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	</head>
<form action="javascript:void(0);" method="POST">
	<fieldset>
		<legend>Information</legend>
		
		<br>
		
		<legend>First Name</legend>
		<input name = "fname" id = "fname" type="text" value="<?php echo $usrInfo['first_name']; ?>"/>
		
		<legend>Last Name</legend>
		<input name = "lname" id = "lname" type="text" value="<?php echo $usrInfo['last_name']; ?>"/>
		
		<legend>Discord ID</legend>
		<input name = "disid" id = "disid" type="text" value="<?php echo $usrInfo['discord']; ?>"/>
		
		<legend>Interests</legend>
		<input name = "interests" id = "interests" type="text"/>
		
		<button type="button" onClick="addint()">Click to Add</button>
		<button type="button" onClick="remint()">Remove Last Entry</button>
		
		<legend>Dislikes</legend>
		<input name = "dislikes" id = "dislikes" type="text"/>
		
		<button type="button" onClick="adddis()">Click to Add</button>
		<button type="button" onClick="remdis()">Remove Last Entry</button>
		
		<br>
		<br>
		
		<label for="level">Competitive or Casual Play</label>
		
		<br>
		
		<select name="level_select" name=level id="level">
			<option value="1" id="comp">Competitive</option>
			<option value="0" id="casual">Casual</option>
		</select>
		
		<br>
		
		<label for="skill">Skill Level</label>
		<br>
		
		<select name="skill_select" name=skill id="skill">
			<option value="0" id="beg">Beginner</option>
			<option value="1" id="nov">Novice</option>
			<option value="2" id="int">Intermediate</option>
			<option value="3" id="cra">Cracked</option>
		</select>
		

<br>

<body>
Interests
<p id="intslist"></p>
</body>
<body>
Dislikes
<p id="dislist"></p>
</body>

<input type="submit" value="Continue" name="submit" onclick="cont()">
</fieldset>
</form>

<script>
// The main point is all that rubbish within this tag, basically just copy and paste everything below if the rest of the website is already built

let ints = "<?php echo $usrInfo['interests']; ?>".split(",");
let dis = "<?php echo $usrInfo['dislikes']; ?>".split(",");
document.getElementById("intslist").innerHTML = ints;
document.getElementById("dislist").innerHTML = dis;

$('select#level>option[value="<?php echo $usrInfo['comp']; ?>"]').attr("selected", "selected");
$('select#skill>option[value="<?php echo $usrInfo['skill']; ?>"]').attr("selected", "selected");

function addint() {
	let inpint = document.getElementById("interests").value;
	if (Boolean(inpint)) {
		ints.push(inpint);
		document.getElementById("interests").value = '';
		document.getElementById("intslist").innerHTML = ints;
	}
	}
	
function remint(){
	ints.pop();
	document.getElementById("intslist").innerHTML = ints;
}

function adddis() {

	let inpdis = document.getElementById("dislikes").value;
	if (Boolean(inpdis)) {
		dis.push(inpdis);
		document.getElementById("dislikes").value = '';
		document.getElementById("dislist").innerHTML = dis;
	}
	}
	
function remdis(){
	dis.pop();
	document.getElementById("dislist").innerHTML = dis;
}

function cont() {

	//Here's the bit where you extract the data. The data can be found under the variable names:

	/*var fname = document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var discordid = document.getElementById("disid").value;
	var interests = document.getElementById("interests").value;
	var dislikes = document.getElementById("dislikes").value;
	var level = document.getElementById("level").value;
	var skill = document.getElementById("skill").value;*/
	
	//self.location="game_select.htm";
	$.ajax({
        type: "POST",
        url: "update.php",
        data: {fname:$("#fname").val(), lname:$("#lname").val(), discord:$("#disid").val(), interests:ints.join(), dislikes:dis.join(), comp:$("#level").val(), skill:$("#skill").val(), submit:true},
        success: function(res) {
            if (res === "Done") {
				window.location.replace("game_select.htm");
			}
        }
    });
}

</script>