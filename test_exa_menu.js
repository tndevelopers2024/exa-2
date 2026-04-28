const puppeteer = require('puppeteer');
(async () => {
  const browser = await puppeteer.launch({ headless: 'new' });
  const page = await browser.newPage();
  await page.setViewport({ width: 375, height: 812 });
  await page.goto('https://exa-test.netlify.app/', { waitUntil: 'networkidle0' });
  // find the hamburger button. It might have an SVG or classes.
  // let's click the first button that has a typical hamburger SVG or just the class for hamburger.
  // Since we don't know the exact selector, we'll try to find an element with 'menu' or svg that looks like a hamburger.
  const html = await page.content();
  const fs = require('fs');
  fs.writeFileSync('exa_source.html', html);
  await browser.close();
})();
