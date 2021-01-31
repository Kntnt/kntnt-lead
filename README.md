# Kntnt Lead

WordPress plugin that adds a lead paragraph to selected post types.

## Description

A *lead* is an introductory paragraph that summarizes the body text's central ideas that follow it and attract further reading. Usually, a lead has a different appearance (e.g. bold) than the body text that follows it. This plugin provides leads to post selected post types and allow you to style them.

## How to use

### Enable lead field

This plugin makes it possible to enable lead for selected post types. Visit its setting page and check the post types that should have a lead (e.g. post and page).

Now, when editing a post of a post type with lead enabled, you will see a lead field between title and the body text. Use it to enter the lead, which should be just a single paragraph.

### Output lead field

If for a post type, it's ok to put the lead at the top of the body text, wrapped in HTML that you decide and style by CSS you control, then it is enough to enable output for that post type in the settings.

The HTML used to output the lead is provided by the setting *Output HTML*. Use `%s` where you want the lead to be. By default, the HTML is

```HTML
<p class="lead">%s</p>
```

On pages where the lead is outputted, a CSS-file is enqueued with the content of *Output CSS*. By default, the CSS is

```CSS
.lead {
  font-weight: bold;
  font-style: italic;
}
```

### Shortcode

If you have a theme with hooks (e.g. [Kadence Pro](https://kadence-theme.com/)) or a theme builder (e.g. [Beaver Themer](https://www.wpbeaverbuilder.com/beaver-themer/), [Elementor Pro](https://elementor.com/features/theme-builder/) och [Oxygen](https://oxygenbuilder.com/)), and want precise control on where and how the lead is outputted for a particular content type, then you can disable the output and instead use the shortcode `[kntnt-lead]`. The shortcode will be replaced with the lead itself.

### Texturizing the lead

By default, WordPress transform quotes, apostrophes, dashes, ellipses and more to typographic ditto, following your locale. This process is called texturization.

You can choose to enable or disable texturization on the lead field on the setting page. The setting applies both for leads added to content of post types for which this is enabled and for output though the shortcode `[kntnt-lead]`.

However, the shortcode can override this setting by adding the attribute `texturize`, which can take the values `on` and `off`. Thus, `[kntnt-lead texturize=off]` will always output the lead field's content "as is".

### Lead as default for excerpt

A lead should not be confused with an excerpt. [WordPress excerpts](https://wordpress.org/support/article/excerpt/) are used to summarize the content on archive pages and similar. If you don't provide a hand-crafted excerpt, the first 55 words of the post are used as a default.

This plugin offers you to use the lead as default instead of the first 55 words. Just enable it on the setting page.

If using this option, and the lead is empty, this plugin uses the first paragraph, regardless of its length, as the excerpts default value.    

## For developers

This plugin provides a filter `kntnt-lead-HTML` that allows developers to change the HTML before outputting it above body text. This can be used, for example, if you wish to insert a byline between the lead and the body text.

```PHP
/**
* Filters the HTML added at the beginning of the content.
*
* @param string $html     The HTML to be added to the content.
* @param string $lead     The content of the lead field.
* @param string $template The HTML-template from setting page.
*/
$html = apply_filters( 'kntnt-lead-html', $html, $lead, $template );
```

## Requirements

This plugin requires PHP 7.1 or later.

Currently, this plugin requires you to have [Advanced Custom Fields (ACF)](https://wordpress.org/plugins/advanced-custom-fields/) installed and activated.

## Installation

[Download latest version](https://github.com/Kntnt/kntnt-lead/releases/latest) to your computer, and [upload it to WordPress](https://wordpress.org/support/article/managing-plugins/#manual-upload-via-wordpress-admin).

You can also install it with [*GitHub Updater*](https://github.com/afragen/github-updater), which gives you the additional benefit of keeping the plugin up to date the usual way. Please see its [wiki](https://github.com/afragen/github-updater/wiki) for more information.

## Frequently Asked Questions

### Where is the setting page?

Look for `Kntnt Lead` in the Settings menu.

### Why do I need Advanced Custom Fields (ACF)?

Advanced Custom Fields (ACF) provides a means to add custom fields to the WordPress user interface. This plugin uses it to add the lead field on selected posts types.

Technically, it would be straightforward to eliminate the dependency by [implementing a custom metabox](https://developer.wordpress.org/plugins/metadata/custom-meta-boxes/). Still, since Kntnt currently uses ACF on all sites we build, we have chosen this path. If anyone wants to contribute with an implementation that provides an identical or nicer field than the provided ACF, we would gratefully accept it.

### How do I know if there is a new version?

This plugin is currently [hosted on GitHub](https://github.com/kntnt/kntnt-lead); one way would be to ["watch" the repository](https://docs.github.com/en/github/managing-subscriptions-and-notifications-on-github/about-notifications#notifications-and-subscriptions).

If you prefer WordPress to nag you about an update and let you update from within its administrative interface (i.e. the usual way), you must [download *GitHub Updater*](https://github.com/afragen/github-updater/releases/latest) to your computer and [upload it to WordPress and activate it](https://github.com/afragen/github-updater/wiki/Installation#upload). Please see its [wiki](https://github.com/afragen/github-updater/wiki) for more information. 

### How can I get help?

If you have questions about the plugin, and cannot find an answer here, start by looking at [issues](https://github.com/kntnt/kntnt-lead/issues) and [pull requests](https://github.com/kntnt/kntnt-lead/pulls). If you still cannot find the answer, feel free to ask in the plugin's [issue tracker](https://github.com/kntnt/kntnt-lead/issues) at Github.

### How can I report a bug?

If you have found a potential bug, please report it on the plugin's [issue tracker](https://github.com/kntnt/kntnt-lead/issues) at Github.

### How can I contribute?

Contributions to the code or documentation are much appreciated.

If you are unfamiliar with Git, please date it as a new issue on the plugin's [issue tracker](https://github.com/kntnt/kntnt-lead/issues) at Github.

If you are familiar with Git, please make a pull request.

## Changelog

### 1.0.0

The initial release of a fully functional plugin.
