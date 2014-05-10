
 <html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="favicon.ico">
<title>Title</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="/js/html5shiv.js"></script>
<script src="/js/respond.min.js"></script>
<![endif]-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if (AuthComponent::user()):
  // The user is logged in, show the logout link
  echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout'));
endif;
?>

<!-- <nav class="nab pull-right">
<a>HOME</a>
<a>AAA</a>
</nav>

<style>
.globNav-row{
 display: table;
 width: 100%;
}

.globNav-row > a{
 display: table-cell;
 vertical-align: middle;
 text-align: center;
}
</style>
 -->

<!-- <div class="navber navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <ul class="nav">
        <li><a href="#">最新のエントリー</a></li>
      </ul>
    </div>
   </div>
 </div>
 -->
<!-- header -->



<?php echo $this->fetch('content'); ?>
</body>
</html>
