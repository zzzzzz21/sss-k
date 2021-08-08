'use strict'; // PC/SP判定フラグ

let isSmartPhone; // ブレークポイント（px）

const breakPoint = '768'; // SP専用ヘッダーのハンバーガーボタン

const headerToggleButton = document.querySelector('.js-header-button'); // ヘッダーのグローバルナビゲーション

const headerMenu = document.querySelector('.js-header-menu');
document.addEventListener('DOMContentLoaded', init);
/**
 * ハンバーガーメニュボタンクリック時の処理
 *
 */

headerToggleButton.addEventListener('click', toggleMenu);
/**
 * ページ読み込み時に実行する関数をまとめる。
 *
 */

function init() {
  getDeviceWidth();
  setNavigationCurrent();
  setHeaderWaiAria();
}
/**
 * デバイス幅でPCもしくはスマートフォンかどうかの判定
 *
 */


function getDeviceWidth() {
  if (window.matchMedia && window.matchMedia('(max-width:' + breakPoint + 'px)').matches) {
    isSmartPhone = true;
  } else {
    isSmartPhone = false;
  }
}
/**
 * スマートフォンで開いたときナビゲーションのWAI-ARIA属性を変更する。
 *
 */


function setHeaderWaiAria() {
  if (isSmartPhone) {
    headerMenu.setAttribute('aria-hidden', 'true');
    headerToggleButton.setAttribute('aria-expanded', 'false');
  }
}
/**
 * ページ内スクロール
 * 
 */


const scrollTrigger = document.querySelectorAll('a[href^="#"]');

for (let i = 0; i < scrollTrigger.length; i++) {
  scrollTrigger[i].addEventListener('click', e => {
    e.preventDefault();
    let href = scrollTrigger[i].getAttribute('href');
    let targetElement = document.getElementById(href.replace('#', ''));
    const rect = targetElement.getBoundingClientRect().top;
    const offset = window.pageYOffset; // ヘッダーがトップ固定の場合はヘッダーの高さを入れる。

    const gap = 0; // 目的の要素の位置

    const target = rect + offset - gap; // behaviorでスピードを調整する。

    window.scrollTo({
      top: target,
      behavior: 'smooth'
    });
  });
}
/**
 * ハンバーガーメニューの開閉機能
 *
 */


function toggleMenu() {
  // ハンバーガーメニューの要素が隠れているかをaria-hiddenで調べる
  var isHeaderMenuShow = headerMenu.getAttribute('aria-hidden');

  if (isHeaderMenuShow === 'true') {
    headerMenu.setAttribute('aria-hidden', 'false');
    headerToggleButton.setAttribute('aria-expanded', 'true'); // // ヘッダーのロゴを隠す
    // headerCi.classList.add('l-header__logo--hide');
    // htmlをスクロールできない様にする
    // html.classList.add('l-html--fixed');
  } else {
    headerMenu.setAttribute('aria-hidden', 'true');
    headerToggleButton.setAttribute('aria-expanded', 'false'); // headerCi.classList.remove('l-header__logo--hide');
    // html.classList.remove('l-html--fixed');
  }
}
/**
 * ナビゲーションのカレント機能
 *
 */


function setNavigationCurrent() {
  // 現在URLを取得
  const currentUrl = window.location.href;
  const navigationUrlList = document.querySelectorAll('.c-nav-list__link');

  for (let i = 0; i < navigationUrlList.length; i++) {
    const currentHref = navigationUrlList[i].getAttribute('href');
    const currentHrefText = currentHref.split('/')[1];

    if (currentUrl.indexOf(currentHrefText) > -1) {
      navigationUrlList[i].classList.add('c-nav-list__link--current');
    }
  }
}