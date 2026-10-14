<?php defined('ABSPATH') || exit; ?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta
      name="description"
      content="O・TE Dance School｜福島市のO・TE Dance School。体験・見学のお申し込みは公式LINEへ。"
    />

    <meta name="theme-color" content="#f5f2ea" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="O・TE Dance School｜O・TE Dance School" />
    <meta
      property="og:description"
      content="O・TE Dance School｜福島市のO・TE Dance School。体験・見学のお申し込みは公式LINEへ。"
    />
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon.svg'); ?>" type="image/svg+xml" />
    

    <title>O・TE Dance School｜O・TE Dance School</title>
    
  <?php wp_head(); ?>
</head>
  <body id="top" <?php body_class(); ?>><?php wp_body_open(); ?>
    <a class="skip" href="#main">本文へ移動</a>
    <header class="header">
      <div class="wrap header-inner">
        <a class="brand" href="<?php echo esc_url(ote_url('index')); ?>" aria-label="O・TE Dance School ホーム"
          ><span class="brand-word">O<span class="brand-dot">·</span>TE</span
          ><span class="brand-desc">DANCE<br />SCHOOL</span></a
        >
        <nav class="nav" id="main-navigation" aria-label="メインメニュー">
          <a href="<?php echo esc_url(ote_url('about')); ?>" aria-current="page">スクール紹介</a
          ><a href="<?php echo esc_url(ote_url('join')); ?>">入会のご案内</a><a href="<?php echo esc_url(ote_url('schedule')); ?>">スケジュール</a
          ><a href="<?php echo esc_url(ote_url('fees')); ?>">料金</a
          ><a
            class="button line"
            href="https://line.me/R/ti/p/@jek5088j"
            target="_blank"
            rel="noopener noreferrer"
            >体験・見学はこちら<span class="arrow" aria-hidden="true">↗</span></a
          >
        </nav>
        <button
          class="menu-toggle"
          aria-label="メニューを開く"
          aria-controls="main-navigation"
          aria-expanded="false"
        >
          <span></span><span></span>
        </button>
      </div>
    </header>
    <main id="main">
      <section class="page-intro">
        <div class="wrap">
          <div class="breadcrumb"><a href="<?php echo esc_url(ote_url('index')); ?>">HOME</a>　/　O・TE Dance School</div>
          <div class="page-intro-layout has-illustration">
            <div class="page-intro-copy">
              <span class="eyebrow">ABOUT US</span>
              <h1>O・TE Dance School</h1>
              <p class="lead">
                2歳から大人まで。自分のペースでダンスを楽しめる、福島市のスクールです。
              </p>
            </div>
            <figure class="page-intro-art">
              <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/about-illustration-v1.webp'); ?>"
                alt="スクールの仲間が笑顔で踊るイラスト"
                width="960"
                height="640"
                decoding="async"
                fetchpriority="high"
              />
            </figure>
          </div>
        </div>
      </section>
      <div class="wrap page-body">
        <div class="split">
          <div>
            <section class="page-section">
              <h2>みんなで仲良く、<br />楽しくダンスをする。</h2>
              <p>
                ダンスが好きなメンバーが集まって、毎回のレッスンを楽しく、仲良く。O・TEが大切にしているのは、踊ることを楽しめる時間です。
              </p>
              <p>
                お子さまから学生、社会人、パパ・ママまで、幅広い年代が通えるクラスをご案内しています。はじめての方も、ダンス経験のある方も、気になるジャンルをご相談ください。
              </p>
            </section>
            <a class="text-link" href="<?php echo esc_url(ote_url('schedule')); ?>"
              >レッスンを見てみる<span class="arrow" aria-hidden="true">↗</span></a
            >
          </div>
          <figure>
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/studio.webp'); ?>"
              alt="スタジオでのダンスレッスン"
              loading="lazy"
              decoding="async"
            />
          </figure>
        </div>
        <section class="page-section">
          <h2>スクールへのアクセス</h2>
          <div class="split access-layout">
            <dl class="info-list">
              <div>
                <dt>名称</dt>
                <dd>O・TE Dance School</dd>
              </div>
              <div>
                <dt>住所</dt>
                <dd>〒960-8204<br />福島県福島市岡部字大蔵17-1 1階</dd>
              </div>
              <div>
                <dt>電話番号</dt>
                <dd><a href="tel:0245022377">024-502-2377</a></dd>
              </div>
              <div>
                <dt>ご相談</dt>
                <dd>
                  <a
                    href="https://line.me/R/ti/p/@jek5088j"
                    target="_blank"
                    rel="noopener noreferrer"
                    >体験・見学は公式LINEへ ↗</a
                  >
                </dd>
              </div>
            </dl>
            <div class="access-visual">
              <a
                class="button outline"
                href="https://www.google.com/maps/search/?api=1&query=%E7%A6%8F%E5%B3%B6%E7%9C%8C%E7%A6%8F%E5%B3%B6%E5%B8%82%E5%B2%A1%E9%83%A8%E5%AD%97%E5%A4%A7%E8%94%B517-1%201%E9%9A%8E"
                target="_blank"
                rel="noopener noreferrer"
                >Google Mapsで場所を見る<span class="arrow" aria-hidden="true">↗</span></a
              >
              <figure>
                <img
                  src="<?php echo esc_url(get_template_directory_uri() . '/assets/exterior.webp'); ?>"
                  alt="O・TE Dance Schoolの看板が見えるスタジオ外観"
                  loading="lazy"
                  decoding="async"
                />
              </figure>
            </div>
          </div>
        </section>
      </div>
      <section class="contact" id="contact" aria-labelledby="contact-title">
        <div class="wrap contact-inner">
          <div>
            <span class="eyebrow">YOUR FIRST STEP</span>
            <h2 id="contact-title">最初の一歩は、<br />「ちょっと気になる」から。</h2>
            <p>
              見学・体験レッスンのご相談は、公式LINEへ。<br />年齢や気になるジャンル、希望の曜日をお知らせください。
            </p>
            <a
              class="button line"
              href="https://line.me/R/ti/p/@jek5088j"
              target="_blank"
              rel="noopener noreferrer"
              >LINEで体験・見学を相談する<span class="arrow" aria-hidden="true">↗</span></a
            >
            <p class="contact-small" style="margin-top: 16px">
              スケジュールやスクールからのお知らせも、公式LINEでご案内しています。
            </p>
          </div>
          <div class="qr">
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/line-qr.png'); ?>"
              alt="公式LINEの友だち追加用QRコード"
              loading="lazy"
              decoding="async"
              width="125"
              height="125"
            />
            <p>スマートフォンで読み取って<br />公式LINEへ</p>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer">
      <div class="wrap">
        <div class="footer-top">
          <div>
            <p class="footer-title">O・TE Dance School</p>
            <p class="footer-address">〒960-8204<br />福島県福島市岡部字大蔵17-1 1階</p>
            <a
              class="footer-map"
              href="https://www.google.com/maps/search/?api=1&query=%E7%A6%8F%E5%B3%B6%E7%9C%8C%E7%A6%8F%E5%B3%B6%E5%B8%82%E5%B2%A1%E9%83%A8%E5%AD%97%E5%A4%A7%E8%94%B517-1%201%E9%9A%8E"
              target="_blank"
              rel="noopener noreferrer"
              >Google Mapsでアクセスを見る ↗</a
            >
          </div>
          <nav class="footer-links" aria-label="フッターメニュー">
            <a href="<?php echo esc_url(ote_url('index')); ?>">HOME</a><a href="<?php echo esc_url(ote_url('about')); ?>">スクール紹介</a
            ><a href="<?php echo esc_url(ote_url('join')); ?>">入会のご案内</a><a href="<?php echo esc_url(ote_url('schedule')); ?>">レッスンスケジュール</a
            ><a href="<?php echo esc_url(ote_url('fees')); ?>">レッスン料金表</a
            ><a
              class="instagram-link"
              href="https://www.instagram.com/otedance_fukushima/"
              target="_blank"
              rel="noopener noreferrer"
              ><svg
                class="instagram-icon"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                aria-hidden="true"
                focusable="false"
              >
                <rect x="3" y="3" width="18" height="18" rx="5" />
                <circle cx="12" cy="12" r="4.2" />
                <circle cx="17.6" cy="6.6" r="1" fill="currentColor" stroke="none" /></svg
              >Instagram ↗</a
            ><a href="https://line.me/R/ti/p/@jek5088j" target="_blank" rel="noopener noreferrer"
              >公式LINE ↗</a
            ><a href="<?php echo esc_url(ote_url('privacy')); ?>">プライバシーポリシー</a>
          </nav>
        </div>
        <div class="footer-brand">
          <strong>O<span class="brand-dot">·</span>TE</strong
          ><span>FIND YOUR RHYTHM.<br />ENJOY YOUR DANCE.</span>
        </div>
        <div class="footer-bottom">
          <span>© 2026 O・TE Dance School</span><a class="back-top" href="#top">BACK TO TOP ↑</a>
        </div>
        <p class="preview-note">リニューアル試作 · 掲載内容は確認中です</p>
      </div>
    </footer>
  <?php wp_footer(); ?>
</body>
</html>
