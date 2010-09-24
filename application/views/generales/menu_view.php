<!-- Header -->
<!-- Server status -->
<header><div class="container_12">
	
	<p id="skin-name"><small>Account <br/>Management<br/> Panel</small> <strong><?=$version?></strong></p>
	<div class="server-info">Server: <strong><?php $f = explode(" ",$_SERVER['SERVER_SOFTWARE']); echo $f[0]?></strong></div>
	<div class="server-info">Php: <strong><?=PHP_VERSION?></strong></div>
	
</div></header>
<!-- End server status -->

<!-- Main nav -->
<nav id="main-nav">	
	<ul class="container_12">
		<li class="home current"><a href="#" title="<?=strtoupper(lang('home'))?>"><?=lang('home')?></a>
			<ul>
				<?php $uri = $this->uri->segment_array(); $segment = $this->uri->rsegment(1);?>
				<li <?php if($segment==='front'):?>class="current"<?php endif; ?>><a href="<?=base_url()?>" title="<?=lang('dashboard')?>"><?=lang('dashboard')?></a></li>
				<li <?php if($segment==='users'):?>class="current"<?php endif; ?>><a href="/users/profile/" title="<?=lang('my-profile')?>"><?=lang('my-profile')?></a></li>
				<li class="with-menu"><a href="#" title="My settings"><?=lang('my-settings')?></a>
					<div class="menu">
						<img src="/assets/images/menu-open-arrow.png" width="16" height="16">
						<ul>
							<li class="icon_address"><a href="#">Browse by</a>
								<ul>
									<li class="icon_blog"><a href="#">Blog</a>
										<ul>
											<li class="icon_alarm"><a href="#">Recents</a>
												<ul>
													<li class="icon_building"><a href="#">Corporate blog</a></li>
													<li class="icon_newspaper"><a href="#">Press blog</a></li>
												</ul>
											</li>
											<li class="icon_building"><a href="#">Corporate blog</a></li>
											<li class="icon_computer"><a href="#">Support blog</a></li>
											<li class="icon_search"><a href="#">Search...</a></li>
										</ul>
									</li>
									<li class="icon_server"><a href="#">Website</a></li>
									<li class="icon_network"><a href="#">Domain</a></li>
								</ul>
							</li>
							<li class="icon_export"><a href="#">Export</a>
								<ul>
									<li class="icon_doc_excel"><a href="#">Excel</a></li>
									<li class="icon_doc_csv"><a href="#">CSV</a></li>
									<li class="icon_doc_pdf"><a href="#">PDF</a></li>
									<li class="icon_doc_image"><a href="#">Image</a></li>
									<li class="icon_doc_web"><a href="#">Html</a></li>
								</ul>
							</li>
							<li class="sep"></li>
							<li class="icon_refresh"><a href="#">Reload</a></li>
							<li class="icon_reset">Reset</li>
							<li class="icon_search"><a href="#">Search</a></li>
							<li class="sep"></li>
							<li class="icon_terminal"><a href="#">Custom request</a></li>
							<li class="icon_battery"><a href="#">Stats server load</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</li>
		<li class="write"><a href="#" title="Write">Write</a>
			<ul>
				<li><a href="#" title="Articles">Articles</a></li>
				<li><a href="#" title="Add article">Add article</a></li>
				<li><a href="#" title="Posts">Posts</a></li>
				<li><a href="#" title="Add post">Add post</a></li>
			</ul>
		</li>
		<li class="comments"><a href="#" title="Comments">Comments</a>
			<ul>
				<li><a href="#" title="Manage">Manage</a></li>
				<li><a href="#" title="Spams">Spams</a></li>
			</ul>
		</li>
		<li class="medias"><a href="#" title="Medias">Medias</a>
			<ul>
				<li><a href="#" title="Browse">Browse</a></li>
				<li><a href="#" title="Add file">Add file</a></li>
				<li><a href="#" title="Manage">Manage</a></li>
				<li><a href="#" title="Settings">Settings</a></li>
			</ul>
		</li>
		<li class="users"><a href="#" title="Users">Users</a>
			<ul>
				<li><a href="#" title="Browse">List</a></li>
				<li><a href="#" title="Add user">Add user</a></li>
				<li><a href="#" title="Settings">Settings</a></li>
			</ul>
		</li>
		<li class="stats"><a href="#" title="Stats">Stats</a></li>
		<li class="settings"><a href="#" title="Settings">Settings</a></li>
		<li class="backup"><a href="#" title="Backup">Backup</a></li>
	</ul>
</nav>
<!-- End main nav -->

