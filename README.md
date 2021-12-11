# wn-simpledocs-plugin

Simple documentation for WinterCMS website

![SimpleDocs](https://raw.githubusercontent.com/WebVPF/wn-simpledocs-plugin/main/assets/img/icons/favicon-96x96.png)

## Installing Composer

    composer require webvpf/wn-simpledocs-plugin

## Documentation creation

To display documentation on the site, create three files (layout template and two CMS pages).

## Documentation layout template

Create a new layout for your documentation template. To do this, create a file `docs.htm` with the following content in the folder `themes/nameTheme/layouts`:

```
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

        {% styles %}

        <link rel="stylesheet" href="/plugins/webvpf/simpledocs/assets/css/simpledocs.css">

        {% if item.css %}
            <style>{{ item.css|raw }}</style>
        {% endif %}
    </head>
    <body>
        <div class="docs-menubar">
            <div class="docs-logo">
                <a href="/docs">
                    <img src="/plugins/webvpf/simpledocs/assets/img/logo.png" height="32" alt="Documentation">
                    <span>Documentation</span>
                </a>
            </div>

            {% component 'DocsMenu' %}
        </div>
        
        <div class="doc-content">
            {% page %}
        </div>

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

    title = "Documentation"
    url = "/docs"
    layout = "docs"
    is_hidden = 1
    ==
    <p>This is the main documentation page.</p>

### Documentation record output page

Create a file `item.htm` in the folder `themes/nameTheme/pages/docs`

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
