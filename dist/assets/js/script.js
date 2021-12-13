'use strict'; // ブレークポイント（px）

const breakPoint = '768'; // ヘッダー

const header = document.querySelector('.js-header'); // body

const body = document.querySelector('.js-body'); // SP専用ヘッダーのハンバーガーボタン

const headerToggleButton = document.querySelector('.js-header-button'); // ヘッダーのグローバルナビゲーション

const headerMenu = document.querySelector('.js-header-menu'); // トップページのcanvasの要素を取得

const canvas = document.querySelector('.c-wave-canvas'); // 2Dの描画命令群を取得

if (canvas) {
  var context = canvas.getContext('2d');
} // PC/SP判定フラグ


let isSmartPhone; // 画面の幅

let stageW = 0; // 画面の高さ

let stageH = 0;
document.addEventListener('DOMContentLoaded', init);
window.addEventListener('resize', resizeEvent);
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
 * リサイズ時に実行するイベントをまとめる
 *
 */


function resizeEvent() {
  getDeviceWidth();
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
  let isHeaderMenuShow = headerMenu.getAttribute('aria-hidden'); // ハンバーガーメニューを押した時にwai-aria属性を設定する。グローバルメニューを閉じた時に処理もこちらで兼任する

  $('.js-accordion').each(function () {
    const el = $(this);
    const tab = el.find('.js-accordion-tab');
    const panel = el.find('.js-accordion-panel');
    tab.attr('aria-selected', 'false');
    panel.attr('aria-expanded', 'false');
    panel.attr('aria-hidden', 'true');
  });

  if (isHeaderMenuShow === 'true') {
    // グローバルナビゲーションを開いた時の処理
    scrollY = window.pageYOffset;
    body.classList.add('l-body--open');
    headerMenu.setAttribute('aria-hidden', 'false');
    headerToggleButton.setAttribute('aria-expanded', 'true');
  } else {
    // グローバルナビゲーションを閉じた時の処理
    body.classList.remove('l-body--open');
    headerMenu.setAttribute('aria-hidden', 'true');
    headerToggleButton.setAttribute('aria-expanded', 'false');
    window.scrollTo(0, scrollY);
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
  speed: 2000
});
/**
 *　アコーディオンの開閉機能
 *
 */

$('.js-accordion-tab').on('click', function () {
  const tab = $(this);
  const panel = tab.parent().find('.js-accordion-panel');
  const expanded = tab.attr('aria-selected') === 'true';

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
/**
 *　トップページのcanvasイベント
 *
 */

if (canvas !== null) {
  noise.seed(Math.random());
  resizeCanvas();
  tick();
  window.addEventListener('resize', resizeCanvas);
}
/**
 *　エンターフレーム
 *
 */


function tick() {
  requestAnimationFrame(tick);
  const time = Date.now() / 4000;
  draw(time);
}
/**
 *　canvasの描画イベント
 *
 */


function draw(time) {
  // 画面をリセット
  context.clearRect(0, 0, stageW, stageH);
  context.lineWidth = 300;
  const amplitude = stageH / 2; // 縦幅の大きさ

  const lineNum = 8; // ラインの数

  const segmentNum = 100; // 分割数

  [...new Array(lineNum).keys()].forEach(j => {
    const coefficient = 15 + j;
    context.beginPath(); // ラインの透明度を操作する

    const a = Math.round(j / lineNum * 3) / 10;
    context.strokeStyle = `rgba(255, 255, 255, ${a})`;
    [...new Array(segmentNum).keys()].forEach(i => {
      const x = i / (segmentNum - 1) * stageW;
      const px = i / coefficient;
      const py = j / 50 + time;
      const y = amplitude * noise.perlin2(px, py) + stageH / 2;

      if (i === 0) {
        context.moveTo(x, y);
      } else {
        context.lineTo(x, y);
      }
    });
    context.stroke();
  });
}
/** リサイズ時のイベントです。 */


function resizeCanvas() {
  if (!isSmartPhone) {
    stageW = innerWidth * devicePixelRatio;
    stageH = innerHeight * devicePixelRatio;
    canvas.width = stageW;
    canvas.height = stageH;
  } else {
    return false;
  }
}