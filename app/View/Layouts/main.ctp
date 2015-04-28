<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Contact</title>
<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('mystyle');
	echo $this->Html->css('bootstrap.min');
?>
</head>
<body>

<?php echo $this->fetch('content'); ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->script('bootstrap-datepicker');
	echo $this->Html->script('myjs');
?>
<script type="text/javascript">
    $(function () {
    	$('#dp3').datepicker();
    });
</script>
</html>