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

<h3>Edit this appointment:  <?= ' '.date("F d, Y"); ?>:</h3>
<table id="appointments">
<thead>
    <th>Task</th>
	<th>Day</th>
    <th>Time</th>
	<th>Status</th>
</thead>
<tbody>
    <tr>
        <td><?= $tasks['appointment'] ?></td>
        <td><?= $tasks['day'] ?></td>
        <td><?= $tasks['time'] ?></td>
        <td><?= $tasks['status'] ?></td>
    </tr>
</tbody>
</table>
<form id="update_task" action="/tasks/update_task/<?= $tasks['id'] ?>" method="post">
    <fieldset>
        <legend>Add Appointment</legend>
        <div><label for="date">Date: </label><input type="text" id="datepicker" name="datepicker" value=""></div>
        <div><label for="time">Time: </label><input type="time" id="time" name="time" value=""></div>
        <div><label for="appointment">Tasks: </label><input type="text" id="appointment" name="appointment" placeholder="enter task here..."></div>
        <div><label for="status">Status: </label>
            <select> id="status" name="status">
                <option value="Pending">Pending</option>
                <option value="Missed">Missed</option>
                <option value="Done">Done</option>
            </select>
        </div>
        <div><input type="submit" value="Add"></div>
      	<input type ="hidden" name="id" value="<?= $this->session->userdata['record']['id'] ?>">
        <input type ="hidden" id="status" name="status" value="pending">
    </fieldset>
</form>

</body>
</html>