<?php
session_start();
$toke_byte = substr(base_convert(hash('sha256', uniqid()), 16, 36), 0, 16);
$csrf_token = bin2hex($toke_byte);
$_SESSION['csrf_token'] = $csrf_token;
$res = (isset($_SESSION['res']) ? $_SESSION['res'] : '');
$post = (isset($_SESSION['post']) ? $_SESSION['post'] : '');
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
		<title>お問い合わせ | 株式会社サンエス工業｜空調機器製造販売</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
		<meta property="og:type" content="article">
		<meta name="format-detection" content="telephone=no">
		<meta property="og:title" content="お問い合わせ | 株式会社サンエス工業｜空調機器製造販売">
		<meta property="og:url" content="https://www.sss-k.co.jp/contact/index.html">
		<meta property="og:site_name" content="株式会社サンエス工業｜空調機器製造販売">
		<meta property="og:description" content="お問い合わせ。株式会社サンエス工業は、昭和49年創業の空調機器及び消音機器の製造メーカーです。">
		<meta name="description" content="株式会社サンエス工業は、昭和49年創業の空調機器及び消音機器の製造メーカーです。">
		<link rel="stylesheet" href="../assets/css/style.css?20220207">
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
						<a href="../" class="l-header-logo__link">
							<picture>
								<source media="(max-width: 768px)" srcset="../assets/images/common/icon-ci@2x.png">
								<source media="(min-width: 769px)" srcset="../assets/images/common/icon-ci.png">
								<img src="../assets/images/common/icon-ci.png" alt="株式会社サンエス工業" width="292" height="35">
							</picture>
						</a>
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
									<div class="c-sp-header-nav-block__item">
										<a href="../privacy/" class="c-sp-header-nav-block__link">- プライバシーポリシー</a>
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
										<span class="c-sp-header-nav-block__link">- 新卒採用</span>
										<ul class="c-sp-header-nav-anchor">
											<!--<li class="c-sp-header-nav-anchor__item">
<a href="../recruit/#recruit-block-1-1" class="c-sp-header-nav-anchor__link">●本社</a>
</li>-->
											<li class="c-sp-header-nav-anchor__item">
												<a href="../recruit/#recruit-block-1-2" class="c-sp-header-nav-anchor__link">●東北支店</a>
											</li>
											<li class="c-sp-header-nav-anchor__item">
												<a href="../recruit/#recruit-block-1-3" class="c-sp-header-nav-anchor__link">●茨城工場</a>
											</li>
										</ul>
									</div>
									<div class="c-sp-header-nav-block__item">
										<span class="c-sp-header-nav-block__link">- 中途採用</span>
										<ul class="c-sp-header-nav-anchor">
											<li class="c-sp-header-nav-anchor__item">
												<a href="../recruit/#recruit-block-2-1" class="c-sp-header-nav-anchor__link">●本社</a>
											</li>
											<li class="c-sp-header-nav-anchor__item">
												<a href="../recruit/#recruit-block-2-2" class="c-sp-header-nav-anchor__link">●東北支店</a>
											</li>
											<!--<li class="c-sp-header-nav-anchor__item">
<a href="../recruit/#recruit-block-2-3" class="c-sp-header-nav-anchor__link">●茨城工場</a>
</li>-->
										</ul>
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
						<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
						<form class="p-require-content h-adr" method="post" action="confirm.php">
							<input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
							<span class="p-country-name" style="display:none;">Japan</span>
							<div class="p-require-input">
								<div class="c-input">
									<div class="c-input-block">
										<span class="c-input-head">
											<span class="c-input-name">お問い合わせ内容</span>
											<span class="c-input-label">必須</span>
										</span>
										<div class="c-input-content">
											<div class="c-input-radio">
												<div class="c-input-radio-item">
													<input type="radio" name="matter" id="form-matter1" value="まずは相談したい" class="c-input-radio-input" <?php if(isset($post['matter']) && $post['matter'] == 'まずは相談したい') echo 'checked'; ?>>
													<label for="form-matter1" class="c-input-radio-label">まずは相談したい</label>
												</div>
												<div class="c-input-radio-item">
													<input type="radio" name="matter" id="form-matter2" value="製品についてのお問い合わせ" class="c-input-radio-input" <?php if(isset($post['matter']) && $post['matter'] == '製品についてのお問い合わせ') echo 'checked'; ?>>
													<label for="form-matter2" class="c-input-radio-label">製品についてのお問い合わせ</label>
												</div>
											</div> <?php if(isset($res['err']['matter'])): ?> <?php echo '<p class="c-input-error">'.$res['err']['matter'][0].'</p>'; ?> <?php endif ?>
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-other" class="c-input-head">
											<span class="c-input-name">その他お問い合わせ</span>
										</label>
										<div class="c-input-content">
											<textarea class="c-input-area" id="form-other" name="other_content" aria-multiline="true">
