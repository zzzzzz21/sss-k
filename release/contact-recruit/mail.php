<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('HTTP/1.1 403 Forbidden');
    exit;
}
if (!(isset($_POST["csrf_token"])
    && $_POST["csrf_token"] === $_SESSION['csrf_token2'])) {
    // header('HTTP/1.1 403 Forbidden');
    header( "HTTP/1.1 302" );
    header('Location: ./index.php');
    exit;
}
$form = $_SESSION['post'];

/*******************************************************/
/* 問合せ処理メールアドレス */
if ($form['recruit_base'] === '東北支店'){
    $target_mail = 'san-esu@chorus.ocn.ne.jp';
} elseif ($form['recruit_base'] === '茨城工場') {
    $target_mail = 'sss-k@sss-k.co.jp';
} else {
    $target_mail = 'zaimu@sss-k.co.jp';
}
define('INQUIRY_EMAIL_ADMIN', $target_mail); // ADMIN
define('INQUIRY_EMAIL_FROM', 'info@sss-k.co.jp'); // 送り主
define('INQUIRY_EMAIL_RETURN', 'info@sss-k.co.jp'); // Return-Path
/*******************************************************/

if ($_SESSION['res']['isSuccess'] === true) {
    send($form); // メールの処理
    $_SESSION = array();
    session_destroy();
    header( "HTTP/1.1 302" );
    header('Location: ./complete.html');
}
function send($input)
{
    // 問い合わせした人
    $headers = 'From: ' . INQUIRY_EMAIL_ADMIN;
    $params = '-f ' . INQUIRY_EMAIL_ADMIN;
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    mb_send_mail($input['email'], '【サンエス工業】への採用に関するお問い合わせありがとうございました。', getBody($input), $headers, $params);

    // 管理者宛
    $headers = 'From: ' . INQUIRY_EMAIL_FROM;
    $params = '-f ' . $input['email'];
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    mb_send_mail(INQUIRY_EMAIL_ADMIN, '採用お問い合わせを受信しました。｜サンエス工業', getBodyAdmin($input), $headers, $params);
}

function getBody($input)
{
    return <<< EOM
-------------------------------------------------------------
本メールはお客様からお問い合わせいただいた時点で送信される自動配信メールです。
※本メールに返信はできません。
-------------------------------------------------------------

{$input['name']} 様

サンエス工業への採用に関するお問い合わせありがとうございました。
以下の内容でお問い合わせを承りました。

お問い合わせ項目： {$input['recruit_matter']}
お問い合わせ拠点： {$input['recruit_base']}

---
お名前： {$input['name']}
メールアドレス： {$input['email']}
電話番号： {$input['tel']}
ご住所： {$input['postal_code']} {$input['prefecture']}{$input['address_level1']}{$input['address_line2']}
お問い合わせ内容： {$input['content']}
---

原則として３営業日以内に、担当者よりご連絡いたします。

よろしくお願いいたします。

================================
株式会社サンエス工業
http://www.sss-k.co.jp/
================================

EOM;
}

function getBodyAdmin($input)
{
    return <<< EOM
下記の内容でお問い合わせがありました。
内容を確認して、原則として3営業日以内に回答してください。

お問い合わせ項目： {$input['recruit_matter']}
お問い合わせ拠点： {$input['recruit_base']}

---
お名前： {$input['name']}
メールアドレス： {$input['email']}
電話番号： {$input['tel']}
ご住所： {$input['postal_code']} {$input['prefecture']}{$input['address_level1']}{$input['address_line2']}
お問い合わせ内容： {$input['content']}
---

このメールは サンエス工業のお問い合わせフォームから送信されました。

EOM;
}
