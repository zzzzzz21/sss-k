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
    header('Location : ./index.php');
    exit;
}
$form = $_SESSION['post'];

/*******************************************************/
/* 問合せ処理メールアドレス */
define('INQUIRY_EMAIL_ADMIN', 'info@sss-k.co.jp'); // ADMIN
define('INQUIRY_EMAIL_FROM', 'info@sss-k.co.jp'); // 送り主
define('INQUIRY_EMAIL_RETURN', 'info@sss-k.co.jp'); // Return-Path
/*******************************************************/

if ($_SESSION['res']['isSuccess'] === true) {
    send($form); // メールの処理
    $_SESSION = array();
    session_destroy();
    header( "HTTP/1.1 302" );
    header('Location : ./complete.html');
}
function send($input)
{
    // 問い合わせした人
    $headers = 'From: ' . INQUIRY_EMAIL_FROM;
    $params = '-f ' . INQUIRY_EMAIL_RETURN;
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    mb_send_mail($input['email'], '【サンエス工業】へのお問い合わせありがとうございました。', getBody($input), $headers, $params);

    // 管理者宛
    $headers = 'From: ' . INQUIRY_EMAIL_FROM;
    $params = '-f ' . $input['email'];
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    mb_send_mail(INQUIRY_EMAIL_ADMIN, 'お問い合わせを受信しました。｜サンエス工業', getBodyAdmin($input), $headers, $params);
}

function getBody($input)
{
    return <<< EOM

-------------------------------------------------------------
本メールはお客様からお問い合わせいただいた時点で送信される自動配信メールです。
※本メールに返信はできません。
-------------------------------------------------------------

{$input['organization_title']} 様

サンエス工業お問い合わせフォームから、
下記の内容でお問い合わせを受け付けました。
内容を確認して担当者から回答しますので、しばらくお待ちください。

お問い合わせ内容項目： {$input['matter']}

---
お名前： {$input['organization_title']}
貴社名： {$input['organization']}
部署名： {$input['department']}
メールアドレス： {$input['email']}
電話番号： {$input['tel']}
住所： {$input['postal_code']} {$input['prefecture']}{$input['address_level1']}{$input['address_line2']}
お問い合わせ内容： {$input['other_content']}
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
内容を確認して、原則として3営業日以内に、回答してください。

---
お名前： {$input['organization_title']}
貴社名： {$input['organization']}
部署名： {$input['department']}
メールアドレス： {$input['email']}
電話番号： {$input['tel']}
住所： {$input['postal_code']} {$input['prefecture']}{$input['address_level1']}{$input['address_line2']}
お問い合わせ内容： {$input['other_content']}
---

このメールは サンエス工業のお問い合わせフォームから送信されました。

EOM;
}
