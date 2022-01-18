<?php
session_start();
if (!(isset($_POST["csrf_token"])
&& $_POST["csrf_token"] === $_SESSION['csrf_token'])) {
// header('HTTP/1.1 403 Forbidden');
header( "HTTP/1.1 302" );
header('Location : ./index.php');
exit;
}
$toke_byte = substr(base_convert(hash('sha256', uniqid()), 16, 36), 0, 16);
$csrf_token = bin2hex($toke_byte);
$_SESSION['csrf_token2'] = $csrf_token;
/*******************************************************/
/* 送信データ定義 */
/* [key(POST[key]), name(for message), rule] */
$rules = array(
array('matter', 'お問い合わせ内容', 'required'),
array('other_content', 'その他お問い合わせ', ''),
array('organization', '会社名', 'required'),
array('department', '部署名', ''),
array('organization_title', 'ご担当者名', 'required'),
array('tel', 'お電話番号', 'required'),
array('email', 'メールアドレス', 'required|email'),
array('postal_code', 'ご住所（郵便番号）', ''),
array('prefecture', 'ご住所（都道府県）', ''),
array('address_level1', 'ご住所（住所1）', ''),
array('address_line2', 'ご住所（住所2）', ''),
array('agree', 'プライバシーポリシー', ''),
);
/*******************************************************/
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
header('HTTP/1.1 403 Forbidden');
exit;
}
$form = $_POST;
$_SESSION['post'] = $_POST;
$post = $_SESSION['post'];
unset($_SESSION['res']);
$result = validation($form, $rules);
$_SESSION['res'] = $result;
if ($result['isSuccess'] !== true) {
header( "HTTP/1.1 302" );
header('Location : ./index.php');
}
/* end. */
function validation($form, $rules)
{
$result = array('isSuccess' => true);
$err = array();
foreach ($rules as $rule) {
list($key, $name, $lists) = $rule;
$lists = explode('|', $lists);
foreach ($lists as $list) {
switch ($list) {
case 'required':
if ($form[$key] == '') {
$result['isSuccess'] = false;
$err[$key][] = "※「".$name."」は必須です。";
break;
}
break;
case 'email':
if ($form[$key] !== '') {
if (mb_strlen($form[$key], 'UTF-8') > 255 || preg_match('/\A.+@.+\z/', $form[$key]) !== 1) {
$result['isSuccess'] = false;
$err[$key][] = "有効なメールアドレスではありません。";
}
}
break;
case 'tel':
if ($form[$key] !== '') {
$tmp = mb_convert_kana(str_replace('-', '', $form[$key]), 'n');
if (preg_match('/\A[0-9]{10,11}\z/', $tmp) !== 1) {
$result['isSuccess'] = false;
$err[$key][] = "電話番号は10桁、または11桁の数値で入力してください。";
}
}
break;
default:
break;
}
}
}
$result['err'] = $err;
return $result;
}
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<!-- Google Tag Manager -->
		<script>
			(function(w, d, s, l, i)
			{
				w[l] = w[l] || [];
				w[l].push(
				{
					'gtm.start': new Date().getTime(),
					event: 'gtm.js'
				});
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != 'dataLayer' ? '&l=' + l : '';
				j.async = true;
				j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, 'script', 'dataLayer', 'GTM-MQWJ47H');
		</script>
		<!-- End Google Tag Manager -->
		<title>お問い合わせ 確認 | 株式会社サンエス工業｜空調機器製造販売</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
		<meta property="og:type" content="article">
		<meta name="format-detection" content="telephone=no">
		<meta property="og:title" content="お問い合わせ 確認 | 株式会社サンエス工業｜空調機器製造販売">
		<meta property="og:url" content="http://www.sss-k.co.jp/contact/confirm.html">
		<meta property="og:site_name" content="株式会社サンエス工業｜空調機器製造販売">
		<meta property="og:description" content="お問い合わせ 確認。株式会社サンエス工業は、昭和49年創業の空調機器及び消音機器の製造メーカーです。">
		<meta name="description" content="株式会社サンエス工業は、昭和49年創業の空調機器及び消音機器の製造メーカーです。">
		<link rel="stylesheet" href="../assets/css/style.css">
	</head>
	<body id="body" class="l-body js-body">
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQWJ47H" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<svg aria-hidden="true" style="position:absolute;width:0;height:0" xmlns="http://www.w3.org/2000/svg" overflow="hidden">
			<defs>
				<symbol id="icon-home" viewBox="0 0 22.678 18.162">
					<g transform="translate(-736.265 -32.838)">
						<path d="M757.6,42.177l-10-8.677-10,8.677h2.49V50.5h15.02V42.177Z" fill="none" stroke-miterlimit="10" stroke-width="1" />
						<path d="M745.377,50.5V45.239h4.454V50.5" fill="none" stroke-miterlimit="10" stroke-width="1" />
					</g>
				</symbol>
			</defs>
		</svg>
		<div class="l-wrapper">
			<header class="l-header js-header">
				<div class="l-header-wrapper">
					<h1 class="l-header-logo">
						<a href="../" class="l-header-logo__link"><img src="../assets/images/common/icon-ci.svg" alt="株式会社サンエス工業"></a>
					</h1>
					<a href="../contact/" class="l-header-require">
						<span class="l-header-require__text">お問い合わせ</span>
					</a>
				</div>
				<nav class="c-pc-header-nav">
					<ul class="c-pc-header-nav-list">
						<li class="c-pc-header-nav-list__item">
							<div class="c-pc-header-nav-list__wrapper">
								<a href="../introduction/" class="c-pc-header-nav-list__head">サンエス工業を語る</a>
								<div class="c-pc-header-nav-block">
									<div class="c-pc-header-nav-block__text">
										<a href="../introduction/" class="c-pc-header-nav-block__link">「空気」で創り出す快適な空間</a>
									</div>
									<div class="c-pc-header-nav-block__text">
										<a href="../introduction/02/" class="c-pc-header-nav-block__link">サンエスらしさって何だろう</a>
									</div>
								</div>
							</div>
						</li>
						<li class="c-pc-header-nav-list__item">
							<div class="c-pc-header-nav-list__wrapper">
								<a href="../business/silencer/" class="c-pc-header-nav-list__head">Business Lineup</a>
								<div class="c-pc-header-nav-block">
									<div class="c-pc-header-nav-block-item">
										<div class="c-pc-header-nav-block-item__title">消音部門</div>
										<div class="c-pc-header-nav-block-item__inner">
											<div class="c-pc-header-nav-block__text">
												<a href="../business/silencer/" class="c-pc-header-nav-block__link">部門紹介</a>
											</div>
											<div class="c-pc-header-nav-block__text">
												<a href="../business/silencer/products.html" class="c-pc-header-nav-block__link">製品紹介</a>
											</div>
											<div class="c-pc-header-nav-block__text">
												<a href="../business/silencer/works.html" class="c-pc-header-nav-block__link">導入実績</a>
											</div>
										</div>
									</div>
									<div class="c-pc-header-nav-block-item">
										<div class="c-pc-header-nav-block-item__title">空調部門</div>
										<div class="c-pc-header-nav-block-item__inner">
											<div class="c-pc-header-nav-block__text">
												<a href="../business/air-conditioning/" class="c-pc-header-nav-block__link">部門紹介</a>
											</div>
											<div class="c-pc-header-nav-block__text">
												<a href="../business/air-conditioning/products.html" class="c-pc-header-nav-block__link">製品紹介</a>
											</div>
											<div class="c-pc-header-nav-block__text">
												<a href="../business/air-conditioning/works.html" class="c-pc-header-nav-block__link">導入実績</a>
											</div>
										</div>
									</div>
									<div class="c-pc-header-nav-block-item">
										<div class="c-pc-header-nav-block-item__title">ダクト部門</div>
										<div class="c-pc-header-nav-block-item__inner">
											<div class="c-pc-header-nav-block__text">
												<a href="../business/duct/" class="c-pc-header-nav-block__link">部門紹介</a>
											</div>
											<div class="c-pc-header-nav-block__text">
												<a href="../business/duct/business.html" class="c-pc-header-nav-block__link">業務紹介</a>
											</div>
											<div class="c-pc-header-nav-block__text">
												<a href="../business/duct/construction.html" class="c-pc-header-nav-block__link">施工実績</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="c-pc-header-nav-list__item">
							<div class="c-pc-header-nav-list__wrapper">
								<a href="../company/" class="c-pc-header-nav-list__head">About us</a>
								<div class="c-pc-header-nav-block">
									<div class="c-pc-header-nav-block__text">
										<a href="../company/" class="c-pc-header-nav-block__link">ご挨拶・企業理念</a>
									</div>
									<div class="c-pc-header-nav-block__text">
										<a href="../company/about.html" class="c-pc-header-nav-block__link">会社概要</a>
									</div>
									<div class="c-pc-header-nav-block__text">
										<a href="../company/history.html" class="c-pc-header-nav-block__link">沿革</a>
									</div>
									<div class="c-pc-header-nav-block__text">
										<a href="../company/locations.html" class="c-pc-header-nav-block__link">事業拠点</a>
									</div>
								</div>
							</div>
						</li>
						<li class="c-pc-header-nav-list__item">
							<div class="c-pc-header-nav-list__wrapper">
								<a href="../recruit/" class="c-pc-header-nav-list__head">採用情報</a>
								<div class="c-pc-header-nav-block">
									<div class="c-pc-header-nav-block__text">
										<a href="../recruit/" class="c-pc-header-nav-block__link">募集要項</a>
									</div>
									<div class="c-pc-header-nav-block__text">
										<a href="../contact-recruit/" class="c-pc-header-nav-block__link">採用お問い合わせ</a>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</nav>
				<button class="c-sp-header-nav-button js-header-button" aria-label="グローバルナビゲーション" aria-controls="aria-navigation">
					<span class="c-sp-header-nav-button__lines">
						<span class="c-sp-header-nav-button__line"></span>
						<span class="c-sp-header-nav-button__line"></span>
					</span>
				</button>
				<nav class="c-sp-header-nav js-header-menu" id="aria-navigation" aria-label="グローバルナビゲーション">
					<ul class="c-sp-header-nav-list" role=tablist>
						<li class="c-sp-header-nav-list__item">
							<div class="c-sp-header-nav-block js-accordion">
								<div class="c-sp-header-nav-block__sub">Introduction</div>
								<button class="c-sp-header-nav-block__head js-accordion-tab" type="button" id="js-accordion-tab-1" role="tab" aria-controls="js-accordion-panel-1" aria-selected="false">サンエス工業を語る</button>
								<div class="c-sp-header-nav-block__list js-accordion-panel" id="js-accordion-panel-1" role="tabpanel" aria-labelledby="js-accordion-tab-1" aria-expanded="false" aria-hidden="true">
									<div class="c-sp-header-nav-block__item">
										<a href="../introduction/" class="c-sp-header-nav-block__link">- 「空気」で創り出す快適な空間</a>
									</div>
									<div class="c-sp-header-nav-block__item">
										<a href="../introduction/02/" class="c-sp-header-nav-block__link">- サンエスらしさって何だろう</a>
									</div>
								</div>
							</div>
						</li>
						<li class="c-sp-header-nav-list__item">
							<div class="c-sp-header-nav-block js-accordion">
								<div class="c-sp-header-nav-block__sub">Business Lineup　事業案内</div>
								<div class="c-sp-header-nav-block__content">
									<button class="c-sp-header-nav-block__head js-accordion-tab" type="button" id="js-accordion-tab-2" role="tab" aria-controls="js-accordion-panel-2" aria-selected="false">消音部門</button>
									<div class="c-sp-header-nav-block__list js-accordion-panel" id="js-accordion-panel-2" role="tabpanel" aria-labelledby="js-accordion-tab-2" aria-expanded="false" aria-hidden="true">
										<div class="c-sp-header-nav-block__item">
											<a href="../business/silencer/" class="c-sp-header-nav-block__link">- 部門紹介</a>
										</div>
										<div class="c-sp-header-nav-block__item">
											<a href="../business/silencer/products.html" class="c-sp-header-nav-block__link">- 製品紹介</a>
										</div>
										<div class="c-sp-header-nav-block__item">
											<a href="../business/silencer/works.html" class="c-sp-header-nav-block__link">- 導入実績</a>
										</div>
									</div>
								</div>
								<div class="c-sp-header-nav-block__content">
									<button class="c-sp-header-nav-block__head js-accordion-tab" type="button" id="js-accordion-tab-3" role="tab" aria-controls="js-accordion-panel-3" aria-selected="false">空調部門</button>
									<div class="c-sp-header-nav-block__list js-accordion-panel" id="js-accordion-panel-3" role="tabpanel" aria-labelledby="js-accordion-tab-3" aria-expanded="false" aria-hidden="true">
										<div class="c-sp-header-nav-block__item">
											<a href="../business/air-conditioning/" class="c-sp-header-nav-block__link">- 部門紹介</a>
										</div>
										<div class="c-sp-header-nav-block__item">
											<a href="../business/air-conditioning/products.html" class="c-sp-header-nav-block__link">- 製品紹介</a>
										</div>
										<div class="c-sp-header-nav-block__item">
											<a href="../business/air-conditioning/works.html" class="c-sp-header-nav-block__link">- 導入実績</a>
										</div>
									</div>
								</div>
								<div class="c-sp-header-nav-block__content">
									<button class="c-sp-header-nav-block__head js-accordion-tab" type="button" id="js-accordion-tab-4" role="tab" aria-controls="js-accordion-panel-4" aria-selected="false">ダクト部門</button>
									<div class="c-sp-header-nav-block__list js-accordion-panel" id="js-accordion-panel-4" role="tabpanel" aria-labelledby="js-accordion-tab-4" aria-expanded="false" aria-hidden="true">
										<div class="c-sp-header-nav-block__item">
											<a href="../business/duct/" class="c-sp-header-nav-block__link">- 部門紹介</a>
										</div>
										<div class="c-sp-header-nav-block__item">
											<a href="../business/duct/business.html" class="c-sp-header-nav-block__link">- 業務紹介</a>
										</div>
										<div class="c-sp-header-nav-block__item">
											<a href="../business/duct/construction.html" class="c-sp-header-nav-block__link">- 施工実績</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="c-sp-header-nav-list__item">
							<div class="c-sp-header-nav-block js-accordion">
								<div class="c-sp-header-nav-block__sub">About us　会社案内</div>
								<button class="c-sp-header-nav-block__head js-accordion-tab" type="button" id="js-accordion-tab-5" role="tab" aria-controls="js-accordion-panel-5" aria-selected="false">企業情報</button>
								<div class="c-sp-header-nav-block__list js-accordion-panel" id="js-accordion-panel-5" role="tabpanel" aria-labelledby="js-accordion-tab-5" aria-expanded="false" aria-hidden="true">
									<div class="c-sp-header-nav-block__item">
										<a href="../company/" class="c-sp-header-nav-block__link">- ご挨拶・企業理念</a>
									</div>
									<div class="c-sp-header-nav-block__item">
										<a href="../company/about.html" class="c-sp-header-nav-block__link">- 会社概要</a>
									</div>
									<div class="c-sp-header-nav-block__item">
										<a href="../company/history.html" class="c-sp-header-nav-block__link">- 沿革</a>
									</div>
									<div class="c-sp-header-nav-block__item">
										<a href="../company/locations.html" class="c-sp-header-nav-block__link">- 事業拠点</a>
									</div>
								</div>
							</div>
						</li>
						<li class="c-sp-header-nav-list__item">
							<div class="c-sp-header-nav-block js-accordion">
								<button class="c-sp-header-nav-block__head js-accordion-tab" type="button" id="js-accordion-tab-6" role="tab" aria-controls="js-accordion-panel-6" aria-selected="false">採用情報</button>
								<div class="c-sp-header-nav-block__list js-accordion-panel" id="js-accordion-panel-6" role="tabpanel" aria-labelledby="js-accordion-tab-6" aria-expanded="false" aria-hidden="true">
									<div class="c-sp-header-nav-block__item">
										<a href="../recruit/" class="c-sp-header-nav-block__link">- 募集要項</a>
									</div>
									<div class="c-sp-header-nav-block__item">
										<a href="../contact-recruit/" class="c-sp-header-nav-block__link">- 採用お問い合わせ</a>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</nav>
			</header>
			<main class="l-main">
				<div class="l-content is-beige">
					<div class="c-simple-head">
						<h1 class="c-simple-head-title">お問い合わせフォーム</h1>
						<p class="c-simple-head-en">Contact Us</p>
					</div>
					<div class="p-require">
						<p class="p-require-lead"> サンエス工業の製品・サービスに関するお問い合わせを承っています。<br> 下記のフォームに必要項目をご記入頂き、「送信」ボタンを押して下さい。 </p>
						<form class="p-require-content" action="mail.php" method="POST">
							<input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
							<div class="p-require-input">
								<div class="c-input">
									<div class="c-input-block">
										<span class="c-input-head">
											<span class="c-input-name">お問い合わせ内容</span>
											<span class="c-input-label">必須</span>
										</span>
										<div class="c-input-content">
											<span class="c-input-content-confirm"><?php if(isset($post['matter'])) echo htmlspecialchars($post['matter']); ?></span>
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-other" class="c-input-head">
											<span class="c-input-name">その他お問い合わせ</span>
										</label>
										<div class="c-input-content">
											<span id="form-other" class="c-input-content-confirm is-small"> <?php if(isset($post['other_content'])) echo htmlspecialchars($post['other_content']); ?> </span>
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-name" class="c-input-head">
											<span class="c-input-name">会社名</span>
											<span class="c-input-label">必須</span>
										</label>
										<div class="c-input-content">
											<input class="c-input-text" id="form-name" type="text" name="organization" autocomplete="organization" aria-required="true" required readonly="readonly" value="<?php if(isset($post['organization'])) echo htmlspecialchars($post['organization']); ?>" />
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-department" class="c-input-head">
											<span class="c-input-name">部署名</span>
										</label>
										<div class="c-input-content">
											<input class="c-input-text" id="form-department" type="text" name="department" readonly="readonly" value="<?php if(isset($post['department'])) echo htmlspecialchars($post['department']); ?>" />
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-person" class="c-input-head">
											<span class="c-input-name">ご担当者名</span>
											<span class="c-input-label">必須</span>
										</label>
										<div class="c-input-content">
											<input class="c-input-text" id="form-person" type="text" name="organization_title" autocomplete="organization-title" aria-required="true" required readonly="readonly" value="<?php if(isset($post['organization_title'])) echo htmlspecialchars($post['organization_title']); ?>" />
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-tel" class="c-input-head">
											<span class="c-input-name">お電話番号</span>
											<span class="c-input-label">必須</span>
										</label>
										<div class="c-input-content">
											<input class="c-input-text" id="form-tel" type="tel" name="tel" autocomplete="tel" aria-required="true" required readonly="readonly" value="<?php if(isset($post['tel'])) echo htmlspecialchars($post['tel']); ?>" />
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-email" class="c-input-head">
											<span class="c-input-name">メールアドレス</span>
											<span class="c-input-label">必須</span>
										</label>
										<div class="c-input-content">
											<input class="c-input-text" id="form-email" type="email" name="email" autocomplete="email" aria-required="true" required readonly="readonly" value="<?php if(isset($post['email'])) echo htmlspecialchars($post['email']); ?>" />
										</div>
									</div>
									<div class="c-input-block">
										<div class="c-input-head">
											<span class="c-input-name">ご住所</span>
										</div>
										<div class="c-input-content">
											<div class="c-input-post">
												<span class="c-input-post-mark">〒</span>
												<span class="c-input-post-number">
													<input type="text" class="c-input-text" name="postal_code" autocomplete="postal-code" placeholder="例）110-0005" readonly="readonly" value="<?php if(isset($post['postal_code'])) echo htmlspecialchars($post['postal_code']); ?>" />
												</span>
											</div>
											<div class="c-input-address">
												<input class="c-input-text" type="text" name="address_level1" autocomplete="address-level1" readonly="readonly" value="<?php if(isset($post['prefecture'])) echo htmlspecialchars($post['prefecture']); ?><?php if(isset($post['address_level1'])) echo htmlspecialchars($post['address_level1']); ?>" />
											</div>
											<div class="c-input-address">
												<input class="c-input-text" type="text" name="address_line2" autocomplete="address-line2" readonly="readonly" value="<?php if(isset($post['address_line2'])) echo htmlspecialchars($post['address_line2']); ?>" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="p-require-submit">
								<button type="button" onClick="javascript:history.back(-1)" class="c-secondary-button is-white">修　正</button>
								<button type="submit" class="c-secondary-button">送　信</button>
							</div>
						</form>
					</div>
				</div>
			</main>
			<footer class="l-footer">
				<div class="l-footer-buttons">
					<div class="l-footer-top-require"><a href="../require" class="l-footer-top-require__link">お問い合わせ</a></div>
					<div class="l-footer-top-button">
						<a href="#body" class="l-footer-top-button__link">up</a>
					</div>
				</div>
				<nav class="l-footer-nav">
					<ul class="l-footer-nav-list">
						<li class="l-footer-nav-list__item">
							<div class="l-footer-nav-block">
								<h2 class="l-footer-nav-block__head">Introduction</h2>
								<h3 class="l-footer-nav-block__sub">サンエス工業を語る</h3>
								<ul class="l-footer-nav-block__list">
									<li class="l-footer-nav-block__item">
										<a href="../introduction/" class="l-footer-nav-block__link">- 「空気」で創り出す快適な空間</a>
									</li>
									<li class="l-footer-nav-block__item">
										<a href="../introduction/02/" class="l-footer-nav-block__link">- サンエスらしさって何だろう</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="l-footer-nav-list__item">
							<div class="l-footer-nav-block">
								<h2 class="l-footer-nav-block__head">Business Lineup<span>事業案内</span></h2>
								<div class="l-footer-nav-block__wrapper">
									<div class="l-footer-nav-block__content">
										<h2 class="l-footer-nav-block__sub">消音部門</h2>
										<ul class="l-footer-nav-block__list">
											<li class="l-footer-nav-block__item">
												<a href="../business/silencer/" class="l-footer-nav-block__link">- 部門紹介</a>
											</li>
											<li class="l-footer-nav-block__item">
												<a href="../business/silencer/products.html" class="l-footer-nav-block__link">- 製品紹介</a>
											</li>
											<li class="l-footer-nav-block__item">
												<a href="../business/silencer/works.html" class="l-footer-nav-block__link">- 導入実績</a>
											</li>
										</ul>
									</div>
									<div class="l-footer-nav-block__content">
										<h2 class="l-footer-nav-block__sub">空調部門</h2>
										<ul class="l-footer-nav-block__list">
											<li class="l-footer-nav-block__item">
												<a href="../business/air-conditioning/" class="l-footer-nav-block__link">- 部門紹介</a>
											</li>
											<li class="l-footer-nav-block__item">
												<a href="../business/air-conditioning/products.html" class="l-footer-nav-block__link">- 製品紹介</a>
											</li>
											<li class="l-footer-nav-block__item">
												<a href="../business/air-conditioning/works.html" class="l-footer-nav-block__link">- 導入実績</a>
											</li>
										</ul>
									</div>
									<div class="l-footer-nav-block__content">
										<h2 class="l-footer-nav-block__sub">ダクト部門</h2>
										<ul class="l-footer-nav-block__list">
											<li class="l-footer-nav-block__item">
												<a href="../business/duct/" class="l-footer-nav-block__link">- 部門紹介</a>
											</li>
											<li class="l-footer-nav-block__item">
												<a href="../business/duct/business.html" class="l-footer-nav-block__link">- 業務紹介</a>
											</li>
											<li class="l-footer-nav-block__item">
												<a href="../business/duct/construction.html" class="l-footer-nav-block__link">- 施工実績</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="l-footer-nav-list__item">
							<div class="l-footer-nav-block">
								<h2 class="l-footer-nav-block__head">About us<span>会社案内</span></h2>
								<h3 class="l-footer-nav-block__sub">企業情報</h3>
								<ul class="l-footer-nav-block__list">
									<li class="l-footer-nav-block__item">
										<a href="../company/" class="l-footer-nav-block__link">- ご挨拶・企業理念</a>
									</li>
									<li class="l-footer-nav-block__item">
										<a href="../company/about.html" class="l-footer-nav-block__link">- 会社概要</a>
									</li>
									<li class="l-footer-nav-block__item">
										<a href="../company/history.html" class="l-footer-nav-block__link">- 沿革</a>
									</li>
									<li class="l-footer-nav-block__item">
										<a href="../company/locations.html" class="l-footer-nav-block__link">- 事業拠点</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="l-footer-nav-list__item">
							<div class="l-footer-nav-block">
								<h2 class="l-footer-nav-block__sub">採用情報</h2>
								<ul class="l-footer-nav-block__list">
									<li class="l-footer-nav-block__item">
										<a href="../recruit/" class="l-footer-nav-block__link">- 募集要項</a>
									</li>
									<li class="l-footer-nav-block__item">
										<a href="../contact-recruit/" class="l-footer-nav-block__link">- 採用お問い合わせ</a>
									</li>
								</ul>
							</div>
							<div class="l-footer-nav-block">
								<h2 class="l-footer-nav-block__sub">お問い合わせ</h2>
								<ul class="l-footer-nav-block__list">
									<li class="l-footer-nav-block__item">
										<a href="../contact/" class="l-footer-nav-block__link">- お問い合わせ</a>
									</li>
									<li class="l-footer-nav-block__item">
										<a href="../privacy/" class="l-footer-nav-block__link">- プライバシーポリシー</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
				<p class="l-footer-copy"><small>Copyright© SAN-ESU INDUSTRY Co.,Ltd. All Rights Reserved.</small></p>
			</footer>
		</div><!-- .l-wrapper -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="../assets/js/script.js"></script>
	</body>
</html>