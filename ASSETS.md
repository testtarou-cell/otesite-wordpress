# 画像の出典

## 案内ページのイラスト4点

`about-illustration-v1.webp`、`join-illustration-v1.webp`、`schedule-illustration-v1.webp`、`fees-illustration-v1.webp` は、既存トップのオリジナルイラストを人物・画風の参考として、built-in ImageGenで個別に新規生成しています。背景の透明度を保ってWebPに最適化しています。

紹介は仲間とダンス、入会は初めての人のお迎え、予定はカレンダー、料金はレッスンチケットを選ぶ場面です。架空のキャラクターで、実際の生徒・講師を描写したものではありません。生成プロンプト一式は `illustration-prompts.json` に記録しています。

## スクールの実写真

旧公式サイトで公開されている写真を、ユーザーの依頼に基づき使用。WebPに最適化して同梱しています。写真の内容は変更していません。

| ファイル                     | 出典                                                                          |
| ---------------------------- | ----------------------------------------------------------------------------- |
| `dist/assets/stage.webp`     | https://ote-dance.sakura.ne.jp/ote-hp/wp-content/uploads/2023/01/064.jpg      |
| `dist/assets/studio.webp`    | https://ote-dance.sakura.ne.jp/ote-hp/wp-content/uploads/2023/01/1954.jpg     |
| `dist/assets/community.webp` | https://ote-dance.sakura.ne.jp/ote-hp/wp-content/uploads/2023/01/DSCN0781.jpg |
| `dist/assets/kids.webp`      | https://ote-dance.sakura.ne.jp/ote-hp/wp-content/uploads/2023/01/DSC_0314.jpg |
| `dist/assets/family.webp`    | https://ote-dance.sakura.ne.jp/ote-hp/wp-content/uploads/2023/01/2064-1.jpg   |
| `dist/assets/exterior.webp`  | https://ote-dance.sakura.ne.jp/ote-hp/wp-content/uploads/2023/01/1953-1.jpg   |

Instagramの画像は取得制限のため使用していません。公式プロフィールへのリンクを掲載しています。

## 月間表とQRコード

- `dist/assets/monthly-schedule.png`：ユーザー提供の11月スケジュール画像。
- `dist/assets/line-qr.png`：ユーザー指定URL `https://line.me/R/ti/p/@jek5088j` から作成。
- `dist/assets/favicon.svg`：このサイト用に作成したシンプルなOのマーク。

## トップのイラスト

`dist/assets/dance-hero.webp` は built-in ImageGen により、この試作向けに新規生成しています。スクールの実際の生徒・講師を描写したものではありません。

### 最終プロンプト

Use case: illustration-story. Asset type: original hero illustration for the website of O・TE Dance School, a welcoming Japanese community dance school for children through adults. Primary request: fashionable editorial illustration of three joyful dancers, a child, a young adult woman and an adult man, dancing together in energetic hip-hop/jazz poses. Medium: sophisticated hand-cut paper and bold flat gouache illustration, subtle paper grain, confident organic shapes, expressive minimal faces, elongated lively silhouettes, contemporary culture magazine art direction, neither childish cartoon nor photographic. Composition: landscape 3:2, all three dancers full body with hands and feet fully visible and a generous safe margin around the scene; main dancer large in center, other two behind to the sides; asymmetrical graphic rhythm arcs and simple stars around them; do not overcrowd. Backdrop: solid warm ivory #f5f2ea, no room or furniture. Palette: coral pink #f24d67, cobalt blue #214ed2, buttery yellow #eed15c, charcoal #222222, off-white. Clothing: loose dancewear, comfortable sneakers; varied poses including arm reaching up, side step and mid-air jump. Mood: friendly, exuberant, stylish, inclusive, aspirational yet approachable. Constraints: completely original design, no text, no lettering, no logos, no watermark, no brand imitation, no realistic depiction of actual students or teachers.
