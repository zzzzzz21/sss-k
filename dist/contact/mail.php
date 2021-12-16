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
define('INQUIRY_EMAIL_ADMIN', 'shimizu@hakarai.co.jp'); // ADMIN
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
    mb_send_mail($input['email'], 'お問い合わせを受け付けました。｜サンエス工業', getBody($input), $headers, $params);

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
{$input['organization_title']} 様

サンエス工業お問い合わせフォームから、
下記の内容でお問い合わせを受け付けました。
内容を確認して担当者から回答しますので、しばらくお待ちください。


---
お問い合わせ内容： {$input['matter']}
その他お問い合わせ： {$input['other_content']}
会社名： {$input['organization']}
部署名： {$input['department']}
ご担当者名： {$input['organization_title']}
お電話番号： {$input['tel']}
メールアドレス： {$input['email']}
ご住所： {$input['postal_code']} {$input['prefecture']}{$input['address_level1']}{$input['address_line2']}
---

※このメールは サンエス工業のお問い合わせフォームから送信しました。
※このメールアドレスは送信専用です。
　お返事がない場合などは、お問い合わせフォームからご連絡ください。

------------------------------------------
 株式会社サンエス工業
 http://www.sss-k.co.jp/
  【　本　社　】
  〒110-0005
  東京都台東区上野５丁目１５番１４号ミヤギビル

  【東北支店･工場】
  〒981-3117
  宮城県仙台市泉区市名坂字野蔵１３

  【茨城工場】
  〒300-0134
  茨城県かすみがうら市深谷６７
------------------------------------------

EOM;
}

function getBodyAdmin($input)
{
    return <<< EOM
下記の内容でお問い合わせがありました。
内容を確認して、回答してください。

---
お問い合わせ内容： {$input['matter']}
その他お問い合わせ： {$input['other_content']}
会社名： {$input['organization']}
部署名： {$input['department']}
ご担当者名： {$input['organization_title']}
お電話番号： {$input['tel']}
メールアドレス： {$input['email']}
ご住所： {$input['postal_code']} {$input['prefecture']}{$input['address_level1']}{$input['address_line2']}
---

このメールは サンエス工業のお問い合わせフォームから送信されました。

EOM;
}
