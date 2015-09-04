<!DOCTYPE HTML>
<html>
<head>
<title>Ask</title>

</head>
<body>


<?php include 'opponent.php' ; ?>

<form  method="POST" action="update.php">

<h3>Ask for card:</h3>
<td>card</td>
<select name="card">
<option value="null">select</option>
<option value="A">A</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="J">J</option>
<option value="Q">Q</option>
<option value="K">K</option>
</select>
&nbsp;
&nbsp;
<td>Type</td>
<select name="card_type">
<option value="null">select</option>
<option value="heart">Heart</option>
<option value="club">Club</option>
<option value="diamond">Diamond</option>
<option value="spade">spade</option>
</select>
<br><br>
<td>To</td>
<select name="player">
<option value="null">select</option>
<option <?php $value =  $_SESSION['player_1_dropdown'] ?> ><?php echo $_SESSION['player_1_dropdown']; ?></option>
<option <?php $value =  $_SESSION['player_2_dropdown'] ?> ><?php echo $_SESSION['player_2_dropdown']; ?></option>
<option <?php $value =  $_SESSION['player_3_dropdown'] ?> ><?php echo $_SESSION['player_3_dropdown']; ?></option>

</select>
<br><br>
<td><input id="button" type="submit" name="ask" value="Ask"></td>

</form>


<br>
<br>

</body>
</html>