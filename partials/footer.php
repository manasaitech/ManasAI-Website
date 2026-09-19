</main>
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="/" class="brand"><img src="/app_icon.png" alt="" width="38" height="38"><span>Manas<span class="brand-ai">AI</span></span></a>
        <p>Intelligence for inner wellbeing.<br>Grounded in signals. Guided by research.</p>
        <a class="footer-email" href="mailto:admin@manasai.tech">admin@manasai.tech ↗</a>
      </div>
      <div><h2>Explore</h2><ul><li><a href="/sakshisense">SakshiSense</a></li><li><a href="/platform">Platform</a></li><li><a href="/research">Research overview</a></li><li><a href="/devices">AI-powered devices</a></li><li><a href="/ai-applications">AI applications</a></li><li><a href="/consciousness-research">Consciousness research</a></li><li><a href="/physical-ai">Physical AI</a></li></ul></div>
      <div><h2>Company</h2><ul><li><a href="/company">About &amp; team</a></li><li><a href="/careers">Careers &amp; internships</a></li><li><a href="/contact">Contact</a></li></ul></div>
      <div><h2>Start a conversation</h2><p>Building a study or a wellness model?</p><a class="text-link" href="/contact?topic=Research+kit">Tell us what you need <span aria-hidden="true">↗</span></a></div>
    </div>
    <div class="footer-note">SakshiSense is in development for research and wellness use. This generation is not a medical device and is not intended for diagnosis or treatment. Device illustrations are concepts; final hardware may differ.</div>
    <div class="footer-bottom">
      <p>© <?= date('Y') ?> <?= htmlspecialchars($company['legal_name'] ?: 'ManasAI') ?>. All rights reserved.</p>
      <a href="/privacy">Privacy</a>
    </div>
    <?php if ($company['cin'] || $company['registered_office']): ?>
    <p class="legal-details"><?php if ($company['cin']): ?>CIN: <?= htmlspecialchars($company['cin']) ?>. <?php endif; ?><?= htmlspecialchars($company['registered_office']) ?></p>
    <?php endif; ?>
  </div>
</footer>
<script src="/assets/js/main.js?v=3" defer></script>
</body>
</html>
