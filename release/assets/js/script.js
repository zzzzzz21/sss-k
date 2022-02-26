'use strict'; // ブレークポイント（px）

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var breakPoint = '768'; // ヘッダー

var header = document.querySelector('.js-header'); // body

var body = document.querySelector('.js-body'); // SP専用ヘッダーのハンバーガーボタン

var headerToggleButton = document.querySelector('.js-header-button'); // ヘッダーのグローバルナビゲーション

var headerMenu = document.querySelector('.js-header-menu'); // トップページのcanvasの要素を取得

var canvas = document.querySelector('.c-wave-canvas'); // 募集要項ページのタグを取得

var recruit = document.querySelector('.js-recruit'); // 2Dの描画命令群を取得

if (canvas) {
  var context = canvas.getContext('2d');
} // PC/SP判定フラグ


var isSmartPhone; // 画面の幅

var stageW = 0; // 画面の高さ

var stageH = 0;
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
  scrollToHashByMobile();
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


var scrollTrigger = document.querySelectorAll('a[href^="#"]');

var _loop = function _loop(i) {
  scrollTrigger[i].addEventListener('click', function (e) {
    e.preventDefault();
    var href = scrollTrigger[i].getAttribute('href');
    var targetElement = document.getElementById(href.replace('#', ''));
    var rect = targetElement.getBoundingClientRect().top;
    var offset = window.pageYOffset; // ヘッダーがトップ固定の場合はヘッダーの高さを入れる。

    var gap = 0;

    if (isSmartPhone) {
      var _headerHeight = document.querySelector('.js-header');

      gap = _headerHeight.clientHeight;
    }

    if (recruit) {
      var recruitNav = document.querySelector('.js-recruit-nav');
      gap += recruitNav.clientHeight;
    } // 目的の要素の位置


    var target = rect + offset - gap; // behaviorでスピードを調整する。

    window.scrollTo({
      top: target,
      behavior: 'smooth'
    });
  });
};

for (var i = 0; i < scrollTrigger.length; i++) {
  _loop(i);
}
/**
 * SPにてハッシュ付きURLでリンク遷移した時にヘッダー分スクロールする
 *
 */


function scrollToHashByMobile() {
  if (isSmartPhone) {
    var hash = location.hash;

    if (hash) {
      var headerHeight = document.querySelector('.js-header').clientHeight;
      var scrollHeight = headerHeight * -1;

      if (hash.indexOf('#recruit-block') === 0) {
        // 採用ページ用ナビゲーションの高さ(198px)を追加
        scrollHeight = scrollHeight - 198;
      }

      setTimeout(function () {
        window.scrollBy({
          top: scrollHeight,
          behavior: 'smooth'
        });
      }, 500);
    }
  }
}
/**
 * ハンバーガーメニューの開閉機能
 *
 */


