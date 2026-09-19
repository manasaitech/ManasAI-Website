(() => {
  'use strict';
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.nav-list');
  if (toggle && nav) {
    const close = () => { nav.classList.remove('is-open'); toggle.setAttribute('aria-expanded', 'false'); toggle.setAttribute('aria-label', 'Open menu'); };
    toggle.addEventListener('click', () => {
      const open = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(open));
      toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    });
    nav.querySelectorAll('a').forEach(a => a.addEventListener('click', close));
    document.addEventListener('keydown', e => { if (e.key === 'Escape' && nav.classList.contains('is-open')) { close(); toggle.focus(); } });
    document.addEventListener('click', e => { if (!e.target.closest('nav')) close(); });
    window.matchMedia('(min-width: 801px)').addEventListener('change', close);
  }
  const descriptions = {
    ppg: 'Optical pulse waveforms for exploring pulse timing and variation, with signal quality and motion taken into account.',
    imu: 'Movement and orientation signals to study activity and stillness, add context, and identify motion artefacts in other channels.',
    eda: 'Skin conductance changes for exploring arousal and recovery alongside task events and participant reports.',
    sound: 'Acoustic signals for study-defined context and sound features. Audio capture requires explicit consent and a clear collection plan.'
  };
  const value = (type, x) => {
    if (type === 'ppg') { const t = (x % 140) / 140; return 72 - 58 * Math.exp(-Math.pow((t - .22) / .10, 2)) - 19 * Math.exp(-Math.pow((t - .49) / .15, 2)); }
    if (type === 'imu') return 50 + 13 * Math.sin(x / 22) + 8 * Math.sin(x / 7) + 9 * Math.cos(x / 38);
    if (type === 'eda') return 75 - 19 * Math.sin(x / 195) - 37 * Math.exp(-Math.pow((x - 400) / 85, 2)) - 27 * Math.exp(-Math.pow((x - 780) / 65, 2));
    return 50 + (8 + 25 * Math.pow(Math.sin(x / 120), 4)) * Math.sin(x * .65) + 7 * Math.cos(x * .17);
  };
  document.querySelectorAll('[data-signal-explorer]').forEach(explorer => {
    const buttons = explorer.querySelectorAll('[data-signal]');
    const select = type => {
      buttons.forEach(button => button.setAttribute('aria-pressed', String(button.dataset.signal === type)));
      explorer.querySelector('[data-signal-description]').textContent = descriptions[type];
      let d = '';
      for (let x = 0; x <= 1000; x += 2) d += `${x ? 'L' : 'M'}${x} ${value(type, x).toFixed(2)} `;
      explorer.querySelector('[data-wave]').setAttribute('d', d);
    };
    buttons.forEach(button => button.addEventListener('click', () => select(button.dataset.signal)));
    select('ppg');
  });
})();
