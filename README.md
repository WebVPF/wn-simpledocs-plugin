# wn-simpledocs-plugin

Simple documentation for WinterCMS website

![SimpleDocs](https://raw.githubusercontent.com/WebVPF/wn-simpledocs-plugin/main/assets/img/icons/favicon-96x96.png)

Screenshots: https://github.com/WebVPF/wn-simpledocs-plugin/issues/2

## Installing Composer

```bash
composer require webvpf/wn-simpledocs-plugin
```

## Documentation creation

To display documentation on the site, create three files (layout template and two CMS pages).

## Documentation layout template

Create a new layout for your documentation template. To do this, create a file `docs.htm` with the following content in the folder `themes/nameTheme/layouts`:

```twig
description = "Template for documentation"

[DocsMenu]
docPage = "docs/item"
==
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ this.page.title }}</title>
        <link rel="icon" type="image/png" sizes="32x32" href="/plugins/webvpf/simpledocs/assets/img/icons/favicon.ico">
        <link rel="stylesheet" href="/plugins/webvpf/simpledocs/assets/css/modern-normalize.min.css">
        <link rel="stylesheet" href="/plugins/webvpf/simpledocs/assets/css/simpledocs.css">

        {% styles %}

        {% if item.css %}
            <style>{{ item.css|raw }}</style>
        {% endif %}
    </head>
    <body>
        <aside class="docs-menubar">
            <div class="docs-logo">
                <a href="/docs">
                    <img src="/plugins/webvpf/simpledocs/assets/img/logo.png" height="32" alt="Documentation">
                    <span>Documentation</span>
                </a>
            </div>

            {% component 'DocsMenu' %}
        </aside>
        
        <main class="doc-content">
            {% page %}
        </main>

        {% scripts %}

        {% if item.js %}
            <script>{{ item.js|raw }}</script>
        {% endif %}
    </body>
</html>

```

## Documentation Pages

Now we need to create two CMS pages. One of them will display **Main documentation page**, the second - documentation records.

Both of these pages will be hidden. Hidden pages are only available to logged in users (authorized in the backend). To make your documentation available to everyone on the Internet, simply remove the `is_hidden = 1` parameter from the page settings.

### Documentation main page

Create a file `docs.htm` in the folder `themes/nameTheme/pages/docs`

```ini
title = "Documentation"
url = "/docs"
layout = "docs"
is_hidden = 1
==
<p>This is the main documentation page.</p>

```

### Documentation record output page

Create a file `item.htm` in the folder `themes/nameTheme/pages/docs`

```ini
title = "Documentation record page"
url = "/docs/:slug"
layout = "docs"
is_hidden = 1

[DocsItem]
slug = "{{ :slug }}"
stek = "wn"
theme = "default"
==
{% component 'DocsItem' %}

```

Styles for quick start connected in layout:

![simpledocs_1](https://user-images.githubusercontent.com/61043464/147873706-3d33e189-34aa-48eb-97cd-6861462476a6.jpg)

## Code highlighting

Use Markdown syntax to insert example code into the text of your document.

Before the beginning of the code and at the end, insert lines of characters <code>```</code>.

Add the identifier of the programming language or technology to which the code belongs to the first three quotes. For example, for HTML the identifier is `html`, for CSS - `css`, for JavaScript - `javascript` or a short synonym `js`.

Example of inserting PHP code:

    ```php
    public function nameFunction()
    {
        return 'Text';
    }
    ```

### Language identifiers

- [All identifiers](https://github.com/WebVPF/wn-simpledocs-plugin/wiki/highlight-%D0%92%D1%81%D0%B5-%D1%8F%D0%B7%D1%8B%D0%BA%D0%B8)
- [stack WinterCMS](https://github.com/WebVPF/wn-simpledocs-plugin/wiki/highlight-%D1%81%D1%82%D0%B5%D0%BA-WinterCMS)
