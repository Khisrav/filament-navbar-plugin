# Visual Guide

This document explains the visual behavior of the Filament Auto-Collapse Navbar Plugin.

## States Overview

### State 1: Collapsed (Default - Not Hovering)

```
┌─────┐
│  🏠 │  <- Home (icon only)
│  📄 │  <- Posts (icon only)
│  👥 │  <- Users (icon only)
│  ⚙️  │  <- Settings (icon only)
└─────┘
   4rem width
```

**Characteristics:**
- Sidebar width: 4rem (64px)
- Only icons visible
- No text labels
- No badges
- Grouped items collapsed
- Icons centered

### State 2: Expanded (Hovering)

```
┌──────────────────────┐
│  🏠  Home            │
│  📄  Posts      [3]  │  <- Badge visible
│  👥  Users           │
│  ▼  Settings         │  <- Group indicator
│    ⚙️  General       │  <- Sub-item
│    🔔  Notifications │  <- Sub-item
└──────────────────────┘
      16rem width
```

**Characteristics:**
- Sidebar width: 16rem (256px)
- Icons + text labels visible
- Badges appear next to items
- Grouped items show their sub-links
- Normal Filament navigation layout

## Transition Animation

The transition between states is smooth and animated:

```
Collapsed (4rem) ───────► Expanded (16rem)
                 0.3s ease

Expanded (16rem) ◄─────── Collapsed (4rem)
                 0.3s ease
```

**Animation Timeline:**
1. **On Mouse Enter** (Hover Start):
   - Width expands from 4rem to 16rem (300ms)
   - Text labels fade in with delay (300ms + 100ms delay)
   - Badges fade in with delay (300ms + 100ms delay)
   - Group items slide into view

2. **On Mouse Leave** (Hover End):
   - Text labels fade out immediately (200ms)
   - Badges fade out immediately (200ms)
   - Width collapses from 16rem to 4rem (300ms)
   - Group items hide immediately

## Tooltip Behavior (When Collapsed)

When the sidebar is collapsed, hovering over individual items shows tooltips:

```
┌─────┐
│  🏠 │────► [ Home ]  <- Tooltip appears on hover
│  📄 │
│  👥 │
└─────┘
```

**Tooltip Characteristics:**
- Appears on right side of icon
- Contains the full item label
- Gray background (dark mode compatible)
- Appears after brief hover
- Disappears when cursor moves away

## Example Scenarios

### Scenario 1: Simple Navigation Items

**Collapsed:**
```
┌─────┐
│  🏠 │  Dashboard
│  📄 │  Posts
│  👥 │  Users
│  📊 │  Analytics
└─────┘
```

**Expanded:**
```
┌──────────────────────┐
│  🏠  Dashboard       │
│  📄  Posts           │
│  👥  Users           │
│  📊  Analytics       │
└──────────────────────┘
```

### Scenario 2: Navigation with Badges

**Collapsed:**
```
┌─────┐
│  🏠 │  Dashboard
│  📄 │  Posts (badge hidden)
│  👥 │  Users (badge hidden)
│  🔔 │  Notifications (badge hidden)
└─────┘
```

**Expanded:**
```
┌──────────────────────────┐
│  🏠  Dashboard           │
│  📄  Posts          [12] │ <- Draft count
│  👥  Users           [3] │ <- New users
│  🔔  Notifications  [45] │ <- Unread count
└──────────────────────────┘
```

### Scenario 3: Grouped Navigation (Most Complex)

**Collapsed:**
```
┌─────┐
│  🏠 │  Dashboard
│  📁 │  Content (group icon, sub-items hidden)
│  👥 │  Users (group icon, sub-items hidden)
└─────┘
```

**Expanded:**
```
┌──────────────────────────┐
│  🏠  Dashboard           │
│  ▼  Content              │ <- Group expanded
│    📄  Posts        [12] │ <- Sub-item with badge
│    📁  Categories        │ <- Sub-item
│    🏷️   Tags             │ <- Sub-item
│  ▼  Users                │ <- Group expanded
│    👤  All Users     [3] │ <- Sub-item with badge
│    🛡️   Roles            │ <- Sub-item
│    🔒  Permissions       │ <- Sub-item
└──────────────────────────┘
```

## CSS Transitions Applied

| Element | Property | Duration | Timing |
|---------|----------|----------|--------|
| Sidebar | width | 0.3s | ease-in-out |
| Labels | opacity | 0.3s | ease-in-out |
| Labels | width | 0.3s | ease-in-out |
| Badges | opacity | 0.3s | ease-in-out |
| Icons | margin | 0.3s | ease-in-out |
| Groups | display | instant | - |

## Responsive Behavior

### Desktop (> 1024px)
- Plugin active
- Sidebar collapses/expands on hover

### Tablet/Mobile (< 1024px)
- Plugin respects Filament's default mobile behavior
- Standard mobile menu used

## Dark Mode

The plugin fully supports Filament's dark mode:

**Light Mode:**
- Tooltips: Dark gray background, white text
- Sidebar: Light background

**Dark Mode:**
- Tooltips: Medium gray background, light text
- Sidebar: Dark background

## Browser Compatibility

- ✅ Chrome/Edge (all versions)
- ✅ Firefox (all versions)
- ✅ Safari (all versions)
- ✅ Opera (all versions)

All modern browsers support the CSS transitions used in this plugin.

