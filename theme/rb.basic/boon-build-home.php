<?php
/**
 * GONGGAM 라이트 홈 (스크린샷 기준) — .boon-build + css/boon-build.css
 * 그누보드 검색: sop, sfl, stx 유지
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

$bb_bbs = G5_BBS_URL;
$bb_theme_css = G5_THEME_URL . '/css/boon-build.css';

/* 그리드 노출 + 필터용 태그 (스웨디시/아로마/타이/감성힐링) */
$bb_grid_listings = array(
    array('name' => '강남 프리미엄 스웨디시', 'phone' => '0503-6982-1011', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=1', 'description' => '강남 전지역 · 주차 가능 · 24시 예약', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262772_4146.png', 'f' => 'swedish'),
    array('name' => '여의도 아로마 힐링', 'phone' => '0503-6982-1038', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=11', 'description' => '여의도 · 프라이빗 1:1 · 오일 테라피', 'rating' => '4.8', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2603/73866c8751a896d8a7180b3cab683363_1772423435_6195.png', 'f' => 'aroma'),
    array('name' => '이태원 타이 케어', 'phone' => '0503-6982-1071', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=12', 'description' => '이태원 · 전통 스트레칭 · 압추', 'rating' => '4.8', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2603/73866c8751a896d8a7180b3cab683363_1772423438_3162.png', 'f' => 'thai'),
    array('name' => '홍대 감성 힐링', 'phone' => '0503-6982-1072', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=13', 'description' => '홍대/신촌 · 릴렉싱 · 감성 케어', 'rating' => '4.7', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2603/73866c8751a896d8a7180b3cab683363_1772423443_9762.png', 'f' => 'healing'),
    array('name' => '서초 스웨디시 전문', 'phone' => '0503-6982-1016', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=6', 'description' => '서초/방배 · 아로마 옵션 · 후불제', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262779_1044.png', 'f' => 'swedish'),
    array('name' => '논현 프리미엄 아로마', 'phone' => '0503-6982-1075', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=15', 'description' => '논현동 · 오일 · 심신 안정', 'rating' => '4.8', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2603/73866c8751a896d8a7180b3cab683363_1772423460_1414.png', 'f' => 'aroma'),
    array('name' => '강서 타이&스웨디시', 'phone' => '0503-6982-1017', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=7', 'description' => '강서/마곡 · 복합 코스 · 신속 방문', 'rating' => '4.7', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262776_9407.png', 'f' => 'thai'),
    array('name' => '신촌 감성 릴렉스', 'phone' => '0503-6982-1077', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=16', 'description' => '신촌/이대 · 힐링 중심 · 20대 관리사', 'rating' => '4.8', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2603/73866c8751a896d8a7180b3cab683363_1772423467_27.png', 'f' => 'healing'),
    array('name' => '영등포 출장 스웨디시', 'phone' => '0503-6982-1013', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=3', 'description' => '영등포 전역 · 30분 방문 · 카드결제', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262774_8138.png', 'f' => 'swedish'),
    array('name' => '건대 아로마 테라피', 'phone' => '0503-6982-1079', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=17', 'description' => '건대/광진 · 프리미엄 오일', 'rating' => '4.7', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2603/73866c8751a896d8a7180b3cab683363_1772423472_8489.png', 'f' => 'aroma'),
    array('name' => '잠실 타이 마사지', 'phone' => '0503-6982-1081', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=28', 'description' => '잠실/송파 · 전신 스트레칭', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2603/73866c8751a896d8a7180b3cab683363_1772423475_4055.png', 'f' => 'thai'),
    array('name' => '용산 감성 힐링 코스', 'phone' => '0503-6982-1087', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=22', 'description' => '용산/한남 · 프리미엄 감성 케어', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2603/a3d8c5fba4a92a97ad5bd5115d595dad_1772611388_1731.png', 'f' => 'healing'),
    array('name' => '마포 스웨디시', 'phone' => '0503-6982-1014', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=4', 'description' => '마포/공덕 · 오피스 맞춤 · 후기 4.9', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262775_9178.png', 'f' => 'swedish'),
    array('name' => '수원 복합 아로마', 'phone' => '0503-6982-1021', 'link' => G5_URL . '/bbs/board.php?bo_table=massage2&wr_id=1', 'description' => '수원 전역 · 오일+림프 · 주말 예약', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/1e18e42db0d520bc7b11124400f58ed7_1765266427_5952.png', 'f' => 'aroma'),
    array('name' => '안양 타이 전문', 'phone' => '0503-6982-1027', 'link' => G5_URL . '/bbs/board.php?bo_table=massage2&wr_id=7', 'description' => '안양/평촌 · 타이 정통 · 합리 가격', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/1e18e42db0d520bc7b11124400f58ed7_1765266435_1413.png', 'f' => 'thai'),
    array('name' => '동탄 감성 스웨디시', 'phone' => '0503-6982-1111', 'link' => G5_URL . '/bbs/board.php?bo_table=massage2&wr_id=15', 'description' => '동탄 신도시 · 감성+스웨 복합', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2602/cfce70ff78b7554a3ebdf18d81d2e584_1772088438_3496.png', 'f' => 'healing'),
    array('name' => '송파 프리미엄 출장', 'phone' => '0503-6982-1015', 'link' => G5_URL . '/bbs/board.php?bo_table=massage&wr_id=5', 'description' => '송파/문정 · 스웨디시 · 야간 가능', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262777_9794.png', 'f' => 'swedish'),
    array('name' => '인천 연수 아로마', 'phone' => '0503-6982-1032', 'link' => G5_URL . '/bbs/board.php?bo_table=massage3&wr_id=1', 'description' => '연수구 · 호텔 출장 · 위생 관리', 'rating' => '4.8', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/d2704a1b2169964497a8257b19420737_1765326690_6907.png', 'f' => 'aroma'),
);

$bb_fab_a = preg_replace('/[^0-9+]/', '', $bb_grid_listings[0]['phone']);
$bb_fab_b = preg_replace('/[^0-9+]/', '', $bb_grid_listings[8]['phone']);

function bb_gong_card_html($L, $idx)
{
    $tel = preg_replace('/[^0-9+]/', '', $L['phone']);
    $fallback = 'https://onmoon.co.kr/data/editor/2512/1e18e42db0d520bc7b11124400f58ed7_1765266428_7841.png';
    $show_hot = ($idx % 2) === 0;
    $show_new = ($idx % 3) !== 1;
    $f = isset($L['f']) ? htmlspecialchars($L['f'], ENT_QUOTES, 'UTF-8') : 'swedish';
    ob_start();
    ?>
<article class="g-card" data-bb-cat="<?php echo $f; ?>">
  <div class="g-card-img">
    <img src="<?php echo htmlspecialchars($L['imageUrl'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($L['name'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" referrerpolicy="no-referrer" onerror="this.onerror=null;this.src='<?php echo $fallback; ?>';">
    <div class="g-card-badges">
      <?php if ($show_hot) { ?><span class="g-badge g-badge-hot">HOT</span><?php } ?>
      <?php if ($show_new) { ?><span class="g-badge g-badge-new">NEW</span><?php } ?>
    </div>
  </div>
  <div class="g-card-body">
    <h3 class="g-card-title"><?php echo htmlspecialchars($L['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
    <p class="g-card-meta">
      <span class="g-meta-pill">출장</span>
      <span class="g-meta-pill">프리미엄</span>
      <?php echo htmlspecialchars($L['description'], ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <div class="g-card-stars" aria-label="평점 <?php echo htmlspecialchars($L['rating'], ENT_QUOTES, 'UTF-8'); ?>">
      <?php
      $r = (float) $L['rating'];
    $full = (int) min(5, max(0, round($r)));
    for ($i = 1; $i <= 5; ++$i) {
        $on = $i <= $full;
        ?>
      <svg width="16" height="16" viewBox="0 0 24 24" fill="<?php echo $on ? 'currentColor' : 'none'; ?>" stroke="<?php echo $on ? 'currentColor' : '#e5e5e5'; ?>" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        <?php
    }
    ?>
      <span class="g-rating-num"><?php echo htmlspecialchars($L['rating'], ENT_QUOTES, 'UTF-8'); ?></span>
    </div>
    <div class="g-card-foot">
      <span class="g-card-tel"><?php echo htmlspecialchars($L['phone'], ENT_QUOTES, 'UTF-8'); ?></span>
      <a class="g-call-btn" href="tel:<?php echo htmlspecialchars($tel, ENT_QUOTES, 'UTF-8'); ?>" aria-label="전화 걸기">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      </a>
    </div>
    <a class="g-card-link" href="<?php echo htmlspecialchars($L['link'], ENT_QUOTES, 'UTF-8'); ?>">상세 정보 보기 →</a>
  </div>
</article>
    <?php
    return ob_get_clean();
}

?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&family=Noto+Sans+KR:wght@300;400;500;700;900&display=swap">
<link rel="stylesheet" href="<?php echo $bb_theme_css; ?>">

<div class="boon-build">
  <header class="g-hero">
    <div class="g-container">
      <h1>진심으로 <span class="g-brand">GONGGAM</span>하는<br>완벽한 휴식의 순간</h1>
      <p class="g-hero-lead">공감마사지는 단순한 케어를 넘어 고객님의 컨디션을 최상으로 끌어올립니다.<br class="g-hide-sm"> 출장마사지 · 스웨디시 · 출장안마 전문가가 찾아갑니다.</p>
      <form class="g-search-form" action="<?php echo $bb_bbs; ?>/search.php" method="get">
        <input type="hidden" name="sop" value="and">
        <input type="hidden" name="sfl" value="wr_subject||wr_content">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" name="stx" value="" placeholder="원하시는 마사지/에스테틱을 검색해보세요" autocomplete="off">
        <button type="submit">검색</button>
      </form>
    </div>
  </header>

  <section class="g-features" aria-label="서비스 특징">
    <div class="g-container">
      <div class="g-feature-grid">
        <div class="g-feature-card">
          <div class="g-feature-ico">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <h3>출장마사지 전문</h3>
          <p>숙련된 관리사가 직접 방문하여<br>지친 몸의 피로를 즉각 해소합니다.</p>
        </div>
        <div class="g-feature-card">
          <div class="g-feature-ico">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>
          </div>
          <h3>스웨디시 케어</h3>
          <p>최고급 오일을 사용한 부드러운<br>감성 핸들링과 정서적 안정을 돕습니다.</p>
        </div>
        <div class="g-feature-card">
          <div class="g-feature-ico">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
          </div>
          <h3>출장안마 서비스</h3>
          <p>24시간 신원 보증 관리사 파견으로<br>안전하고 프라이빗한 홈 케어를 제공합니다.</p>
        </div>
      </div>
    </div>
  </section>

  <div class="g-tabs-wrap">
    <div class="g-container">
      <div class="g-tabs" role="tablist" aria-label="서비스 필터">
        <button type="button" class="g-tab is-active" data-bb-tab="all" role="tab" aria-selected="true">전체</button>
        <button type="button" class="g-tab" data-bb-tab="swedish" role="tab" aria-selected="false">스웨디시</button>
        <button type="button" class="g-tab" data-bb-tab="aroma" role="tab" aria-selected="false">아로마</button>
        <button type="button" class="g-tab" data-bb-tab="thai" role="tab" aria-selected="false">타이</button>
        <button type="button" class="g-tab" data-bb-tab="healing" role="tab" aria-selected="false">감성힐링</button>
      </div>
    </div>
  </div>

  <section class="g-grid-section" id="gonggam-grid">
    <div class="g-container">
      <div class="g-grid">
        <?php
        foreach ($bb_grid_listings as $i => $row) {
            echo bb_gong_card_html($row, $i);
        }
        ?>
      </div>
    </div>
  </section>

  <div class="g-fab-wrap" aria-hidden="false">
    <a href="tel:<?php echo htmlspecialchars($bb_fab_a, ENT_QUOTES, 'UTF-8'); ?>" title="상담 전화 1">
      <span class="g-sr-only">상담 전화</span>
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
    </a>
    <a href="tel:<?php echo htmlspecialchars($bb_fab_b, ENT_QUOTES, 'UTF-8'); ?>" title="상담 전화 2">
      <span class="g-sr-only">예약 전화</span>
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
    </a>
  </div>
</div>

<script>
(function () {
  var root = document.querySelector('.boon-build');
  if (!root) return;
  var tabs = root.querySelectorAll('.g-tab');
  var cards = root.querySelectorAll('.g-card');
  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      var v = tab.getAttribute('data-bb-tab') || 'all';
      tabs.forEach(function (t) {
        var on = t === tab;
        t.classList.toggle('is-active', on);
        t.setAttribute('aria-selected', on ? 'true' : 'false');
      });
      cards.forEach(function (card) {
        var cat = card.getAttribute('data-bb-cat') || '';
        var show = v === 'all' || cat === v;
        card.style.display = show ? '' : 'none';
      });
    });
  });
})();
</script>
