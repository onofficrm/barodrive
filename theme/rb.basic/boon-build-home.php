<?php
/**
 * 바로바로운전연수 홈
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

$bb_theme_css = G5_THEME_URL . '/css/boon-build.css';
$bb_phone = '050369821101';
$bb_kakao = 'https://pf.kakao.com/_YFMJG/chat';

$bb_benefits = array(
    array('title' => '이동교육', 'text' => '집 앞에서 시작해 출퇴근길과 생활 동선까지 직접 연습합니다.', 'icon' => 'car'),
    array('title' => '보험혜택', 'text' => '교습용 종합보험 가입 차량으로 더 안심하고 배울 수 있습니다.', 'icon' => 'shield'),
    array('title' => '여성 강사 선택', 'text' => '초보 운전자의 긴장을 낮추는 친절한 강사진을 배정합니다.', 'icon' => 'user'),
    array('title' => '맞춤 커리큘럼', 'text' => '주차, 차선 변경, 고속도로, 야간운전까지 필요한 부분만 집중합니다.', 'icon' => 'check'),
);

$bb_pricing = array(
    array('type' => '수강생 자차', 'price' => '270,000', 'desc' => '본인 차량으로 바로 익숙해지는 실전 연수'),
    array('type' => '연수차 승용', 'price' => '300,000', 'desc' => '안전장치 완비 승용차로 시작하는 표준 코스'),
    array('type' => '연수차 SUV', 'price' => '320,000', 'desc' => '넓은 시야와 안정감이 필요한 분께 추천'),
);

$bb_schedule = array(
    array('period' => '1교시', 'time' => '06:00 - 08:30'),
    array('period' => '2교시', 'time' => '09:30 - 12:00'),
    array('period' => '3교시', 'time' => '12:00 - 14:30'),
    array('period' => '4교시', 'time' => '15:00 - 17:30'),
    array('period' => '5교시', 'time' => '18:00 - 20:30'),
    array('period' => '6교시', 'time' => '21:00 - 23:30'),
);

$bb_areas = array(
    array('name' => '서울', 'region' => '서울', 'phone' => '050369821101', 'link' => 'https://baro-drive.com/seoul'),
    array('name' => '강남', 'region' => '서울', 'phone' => '050369821119', 'link' => 'https://baro-drive.com/gangnam'),
    array('name' => '강북', 'region' => '서울', 'phone' => '050369821108', 'link' => 'https://baro-drive.com/gangbuk'),
    array('name' => '송파', 'region' => '서울', 'phone' => '050369821106', 'link' => 'https://baro-drive.com/songpa'),
    array('name' => '안양', 'region' => '경기', 'phone' => '050369821102', 'link' => 'https://baro-drive.com/anyang'),
    array('name' => '수원', 'region' => '경기', 'phone' => '050369821103', 'link' => 'https://baro-drive.com/suwon'),
    array('name' => '동탄', 'region' => '경기', 'phone' => '050369821105', 'link' => 'https://baro-drive.com/dongtan'),
    array('name' => '인천', 'region' => '인천', 'phone' => '050369821107', 'link' => 'https://baro-drive.com/incheon'),
);

$bb_reviews = array(
    array('text' => '선생님 덕분에 회사까지 출근 성공했습니다. 알려주신 대로 차분하게 안전운전 하겠습니다.', 'name' => '이**님', 'info' => '4일 10시간 진행'),
    array('text' => '장롱면허라 너무 막막했는데 도움 주신 덕분에 운전에 자신감이 붙었습니다.', 'name' => '김**님', 'info' => '4일 10시간 진행'),
    array('text' => '완전 생초보였는데 드라이브 스루까지 성공했어요. 삶의 질이 달라졌습니다.', 'name' => '노**님', 'info' => '3일 10시간 진행'),
);

function bb_drive_tel($phone)
{
    return preg_replace('/[^0-9+]/', '', $phone);
}

function bb_drive_icon($name)
{
    $icons = array(
        'car' => '<path d="M5 17h14l-1.3-5.2A3 3 0 0 0 14.8 9H9.2a3 3 0 0 0-2.9 2.8L5 17z"/><path d="M7 17v2"/><path d="M17 17v2"/><circle cx="8" cy="17" r="1"/><circle cx="16" cy="17" r="1"/>',
        'shield' => '<path d="M12 3l7 3v5c0 5-3.5 8.5-7 10-3.5-1.5-7-5-7-10V6l7-3z"/><path d="M9 12l2 2 4-5"/>',
        'user' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6"/><path d="M22 11h-6"/>',
        'check' => '<path d="M20 6L9 17l-5-5"/>',
        'map' => '<path d="M21 10c0 7-9 12-9 12S3 17 3 10a9 9 0 1 1 18 0z"/><circle cx="12" cy="10" r="3"/>',
        'phone' => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'message' => '<path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>',
        'clock' => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
    );

    $path = isset($icons[$name]) ? $icons[$name] : $icons['check'];
    return '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@500;700;800;900&family=Noto+Sans+KR:wght@400;500;700;900&display=swap">
<link rel="stylesheet" href="<?php echo $bb_theme_css; ?>">

<div class="boon-build">
  <section class="bb-hero">
    <div class="bb-hero-bg">
      <img src="https://baro-drive.com/data/editor/2604/thumb-398b7f93792cb2a6fa5accd1f2b2bc50_1775013604_9858_835x455.png" alt="" referrerpolicy="no-referrer">
    </div>
    <div class="bb-container bb-hero-grid">
      <div class="bb-hero-copy">
        <span class="bb-eyebrow">장롱면허 · 초보운전 · 방문연수 전문</span>
        <h1>집 앞에서 시작하는<br><em>프리미엄 1:1 방문 운전연수</em><br>초보운전, 이제 혼자 고민하지 마세요.</h1>
        <p>서울, 경기, 인천부터 전국 주요 도시까지 원하는 장소와 시간에 맞춰 친절한 전문 강사가 직접 찾아갑니다.</p>
        <div class="bb-hero-actions">
          <a class="bb-btn bb-btn-orange" href="tel:<?php echo bb_drive_tel($bb_phone); ?>"><?php echo bb_drive_icon('phone'); ?> 바로 전화상담</a>
          <a class="bb-btn bb-btn-white" href="<?php echo htmlspecialchars($bb_kakao, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener"><?php echo bb_drive_icon('message'); ?> 카카오톡 상담</a>
        </div>
        <div class="bb-stats" aria-label="서비스 신뢰 지표">
          <div><strong>1:1</strong><span>맞춤 방문연수</span></div>
          <div><strong>365</strong><span>평일/주말 가능</span></div>
          <div><strong>100%</strong><span>보험 가입 차량</span></div>
        </div>
      </div>
      <div class="bb-hero-card">
        <img src="https://baro-drive.com/data/editor/2604/thumb-398b7f93792cb2a6fa5accd1f2b2bc50_1775010159_9804_835x1193.jpg" alt="방문 운전연수" referrerpolicy="no-referrer">
        <div class="bb-floating-card">
          <span><?php echo bb_drive_icon('shield'); ?></span>
          <strong>사고 걱정 없는 연수</strong>
          <p>보험 가입 차량과 단계별 커리큘럼으로 안전하게 시작합니다.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="bb-section bb-objections">
    <div class="bb-container">
      <div class="bb-section-head">
        <h2>걱정하지 마세요, 저희가 해결해 드립니다.</h2>
        <p>초보 운전자가 가장 많이 걱정하는 3가지, 바로바로운전연수가 답해드립니다.</p>
      </div>
      <div class="bb-three">
        <article><strong>장롱면허 탈출</strong><p>망설일수록 더 어려워집니다. 지금이 가장 빠른 타이밍입니다.</p></article>
        <article><strong>겁 많은 초보도 가능</strong><p>처음부터 차근차근 누구나 할 수 있게 만들어드립니다.</p></article>
        <article><strong>주차, 결국은 됩니다</strong><p>공식만 알면 어렵지 않습니다. 짧은 시간 안에 익숙해집니다.</p></article>
      </div>
    </div>
  </section>

  <section class="bb-section bb-service" id="bb-service">
    <div class="bb-container bb-service-grid">
      <div>
        <span class="bb-kicker">Premium Service</span>
        <h2>왜 바로바로운전연수일까요?</h2>
        <p>고객님이 계신 곳 어디든 강사님이 직접 방문합니다. 자차 또는 안전장치가 완비된 연수차를 선택하고, 필요한 코스만 집중해서 배울 수 있습니다.</p>
        <blockquote>안전한 운전, 자신감의 시작입니다.</blockquote>
      </div>
      <div class="bb-benefit-grid">
        <?php foreach ($bb_benefits as $benefit) { ?>
        <article class="bb-benefit-card">
          <span><?php echo bb_drive_icon($benefit['icon']); ?></span>
          <h3><?php echo htmlspecialchars($benefit['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
          <p><?php echo htmlspecialchars($benefit['text'], ENT_QUOTES, 'UTF-8'); ?></p>
        </article>
        <?php } ?>
      </div>
    </div>
  </section>

  <section class="bb-section" id="bb-schedule">
    <div class="bb-container">
      <div class="bb-section-head">
        <h2>교육시간 안내</h2>
        <p>스케줄은 조절 가능하며 평일, 주말 365일 모두 진행 가능합니다.</p>
      </div>
      <div class="bb-schedule-grid">
        <div class="bb-course-box">
          <h3>맞춤형 교육 코스</h3>
          <ul>
            <li><strong>2일 교육</strong><span>1일 5시간 교육</span></li>
            <li><strong>3일 교육</strong><span>1일 3시간 또는 4시간 교육</span></li>
            <li><strong>4일 교육</strong><span>1일 2시간 30분씩 교육</span></li>
          </ul>
          <p>* 50분 수업, 10분 휴식으로 진행됩니다.</p>
        </div>
        <div class="bb-time-box">
          <h3><?php echo bb_drive_icon('clock'); ?> 상세 시간표</h3>
          <?php foreach ($bb_schedule as $row) { ?>
          <div><strong><?php echo $row['period']; ?></strong><span><?php echo $row['time']; ?></span></div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <section class="bb-section bb-pricing" id="bb-pricing">
    <div class="bb-container">
      <div class="bb-section-head">
        <h2>교육 비용 안내</h2>
        <p>투명하고 합리적인 가격으로 프리미엄 연수 서비스를 경험하세요.</p>
      </div>
      <div class="bb-price-grid">
        <?php foreach ($bb_pricing as $i => $plan) { ?>
        <article class="bb-price-card <?php echo $i === 1 ? 'is-featured' : ''; ?>">
          <h3><?php echo htmlspecialchars($plan['type'], ENT_QUOTES, 'UTF-8'); ?></h3>
          <p><?php echo htmlspecialchars($plan['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
          <strong><?php echo htmlspecialchars($plan['price'], ENT_QUOTES, 'UTF-8'); ?><span>원</span></strong>
          <ul>
            <li>방문 연수 포함</li>
            <li>보험 가입 완료</li>
            <li>친절한 강사 배정</li>
            <li>커리큘럼 맞춤형</li>
          </ul>
        </article>
        <?php } ?>
      </div>
    </div>
  </section>

  <section class="bb-section bb-reviews">
    <div class="bb-container">
      <div class="bb-section-head">
        <h2>고객 만족 후기</h2>
        <p>경험 많은 강사진의 교육으로 안전과 자신감 회복에 집중합니다.</p>
      </div>
      <div class="bb-review-grid">
        <?php foreach ($bb_reviews as $review) { ?>
        <article>
          <p>"<?php echo htmlspecialchars($review['text'], ENT_QUOTES, 'UTF-8'); ?>"</p>
          <div><strong>이름 : <?php echo htmlspecialchars($review['name'], ENT_QUOTES, 'UTF-8'); ?></strong><span><?php echo htmlspecialchars($review['info'], ENT_QUOTES, 'UTF-8'); ?></span></div>
        </article>
        <?php } ?>
      </div>
    </div>
  </section>

  <section class="bb-section bb-areas" id="bb-areas">
    <div class="bb-container">
      <div class="bb-section-head">
        <h2>전국 어디서나 만나보세요</h2>
        <p>원하시는 지역에서 편하게 받는 운전연수, 지금 상담으로 시작해보세요.</p>
      </div>
      <div class="bb-area-grid">
        <?php foreach ($bb_areas as $area) { ?>
        <article>
          <span><?php echo htmlspecialchars($area['region'], ENT_QUOTES, 'UTF-8'); ?></span>
          <h3><?php echo bb_drive_icon('map'); ?> <?php echo htmlspecialchars($area['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
          <div>
            <a href="<?php echo htmlspecialchars($area['link'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener">상세보기</a>
            <a href="tel:<?php echo bb_drive_tel($area['phone']); ?>">전화상담</a>
          </div>
        </article>
        <?php } ?>
      </div>
    </div>
  </section>

  <footer class="bb-footer">
    <p>© 2026 바로바로운전연수. All rights reserved.</p>
  </footer>

  <div class="bb-mobile-cta">
    <a href="tel:<?php echo bb_drive_tel($bb_phone); ?>"><?php echo bb_drive_icon('phone'); ?> 전화상담</a>
    <a href="<?php echo htmlspecialchars($bb_kakao, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener"><?php echo bb_drive_icon('message'); ?> 카톡상담</a>
  </div>
</div>
