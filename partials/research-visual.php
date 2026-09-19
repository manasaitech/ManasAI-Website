<figure class="research-visual">
  <div class="research-visual__head"><span>MANASAI / RESEARCH <?= research_escape($vertical['number']) ?></span><span>CONCEPTUAL VIEW</span></div>
  <svg viewBox="0 0 620 420" role="img" aria-label="<?= research_escape(['ai'=>'Context, model, and evaluation as connected stages of AI research','physical'=>'A time-varying input connected to a recurrent reservoir and a learned readout','consciousness'=>'Experience, observation, and interpretation connected around a shared research question'][$vertical['graphic']]) ?>">
    <defs><pattern id="research-grid" width="28" height="28" patternUnits="userSpaceOnUse"><path d="M28 0H0V28" fill="none" stroke="#7fb6e1" stroke-opacity=".07" stroke-width=".7"/></pattern><linearGradient id="research-gradient" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#1d68ba"/><stop offset="1" stop-color="#33d0dd"/></linearGradient><marker id="research-arrow" viewBox="0 0 10 10" refX="9" refY="5" markerWidth="6" markerHeight="6" orient="auto-start-reverse"><path d="M1 1L9 5L1 9" fill="none" stroke="#67c6df" stroke-width="1.2"/></marker></defs>
    <rect width="620" height="420" fill="url(#research-grid)"/>
    <?php if ($vertical['graphic'] === 'physical'): ?>
    <g stroke="#4b87b5" fill="none" stroke-width="1"><path d="M120 210H190" marker-end="url(#research-arrow)"/><path d="M421 210H485" marker-end="url(#research-arrow)"/><ellipse cx="307" cy="210" rx="109" ry="115" stroke-dasharray="3 8" opacity=".5"/></g>
    <g stroke="#62cfe1" fill="none" stroke-width="1.5"><path d="M35 210h12l7-20 8 42 8-70 8 88 8-50 8 10h26"/><path d="M496 240Q512 158 527 217T559 186T594 210"/></g>
    <?php $nodes = [[236,159],[301,125],[370,162],[403,227],[350,286],[278,304],[222,245],[294,215],[338,200]]; ?>
    <g stroke="url(#research-gradient)" stroke-opacity=".65" stroke-width="1.1" fill="none">
    <?php foreach ([[0,1],[1,2],[2,3],[3,4],[4,5],[5,6],[6,0],[0,7],[1,8],[2,8],[3,7],[4,8],[5,7],[6,7],[7,8]] as [$a,$b]): ?><path d="M<?= $nodes[$a][0] ?> <?= $nodes[$a][1] ?>L<?= $nodes[$b][0] ?> <?= $nodes[$b][1] ?>"/><?php endforeach; ?>
    <path d="M290 125C275 68 363 65 372 154" marker-end="url(#research-arrow)"/>
    </g><g fill="#102f57" stroke="#6ad3e5" stroke-width="1.5"><?php foreach ($nodes as [$x,$y]): ?><circle cx="<?= $x ?>" cy="<?= $y ?>" r="7"/><?php endforeach; ?></g><circle cx="294" cy="215" r="3" fill="#90e7f0"/>
    <g fill="#bfd5eb" font-family="sans-serif" font-size="12" text-anchor="middle"><text x="80" y="305">Input history</text><text x="310" y="356">Structured dynamics</text><text x="539" y="305">Readout</text></g>
    <g fill="#629bbd" font-family="monospace" font-size="9" text-anchor="middle"><text x="307" y="41">MIXING / MEMORY / STABILITY</text><text x="310" y="382">A RESERVOIR-COMPUTING RESEARCH DIRECTION</text></g>
    <?php elseif ($vertical['graphic'] === 'ai'): ?>
    <g fill="#102d51" stroke="#355d83"><rect x="43" y="96" width="150" height="90" rx="8"/><rect x="43" y="217" width="150" height="90" rx="8"/><rect x="233" y="143" width="156" height="132" rx="8"/><rect x="433" y="143" width="148" height="132" rx="8"/></g>
    <g fill="none" stroke="#62c7df" stroke-width="1.1"><path d="M193 141H210V196H233" marker-end="url(#research-arrow)"/><path d="M193 262H210V222H233" marker-end="url(#research-arrow)"/><path d="M389 209H433" marker-end="url(#research-arrow)"/><path d="M507 275V346H311V275" stroke-dasharray="4 6" marker-end="url(#research-arrow)"/></g>
    <g fill="#c4ddec" font-family="sans-serif" font-size="14" text-anchor="middle"><text x="118" y="149">Signals</text><text x="118" y="270">Context</text><text x="311" y="232">Model</text><text x="507" y="232">Evaluate</text></g>
    <g stroke="#70d8e4" fill="none" stroke-width="1.2"><circle cx="311" cy="191" r="18"/><path d="M293 191h36M311 173v36M298 178l26 26M324 178l-26 26"/><path d="M485 193l13 11 26-29"/></g>
    <g fill="#6eaccb" font-family="monospace" font-size="9" text-anchor="middle"><text x="310" y="56">EVIDENCE + CONTEXT → USEFUL INFERENCE</text><text x="409" y="371">QUESTION / TEST / REFINE</text></g>
    <?php else: ?>
    <g fill="none" stroke="url(#research-gradient)" stroke-width="1.2"><ellipse cx="310" cy="205" rx="175" ry="85"/><ellipse cx="310" cy="205" rx="175" ry="85" transform="rotate(60 310 205)"/><ellipse cx="310" cy="205" rx="175" ry="85" transform="rotate(120 310 205)"/><circle cx="310" cy="205" r="54" fill="#102f55"/><circle cx="310" cy="205" r="65" stroke-dasharray="2 7" opacity=".5"/></g>
    <g fill="#95e4ee"><circle cx="161" cy="159" r="5"/><circle cx="448" cy="153" r="5"/><circle cx="310" cy="365" r="5"/></g>
    <g fill="#c3dbec" font-family="sans-serif" text-anchor="middle"><text x="310" y="199" font-size="12">A shared</text><text x="310" y="218" font-size="12">question</text><text x="122" y="111" font-size="14">Experience</text><text x="498" y="111" font-size="14">Observation</text><text x="310" y="403" font-size="14">Interpretation</text></g>
    <g fill="none" stroke="#41698c" stroke-width="1"><path d="M148 124L160 149"/><path d="M472 125L453 144"/></g>
    <text x="310" y="30" fill="#6eaccb" font-family="monospace" text-anchor="middle" font-size="9">FIRST-PERSON + EMPIRICAL + PHILOSOPHICAL</text>
    <?php endif; ?>
  </svg>
  <figcaption><?= research_escape(['ai'=>'Context-sensitive models. Evidence-led evaluation.','physical'=>'A conceptual architecture, not benchmark results.','consciousness'=>'Complementary evidence. Careful interpretation.'][$vertical['graphic']]) ?></figcaption>
</figure>
