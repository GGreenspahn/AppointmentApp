<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<style type="text/css">
    #appointments
    {
        outline: 1px solid black;
    }
    th
    {
        outline: 1px solid black;
    }

	</style>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function() 
        {
            $( "#datepicker" ).datepicker(
            {	dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
</head>
<body>
	 <?php  

     // date.timezone = "America/Los_Angeles";
  //    var_dump();
	 // die(); 
     ?>
	
<h1>Hello, <?= $this->session->userdata['record']['alias'] ?>!</h1>
<a href="/mains/logout">Logout</a>

<h3>Here are your appointments for today, <?= ' '.date("F d, Y"); ?>:</h3>
<table id="appointments">
<thead><th>Tasks</th>
	<th>Time</th>
	<th>Status</th>
	<th>Action</th>
</thead>
<tbody>
<?php   // foreach($tasks as $task)
   

?>
</tbody>
<?php
// var_dump($all_users);
// die('here');
//  for($i=0;$i<count($all_users);$i++){
//  	if ($all_users[$i]['id'] != $this->session->userdata['record']['id']) {
// 	echo
// '<tr>
// 	<td>' . $all_users[$i]['name'] . '</td>
// 	<td>' . $all_users[$i]['alias'] . '</td>
// 	<td>' . $all_users[$i]['email'] . '</td>
// 	<td>' . $all_users[$i]['Total_pokes'] . '</td>
// 	<td> <a href="/add_poke/' . $all_users[$i]["id"] . '">Poke</a> </td>
// </tr>';
//  } 
//  	}?>
</table>
<h3>Your Other appointments: <?php // Date ?>:</h3>
<table id="appointments">
<thead>
	<th>Tasks</th>
	<th>Date</th>
	<th>Time</th>
</thead>
<tbody></tbody>
</table>
<form id="add_task" action="/tasks/add_task" method="post">
    <fieldset>
        <legend>Add Appointment</legend>
        <div><label for="date">Date: </label><input type="text" id="datepicker" name="datepicker" value=""></div>
        <div><label for="time">Time: </label><input type="time" id="time" name="time" value=""></div>
        <div><label for="appointment">Tasks: </label><input type="text" id="appointment" name="appointment" placeholder="enter task here..."></div>
        <div><input type="submit" value="Add"></div>
      	<input type ="hidden" name="id" value="<?= $this->session->userdata['record']['id'] ?>">
        <input type ="hidden" id="status" name="status" value="pending">
    </fieldset>
</form>

</body>
</html>