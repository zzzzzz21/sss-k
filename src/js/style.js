'use strict'
// PC/SP判定フラグ
let isSmartPhone;
// ブレークポイント（px）
const breakPoint = '768';
// SP専用ヘッダーのハンバーガーボタン
const header= document.querySelector('.js-header');
// SP専用ヘッダーのハンバーガーボタン
const headerToggleButton = document.querySelector('.js-header-button');
// ヘッダーのグローバルナビゲーション
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
    if (window.matchMedia && window.matchMedia('(max-width:' +  breakPoint + 'px)').matches) {
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
    if(isSmartPhone) {
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
    scrollTrigger[i].addEventListener('click', (e) => {
        e.preventDefault();
        let href = scrollTrigger[i].getAttribute('href');
        let targetElement = document.getElementById(href.replace('#', ''));
        const rect = targetElement.getBoundingClientRect().top;
        const offset = window.pageYOffset;
        // ヘッダーがトップ固定の場合はヘッダーの高さを入れる。
        const gap = 0;
        // 目的の要素の位置
        const target = rect + offset - gap;
        // behaviorでスピードを調整する。
        window.scrollTo({
            top: target,
            behavior: 'smooth',
        });
    })
}

/**
 * ハンバーガーメニューの開閉機能
 *
 */
function toggleMenu() {
    // ハンバーガーメニューの要素が隠れているかをaria-hiddenで調べる
    const isHeaderMenuShow = headerMenu.getAttribute('aria-hidden');

    // ハンバーガーメニューを押した時にwai-aria属性を設定する。グローバルメニューを閉じた時に処理もこちらで兼任する
    $('.js-accordion').each(function() {
        const el = $(this);
        const tab = el.find('.js-accordion-tab');
        const panel = el.find('.js-accordion-panel');
        tab.attr('aria-selected', 'false');
        panel.attr('aria-expanded', 'false');
        panel.attr('aria-hidden', 'true');
    });


    if (isHeaderMenuShow === 'true') {
        // グローバルナビゲーションを開いた時の処理
        header.classList.add('l-header--open');
        headerMenu.setAttribute('aria-hidden', 'false');
        headerToggleButton.setAttribute('aria-expanded', 'true');


    } else {
        // グローバルナビゲーションを閉じた時の処理
        header.classList.remove('l-header--open');
        headerMenu.setAttribute('aria-hidden', 'true');
        headerToggleButton.setAttribute('aria-expanded', 'false');


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

/**
 * カルーセル機能
 *
 */

const swiper = new Swiper('.swiper-container', {
    effect: 'fade',
    loop: true,
    autoplay: true,
});

/**
 *　アコーディオンの開閉機能
 *
 */
$('.js-accordion-tab').on('click', function() {
    const tab = $(this);
    const panel = tab.parent().find('.js-accordion-panel');
    const expanded = (tab.attr('aria-selected') === 'true');
    if (expanded) {
        tab.attr('aria-selected', 'false');
        panel.attr('aria-expanded', 'false');
        panel.attr('aria-hidden', 'true');
    } else {
        tab.attr('aria-selected', 'true');
        panel.attr('aria-expanded', 'true');
        panel.attr('aria-hidden', 'false');
    }
});