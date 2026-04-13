<?php
/**
 * 공감마사지 Build 홈 (React homepage 정적 이식)
 * .boon-build 래퍼 + theme 전용 CSS. 그누보드 검색 파라미터(sop, sfl, stx) 사용.
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

$bb_bbs = G5_BBS_URL;
$bb_theme_css = G5_THEME_URL . '/css/boon-build.css';

/* 평점 기준 상위 10개 (listings.ts 정렬 결과와 동일) */
$bb_top_listings = array(
    array('name' => '강남출장마사지', 'phone' => '0503-6982-1011', 'link' => 'https://onmoon.co.kr/bbs/board.php?bo_table=massage&wr_id=1', 'description' => '강남 전지역 30분 내 방문, 최고의 힐링을 약속드립니다.', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262772_4146.png'),
    array('name' => '서초 출장마사지', 'phone' => '0503-6982-1016', 'link' => 'https://onmoon.co.kr/bbs/board.php?bo_table=massage&wr_id=6', 'description' => '서초/방배 지역 신속 방문. 프리미엄 아로마 테라피.', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262779_1044.png'),
    array('name' => '영등포 출장마사지', 'phone' => '0503-6982-1013', 'link' => 'https://onmoon.co.kr/bbs/board.php?bo_table=massage&wr_id=3', 'description' => '영등포 전지역 신속 방문. 피로를 싹 날려드립니다.', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262774_8138.png'),
    array('name' => '잠실 출장마사지', 'phone' => '0503-6982-1081', 'link' => 'https://onmoon.co.kr/bbs/board.php?bo_table=massage&wr_id=28', 'description' => '잠실/송파 지역 최고의 실력파 테라피스트.', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2603/73866c8751a896d8a7180b3cab683363_1772423475_4055.png'),
    array('name' => '용산 출장마사지', 'phone' => '0503-6982-1087', 'link' => 'https://onmoon.co.kr/bbs/board.php?bo_table=massage&wr_id=22', 'description' => '용산/한남 지역 고품격 방문 테라피.', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2603/a3d8c5fba4a92a97ad5bd5115d595dad_1772611388_1731.png'),
    array('name' => '마포출장마사지', 'phone' => '0503-6982-1014', 'link' => 'https://onmoon.co.kr/bbs/board.php?bo_table=massage&wr_id=4', 'description' => '마포/공덕 지역 최고의 힐링 파트너.', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262775_9178.png'),
    array('name' => '송파 출장마사지', 'phone' => '0503-6982-1015', 'link' => 'https://onmoon.co.kr/bbs/board.php?bo_table=massage&wr_id=5', 'description' => '송파/문정 지역 전문 테라피스트 방문.', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/6be7981a180c0dbd5c6299d45aba48da_1765262777_9794.png'),
    array('name' => '수원 출장마사지', 'phone' => '0503-6982-1021', 'link' => 'https://onmoon.co.kr/bbs/board.php?bo_table=massage2&wr_id=1', 'description' => '수원 전지역 최고의 테라피스트가 방문합니다.', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/1e18e42db0d520bc7b11124400f58ed7_1765266427_5952.png'),
    array('name' => '안양 출장마사지', 'phone' => '0503-6982-1027', 'link' => 'https://onmoon.co.kr/bbs/board.php?bo_table=massage2&wr_id=7', 'description' => '안양/평촌 지역 최고의 테라피 서비스.', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2512/1e18e42db0d520bc7b11124400f58ed7_1765266435_1413.png'),
    array('name' => '동탄 출장마사지', 'phone' => '0503-6982-1111', 'link' => 'https://onmoon.co.kr/bbs/board.php?bo_table=massage2&wr_id=15', 'description' => '동탄 신도시 전문 프리미엄 방문 테라피.', 'rating' => '4.9', 'imageUrl' => 'https://onmoon.co.kr/data/editor/2602/cfce70ff78b7554a3ebdf18d81d2e584_1772088438_3496.png'),
);

function bb_listing_card_html($L)
{
    $tel = preg_replace('/[^0-9+]/', '', $L['phone']);
    $fallback = 'https://onmoon.co.kr/data/editor/2512/1e18e42db0d520bc7b11124400f58ed7_1765266428_7841.png';
    ob_start();
    ?>
<div class="bb-lcard">
  <div class="bb-lcard-img-wrap">
    <img src="<?php echo htmlspecialchars($L['imageUrl'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($L['name'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" referrerpolicy="no-referrer" onerror="this.onerror=null;this.src='<?php echo $fallback; ?>';">
    <div class="bb-lcard-rating">
      <svg class="bb-icon" width="12" height="12" viewBox="0 0 24 24" fill="#c9a84c" stroke="#c9a84c" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
      <span><?php echo htmlspecialchars($L['rating'], ENT_QUOTES, 'UTF-8'); ?></span>
    </div>
  </div>
  <div class="bb-lcard-body">
    <h3><?php echo htmlspecialchars($L['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
    <p class="bb-lcard-desc"><?php echo htmlspecialchars($L['description'], ENT_QUOTES, 'UTF-8'); ?></p>
    <div class="bb-lcard-actions">
      <a class="bb-btn-tel" href="tel:<?php echo htmlspecialchars($tel, ENT_QUOTES, 'UTF-8'); ?>">
        <svg class="bb-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        전화걸기 (<?php echo htmlspecialchars($L['phone'], ENT_QUOTES, 'UTF-8'); ?>)
      </a>
      <a class="bb-btn-detail" href="<?php echo htmlspecialchars($L['link'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer">
        <svg class="bb-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
        상세보기
      </a>
    </div>
  </div>
</div>
    <?php
    return ob_get_clean();
}

$bb_marquee_html = '';
foreach (array_merge($bb_top_listings, $bb_top_listings) as $L) {
    $bb_marquee_html .= '<div class="bb-card-slide">' . bb_listing_card_html($L) . '</div>';
}

?>
<link rel="stylesheet" href="<?php echo $bb_theme_css; ?>">

<div class="boon-build">
  <section class="bb-hero">
    <div class="bb-hero-inner">
      <div class="bb-hero-row">
        <div class="bb-hero-col">
          <span class="bb-badge-pill">Premium Home Care &amp; Wellness</span>
          <h1>
            <span class="bb-line bb-text-rose-glow">신뢰할 수 있는</span>
            <span class="bb-line bb-text-rose-glow">프리미엄 홈케어</span>
            <span class="bb-line bb-text-white-glow">공감마사지</span>
          </h1>
          <p class="bb-hero-lead">엄격한 기준으로 선별된 최고의 테라피스트들이<br class="bb-br-md"> 당신의 공간으로 직접 찾아가는 프리미엄 힐링 서비스입니다.</p>
          <div class="bb-search-wrap">
            <form class="bb-search-form" action="<?php echo $bb_bbs; ?>/search.php" method="get">
              <input type="hidden" name="sop" value="and">
              <input type="hidden" name="sfl" value="wr_subject||wr_content">
              <div class="bb-search-icon" aria-hidden="true">
                <svg class="bb-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#c9a84c" stroke-width="3"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
              </div>
              <input type="text" name="stx" value="" placeholder="지역명 또는 업체명을 검색하세요" autocomplete="off">
              <button type="submit">검색하기</button>
            </form>
            <div class="bb-hot-row">
              <span class="bb-hot-label">
                <svg class="bb-icon" width="14" height="14" viewBox="0 0 24 24" fill="#f97316" stroke="#f97316" stroke-width="2"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>
                인기지역
              </span>
              <div class="bb-hot-links">
                <a href="<?php echo $bb_bbs; ?>/search.php?sop=and&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx=<?php echo rawurlencode('강남'); ?>">강남</a>
                <a href="<?php echo $bb_bbs; ?>/search.php?sop=and&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx=<?php echo rawurlencode('인천'); ?>">인천</a>
                <a href="<?php echo $bb_bbs; ?>/search.php?sop=and&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx=<?php echo rawurlencode('수원'); ?>">수원</a>
                <a href="<?php echo $bb_bbs; ?>/search.php?sop=and&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx=<?php echo rawurlencode('용인'); ?>">용인</a>
              </div>
            </div>
          </div>
        </div>
        <div class="bb-hero-visual">
          <div class="bb-hero-img-card">
            <img src="https://enjoytokyo.co.kr/wp-content/uploads/2025/09/%EC%B6%9C%EC%9E%A5%EB%A7%88%EC%82%AC%EC%A7%80_%EB%B0%B0%EB%84%882.png" alt="Premium Massage Therapy" width="1000" height="500" loading="lazy" referrerpolicy="no-referrer" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1600334129128-685c5582fd35?auto=format&amp;fit=crop&amp;q=80&amp;w=1000';">
            <div class="bb-hero-img-grad"></div>
            <div class="bb-hero-float">
              <div class="bb-glass-panel">
                <div class="bb-glass-panel-row">
                  <div class="bb-icon-circle-p">
                    <svg class="bb-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff" stroke="#fff" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  </div>
                  <div>
                    <p style="margin:0;font-weight:700;font-size:1.125rem;color:#0a192f;">평균 만족도 4.9/5.0</p>
                    <p style="margin:0;font-size:0.875rem;font-weight:500;color:rgba(10,25,47,0.9);">실제 이용 고객들의 생생한 리뷰</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bb-hero-side-card">
            <div class="bb-glass-panel-row">
              <div style="width:2.5rem;height:2.5rem;border-radius:9999px;background:rgba(16,185,129,0.1);display:flex;align-items:center;justify-content:center;">
                <svg class="bb-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              </div>
              <div>
                <p style="margin:0;font-size:0.875rem;font-weight:700;color:#faf5ed;">검증된 테라피스트</p>
                <p style="margin:0;font-size:0.75rem;color:#e6b8a2;">100% 자격증 보유</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bb-hero-cat-bar">
        <div class="bb-section-title-row">
          <div class="bb-bar-gold bb-bar-gold-lg"></div>
          <h2 class="bb-h2-cat">지역별 카테고리</h2>
        </div>
        <a class="bb-link-all" href="<?php echo $bb_bbs; ?>/search.php?sop=and&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx=">전체보기 <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
      </div>
    </div>
  </section>

  <section class="bb-region-section">
    <div class="bb-region-grid">
      <a class="bb-region-card" href="<?php echo $bb_bbs; ?>/board.php?bo_table=massage">
        <div class="bb-region-icon-wrap"><svg class="bb-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
        <span class="bb-region-name">서울</span>
      </a>
      <a class="bb-region-card" href="<?php echo $bb_bbs; ?>/board.php?bo_table=massage2">
        <div class="bb-region-icon-wrap"><svg class="bb-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/></svg></div>
        <span class="bb-region-name">경기</span>
      </a>
      <a class="bb-region-card" href="<?php echo $bb_bbs; ?>/board.php?bo_table=massage3">
        <div class="bb-region-icon-wrap"><svg class="bb-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg></div>
        <span class="bb-region-name">인천</span>
      </a>
      <a class="bb-region-card" href="<?php echo $bb_bbs; ?>/board.php?bo_table=massage4">
        <div class="bb-region-icon-wrap"><svg class="bb-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg></div>
        <span class="bb-region-name">기타</span>
      </a>
    </div>
  </section>

  <section class="bb-listing-section" aria-label="추천 마사지 업체">
    <div class="bb-listing-head">
      <div class="bb-section-title-row">
        <div class="bb-bar-gold bb-bar-gold-sm"></div>
        <h2 class="bb-h2-sm">추천 마사지 업체</h2>
      </div>
    </div>
    <div class="bb-marquee-wrap">
      <div class="bb-marquee-track"><?php echo $bb_marquee_html; ?></div>
      <div class="bb-marquee-fade-l" aria-hidden="true"></div>
      <div class="bb-marquee-fade-r" aria-hidden="true"></div>
    </div>
  </section>

  <section class="bb-price-section">
    <div class="bb-price-bg" aria-hidden="true"></div>
    <div class="bb-container bb-price-inner">
      <div class="bb-price-head">
        <span class="bb-badge-soft">Service Menu &amp; Pricing</span>
        <h2>프리미엄 <span class="bb-accent">최고의 힐링 코스</span> 안내</h2>
        <p>엄격하게 선별된 테라피스트들이 제공하는 고품격 서비스를<br class="bb-br-md"> 합리적인 가격으로 당신의 공간에서 경험해보세요.</p>
      </div>
      <div class="bb-price-grid">
        <div class="bb-pcard">
          <div class="bb-pcard-top">
            <div class="bb-pcard-spacer"></div>
            <h3><svg width="16" height="16" viewBox="0 0 24 24" fill="rgba(245,158,11,0.2)" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg><span style="flex-shrink:0">타이 코스</span><svg width="16" height="16" viewBox="0 0 24 24" fill="rgba(245,158,11,0.2)" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg></h3>
            <p class="bb-pcard-desc">전통 방식의 스트레칭과 압을 이용한 전신 케어</p>
            <div class="bb-price-rows">
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">60분</span></div><div class="bb-price-amt"><span class="bb-price-num">7만</span><span class="bb-price-krw">KRW</span></div></div>
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">90분</span></div><div class="bb-price-amt"><span class="bb-price-num">8만</span><span class="bb-price-krw">KRW</span></div></div>
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">120분</span></div><div class="bb-price-amt"><span class="bb-price-num">10만</span><span class="bb-price-krw">KRW</span></div></div>
            </div>
            <div class="bb-pcard-bottom-spacer"></div>
          </div>
          <div class="bb-pcard-foot"><a href="<?php echo $bb_bbs; ?>/search.php?sop=and&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx="><span>지역별 상담문의</span><svg class="bb-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a></div>
        </div>
        <div class="bb-pcard">
          <div class="bb-pcard-top">
            <div class="bb-pcard-spacer"></div>
            <h3><svg width="16" height="16" viewBox="0 0 24 24" fill="rgba(245,158,11,0.2)" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg><span style="flex-shrink:0">아로마 코스</span><svg width="16" height="16" viewBox="0 0 24 24" fill="rgba(245,158,11,0.2)" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg></h3>
            <p class="bb-pcard-desc">부드러운 오일 테라피로 심신의 안정을 돕는 케어</p>
            <div class="bb-price-rows">
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">60분</span></div><div class="bb-price-amt"><span class="bb-price-num">8만</span><span class="bb-price-krw">KRW</span></div></div>
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">90분</span></div><div class="bb-price-amt"><span class="bb-price-num">9만</span><span class="bb-price-krw">KRW</span></div></div>
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">120분</span></div><div class="bb-price-amt"><span class="bb-price-num">11만</span><span class="bb-price-krw">KRW</span></div></div>
            </div>
            <div class="bb-pcard-bottom-spacer"></div>
          </div>
          <div class="bb-pcard-foot"><a href="<?php echo $bb_bbs; ?>/search.php?sop=and&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx="><span>지역별 상담문의</span><svg class="bb-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a></div>
        </div>
        <div class="bb-pcard bb-pcard-ring">
          <div class="bb-pcard-tag">인기코스</div>
          <div class="bb-pcard-top">
            <div class="bb-pcard-spacer"></div>
            <h3><svg width="16" height="16" viewBox="0 0 24 24" fill="rgba(245,158,11,0.2)" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg><span style="flex-shrink:0">감성 힐링 코스</span><svg width="16" height="16" viewBox="0 0 24 24" fill="rgba(245,158,11,0.2)" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg></h3>
            <p class="bb-pcard-desc">섬세한 터치와 감각적인 릴렉싱 전문 케어</p>
            <div class="bb-price-rows">
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">60분</span></div><div class="bb-price-amt"><span class="bb-price-num">9만</span><span class="bb-price-krw">KRW</span></div></div>
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">90분</span></div><div class="bb-price-amt"><span class="bb-price-num">11만</span><span class="bb-price-krw">KRW</span></div></div>
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">120분</span></div><div class="bb-price-amt"><span class="bb-price-num">13만</span><span class="bb-price-krw">KRW</span></div></div>
            </div>
            <div class="bb-pcard-bottom-spacer"></div>
          </div>
          <div class="bb-pcard-foot"><a href="<?php echo $bb_bbs; ?>/search.php?sop=and&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx="><span>지역별 상담문의</span><svg class="bb-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a></div>
        </div>
        <div class="bb-pcard bb-pcard-ring">
          <div class="bb-pcard-tag">추천코스</div>
          <div class="bb-pcard-top">
            <div class="bb-pcard-spacer"></div>
            <h3><svg width="16" height="16" viewBox="0 0 24 24" fill="rgba(245,158,11,0.2)" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg><span style="flex-shrink:0">스페셜 코스</span><svg width="16" height="16" viewBox="0 0 24 24" fill="rgba(245,158,11,0.2)" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg></h3>
            <p class="bb-pcard-desc">타이 + 감성힐링 + 풋 케어가 결합된 프리미엄 패키지</p>
            <div class="bb-price-rows">
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">60분</span></div><div class="bb-price-amt"><span class="bb-price-num">10만</span><span class="bb-price-krw">KRW</span></div></div>
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">90분</span></div><div class="bb-price-amt"><span class="bb-price-num">12만</span><span class="bb-price-krw">KRW</span></div></div>
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">120분</span></div><div class="bb-price-amt"><span class="bb-price-num">14만</span><span class="bb-price-krw">KRW</span></div></div>
              <div class="bb-price-row"><div class="bb-price-row-left"><span class="bb-dot"></span><span class="bb-price-time">150분</span></div><div class="bb-price-amt"><span class="bb-price-num">16만</span><span class="bb-price-krw">KRW</span></div></div>
            </div>
            <div class="bb-pcard-bottom-spacer"></div>
          </div>
          <div class="bb-pcard-foot"><a href="<?php echo $bb_bbs; ?>/search.php?sop=and&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx="><span>지역별 상담문의</span><svg class="bb-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a></div>
        </div>
      </div>
      <div class="bb-price-note">
        <div class="bb-price-note-left">
          <div class="bb-check-icon-wrap"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#e68a8a" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg></div>
          <div>
            <h4>모든 코스 공통 사항</h4>
            <p>유류비 및 출장비가 모두 포함된 최종 결제 금액입니다.</p>
          </div>
        </div>
        <div class="bb-chip-row">
          <span class="bb-chip">카드결제 가능</span>
          <span class="bb-chip">현금영수증 발행</span>
          <span class="bb-chip">정찰제 운영</span>
          <span class="bb-chip">노쇼 방지 시스템</span>
        </div>
      </div>
    </div>
  </section>

  <section class="bb-features">
    <div class="bb-container">
      <div class="bb-features-panel">
        <div class="bb-features-head">
          <div class="bb-section-title-row">
            <div class="bb-bar-gold bb-bar-gold-sm"></div>
            <h2>저희 서비스만의 특별함</h2>
          </div>
        </div>
        <div class="bb-features-grid">
          <?php
          $bb_features = array(
              array('title' => '최고의 관리사', 'desc' => '전원 20대 실력파 미녀 관리사가 직접 방문합니다.'),
              array('title' => '24시간 서비스', 'desc' => '365일 언제든지 예약 가능하며 30분 이내 방문합니다.'),
              array('title' => '다양한 결제방법', 'desc' => '현금, 카드결제, 계좌이체 모두 가능합니다.'),
              array('title' => '맞춤형 케어', 'desc' => '고객의 컨디션에 맞춘 최적의 마사지를 제공합니다.'),
              array('title' => '전문 교육 이수', 'desc' => '모든 관리사는 전문적인 교육을 이수한 전문가입니다.'),
              array('title' => '편안한 출장 서비스', 'desc' => '집, 호텔, 오피스 등 고객님이 계신 곳 어디든 찾아가는 프리미엄 서비스'),
          );
          foreach ($bb_features as $f) {
              ?>
          <div class="bb-feat-item">
            <div class="bb-feat-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e68a8a" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div>
              <h3><?php echo htmlspecialchars($f['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
              <p><?php echo htmlspecialchars($f['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
          </div>
              <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <div class="bb-gallery-wrap">
    <div class="bb-gallery-panel">
      <div class="bb-gallery-head">
        <div class="bb-section-title-row">
          <div class="bb-bar-gold bb-bar-gold-lg"></div>
          <h2>마사지 갤러리</h2>
        </div>
      </div>
      <div class="bb-gallery-grid">
        <div class="bb-gal-card">
          <div class="bb-gal-img"><img src="https://onmoon.co.kr/data/editor/2512/thumb-6be7981a180c0dbd5c6299d45aba48da_1765260954_5087_835x470.jpg" alt="태국식 마사지" loading="lazy" referrerpolicy="no-referrer"></div>
          <div class="bb-gal-cap"><h3>태국식 마사지</h3></div>
        </div>
        <div class="bb-gal-card">
          <div class="bb-gal-img"><img src="https://onmoon.co.kr/data/editor/2512/thumb-6be7981a180c0dbd5c6299d45aba48da_1765260956_3011_835x470.jpg" alt="아로마 테라피" loading="lazy" referrerpolicy="no-referrer"></div>
          <div class="bb-gal-cap"><h3>아로마 테라피</h3></div>
        </div>
        <div class="bb-gal-card">
          <div class="bb-gal-img"><img src="https://onmoon.co.kr/data/editor/2512/thumb-6be7981a180c0dbd5c6299d45aba48da_1765260958_8943_835x470.jpg" alt="힐링 스웨디시" loading="lazy" referrerpolicy="no-referrer"></div>
          <div class="bb-gal-cap"><h3>힐링 스웨디시</h3></div>
        </div>
      </div>
    </div>
  </div>

  <div class="bb-rbanner-wrap">
    <div class="bb-rbanner">
      <div class="bb-rbanner-bg">
        <div class="bb-rbanner-bg-l"><img src="https://enjoytokyo.co.kr/wp-content/uploads/2025/09/%ED%9B%84%EA%B8%B0_3.png" alt="" loading="lazy" referrerpolicy="no-referrer"></div>
        <div class="bb-rbanner-bg-r" aria-hidden="true"></div>
      </div>
      <div class="bb-rbanner-inner">
        <div class="bb-rbanner-content">
          <div class="bb-rbanner-badge"><span>MASSAGE NO.1 GUIDE</span></div>
          <h2>전국 출장마사지<br><span class="bb-primary-text">지역별 바로가기</span></h2>
          <p>내 지역 출장마사지 정보를 한눈에!<br>가격 · 코스 · 후기까지 투명하게 확인하세요.</p>
          <a class="bb-rbanner-cta" href="<?php echo $bb_bbs; ?>/search.php?sop=and&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx=">
            <svg class="bb-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <span>바로가기</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <section class="bb-testi-section">
    <div class="bb-testi-deco" aria-hidden="true"></div>
    <div class="bb-testi-head">
      <div class="bb-section-title-row">
        <div class="bb-bar-gold bb-bar-gold-lg"></div>
        <h2>고객 후기</h2>
      </div>
    </div>
    <div class="bb-marquee-wrap bb-testi-marquee">
      <div class="bb-marquee-track">
        <?php
        $bb_reviews = array(
            array('name' => '김*현', 'rating' => 5, 'avatar' => 'https://picsum.photos/seed/person1/100/100', 'text' => '처음 이용해봤는데 정말 만족스러웠습니다. 관리사분이 너무 친절하시고 실력도 좋으셔서 피로가 싹 풀렸네요. 특히 어깨와 목 부분이 많이 뭉쳐있었는데, 그 부분을 집중적으로 케어해주셔서 정말 시원했습니다. 집에서 이렇게 편하게 고퀄리티 마사지를 받을 수 있다는 게 큰 장점인 것 같아요. 다음에도 꼭 다시 이용할 예정입니다. 주변 지인들에게도 적극 추천하고 싶네요!', 'date' => '2024.03.25', 'service' => '프리미엄 아로마'),
            array('name' => '이*우', 'rating' => 5, 'avatar' => 'https://picsum.photos/seed/person2/100/100', 'text' => '시간 약속도 잘 지켜주시고 매너가 너무 좋으셨어요. 집에서 편하게 받을 수 있어서 너무 좋네요. 강추합니다! 무엇보다 위생 관리가 철저하신 것 같아 안심하고 서비스를 받을 수 있었습니다. 마사지 압도 딱 적당해서 받는 내내 힐링되는 기분이었어요. 바쁜 일상 속에서 나만을 위한 소중한 시간을 보낸 것 같아 매우 만족스럽습니다. 앞으로도 자주 이용할게요.', 'date' => '2024.03.22', 'service' => '스웨디시 마사지'),
            array('name' => '박*아', 'rating' => 4, 'avatar' => 'https://picsum.photos/seed/person3/100/100', 'text' => '시설 가는 것보다 훨씬 편하고 좋네요. 관리사님 손길이 정말 꼼꼼하셔서 뭉친 근육이 다 풀린 기분이에요. 감사합니다. 처음에는 출장 마사지라고 해서 조금 걱정도 했었는데, 상담부터 예약까지 너무 친절하게 안내해주셔서 믿음이 갔습니다. 관리사님의 전문적인 테크닉 덕분에 그동안 쌓였던 스트레스가 한 번에 날아가는 것 같았어요. 정말 정성스럽게 관리해주셔서 감동받았습니다.', 'date' => '2024.03.20', 'service' => '타이 마사지'),
            array('name' => '최*준', 'rating' => 5, 'avatar' => 'https://picsum.photos/seed/person4/100/100', 'text' => '여러 곳 이용해봤지만 여기가 제일 깔끔하고 서비스가 좋네요. 상담해주시는 분도 친절하시고 관리사분 실력도 최고입니다. 특히 아로마 오일 향이 너무 좋아서 심신이 안정되는 효과도 있었던 것 같아요. 마사지 후에 따뜻한 차 한 잔 마시니 몸이 노곤노곤해지면서 꿀잠 잘 수 있었습니다. 서비스 품질이 일정하게 유지되는 것 같아 신뢰가 갑니다. 강력 추천드려요!', 'date' => '2024.03.18', 'service' => '딥티슈 테라피'),
            array('name' => '정*민', 'rating' => 5, 'avatar' => 'https://picsum.photos/seed/person5/100/100', 'text' => '정말 시원하게 잘 받았습니다. 몸이 한결 가벼워졌어요. 정기적으로 이용하고 싶네요. 평소에 자세가 안 좋아서 허리 통증이 심했는데, 관리사님이 그 부분을 정확히 파악하시고 교정해주시는 느낌으로 마사지를 해주셨습니다. 받고 나니 통증이 많이 완화되었고 움직임이 훨씬 부드러워졌어요. 실력 있는 관리사님을 만나서 정말 행운이었습니다. 조만간 또 연락드릴게요.', 'date' => '2024.03.15', 'service' => '아로마 테라피'),
            array('name' => '한*지', 'rating' => 5, 'avatar' => 'https://picsum.photos/seed/person6/100/100', 'text' => '관리사님이 너무 전문적이셔서 놀랐어요. 통증 부위를 정확히 짚어주시네요. 최고입니다. 해부학적인 지식도 있으신 것 같고, 근육의 흐름을 잘 이해하고 계신 것 같았습니다. 단순히 누르는 게 아니라 뭉친 곳을 풀어주는 기술이 남다르시더라고요. 마사지 받는 동안 설명도 잘 해주셔서 제 몸 상태에 대해 더 잘 알게 되었습니다. 전문적인 케어를 원하시는 분들께 강력 추천합니다.', 'date' => '2024.03.12', 'service' => '스포츠 마사지'),
            array('name' => '윤*성', 'rating' => 4, 'avatar' => 'https://picsum.photos/seed/person7/100/100', 'text' => '집에서 이렇게 퀄리티 높은 마사지를 받을 수 있다니 세상 참 좋아졌네요. 만족합니다. 이동하는 시간도 아낄 수 있고, 마사지 직후에 바로 내 침대에서 쉴 수 있다는 게 정말 큰 행복이네요. 서비스 구성도 알차고 가격 대비 만족도가 매우 높습니다. 관리사님도 인상이 너무 좋으시고 정중하셔서 기분 좋게 서비스를 마칠 수 있었습니다. 번창하세요!', 'date' => '2024.03.10', 'service' => '스웨디시'),
            array('name' => '송*혜', 'rating' => 5, 'avatar' => 'https://picsum.photos/seed/person8/100/100', 'text' => '피로가 누적되어 힘들었는데 마사지 받고 컨디션 회복했습니다. 친절한 서비스 감사합니다. 예약 과정도 간편하고 피드백도 빨라서 좋았습니다. 관리사님이 오실 때 필요한 물품들을 다 챙겨오셔서 제가 따로 준비할 게 전혀 없더라고요. 세심한 배려에 감사드립니다. 덕분에 이번 주말을 아주 상쾌하게 시작할 수 있을 것 같아요. 다음에 또 뵙겠습니다.', 'date' => '2024.03.08', 'service' => '프리미엄 코스'),
        );
        $bb_rev_dup = array_merge($bb_reviews, $bb_reviews);
        foreach ($bb_rev_dup as $r) {
            ?>
        <div class="bb-review-card" role="button" tabindex="0">
          <div class="bb-review-dataset" hidden>
            <span class="bb-r-name"><?php echo htmlspecialchars($r['name'], ENT_QUOTES, 'UTF-8'); ?></span>
            <span class="bb-r-service"><?php echo htmlspecialchars($r['service'], ENT_QUOTES, 'UTF-8'); ?></span>
            <span class="bb-r-date"><?php echo htmlspecialchars($r['date'], ENT_QUOTES, 'UTF-8'); ?></span>
            <span class="bb-r-rating"><?php echo (int) $r['rating']; ?></span>
            <span class="bb-r-avatar"><?php echo htmlspecialchars($r['avatar'], ENT_QUOTES, 'UTF-8'); ?></span>
            <p class="bb-r-full"><?php echo htmlspecialchars($r['text'], ENT_QUOTES, 'UTF-8'); ?></p>
          </div>
          <svg class="bb-quote-bg bb-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
          <div class="bb-stars"><?php
          for ($si = 0; $si < 5; ++$si) {
              $fill = $si < $r['rating'] ? '#e68a8a' : 'none';
              $stroke = $si < $r['rating'] ? '#e68a8a' : '#233554';
              ?>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="<?php echo $fill; ?>" stroke="<?php echo $stroke; ?>" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <?php
          }
            ?></div>
          <p class="bb-review-text">"<?php echo htmlspecialchars($r['text'], ENT_QUOTES, 'UTF-8'); ?>"</p>
          <div class="bb-review-foot">
            <div class="bb-review-user">
              <div class="bb-avatar"><img src="<?php echo htmlspecialchars($r['avatar'], ENT_QUOTES, 'UTF-8'); ?>" alt="" loading="lazy" referrerpolicy="no-referrer"></div>
              <div class="bb-review-meta">
                <h4><?php echo htmlspecialchars($r['name'], ENT_QUOTES, 'UTF-8'); ?></h4>
                <div class="bb-review-meta-sub">
                  <span><?php echo htmlspecialchars($r['service'], ENT_QUOTES, 'UTF-8'); ?></span>
                  <span><?php echo htmlspecialchars($r['date'], ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
              </div>
            </div>
            <span class="bb-review-more">더보기 +</span>
          </div>
        </div>
            <?php
        }
        ?>
      </div>
      <div class="bb-marquee-fade-l" aria-hidden="true"></div>
      <div class="bb-marquee-fade-r" aria-hidden="true"></div>
    </div>
    <div class="bb-testi-note">
      <p>실제 이용 고객님들이 남겨주신 소중한 후기입니다. (후기를 클릭하시면 전체 내용을 보실 수 있습니다.)</p>
    </div>
  </section>

  <div class="bb-how-wrap">
    <div class="bb-how-head">
      <div class="bb-section-title-row">
        <div class="bb-bar-gold bb-bar-gold-lg"></div>
        <h2>이용 방법</h2>
      </div>
    </div>
    <div class="bb-how-steps">
      <div class="bb-step-row">
        <div class="bb-step-num">1</div>
        <div class="bb-step-body"><h3>예약하기</h3><p>상담전화를 통해 원하시는 날짜, 시간, 코스를 예약해 주세요.</p></div>
        <div class="bb-step-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#c9a84c" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div>
      </div>
      <div class="bb-step-row">
        <div class="bb-step-num">2</div>
        <div class="bb-step-body"><h3>방문</h3><p>예약 시간에 맞춰 전문 관리사가 30분 이내 방문합니다.</p></div>
        <div class="bb-step-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#c9a84c" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg></div>
      </div>
      <div class="bb-step-row">
        <div class="bb-step-num">3</div>
        <div class="bb-step-body"><h3>상담</h3><p>고객님의 컨디션과 요구사항을 확인하고 최적의 마사지를 상담해 드립니다.</p></div>
        <div class="bb-step-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#c9a84c" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
      </div>
      <div class="bb-step-row">
        <div class="bb-step-num">4</div>
        <div class="bb-step-body"><h3>마사지</h3><p>선택하신 코스에 따라 전문 관리사의 정성어린 마사지를 받으세요.</p></div>
        <div class="bb-step-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#c9a84c" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
      </div>
    </div>
    <div class="bb-precautions">
      <h3>이용 시 유의사항</h3>
      <ul>
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg><span>예약시간 10분 초과 시 예약이 자동 취소될 수 있습니다.</span></li>
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg><span>폰이 꺼져있을 시 랜덤휴무 또는 마감입니다.</span></li>
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg><span>카드결제(부가세 별도) 및 계좌이체 가능합니다.</span></li>
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg><span>일부 지역은 방문이 불가능하거나 유류비가 추가될 수 있습니다.</span></li>
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg><span>과음, 비매너, 퇴폐문의 등의 경우 서비스가 제한될 수 있습니다.</span></li>
      </ul>
    </div>
  </div>

  <footer class="bb-footer">
    <div class="bb-footer-inner">
      <div class="bb-footer-top">
        <div>
          <p>예약비 없는 <span class="bb-text-accent">100% 후불제</span> 서비스로 인근지역 출장 마사지 통해 홈타이 관리를 받아보세요<br>모텔, 호텔, 오피스텔, 자택 어디든 <span class="bb-text-accent">30분 이내 방문</span>하여 고품격 힐링을 선사합니다</p>
          <p class="bb-muted">언제나 고객님의 편안한 휴식을 위해 최선을 다하겠습니다.</p>
        </div>
      </div>
      <div class="bb-footer-copy"><p>© 2026. All rights reserved.</p></div>
    </div>
  </footer>

  <div class="bb-modal-overlay" id="bbReviewModal" hidden>
    <div class="bb-modal-backdrop" data-bb-close></div>
    <div class="bb-modal-box" role="dialog" aria-modal="true" aria-labelledby="bbModalTitle">
      <button type="button" class="bb-modal-close" data-bb-close aria-label="닫기">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
      <svg class="bb-modal-quote" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
      <div class="bb-modal-body">
        <div class="bb-stars" id="bbModalStars"></div>
        <p class="bb-review-text" id="bbModalText"></p>
        <div class="bb-review-foot" style="border-top:1px solid rgba(35,53,84,0.2);margin-top:2rem;padding-top:2rem;">
          <div class="bb-review-user">
            <div class="bb-avatar bb-modal-avatar" id="bbModalAvatarWrap"></div>
            <div class="bb-review-meta">
              <h4 id="bbModalTitle"></h4>
              <div class="bb-review-meta-sub">
                <span id="bbModalService" style="font-size:0.875rem;"></span>
                <span id="bbModalDate" style="font-size:0.875rem;"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
(function () {
  var root = document.querySelector('.boon-build');
  if (!root) return;
  var modal = root.querySelector('#bbReviewModal');
  if (!modal) return;
  function closeModal() {
    modal.setAttribute('hidden', '');
    document.body.style.overflow = '';
  }
  function openFromCard(card) {
    var ds = card.querySelector('.bb-review-dataset');
    if (!ds) return;
    var name = ds.querySelector('.bb-r-name').textContent;
    var service = ds.querySelector('.bb-r-service').textContent;
    var date = ds.querySelector('.bb-r-date').textContent;
    var rating = parseInt(ds.querySelector('.bb-r-rating').textContent, 10) || 0;
    var avatar = ds.querySelector('.bb-r-avatar').textContent;
    var full = ds.querySelector('.bb-r-full').textContent;
    modal.querySelector('#bbModalTitle').textContent = name;
    modal.querySelector('#bbModalService').textContent = service;
    modal.querySelector('#bbModalDate').textContent = date;
    modal.querySelector('#bbModalText').textContent = '"' + full + '"';
    var stars = modal.querySelector('#bbModalStars');
    stars.innerHTML = '';
    for (var i = 0; i < 5; i++) {
      var fill = i < rating ? '#e68a8a' : 'none';
      var stroke = i < rating ? '#e68a8a' : '#233554';
      var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
      svg.setAttribute('width', '20');
      svg.setAttribute('height', '20');
      svg.setAttribute('viewBox', '0 0 24 24');
      svg.setAttribute('fill', fill);
      svg.setAttribute('stroke', stroke);
      svg.setAttribute('stroke-width', '2');
      var pol = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
      pol.setAttribute('points', '12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2');
      svg.appendChild(pol);
      stars.appendChild(svg);
    }
    var aw = modal.querySelector('#bbModalAvatarWrap');
    aw.innerHTML = '';
    var img = document.createElement('img');
    img.src = avatar;
    img.alt = '';
    img.referrerPolicy = 'no-referrer';
    aw.appendChild(img);
    modal.removeAttribute('hidden');
    document.body.style.overflow = 'hidden';
  }
  root.querySelectorAll('.bb-review-card').forEach(function (card) {
    card.addEventListener('click', function () { openFromCard(card); });
    card.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openFromCard(card); }
    });
  });
  modal.querySelectorAll('[data-bb-close]').forEach(function (el) {
    el.addEventListener('click', closeModal);
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && !modal.hasAttribute('hidden')) closeModal();
  });
})();
</script>
