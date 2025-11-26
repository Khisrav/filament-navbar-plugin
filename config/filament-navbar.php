<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Auto-Collapse Navbar
    |--------------------------------------------------------------------------
    |
    | This plugin automatically collapses the Filament sidebar to show only
    | icons by default. When hovering over the sidebar, it expands to show
    | full labels, badges, and grouped sub-items.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Enabled
    |--------------------------------------------------------------------------
    |
    | Enable or disable the auto-collapse behavior globally.
    |
    */
    'enabled' => env('FILAMENT_NAVBAR_COLLAPSE_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Collapsed Width
    |--------------------------------------------------------------------------
    |
    | The width of the sidebar when collapsed (showing only icons).
    | Default: 4rem (64px)
    |
    */
    'collapsed_width' => env('FILAMENT_NAVBAR_COLLAPSED_WIDTH', '4rem'),

    /*
    |--------------------------------------------------------------------------
    | Transition Duration
    |--------------------------------------------------------------------------
    |
    | The duration of the collapse/expand animation in seconds.
    | Default: 0.3s
    |
    */
    'transition_duration' => env('FILAMENT_NAVBAR_TRANSITION_DURATION', '0.3s'),

    /*
    |--------------------------------------------------------------------------
    | Show Tooltips
    |--------------------------------------------------------------------------
    |
    | Show tooltips with navigation item labels when sidebar is collapsed.
    | Default: true
    |
    */
    'show_tooltips' => env('FILAMENT_NAVBAR_SHOW_TOOLTIPS', true),
];

