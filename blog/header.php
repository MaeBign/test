<nav id="header">
	<h2><a href="index.php">HOME</a></h2>
	<ul id="header-list">
		<li class="header-link"><a href="liste.php">liste</a></li>
		<li class="header-link"><a href="view_all.php">All</a></li>
		<?php if (isset($_SESSION['is_logged'])): ?>
			<li class="header-link" id="logout"><a href="logout.php">logout</a></li>
		<?php else: ?>
			<li class="header-link" id="login"><a href="login.php">login</a></li>
		<?php endif; ?>
	</ul>
</nav>

<?php if (isset($_SESSION["is_logged"])):?>
	<div id="admin-button"><a href="admin_panel.php">A</a></div>
<?php endif; ?>