<?php if(isset($post['other_content'])) echo $post['other_content']; ?>
</textarea> <?php if(isset($res['err']['other_content'])): ?> <?php echo '<p class="c-input-error">'.$res['err']['other_content'][0].'</p>'; ?> <?php endif ?>
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-name" class="c-input-head">
											<span class="c-input-name">会社名</span>
											<span class="c-input-label">必須</span>
										</label>
										<div class="c-input-content">
											<input class="c-input-text" id="form-name" type="text" name="organization" autocomplete="organization" aria-required="true" value="<?php if(isset($post['organization'])) echo $post['organization']; ?>" required /> <?php if(isset($res['err']['organization'])): ?> <?php echo '<p class="c-input-error">'.$res['err']['organization'][0].'</p>'; ?> <?php endif ?>
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-department" class="c-input-head">
											<span class="c-input-name">部署名</span>
										</label>
										<div class="c-input-content">
											<input class="c-input-text" id="form-department" type="text" name="department" value="<?php if(isset($post['department'])) echo $post['department']; ?>" /> <?php if(isset($res['err']['department'])): ?> <?php echo '<p class="c-input-error">'.$res['err']['department'][0].'</p>'; ?> <?php endif ?>
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-person" class="c-input-head">
											<span class="c-input-name">ご担当者名</span>
											<span class="c-input-label">必須</span>
										</label>
										<div class="c-input-content">
											<input class="c-input-text" id="form-person" type="text" name="organization_title" autocomplete="organization-title" aria-required="true" value="<?php if(isset($post['organization_title'])) echo $post['organization_title']; ?>" required /> <?php if(isset($res['err']['organization_title'])): ?> <?php echo '<p class="c-input-error">'.$res['err']['organization_title'][0].'</p>'; ?> <?php endif ?>
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-tel" class="c-input-head">
											<span class="c-input-name">お電話番号</span>
											<span class="c-input-label">必須</span>
										</label>
										<div class="c-input-content">
											<input class="c-input-text" id="form-tel" type="tel" name="tel" autocomplete="tel" aria-required="true" value="<?php if(isset($post['tel'])) echo $post['tel']; ?>" required /> <?php if(isset($res['err']['tel'])): ?> <?php echo '<p class="c-input-error">'.$res['err']['tel'][0].'</p>'; ?> <?php endif ?>
										</div>
									</div>
									<div class="c-input-block">
										<label for="form-email" class="c-input-head">
											<span class="c-input-name">メールアドレス</span>
											<span class="c-input-label">必須</span>
										</label>
										<div class="c-input-content">
											<input class="c-input-text" id="form-email" type="email" name="email" autocomplete="email" aria-required="true" value="<?php if(isset($post['email'])) echo $post['email']; ?>" required /> <?php if(isset($res['err']['email'])): ?> <?php echo '<p class="c-input-error">'.$res['err']['email'][0].'</p>'; ?> <?php endif ?>
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
													<input type="text" class="c-input-text p-postal-code" name="postal_code" autocomplete="postal-code" size="8" maxlength="8" value="<?php if(isset($post['postal_code'])) echo $post['postal_code']; ?>" placeholder="例）110-0005" />
												</span>
												<span class="c-input-post-select">
													<select name="prefecture" class="c-input-select p-region">
														<option value="北海道" <?php if(isset($post['prefecture']) && $post['prefecture'] == '北海道' ) echo 'selected'; ?>>北海道</option>
														<option value="青森県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '青森県' ) echo 'selected'; ?>>青森県</option>
														<option value="岩手県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '岩手県' ) echo 'selected'; ?>>岩手県</option>
														<option value="宮城県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '宮城県' ) echo 'selected'; ?>>宮城県</option>
														<option value="秋田県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '秋田県' ) echo 'selected'; ?>>秋田県</option>
														<option value="山形県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '山形県' ) echo 'selected'; ?>>山形県</option>
														<option value="福島県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '福島県' ) echo 'selected'; ?>>福島県</option>
														<option value="茨城県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '茨城県' ) echo 'selected'; ?>>茨城県</option>
														<option value="栃木県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '栃木県' ) echo 'selected'; ?>>栃木県</option>
														<option value="群馬県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '群馬県' ) echo 'selected'; ?>>群馬県</option>
														<option value="埼玉県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '埼玉県' ) echo 'selected'; ?>>埼玉県</option>
														<option value="千葉県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '千葉県' ) echo 'selected'; ?>>千葉県</option>
														<option value="東京都" <?php if(isset($post['prefecture']) && $post['prefecture'] == '東京都' ) echo 'selected'; ?>>東京都</option>
														<option value="神奈川県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '神奈川県' ) echo 'selected'; ?>>神奈川県</option>
														<option value="新潟県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '新潟県' ) echo 'selected'; ?>>新潟県</option>
														<option value="富山県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '富山県' ) echo 'selected'; ?>>富山県</option>
														<option value="石川県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '石川県' ) echo 'selected'; ?>>石川県</option>
														<option value="福井県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '福井県' ) echo 'selected'; ?>>福井県</option>
														<option value="山梨県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '山梨県' ) echo 'selected'; ?>>山梨県</option>
														<option value="長野県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '長野県' ) echo 'selected'; ?>>長野県</option>
														<option value="岐阜県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '岐阜県' ) echo 'selected'; ?>>岐阜県</option>
														<option value="静岡県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '静岡県' ) echo 'selected'; ?>>静岡県</option>
														<option value="愛知県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '愛知県' ) echo 'selected'; ?>>愛知県</option>
														<option value="三重県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '三重県' ) echo 'selected'; ?>>三重県</option>
														<option value="滋賀県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '滋賀県' ) echo 'selected'; ?>>滋賀県</option>
														<option value="京都府" <?php if(isset($post['prefecture']) && $post['prefecture'] == '京都府' ) echo 'selected'; ?>>京都府</option>
														<option value="大阪府" <?php if(isset($post['prefecture']) && $post['prefecture'] == '大阪府' ) echo 'selected'; ?>>大阪府</option>
														<option value="兵庫県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '兵庫県' ) echo 'selected'; ?>>兵庫県</option>
														<option value="奈良県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '奈良県' ) echo 'selected'; ?>>奈良県</option>
														<option value="和歌山県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '和歌山県' ) echo 'selected'; ?>>和歌山県</option>
														<option value="鳥取県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '鳥取県' ) echo 'selected'; ?>>鳥取県</option>
														<option value="島根県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '島根県' ) echo 'selected'; ?>>島根県</option>
														<option value="岡山県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '岡山県' ) echo 'selected'; ?>>岡山県</option>
														<option value="広島県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '広島県' ) echo 'selected'; ?>>広島県</option>
														<option value="山口県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '山口県' ) echo 'selected'; ?>>山口県</option>
														<option value="徳島県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '徳島県' ) echo 'selected'; ?>>徳島県</option>
														<option value="香川県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '香川県' ) echo 'selected'; ?>>香川県</option>
														<option value="愛媛県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '愛媛県' ) echo 'selected'; ?>>愛媛県</option>
														<option value="高知県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '高知県' ) echo 'selected'; ?>>高知県</option>
														<option value="福岡県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '福岡県' ) echo 'selected'; ?>>福岡県</option>
														<option value="佐賀県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '佐賀県' ) echo 'selected'; ?>>佐賀県</option>
														<option value="長崎県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '長崎県' ) echo 'selected'; ?>>長崎県</option>
														<option value="熊本県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '熊本県' ) echo 'selected'; ?>>熊本県</option>
														<option value="大分県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '大分県' ) echo 'selected'; ?>>大分県</option>
														<option value="宮崎県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '宮崎県' ) echo 'selected'; ?>>宮崎県</option>
														<option value="鹿児島県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '鹿児島県' ) echo 'selected'; ?>>鹿児島県</option>
														<option value="沖縄県" <?php if(isset($post['prefecture']) && $post['prefecture'] == '沖縄県' ) echo 'selected'; ?>>沖縄県</option>
													</select>
												</span>
											</div>
											<div class="c-input-address">
												<input class="c-input-text p-region p-locality p-street-address" type="text" name="address_level1" autocomplete="address-level1" value="<?php if(isset($post['address_level1'])) echo $post['address_level1']; ?>" placeholder="例）東京都台東区上野５-１５-１４" />
											</div>
											<div class="c-input-address">
												<input class="c-input-text p-extended-address" type="text" name="address_line2" autocomplete="address-line2" value="<?php if(isset($post['address_line2'])) echo $post['address_line2']; ?>" placeholder="例）ミヤギビル1F" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<p class="p-require-lead"> 当社<a href="../privacy" class="c-common-link">プライバシーポリシー</a>に同意頂ける場合は<br>「同意する」にチェックを付け「送信」ボタンをクリックしてください。 </p>
							<div class="p-require-check">
								<div class="c-input-check">
									<span class="c-input-check-line">
										<input type="checkbox" name="agree" id="form-agree" class="c-input-check-input js-check-button" data-target="js-require-confirm">
									</span>
									<label for="form-agree" class="c-input-check-label">同意する</label>
								</div>
							</div>
							<div class="p-require-submit">
								<button type="submit" class="c-secondary-button js-require-confirm" disabled>送　信</button>
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