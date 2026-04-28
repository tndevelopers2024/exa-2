const puppeteer = require('puppeteer');
(async () => {
  const browser = await puppeteer.launch({ headless: 'new' });
  const page = await browser.newPage();
  page.on('console', msg => console.log('PAGE LOG:', msg.text()));
  await page.setViewport({ width: 375, height: 812 });
  await page.goto('http://localhost:8081/index.html', { waitUntil: 'networkidle0' });
  await page.screenshot({ path: 'screenshot.png' });
  await page.click('button[onclick="toggleMenu()"]');
  await page.waitForTimeout(500);
  await page.screenshot({ path: 'screenshot_menu.png' });
  await browser.close();
})();
