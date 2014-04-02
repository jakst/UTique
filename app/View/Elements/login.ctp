<?php if ($authUser): ?>
<p class="navbar-text">Hej, <?php echo $authUser['User']['username']; ?></p>
<?php else: ?>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Logga in<b class="caret"></b></a>
	<ul class="dropdown-menu">
    <form action="/utique/users/login" method="post" id="UserLoginForm" class="navbar-form" role="form">
    	<div class="form-group">
    		<input name="data[User][username]" type="text" placeholder="Användarnamn" id="UserUsername" class="form-control nav-dropdown-form">
    	</div>
    	
    	<div class="form-group">
    		<input name="data[User][password]" type="password" placeholder="Lösenord" id="UserPassword" class="form-control nav-dropdown-form">
    	</div>
    	
    	<button type="submit" class="btn btn-success nav-dropdown-form">Logga in</button>
    </form>
  </ul>
</li>
<?php endif; ?>