<!-- Sub nav -->
<div id="sub-nav"><div class="container_12">
	
	<a href="#" title="Help" class="nav-button"><b>Help</b></a>

	<form id="search-form" name="search-form" method="post" action="search.html">
		<input type="text" name="s" id="s" value="" title="Search admin..." autocomplete="off">
	</form>

</div></div>
<!-- End sub nav -->

<!-- Status bar -->
<div id="status-bar"><div class="container_12">

	<ul id="status-infos">
		<li class="spaced"><?=lang('welcome')?>: <strong><?=$this->tank_auth->get_username()?></strong></li>
		<li>
			<a href="javascript:void(0)" class="button" title="<?=$messages_count?> <?=lang('messages')?>"><img src="/assets/images/icons/fugue/mail.png" width="16" height="16"> <strong><?=$messages_count?></strong></a>
			<?php if(isset($messages)):?>
			<div id="messages-list" class="result-block">
				<span class="arrow"><span></span></span>
				
				<ul class="small-files-list icon-mail">
				<?php foreach($messages->result() as $m ):?>
					<li>
						<a href="#"><strong><?=date('Y.m.d')?></strong> <?=$m->title?><br>
						<small>De: <?=$m->from?></small></a>
					</li>
				<?php endforeach; ?>
				</ul>
				
				<p id="messages-info" class="result-info"><a href=""><?=lang('go-to-inbox')?> &raquo;</a></p>
			</div>
			<?php endif;?>
		</li>
		<li>
			<a href="#" class="button" title="25 comments"><img src="/assets/images/icons/fugue/balloon.png" width="16" height="16"> <strong>25</strong></a>
			<div id="comments-list" class="result-block">
				<span class="arrow"><span></span></span>
				
				<ul class="small-files-list icon-comment">
					<li>
						<a href="#"><strong>Jane</strong>: I don't think so<br>
						<small>On <strong>Post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Ken_54</strong>: What about using a different...<br>
						<small>On <strong>Post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Jane</strong> Sure, but no more.<br>
						<small>On <strong>Another post</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Max</strong>: Have you seen that...<br>
						<small>On <strong>Post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Anonymous</strong>: Good luck!<br>
						<small>On <strong>My first post</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Sébastien</strong>: This sure rocks!<br>
						<small>On <strong>Another post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>John</strong>: Me too!<br>
						<small>On <strong>Third post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>John</strong> This can be solved by...<br>
						<small>On <strong>Another post</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Jane</strong>: No prob.<br>
						<small>On <strong>Post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Anonymous</strong>: I had the following...<br>
						<small>On <strong>My first post</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Anonymous</strong>: Yes<br>
						<small>On <strong>Post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Lian</strong>: Please make sure that...<br>
						<small>On <strong>Last post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Ann</strong> Thanks!<br>
						<small>On <strong>Last post</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Max</strong>: Don't tell me what...<br>
						<small>On <strong>Post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Gordon</strong>: Here is an article about...<br>
						<small>On <strong>My another post</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Lee</strong>: Try to reset the value first<br>
						<small>On <strong>Last title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Lee</strong>: Sure!<br>
						<small>On <strong>Second post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Many</strong> Great job, keep on!<br>
						<small>On <strong>Third post</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>John</strong>: I really like this<br>
						<small>On <strong>First title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Paul</strong>: Hello, I have an issue with...<br>
						<small>On <strong>My first post</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>June</strong>: Yuck.<br>
						<small>On <strong>Another title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Jane</strong>: Wow, sounds amazing, do...<br>
						<small>On <strong>Another title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Esther</strong>: Man, this is the best...<br>
						<small>On <strong>Another post</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>Max</strong>: Thanks!<br>
						<small>On <strong>Post title</strong></small></a>
					</li>
					<li>
						<a href="#"><strong>John</strong>: I'd say it is not safe...<br>
						<small>On <strong>My first post</strong></small></a>
					</li>
				</ul>
				
				<p id="comments-info" class="result-info"><a href="#">Manage comments &raquo;</a></p>
			</div>
		</li>
		<li><a href="/users/logout/" class="button red" title="<?=lang('logout')?>"><span class="smaller"><?=lang('logout')?></span></a></li>
	</ul>
	
	<ul id="breadcrumb">
		<li><a href="<?=base_url()?>" title="Home"><?=ucfirst(lang('home'))?></a></li>
		<?php
			foreach($uri as $row):
			$row = ucfirst($row);
			echo "<li><a href='javascript:void(0)'>{$row}</a></li>";
			endforeach;
		
		?>
	</ul>

</div></div>
<!-- End status bar -->

<div id="header-shadow"></div>
<!-- End header -->