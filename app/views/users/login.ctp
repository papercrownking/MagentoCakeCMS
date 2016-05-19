<div class="login-form">
<?php echo $this->Session->flash('auth'); ?>
	<form action="/users/login" id="UserLoginForm" method="post" accept-charset="utf-8">
		<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div> 
		<h2>Folio Society | CMS</h2> 
    		<div class="input text required"><label for="UserUsername">Username</label><input name="data[User][username]" maxlength="15" type="text" id="UserUsername"/></div>
		<div class="input password required"><label for="UserPassword">Password</label><input name="data[User][password]" type="password" id="UserPassword"/></div>    
		<div class="submit" style="margin-left:195px;"><input  type="submit" value="Login" class="form-button"/></div></form>
</div>
<p class="login-copyright">&copy; The Folio Society <?php echo date('Y'); ?></p>
