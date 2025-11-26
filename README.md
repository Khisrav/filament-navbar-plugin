# Filament Auto-Collapse Navbar Plugin

A FilamentPHP v3 plugin that automatically collapses the sidebar navigation to show only icons, and expands on hover to reveal full labels, badges, and grouped sub-items.

📖 **[Quick Start Guide](QUICKSTART.md)** | 🎨 **[Visual Guide](VISUAL_GUIDE.md)** | 💡 **[Examples](EXAMPLES.md)**

## Features

- 🎯 **Auto-collapse**: Sidebar shows only icons by default
- 🖱️ **Hover to expand**: Full sidebar with labels appears on hover
- 🎨 **Smooth transitions**: Elegant animations for better UX
- 📱 **Badge support**: Badges appear when sidebar is expanded
- 📂 **Group support**: Handles grouped navigation items with sub-links
- 🌙 **Dark mode**: Full dark mode support
- 💡 **Tooltips**: Shows item names as tooltips when collapsed
- ⚡ **Zero configuration**: Works out of the box

## Requirements

- PHP 8.1 or higher
- FilamentPHP v3.x
- Laravel 10.x or higher

## Installation

Install the package via Composer:

```bash
composer require khisrav/filament-autohide-navbar
```

That's it! The plugin will automatically register itself and apply the auto-collapse behavior to your Filament sidebar.

### Optional: Publish Configuration

To customize the plugin's behavior, you can publish the configuration file:

```bash
php artisan vendor:publish --tag="filament-navbar-config"
```

This will create a `config/filament-navbar.php` file where you can adjust:
- Enable/disable the plugin
- Collapsed width
- Transition duration
- Tooltip visibility

## How It Works

The plugin automatically:
1. **Collapsed State (Default)**: Shows only navigation icons (width: 4rem)
2. **Expanded State (On Hover)**: Shows full navigation with labels, badges, and sub-items (width: 16rem)
3. **Smooth Transitions**: All changes are animated with CSS transitions
4. **Tooltips**: When collapsed, hovering over an item shows its label as a tooltip

## Behavior

### When Collapsed (Not Hovering)
- Only icons are visible
- Sidebar width: 4rem
- Icons are centered
- Badges are hidden
- Group sub-links are hidden
- Tooltips appear on hover

### When Expanded (Hovering)
- Full labels are visible
- Sidebar width: 16rem (default)
- Badges are visible
- Grouped items show their sub-links
- Normal Filament navigation behavior

## Customization

### Adjusting Collapsed Width

If you want to customize the collapsed width, add this to your `resources/css/app.css` or custom CSS file:

```css
aside.fi-sidebar:not(:hover) {
    width: 5rem !important; /* Change from default 4rem */
}
```

### Adjusting Expanded Width

The expanded width uses Filament's CSS variable. You can customize it in your panel provider:

```php
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ... other configuration
        ->sidebarWidth('18rem'); // Default is 16rem
}
```

### Adjusting Transition Speed

Add this to your custom CSS:

```css
aside.fi-sidebar {
    transition: width 0.5s ease-in-out !important; /* Change from default 0.3s */
}
```

### Disable Tooltips

If you don't want tooltips when collapsed, add this to your custom CSS:

```css
aside.fi-sidebar:not(:hover) .fi-sidebar-item:hover::after,
aside.fi-sidebar:not(:hover) .fi-sidebar-group-button:hover::after {
    display: none !important;
}
```

## Compatibility

This plugin is compatible with:
- ✅ Standard navigation items
- ✅ Navigation items with icons
- ✅ Navigation items with badges
- ✅ Grouped navigation items (with sub-links)
- ✅ User menu
- ✅ Tenant switcher
- ✅ Dark mode
- ✅ Custom themes

## Support

If you encounter any issues or have questions, please [open an issue](https://github.com/Khisrav/filament-autohide-navbar/issues) on GitHub.

## License

This package is open-source software licensed under the [MIT license](LICENSE).

## Credits

- [Khisrav](https://github.com/Khisrav)
- [All Contributors](../../contributors)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

