<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<style type="text/css">
    #appointments
    {
        outline: 1px solid black;
    }
    th, td
    {
        outline: 1px solid black;
    }
    #add_task
    {
        width: 30%;
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

    <?php date_default_timezone_set('America/Los_Angeles'); ?>
</head>
<body>
	
<h1>Hello, <?= $this->session->userdata['record']['alias'] ?>!</h1>
<a href="/mains/logout">Logout</a>

<h3>Here are your appointments for today,  <?= ' '.date("F d, Y"); ?>:</h3>
<table id="appointments">
<thead><th>Tasks</th>
	<th>Time</th>
	<th>Status</th>
	<th>Action</th>
</thead>
<tbody>

<?php foreach($todays['today'] as $today) { ?>
    <tr>
        <td><?= $today['appointment'] ?></td>
        <td><?= $today['time'] ?></td>
        <td><?= $today['status'] ?></td>
        <td><a href="/edit_task/<?= $today['id'] ?>">Edit</a> <a href="/delete_task/<?= $today['id'] ?>">Delete</a></td>
    </tr>
<?php } ?>
</tbody>
</table>
<h3>Your other appointments:</h3>
<table id="appointments">
<thead>
	<th>Tasks</th>
	<th>Date</th>
	<th>Time</th>
</thead>
<tbody>

<?php 

     foreach($futures['future'] as $future) { ?>
    <tr>
        <td><?= $future['appointment'] ?></td>
        <td><?= $future['day'] ?></td>
        <td><?= $future['time'] ?></td>
    </tr>
<?php } ?>

</tbody>
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