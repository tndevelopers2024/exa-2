import fs from 'node:fs';
import vm from 'node:vm';
import path from 'node:path';

const theme = path.resolve('wordpress/exa-home-services');
const assets = 'https://example.test/wp-content/themes/exa-home-services/assets/';
const code = fs.readFileSync(`${theme}/assets/app.js`, 'utf8').split('// Default top picks')[0];
const context = vm.createContext({ exaSettings: {
  assets, phone: '6512345678', currency: '',
  pricing: JSON.parse(fs.readFileSync(`${theme}/assets/pricing.json`, 'utf8')),
}});
vm.runInContext(`${code}\nglobalThis.services = allServices;`, context);
for (const service of context.services) {
  if (!service.img.startsWith(assets)) throw new Error(`Image URL is outside theme: ${service.name}: ${service.img}`);
  const file = path.join(theme, 'assets', service.img.slice(assets.length));
  if (!fs.existsSync(file)) throw new Error(`Missing image: ${service.name}: ${file}`);
}
console.log(`Verified ${context.services.length} service image URLs resolve inside the WordPress theme.`);
const cleaning = context.services.filter(service => service.cat === 'cleaning');
if (new Set(cleaning.map(service => service.img)).size !== cleaning.length) {
  throw new Error('Cleaning services must each use a distinct task-specific image.');
}
console.log('Verified each cleaning service has a distinct image.');
