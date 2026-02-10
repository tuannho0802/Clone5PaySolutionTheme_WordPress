# 🖐️ FivePay Clone Theme

> A high-performance, lightweight WordPress theme designed to replicate the robust 5Pay Solution interface. Built with a **Hybrid Architecture** combining classic PHP templates with modern Gutenberg Block Patterns.

![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-blue?logo=wordpress&style=flat-square)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php&style=flat-square)
![CSS3](https://img.shields.io/badge/CSS3-Flexbox%2FGrid-1572B6?logo=css3&style=flat-square)
![Version](https://img.shields.io/badge/Version-1.0.0-green?style=flat-square)

---

## 📖 Table of Contents

- [✨ Key Features](#-key-features)
- [📂 Folder Structure](#-folder-structure)
- [🚀 Installation](#-installation)
- [🧩 Pattern System](#-pattern-system)
- [🎨 Customization & Assets](#-customization--assets)
- [🖱️ JavaScript Effects](#-javascript-effects)

---

## ✨ Key Features

| Feature                 | Description                                                                                        |
| :---------------------- | :------------------------------------------------------------------------------------------------- |
| **⚡ Hybrid Core**      | Combines `header.php`/`footer.php` reliability with Gutenberg's flexibility.                       |
| **🧩 Smart Patterns**   | Pre-built block patterns for **Hero**, **Blog Grid**, **Solutions**, and **Contact** pages.        |
| **🎨 Modular CSS**      | Styles are split into `base`, `layout`, `components`, and page-specific files for optimal loading. |
| **🖱️ Interactive UI**   | Custom cursor tracking with **Fireworks Effect** 🎆 and smart sticky headers.                      |
| **📱 Fully Responsive** | Mobile-first design ensuring perfect rendering on all devices.                                     |
| **🧹 Clean Code**       | No heavy frameworks (Bootstrap/Tailwind) – just pure, optimized CSS variables.                     |

---

## 📂 Folder Structure

The theme follows a strict organizational pattern to keep assets and logic separate.

```plaintext
fivepay-clone/
├── 📄 style.css              # Theme declaration & metadata
├── 📄 functions.php          # Core logic, enqueues, & pattern registration
├── 📄 index.php              # Fallback template
├── 📄 header.php             # Global header (Logo, Nav)
├── 📄 footer.php             # Global footer (Links, Copyright)
├── 📄 template-home.php      # Custom Homepage template
├── 📂 assets/
│   ├── 📂 css/               # Modular Stylesheets
│   │   ├── base.css          # Variables & Reset
│   │   ├── layout.css        # Grid system & Wrappers
│   │   ├── components.css    # Buttons, Cards, Inputs
│   │   ├── blog.css          # Blog specific styles
│   │   └── effects.js        # Visual interactions
│   ├── 📂 js/                # JavaScript logic
│   └── 📂 img/               # Static image assets
└── 📂 patterns/              # Gutenberg Block Patterns (PHP)
    ├── hero.php              # Homepage Hero
    ├── blog-grid.php         # 3-Column Blog Layout
    ├── contact-form.php      # Contact Page Layout
    └── ...
```

---

## 🚀 Installation

1.  **Upload:**
    - Copy the `fivepay-clone` folder to your WordPress `wp-content/themes/` directory.
2.  **Activate:**
    - Go to **Appearance > Themes** in your WordPress Dashboard.
    - Locate **FivePay Clone** and click **Activate**.
3.  **Setup Homepage:**
    - Create a new page (e.g., "Home").
    - In **Page Attributes**, select **Template: Home Page**.
    - Go to **Settings > Reading** and set "Your homepage displays" to this new static page.

---

## 🧩 Pattern System

This theme uses a **"Naked Block"** philosophy. Instead of hardcoding HTML in PHP files, we register **Block Patterns** that users can insert via the Gutenberg Editor.

### How to Use Patterns:

1.  Open any Page or Post in the WordPress Editor.
2.  Click the **+ (Plus)** button to add a block.
3.  Go to the **Patterns** tab.
4.  Select categories like **5Pay Theme**, **5Pay Blog**, or **5Pay Contact**.
5.  Click a pattern (e.g., _Blog List Grid_) to insert it.

> **💡 Developer Note:**
> Patterns are defined in the `patterns/` directory. They contain standard HTML with WordPress Block Comments.
> Example: `<!-- wp:group --> ... <!-- /wp:group -->`.

---

## 🎨 Customization & Assets

### CSS Architecture

We avoid a single massive `style.css`. Instead, styles are loaded modularly:

- `base.css`: Contains CSS Variables (`:root`) for colors, fonts, and spacing. **Edit this to change the global theme!**
- `layout.css`: Handles the grid, header, footer, and main containers.
- `components.css`: Buttons, Input fields, and reusable UI cards.
- `blog.css`: Specific styles for the Blog Grid and typography.

### Changing Brand Colors

Open `assets/css/base.css` and modify the root variables:

```css
:root {
  --color-primary: #1f5dae; /* Main Brand Blue */
  --color-secondary: #222222; /* Dark Text */
  --color-success: #28a745; /* Success Green */
}
```

---

## 🖱️ JavaScript Effects

The theme includes a custom `effects.js` file that powers:

1.  **Smart Sticky Header:** Hides when scrolling down, reveals when scrolling up.
2.  **Cursor Tracking:** A subtle custom cursor follows the mouse.
3.  **Fireworks Effect:**
    - **Burst:** Explodes colorful particles when hovering interactive elements.
    - **Trail:** Leaves a sparkling trail as you move the mouse.
    - **Brand Colors:** Particles use the official 5Pay palette (Blue/Orange/White).

---

**Developed with ❤️ by Tuannho0802 (With Agent) for Clone FivePay Solution.**
