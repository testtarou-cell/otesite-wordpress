<?php defined('ABSPATH') || exit; ?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta
      name="description"
      content="福島市のO・TE Dance School。2歳から大人まで、自分らしくダンスを楽しもう。レッスン案内・スケジュール・料金、体験や見学のご相談は公式LINEへ。"
    />

    <meta name="theme-color" content="#f5f2ea" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="楽しめるダンススクール｜O・TE Dance School" />
    <meta
      property="og:description"
      content="福島市のO・TE Dance School。2歳から大人まで、自分らしくダンスを楽しもう。レッスン案内・スケジュール・料金、体験や見学のご相談は公式LINEへ。"
    />
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon.svg'); ?>" type="image/svg+xml" />
    
    <link rel="preload" href="<?php echo esc_url(get_template_directory_uri() . '/assets/dance-hero.webp'); ?>" as="image" />
    <title>楽しめるダンススクール｜O・TE Dance School</title>
    
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
          <a href="<?php echo esc_url(ote_url('about')); ?>">スクール紹介</a><a href="<?php echo esc_url(ote_url('join')); ?>">入会のご案内</a
          ><a href="<?php echo esc_url(ote_url('schedule')); ?>">スケジュール</a><a href="<?php echo esc_url(ote_url('fees')); ?>">料金</a
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
      <section class="hero" aria-labelledby="hero-title">
        <div class="wrap">
          <div class="hero-grid">
            <div class="hero-copy">
              <div class="hero-place">
                <span class="dot"></span>福島市のダンススクール / 2歳から大人まで
              </div>
              <div class="hero-message">
                <h1 id="hero-title">好きが、<br />踊りだす<span class="accent">。</span></h1>
                <div class="hero-note">Find your rhythm. Be yourself.</div>
              </div>
              <p>はじめての一歩も、夢中になる時間も。<br />あなたの「踊ってみたい」を、O・TEで。</p>
              <div class="hero-buttons">
                <a
                  class="button line"
                  href="https://line.me/R/ti/p/@jek5088j"
                  target="_blank"
                  rel="noopener noreferrer"
                  >LINEで体験・見学を相談<span class="arrow" aria-hidden="true">↗</span></a
                ><a class="text-link" href="<?php echo esc_url(ote_url('about')); ?>"
                  >O・TEって？<span class="arrow" aria-hidden="true">↗</span></a
                >
              </div>
            </div>
            <figure class="hero-art">
              <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/dance-hero.webp'); ?>"
                alt="子どもと大人が一緒にダンスを楽しむオリジナルイラスト"
                width="1536"
                height="1024"
                fetchpriority="high"
              />
              <figcaption class="hero-stamp">LET’S<br />DANCE<br />TOGETHER!</figcaption>
            </figure>
          </div>
          <div class="hero-bottom">
            <div class="small-tags">
              <span>はじめての方も</span><span>自分のペースで</span><span>見学・体験受付中</span>
            </div>
            <a href="#about" class="scroll-cue"
              >SCROLL TO EXPLORE <span aria-hidden="true">↓</span></a
            >
          </div>
        </div>
      </section>
      <div class="rhythm" aria-hidden="true">
        <div>
          <span>MOVE YOUR BODY</span><span class="star">✳</span><span>ENJOY YOUR DANCE</span
          ><span class="star">✳</span><span>BE YOURSELF</span><span class="star">✳</span>
        </div>
      </div>
      <section class="news-section">
        <div class="wrap news-layout">
          <div>
            <span class="eyebrow">INFORMATION</span>
            <h2>スクールからのお知らせ</h2>
          </div>
          <div class="news-list"><?php ote_news(); ?><p>月間予定の掲載例です。最新の連絡は公式LINEでご確認ください。</p>
          </div>
        </div>
      </section>
      <section class="section" id="about">
        <div class="wrap intro">
          <figure class="intro-photo">
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/studio.webp'); ?>"
              alt="O・TEのスタジオでダンスのレッスンを受けるメンバー"
              loading="lazy"
              decoding="async"
              width="800"
              height="600"
            />
            <figcaption class="photo-tag">OUR PLACE, YOUR PACE.</figcaption>
          </figure>
          <div>
            <div class="label">
              <span class="num">01</span><span class="eyebrow">ABOUT O・TE</span>
            </div>
            <h2>みんなで、仲良く。<br />とにかく、楽しく。</h2>
            <div class="body-copy">
              <p>
                O・TE（オーティー）は、福島市にあるダンススクール。<br />ダンスが好きな仲間と、楽しく踊る時間を大切にしています。
              </p>
              <p>
                2歳のお子さまから学生、社会人、パパ・ママまで。<br />いろいろなジャンルから、ライフスタイルに合うレッスンを選べます。
              </p>
            </div>
            <a class="text-link" href="<?php echo esc_url(ote_url('about')); ?>"
              >スクールについてもっと知る<span class="arrow" aria-hidden="true">↗</span></a
            >
            <div class="intro-doodle" aria-hidden="true">Dance makes us smile ☺</div>
          </div>
        </div>
      </section>
      <section class="section classes-section" aria-labelledby="classes-title">
        <div class="wrap">
          <div class="section-head">
            <div>
              <div class="label">
                <span class="num">02</span><span class="eyebrow">FIND YOUR CLASS</span>
              </div>
              <h2 id="classes-title">あなたに合う、ダンスがある。</h2>
            </div>
            <p class="classes-intro">
              年齢も、経験も、きっかけも、それぞれ。<br />自分らしく楽しめるクラスを見つけよう。
            </p>
          </div>
          <div class="classes-grid">
            <a class="class-card" href="<?php echo esc_url(ote_url('schedule') . '#monthly'); ?>"
              ><div class="top"><span>01 / KIDS & JUNIOR</span><span>未就学児〜小学生</span></div>
              <img
                src="<?php echo esc_url(ote_photo('kids', 'kids.webp')); ?>"
                alt="イベントで踊るキッズダンスのメンバー"
                loading="lazy"
                decoding="async"
              />
              <h3>キッズ・ジュニア</h3>
              <p>
                音楽に合わせて、からだを動かす楽しさを。<br />HIPHOP、JAZZなどのクラスをご案内。
              </p>
              <span class="arrow" aria-hidden="true">↗</span></a
            ><a class="class-card" href="<?php echo esc_url(ote_url('schedule') . '#monthly'); ?>"
              ><div class="top"><span>02 / GENERAL</span><span>中学生〜大人</span></div>
              <img
                src="<?php echo esc_url(ote_photo('general', 'stage.webp')); ?>"
                alt="ステージでダンスを披露するメンバー"
                loading="lazy"
                decoding="async"
              />
              <h3>一般クラス</h3>
              <p>好きなジャンルで、好きな自分に。<br />JAZZ、HIPHOP、TAPなど幅広く。</p>
              <span class="arrow" aria-hidden="true">↗</span></a
            ><a class="class-card" href="<?php echo esc_url(ote_url('schedule') . '#monthly'); ?>"
              ><div class="top"><span>03 / KIDS & FAMILY</span><span>2歳〜・ご家族と</span></div>
              <img
                src="<?php echo esc_url(ote_photo('family', 'family.webp')); ?>"
                alt="みんなでからだを動かすスタジオのレッスン風景"
                loading="lazy"
                decoding="async"
              />
              <h3>キッズ親子クラス</h3>
              <p>「楽しい！」を、お子さまと一緒に。<br />家族で始めるダンスの時間。</p>
              <span class="arrow" aria-hidden="true">↗</span></a
            >
          </div>
          <div class="genres">
            <span class="hint">FIND YOUR FAVORITE</span><span>HIPHOP</span><span>JAZZ</span
            ><span>JAZZ LOCK</span><span>TAP</span><span>BELLY</span><span>FREE STYLE</span>
          </div>
          <p class="classes-disclaimer">
            クラス紹介は旧サイトの掲載内容をもとにしています。現在の開講状況は公式LINEへ。
          </p>
        </div>
      </section>
      <section class="section">
        <div class="wrap">
          <div class="section-head">
            <div>
              <div class="label">
                <span class="num">03</span><span class="eyebrow">YOUR DANCE GUIDE</span>
              </div>
              <h2>始める前に、知りたいこと。</h2>
            </div>
            <span class="eyebrow">A SMALL STEP, A NEW RHYTHM.</span>
          </div>
          <div class="guide-grid">
            <a class="guide-card" href="<?php echo esc_url(ote_url('join')); ?>"
              ><span class="eyebrow">GET STARTED</span>
              <h3>入会のご案内</h3>
              <p>体験・見学から、入会までの流れ。</p>
              <span class="arrow" aria-hidden="true">↗</span></a
            ><a class="guide-card" href="<?php echo esc_url(ote_url('schedule')); ?>"
              ><span class="eyebrow">LESSON SCHEDULE</span>
              <h3>レッスンスケジュール</h3>
              <p>月間のレッスン予定をチェック。</p>
              <span class="arrow" aria-hidden="true">↗</span></a
            ><a class="guide-card" href="<?php echo esc_url(ote_url('fees')); ?>"
              ><span class="eyebrow">LESSON FEES</span>
              <h3>レッスン料金表</h3>
              <p>ライフスタイルに合わせて選ぶコース。</p>
              <span class="arrow" aria-hidden="true">↗</span></a
            >
          </div>
        </div>
      </section>
      <section class="section social-section" aria-labelledby="social-title">
        <div class="wrap">
          <div class="social-heading">
            <div>
              <div class="label">
                <span class="num">04</span><span class="eyebrow">OUR DANCE, OUR DAYS</span>
              </div>
              <h2 id="social-title">Dance.<br />Smile. <span>Repeat.</span></h2>
            </div>
            <div class="social-copy">
              <p>
                レッスンの時間も、ステージの瞬間も。<br />O・TEの雰囲気を、写真でも感じてください。<br />日々の活動は、公式Instagramへ。
              </p>
              <a
                class="text-link instagram-link"
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
                >@otedance_fukushima<span class="arrow" aria-hidden="true">↗</span></a
              >
            </div>
          </div>
          <div class="gallery-grid">
            <button
              class="gallery-item"
              data-photo="<?php echo esc_url(get_template_directory_uri() . '/assets/stage.webp'); ?>"
              aria-label="発表会のステージで踊るメンバーの写真を拡大"
            >
              <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/stage.webp'); ?>"
                alt="発表会のステージで踊るメンバー"
                loading="lazy"
                decoding="async"
              /><span>01 / ON STAGE</span></button
            ><button
              class="gallery-item"
              data-photo="<?php echo esc_url(get_template_directory_uri() . '/assets/studio.webp'); ?>"
              aria-label="スタジオでのレッスン風景の写真を拡大"
            >
              <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/studio.webp'); ?>"
                alt="スタジオでのレッスン風景"
                loading="lazy"
                decoding="async"
              /><span>02 / IN THE STUDIO</span></button
            ><button
              class="gallery-item"
              data-photo="<?php echo esc_url(get_template_directory_uri() . '/assets/community.webp'); ?>"
              aria-label="イベントで笑顔を見せるスクールのメンバーの写真を拡大"
            >
              <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/community.webp'); ?>"
                alt="イベントで笑顔を見せるスクールのメンバー"
                loading="lazy"
                decoding="async"
              /><span>03 / TOGETHER</span></button
            ><button
              class="gallery-item"
              data-photo="<?php echo esc_url(get_template_directory_uri() . '/assets/kids.webp'); ?>"
              aria-label="屋外のイベントで踊るキッズのメンバーの写真を拡大"
            >
              <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/kids.webp'); ?>"
                alt="屋外のイベントで踊るキッズのメンバー"
                loading="lazy"
                decoding="async"
              /><span>04 / DANCE & SMILE</span>
            </button>
          </div>
          <div class="social-foot">
            <span>写真：O・TE Dance School 旧サイトのアルバムより</span
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
              >最新のレッスン・イベントの様子をInstagramで ↗</a
            >
          </div>
        </div>
      </section>
      <dialog class="lightbox" id="photo-dialog" aria-label="スクールの写真">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/stage.webp'); ?>" alt="" />
        <div class="lightbox-bar">
          <p data-photo-caption></p>
          <div class="lightbox-controls">
            <button data-prev aria-label="前の写真">←</button
            ><button data-next aria-label="次の写真">→</button
            ><button data-close aria-label="写真を閉じる">×</button>
          </div>
        </div>
      </dialog>
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
