import { mkdirSync, rmSync, writeFileSync } from 'node:fs';
import * as reicon from 'reicon';

const distDirectory = new URL('../dist/', import.meta.url);

const toKebabCase = (name) =>
    name
        .replace(/([a-z0-9])([A-Z])/g, '$1-$2')
        .replace(/([A-Z])([A-Z][a-z])/g, '$1-$2')
        .toLowerCase();

// Sizing and styling belong to Blade Icons attributes, not to the source files.
const toSvg = (icon, weight) => icon.toSvg({ weight }).replace(/ (width|height|class)="[^"]*"/g, '');

rmSync(distDirectory, { recursive: true, force: true });
mkdirSync(new URL('outline/', distDirectory), { recursive: true });
mkdirSync(new URL('solid/', distDirectory), { recursive: true });

const icons = Object.entries(reicon).filter(([, icon]) => typeof icon?.toSvg === 'function');

for (const [name, icon] of icons) {
    const filename = `${toKebabCase(name)}.svg`;
    const outline = toSvg(icon, 'Outline');
    const solid = toSvg(icon, 'Filled');

    writeFileSync(new URL(`outline/${filename}`, distDirectory), outline);

    // toSvg() falls back to the outline weight when an icon has no solid variant.
    if (solid !== outline) {
        writeFileSync(new URL(`solid/${filename}`, distDirectory), solid);
    }
}

console.log(`Exported ${icons.length} icons.`);