function toggleMenu() {
  var isHeaderMenuShow = headerMenu.getAttribute('aria-hidden'); // ハンバーガーメニューを押した時にwai-aria属性を設定する。グローバルメニューを閉じた時に処理もこちらで兼任する

  $('.js-accordion').each(function () {
    var el = $(this);
    var tab = el.find('.js-accordion-tab');
    var panel = el.find('.js-accordion-panel');
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
  var currentUrl = window.location.href;
  var navigationUrlList = document.querySelectorAll('.c-nav-list__link');

  for (var _i = 0; _i < navigationUrlList.length; _i++) {
    var currentHref = navigationUrlList[_i].getAttribute('href');

    var currentHrefText = currentHref.split('/')[1];

    if (currentUrl.indexOf(currentHrefText) > -1) {
      navigationUrlList[_i].classList.add('c-nav-list__link--current');
    }
  }
}
/**
 * カルーセル機能
 *
 */
// カルーセルの動作フラグ


var swiperInit = document.querySelector('.swiper-init');

if (swiperInit) {
  var swiper = new Swiper('.swiper-container', {
    effect: 'fade',
    loop: true,
    autoplay: true,
    speed: 2000
  });
}
/**
 *　アコーディオンの開閉機能
 *
 */


$('.js-accordion-tab').on('click', function () {
  var tab = $(this);
  var panel = tab.parent().find('.js-accordion-panel');
  var expanded = tab.attr('aria-selected') === 'true';

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
 *　送信ボタンの活性化/非活性化の判定
 *
 */

$('.js-check-button').on('change', function () {
  var target = this.dataset.target;
  var targetElement = document.querySelector('.' + target);

  if (this.checked) {
    targetElement.disabled = false;
  } else {
    targetElement.disabled = true;
  }
});
/**
 * スクロールした時に追従する機能
 *
 */

if (recruit) {
  getDeviceWidth();
  var recruitElement = document.querySelector('.js-recruit');
  /** リクルートページを囲むelement */

  var recruitWrapperElement = document.querySelector('.js-recruit-wrapper');
  /** リクルートページ内ナビゲーションのelement */

  var recruitNavElement = document.querySelector('.js-recruit-nav');
  /** リクルートページ内ナビゲーションのelementの高さ */

  var recruitNavElementHeight = recruitNavElement.clientHeight;
  /** ヘッダーの高さ */

  var headerHeight = document.querySelector('.l-header').clientHeight;
  /** リクルートページ内のナビゲーションの高さ */

  var addHeightToWrapper = recruitNavElementHeight;
  /** ビジュアル付きタイトルの高さ */

  var titleHeight = document.querySelector('.c-visual-head').clientHeight;
  /** ナビゲーションの固定開始位置の初期値 */

  var targetHeight;
  /** スクロール量を測るための初期値 */

  var scrollHeigit;
  /** ナビゲーションの固定位置の初期値 */

  var addTopToNav;
  /** スマートフォンの時はナビゲーションの固定位置と固定開始タイミングを調整する */

  if (isSmartPhone) {
    (function () {
      targetHeight = titleHeight;
      addTopToNav = headerHeight; // addHeightToWrapper = recruitNavElementHeight + headerHeight;
      // 募集要項ページ内で、ハンバーガーメニュ内の募集要項リンクをクリックしたときの処理

      var recruitHeaderHeight = document.querySelector('.js-header').clientHeight;
      var recruitNavElementHeight = document.querySelector('.js-recruit-nav').clientHeight;
      var recruitScrollHeight = (recruitHeaderHeight + recruitNavElementHeight) * -1;
      var recruitNavLink = document.querySelectorAll('.c-sp-header-nav-anchor__link');

      for (var _i2 = 0; _i2 < recruitNavLink.length; _i2++) {
        recruitNavLink[_i2].addEventListener('click', function () {
          toggleMenu();
          setTimeout(function () {
            window.scrollBy({
              top: recruitScrollHeight,
              behavior: 'smooth'
            });
          }, 500);
        });
      }
    })();
  } else {
    targetHeight = headerHeight + titleHeight;
    addTopToNav = 0;
  }

  window.addEventListener('scroll', function () {
    scrollHeigit = window.pageYOffset;

    if (scrollHeigit > targetHeight) {
      recruitWrapperElement.setAttribute('style', "padding-top:".concat(addHeightToWrapper, "px "));
      recruitNavElement.setAttribute('style', "top:".concat(addTopToNav, "px"));
      recruitElement.classList.add('is-fixed');
    } else {
      recruitWrapperElement.setAttribute('style', "padding-top: 0 ");
      recruitNavElement.setAttribute('style', "top: 0 ");
      recruitElement.classList.remove('is-fixed');
    }
  });
}
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
  var time = Date.now() / 4000;
  draw(time);
}
/**
 *　canvasの描画イベント
 *
 */


function draw(time) {
  // 画面をリセット
  context.clearRect(0, 0, stageW, stageH);
  context.lineWidth = 16;
  var amplitude = stageH / 1.6; // 縦幅の大きさ

  var lineNum = 128; // ラインの数

  var segmentNum = 100; // 分割数

  _toConsumableArray(new Array(lineNum).keys()).forEach(function (j) {
    var coefficient = 50 + j;
    context.beginPath(); // ラインの透明度を操作する

    var a = Math.round(j / lineNum * 6) / 10;
    context.strokeStyle = "rgba(255, 255, 255, ".concat(a, ")");

    _toConsumableArray(new Array(segmentNum).keys()).forEach(function (i) {
      var x = i / (segmentNum - 1) * stageW;
      var px = i / coefficient;
      var py = j / 50 + time;
      var y = amplitude * noise.perlin2(px, py) + stageH / 2;

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