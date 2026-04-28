const fs = require('fs');
let html = fs.readFileSync('index.html', 'utf8');

const replacements = [
  ['#1a1a2e', '#4E0636'], // Deep primary
  ['#2d2d5e', '#620945'], // Lighter primary for gradients
  ['#2a2a4e', '#5c0740'], // Lighter primary for cards
  ['#c8963e', '#BC6587'], // Accent
  ['#e8b86d', '#E297B3'], // Light Accent
  ['rgba(200,150,62,', 'rgba(188,101,135,'],
  ['rgba(26,26,46,', 'rgba(78,6,54,']
];

for (let [oldStr, newStr] of replacements) {
  // Use regex with global flag and case insensitive
  let regex = new RegExp(oldStr.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&"), 'gi');
  html = html.replace(regex, newStr);
}

fs.writeFileSync('index.html', html, 'utf8');
console.log("Colors replaced!");
