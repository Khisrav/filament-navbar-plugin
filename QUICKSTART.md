# Quick Start Guide

Get your Filament sidebar auto-collapsing in under 2 minutes!

## Step 1: Install

```bash
composer require waffentrager/filament-autohide-navbar
```

## Step 2: Done! 🎉

Yes, really! The plugin works automatically after installation.

## What You'll See

### Before Hover (Default State)
Your sidebar will be collapsed to 4rem width, showing only icons:

- ✅ Icons visible
- ❌ Text labels hidden
- ❌ Badges hidden
- ❌ Sub-navigation items hidden

### After Hover
When you hover over the sidebar, it expands to full width (16rem):

- ✅ Icons visible
- ✅ Text labels visible
- ✅ Badges visible
- ✅ Sub-navigation items visible

## Testing It

1. Open your Filament admin panel
2. Look at the sidebar - it should show only icons
3. Move your mouse over the sidebar
4. Watch it smoothly expand to show full labels
5. Move your mouse away
6. Watch it smoothly collapse back to icons

## Need More Control?

### Publish the config:
```bash
php artisan vendor:publish --tag="filament-navbar-config"
```

### Adjust settings in `config/filament-navbar.php`:

```php
return [
    'enabled' => true,              // Toggle on/off
    'collapsed_width' => '4rem',    // Icon-only width
    'transition_duration' => '0.3s', // Animation speed
    'show_tooltips' => true,        // Show labels on icon hover
];
```

## Customization Examples

### Make it wider when collapsed:
```php
'collapsed_width' => '5rem',
```

### Faster animations:
```php
'transition_duration' => '0.2s',
```

### Disable tooltips:
```php
'show_tooltips' => false,
```

## Works With Everything

This plugin seamlessly handles:
- ✅ Standard navigation items
- ✅ Items with badges (notification counts, etc.)
- ✅ Grouped navigation (with sub-items)
- ✅ User menu
- ✅ Tenant switcher
- ✅ Dark mode
- ✅ All Filament themes

## Troubleshooting

### Plugin not working?

1. Clear your cache:
```bash
php artisan filament:clear-cache
php artisan optimize:clear
```

2. Make sure you're using Filament v3:
```bash
composer show filament/filament
```

3. Check browser console for errors

### Conflicts with custom CSS?

Your custom CSS might be overriding the plugin. Make sure the plugin's CSS loads after your custom styles, or add `!important` to your overrides.

### Want to disable for a specific panel?

See the [EXAMPLES.md](EXAMPLES.md) file for instructions on disabling the plugin for specific panels.

## Support

- 📖 [Full Documentation](README.md)
- 🎨 [Visual Guide](VISUAL_GUIDE.md)
- 💡 [More Examples](EXAMPLES.md)
- 🐛 [Report Issues](https://github.com/waffentrager/filament-autohide-navbar/issues)

## Next Steps

- Explore the [EXAMPLES.md](EXAMPLES.md) for advanced usage
- Read the [VISUAL_GUIDE.md](VISUAL_GUIDE.md) to understand the behavior
- Check out the full [README.md](README.md) for customization options

Happy collapsing! 🚀

