<?php

declare(strict_types=1);

it('compiles an outline icon', function (): void {
    expect(svg('reicon-o-add')->toHtml())->toBe(
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M6 12H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 18V6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    );
});

it('compiles a solid icon', function (): void {
    expect(svg('reicon-s-add')->toHtml())->toBe(
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM18 12.75H12.75V18C12.75 18.41 12.41 18.75 12 18.75C11.59 18.75 11.25 18.41 11.25 18V12.75H6C5.59 12.75 5.25 12.41 5.25 12C5.25 11.59 5.59 11.25 6 11.25H11.25V6C11.25 5.59 11.59 5.25 12 5.25C12.41 5.25 12.75 5.59 12.75 6V11.25H18C18.41 11.25 18.75 11.59 18.75 12C18.75 12.41 18.41 12.75 18 12.75Z" fill="currentColor"/></svg>',
    );
});

it('adds classes to icons', function (): void {
    expect(svg('reicon-o-add', 'w-6 h-6 text-gray-500')->toHtml())->toStartWith(
        '<svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">',
    );
});

it('adds styles to icons', function (): void {
    expect(svg('reicon-o-add', ['style' => 'color: #555'])->toHtml())->toStartWith(
        '<svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">',
    );
});
