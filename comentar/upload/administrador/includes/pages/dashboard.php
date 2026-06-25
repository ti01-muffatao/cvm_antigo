<?php
/*
MAICON ROBERTO BASSE
*/

if (!isset($cmtx_path)) { die('Access Denied.'); }
?>

<div class='page_help_block'>
</div>

<?php
if (isset($_POST['submit_checklist'])) {
cmtx_check_csrf_form_key();
cmtx_db_query("UPDATE `" . $cmtx_mysql_table_prefix . "settings` SET `value` = '1' WHERE `title` = 'checklist_complete'");
}
?>

<?php if (!cmtx_setting('checklist_complete') && !isset($_POST['submit_checklist'])) { ?>
<h3><?php echo CMTX_TITLE_CHECKLIST; ?></h3>
<hr class="title"/>

<p />

Bem-vindo ao sistema de comentários Muffatão - aqui está uma lista de verificação para ajudar você a começar:
<ul>
<li>erifique permissões de arquivo (<b>Relatórios</b> -> <b>Permissões</b>)</li>
<li>Configure as definições de e-mail (<b>Configurações</b> -> <b>E-mail</b> -> <b>Instalação</b>)</li>
<li>Configurar campos de formulário (<b>Layout</b> -> <b>Formulário</b> -> <b>Ativado</b>)</li>
</ul>

Dica: Para aprovar manualmente todos os comentários ir a <b>Configurações</b> -> <b>Aprovação</b>.

<p />

Você pode voltar para esta lista de verificação, a qualquer momento, clicando na logotipo Muffatão.

<p />

<form name="checklist" id="checklist" action="index.php?page=dashboard" method="post">
<?php cmtx_set_csrf_form_key(); ?>
<input type="submit" class="button" name="submit_checklist" title="<?php echo CMTX_BUTTON_COMPLETED; ?>" value="<?php echo CMTX_BUTTON_COMPLETED; ?>"/>
</form>

<?php } else { ?>
<h3><?php echo CMTX_TITLE_DASHBOARD; ?></h3>
<hr class="title"/>

<p />

<div class="dashboard_left">

<div class="dashboard_block">
<div class="dashboard_title"><?php echo CMTX_DASH_VERSION_CHECK; ?></div>
<div class="dashboard_content">
<?php
$version_url = "";
$latest_version = "";
$issue = false;

@ini_set('user_agent', 'Commentics'); //set user-agent

if (extension_loaded('curl')) { //if cURL is available
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Commentics');
	curl_setopt($ch, CURLOPT_URL, $version_url);
	$latest_version = curl_exec($ch);
	curl_close($ch);
} else if ((bool)ini_get('allow_url_fopen')) { //if allow_url_fopen is available
	$latest_version = file_get_contents($version_url);
} else {
	?><span class='negative'><?php echo CMTX_DASH_VERSION_CHECK_UNABLE; ?></span><?php
	$issue = true;
}

if (!$issue) {
	if (floatval($latest_version)) {
		if (version_compare(cmtx_get_current_version(), $latest_version, '<')) {
			?><span class='negative'><?php echo CMTX_DASH_VERSION_CHECK_NEWER; ?></span><?php
		} else {
			?><span class='positive'><?php echo CMTX_DASH_VERSION_CHECK_LATEST; ?></span><?php
		}
	} else {
		?><span class='negative'><?php echo CMTX_DASH_VERSION_CHECK_ISSUE; ?></span><?php
		$issue = true;
	}
}
?>
</div>
</div>

<div class="dashboard_block">
<div class="dashboard_title"><?php echo CMTX_DASH_LAST_LOGIN; ?></div>
<div class="dashboard_content">
<?php
$last_login_query = cmtx_db_query("SELECT `dated` FROM `" . $cmtx_mysql_table_prefix . "logins` ORDER BY `dated` ASC LIMIT 1");
$last_login_result = cmtx_db_fetch_assoc($last_login_query);
$last_login = $last_login_result["dated"];
printf(CMTX_DASH_LAST_LOGIN_DETAILS, cmtx_format_date(date(CMTX_TIME_FORMAT, strtotime($last_login))), cmtx_format_date(date(CMTX_DATE_FORMAT, strtotime($last_login))));
?>
</div>
</div>

<div class="dashboard_block">
<div class="dashboard_title"><?php echo CMTX_DASH_STATISTICS; ?></div>
<div class="dashboard_content">
<?php
$approve_comments = cmtx_db_num_rows(cmtx_db_query("SELECT * FROM `" . $cmtx_mysql_table_prefix . "comments` WHERE `is_approved` = '0'"));
$flagged_comments = cmtx_db_num_rows(cmtx_db_query("SELECT * FROM `" . $cmtx_mysql_table_prefix . "comments` WHERE `reports` >= " . cmtx_setting('flag_min_per_comment')));

$today = date("Y-m-d");

$new_comments = cmtx_db_num_rows(cmtx_db_query("SELECT * FROM `" . $cmtx_mysql_table_prefix . "comments` WHERE `dated` LIKE '".$today."%'"));
$new_subscribers = cmtx_db_num_rows(cmtx_db_query("SELECT * FROM `" . $cmtx_mysql_table_prefix . "subscribers` WHERE `dated` LIKE '".$today."%'"));
$new_bans = cmtx_db_num_rows(cmtx_db_query("SELECT * FROM `" . $cmtx_mysql_table_prefix . "bans` WHERE `unban` = '0' AND `dated` LIKE '".$today."%'"));

$all_comments = cmtx_db_num_rows(cmtx_db_query("SELECT * FROM `" . $cmtx_mysql_table_prefix . "comments`"));
$all_subscribers = cmtx_db_num_rows(cmtx_db_query("SELECT * FROM `" . $cmtx_mysql_table_prefix . "subscribers`"));
$all_bans = cmtx_db_num_rows(cmtx_db_query("SELECT * FROM `" . $cmtx_mysql_table_prefix . "bans` WHERE `unban` = '0'"));


// You have x comments that require approval
if ($approve_comments > 0) {
	echo "<span class='approve_comments'>";
}
if ($approve_comments == 1) {
	printf(CMTX_DASH_STATISTICS_APPROVAL, $approve_comments);
} else {
	printf(CMTX_DASH_STATISTICS_APPROVALS, $approve_comments);
}
if ($approve_comments > 0) {
	echo "</span>";
}


// x comments are flagged
if (cmtx_setting('show_flag')) {
	if ($flagged_comments > 0) {
		echo "<span class='flagged_comments'>";
	}
	if ($flagged_comments == 1) {
		printf(CMTX_DASH_STATISTICS_FLAG, $flagged_comments);
	} else {
		printf(CMTX_DASH_STATISTICS_FLAGS, $flagged_comments);
	}
	if ($flagged_comments > 0) {
		echo "</span>";
	}
}

echo "<br />";

if ($new_comments == 1) {
printf(CMTX_DASH_STATISTICS_NEW_COMMENT, $new_comments);
} else {
printf(CMTX_DASH_STATISTICS_NEW_COMMENTS, $new_comments);
}

if ($new_subscribers == 1) {
printf(CMTX_DASH_STATISTICS_NEW_SUB, $new_subscribers);
} else {
printf(CMTX_DASH_STATISTICS_NEW_SUBS, $new_subscribers);
}

if ($new_bans == 1) {
printf(CMTX_DASH_STATISTICS_NEW_BAN, $new_bans);
} else {
printf(CMTX_DASH_STATISTICS_NEW_BANS, $new_bans);
}

echo "<br />";

if ($all_comments == 1) {
printf(CMTX_DASH_STATISTICS_COMMENT, $all_comments);
} else {
printf(CMTX_DASH_STATISTICS_COMMENTS, $all_comments);
}

if ($all_subscribers == 1) {
printf(CMTX_DASH_STATISTICS_SUB, $all_subscribers);
} else {
printf(CMTX_DASH_STATISTICS_SUBS, $all_subscribers);
}

if ($all_bans == 1) {
printf(CMTX_DASH_STATISTICS_BAN, $all_bans);
} else {
printf(CMTX_DASH_STATISTICS_BANS, $all_bans);
}

?>
</div>
</div>

<div class="dashboard_block">
<div class="dashboard_title"><?php echo CMTX_DASH_TIP_OF_DAY; ?></div>
<div class="dashboard_content">
<?php echo cmtx_sanitize(cmtx_tip_of_the_day(), true, false); ?>
</div>
</div>

</div>

<div class="dashboard_right">

<div class="dashboard_block news">
<div class="dashboard_title"><?php echo CMTX_DASH_NEWS; ?></div>
<div class="dashboard_content">
<?php
if ($issue) {
	echo CMTX_DASH_NEWS_ISSUE;
} else {
	$news_url = "";
	$news = "";
	@ini_set('user_agent', 'Commentics'); //set user-agent
	if (extension_loaded('curl')) { //if cURL is available
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Commentics');
		curl_setopt($ch, CURLOPT_URL, $news_url);
		$news = curl_exec($ch);
		curl_close($ch);
	} else if ((bool)ini_get('allow_url_fopen')) { //if allow_url_fopen is available
		$news = file_get_contents($news_url);
	}
	$news = cmtx_sanitize($news, true, false);
	echo nl2br($news);
}
?>
</div>
</div>

<div class="dashboard_block">
<div class="dashboard_title"><?php echo CMTX_DASH_QUICK_LINKS; ?></div>
<div class="dashboard_content">
<?php
$pages = cmtx_db_query("SELECT `page`, COUNT(*) AS `frequency` FROM `" . $cmtx_mysql_table_prefix . "access` WHERE `page` != 'dashboard' AND `page` != 'spam' AND `page` NOT LIKE 'edit%' GROUP BY `page` ORDER BY `frequency` DESC LIMIT 5"); 
if (cmtx_db_num_rows($pages) != 5) {
	echo CMTX_DASH_QUICK_LINKS_NO_DATA;
} else {
	$i = 1;
	while ($row = cmtx_db_fetch_row($pages)) {
		echo $i . ". <a href='index.php?page=" . $row[0] . "'>" . $row[0] . "</a>";
		if ($i != 5) { echo "<br />"; }
		$i++;
	}
}
?>
</div>
</div>

</div>

<p />

<?php
if (isset($_POST['submit_notes']) && !cmtx_setting('is_demo')) {
cmtx_check_csrf_form_key();
$data = $_POST['admin_notes'];
$file = 'includes/words/custom/admin_notes.txt';
$handle = fopen($file, 'w');
fputs($handle, $data);
fclose($handle);
}
?>

<?php
if (file_exists('includes/words/custom/admin_notes.txt')) {
	$data = file_get_contents('includes/words/custom/admin_notes.txt');
} else {
	$data = file_get_contents( 'includes/words/admin_notes.txt');
}
?>

<div style="clear: left;"></div>
<form name="admin_notes" id="admin_notes" action="index.php?page=dashboard" method="post">
<div class="dashboard_title notes"><?php echo CMTX_DASH_ADMIN_NOTES; ?></div>
<textarea name="admin_notes" cols="" rows="8" style="width:100%; margin-top:-1px;"><?php echo $data; ?></textarea>
<p />
<?php cmtx_set_csrf_form_key(); ?>
<input type="submit" class="button" name="submit_notes" title="<?php echo CMTX_BUTTON_UPDATE; ?>" value="<?php echo CMTX_BUTTON_UPDATE; ?>"/>
</form>

<?php } ?>