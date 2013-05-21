<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
	<title><?php echo $template['title']; ?></title>
	<?php echo $template['partials']['head']; ?>
	 </head>
  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
<body class=""> 
  <!--<![endif]-->

<?php echo $template['partials']['nav']; ?>

<?php 
  if($this->authentication->is_loggedin()) 
  { 
    echo $template['partials']['sidebar']; 
    echo '<div class="content">';
    echo $template['body'];
    echo '</div>';
  }else{
    echo $template['body'];
  }
?>


<?php echo $template['partials']['script']; ?>
