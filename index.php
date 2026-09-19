<?php
$page = 'home';
$page_title = 'ManasAI — Intelligence for inner wellbeing';
$page_desc = 'Research wearables for personalised wellness AI. Explore SakshiSense ring and wristband concepts, raw PPG, IMU, EDA and sound, and research collaborations.';
include __DIR__ . '/partials/header.php';
?>
<section class="container home-hero">
  <div class="home-hero__copy">
    <span class="eyebrow"><i class="status-dot"></i> Research-driven startup / ManasAI</span>
    <h1>Intelligence for<br><em>inner wellbeing.</em></h1>
    <p class="hero-manifesto">Grounded in signals. Guided by research.</p>
    <p class="hero-sub">We connect wearable sensing, cutting-edge AI, consciousness research, and physical models to build personalised wellness technology. Our first focus: research-grade ring and wristband devices with raw-signal access.</p>
    <p class="hero-detail">Starting with stress &amp; anxiety, attention &amp; distraction.<br> Built for researchers. Designed around the individual.</p>
    <div class="actions"><a href="/sakshisense" class="btn btn--primary">Explore SakshiSense <span aria-hidden="true">↗</span></a><a href="/platform" class="text-link">For labs &amp; centres <span aria-hidden="true">→</span></a></div>
    <div class="hero-status"><span class="status-dot"></span> In development · Research enquiries welcome</div>
  </div>
  <?php include __DIR__ . '/partials/device-visual.php'; ?>
</section>
<div class="container signal-summary"><span>THE SIGNALS WE’RE BUILDING AROUND</span><div><b>PPG</b><span>Pulse</span></div><div><b>IMU</b><span>Movement</span></div><div><b>EDA</b><span>Skin conductance</span></div><div><b>Sound</b><span>Acoustic context</span></div></div>
<section class="container section">
  <div class="section-heading"><div><span class="eyebrow">Our four research verticals</span><h2>Four frontiers.<br><em>One human purpose.</em></h2></div><p>From accessible instruments to reservoir computing, our work connects foundational questions with practical tools for inner wellbeing.</p></div>
  <?php include __DIR__ . '/partials/research-pillars.php'; ?>
  <a class="text-link research-overview-cta" href="/research#publications">Explore the research and selected papers <span aria-hidden="true">↗</span></a>
</section>
<section class="container section section--compact" id="focus">
  <div class="section-heading"><div><span class="eyebrow">Our current focus</span><h2>Start with the person.<br><em>Learn from the signals.</em></h2></div><p>Access to raw data gives researchers room to ask better questions, define their own features, and develop models around individual baselines.</p></div>
  <div class="focus-grid">
    <article class="focus-card"><div class="focus-card__top"><span class="micro">01 / STRESS &amp; ANXIETY</span><svg viewBox="0 0 160 50" aria-hidden="true"><path d="M0 30 Q10 10 20 30 T40 30 T60 30 Q70 40 80 25 T100 25 Q115 15 130 25 T160 25"/></svg></div><h3>Understand patterns<br>of arousal and recovery.</h3><p>Explore physiological responses alongside self-reported experience to develop personalised models of stress and anxiety-related patterns.</p><a class="text-link" href="/platform#applications">Explore the research use case <span aria-hidden="true">↗</span></a></article>
    <article class="focus-card"><div class="focus-card__top"><span class="micro">02 / ATTENTION &amp; DISTRACTION</span><svg viewBox="0 0 160 50" aria-hidden="true"><path d="M0 25 H30 L35 10 L40 40 L45 25 H70 L75 8 L80 42 L85 25 H110 L115 13 L120 37 L125 25 H160"/></svg></div><h3>Study the rhythms<br>of focus and disengagement.</h3><p>Combine movement and physiological signals with task context and participant feedback to investigate attention over time.</p><a class="text-link" href="/platform#applications">Explore the research use case <span aria-hidden="true">↗</span></a></article>
  </div>
  <p class="section-footnote">Signals support investigation; they do not directly read a mental state. Models need study-specific evaluation.</p>
</section>
<section class="dark-section"><div class="container section">
  <div class="section-heading"><div><span class="eyebrow">Meet SakshiSense</span><h2>Your question.<br>Your data. <em>Your model.</em></h2></div><div><p>A ring and wristband programme built around raw-signal access. Bring your protocol, your labels, and your model-development workflow.</p><a class="text-link" href="/sakshisense#signals">Explore the planned research kit <span aria-hidden="true">↗</span></a></div></div>
  <?php include __DIR__ . '/partials/signal-explorer.php'; ?>
  <p class="section-footnote">Target modalities across the programme. Sensor combinations, streaming specifications, and availability will be confirmed for each research configuration.</p>
</div></section>

<section class="container section section--compact">
  <div class="section-heading"><div><span class="eyebrow">From sensing to understanding</span><h2>Sense. Infer. Guide. Learn.</h2></div><a class="text-link" href="/platform">Inside the platform <span aria-hidden="true">↗</span></a></div>
  <div class="steps"><article><span>01</span><h3>Sense</h3><p>Capture signals with the participant’s consent.</p></article><article><span>02</span><h3>Infer</h3><p>Develop and evaluate models against individual baselines.</p></article><article><span>03</span><h3>Guide</h3><p>Explore feedback that supports personal agency.</p></article><article><span>04</span><h3>Learn</h3><p>Refine the science with carefully governed studies.</p></article></div>
</section>
<section class="container section"><div class="cta"><div><span class="eyebrow">For labs, then wellness centres</span><h2>What would you build<br>with <em>raw signals?</em></h2><p>Tell us about your study, the signals you need, and the models you want to develop.</p></div><a href="/contact?topic=Research+kit" class="btn btn--primary">Discuss a research kit <span aria-hidden="true">↗</span></a></div><p class="careers-line">Curious about working on these questions? <a href="/careers">Explore careers &amp; internships →</a></p></section>
<?php include __DIR__ . '/partials/footer.php'; ?>
