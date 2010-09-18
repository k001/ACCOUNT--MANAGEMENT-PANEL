<section id="message">
	<div class="block-border"><div class="block-content no-title dark-bg">
		<p class="mini-infos"> <?php if(!isset($message)){?>&copy; <?=date('Y')?> INFAPEN.com, Inc. All rights reserved.
		Hora <?=date('H:m A')?><?php }else echo $message;?></p>
	</div></div>
</section>

<section id="login-block">
	<div class="block-border"><div class="block-content">
			
		<h1><?=lang('admin')?></h1>
		<div class="block-header"><?=lang('please-login')?></div>
			
		<p class="message error no-margin hide"><?php ?></p>
		
		<form class="form with-margin" name="login-form" id="login-form" method="post" action="/users/login">
			<input type="hidden" name="a" id="a" value="send">
			<p class="inline-small-label">
				<label for="login"><span class="big"><?=lang('email')?></span></label>
				<input type="text" name="login" id="login" class="full-width" value="">
			</p>
			<p class="inline-small-label">
				<label for="pass"><span class="big"><?=lang("password")?></span></label>
				<input type="password" name="pass" id="pass" class="full-width" value="">
			</p>
			
			<button type="submit" class="float-right"><?=lang("login")?></button>
			<p class="input-height">
				<input type="checkbox" name="keep-logged" id="keep-logged" value="1" class="mini-switch" checked="checked">
				<label for="keep-logged" class="inline"><?=lang("keep-me-logged-in")?></label>
			</p>
		</form>
		
		<form class="form" id="password-recovery" method="post" action="">
			<fieldset class="grey-bg no-margin collapse">
				<legend><a href="#"><?=lang("lost-password")?>?</a></legend>
				<p class="input-with-button">
					<label for="recovery-mail"><?=lang("enter-your-e-mail-address")?></label>
					<input type="text" name="recovery-mail" id="recovery-mail" value="">
					<button type="button"><?=lang("send")?></button>
				</p>
			</fieldset>
		</form>
	</div></div>
</section>