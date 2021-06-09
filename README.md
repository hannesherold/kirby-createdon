# Kirby createdon plugin

Simple Kirby 3 Plugin to store date and time when the page was created ("created on").
<br>
Works with pages and files. A parent page can be set optionally. 



### Why?

My use case is a website project with a database-like content section. All child pages in the folder „data“ (and their children) form data-base entries. Some of these pages and files need the date and time of creation stored automatically. This is why you can optionally set a parent-page.

<br>

## Installation

### Download

Download and copy this repository to `/site/plugins/createdon`.

### Git submodule

```
git submodule add https://github.com/hannesherold/createdon.git site/plugins/createdon
```

### Composer

```
composer require hherold/createdon
```

<br>

## Options

Use the following options in your `config.php`:


```php
'hherold.createdon' => [
  'pages' => true,
  'files' => true,
  'parent' => 'data/whatever'
]
```

__pages__
<br>
Enables the plugin for pages.
<br>
_default: false_

__files__
<br>
Enables the plugin for files.
<br>
_default: false_


__parent__
<br>
Restricts the plugin to children of a specific parent. 
<br>
_Expects the slug of the parent page._
<br>
> Be careful if you change the actual slug of the parent-page you need to set the new slug here accordingly.

<br>

## Blueprint

The plugin stores date and time in a field called „createdon“ and uses the function `date('Y-m-d H:i:s‘)`.

In your blueprint, best way to output would be a disabled date field:


```yaml
createdon:
 label   : Page created on
 type    : date
 display : DD.MM.YYYY
 time    : true
 disabled: true
```

<br>

## Hooks

The plugin listens to these Kirby hooks:

`page.create:after`
<br>
`page.duplicate:after`
<br>
`file.create:after`

<br>

## Hint

If you also want to automatically store which user created the page, simply add a disabled Kirby `users` field to your blueprint:

```yaml
user:
 label   : Page created by
 type    : users
 disabled: true
 multiple: false
```

Because by design the current user is the default value for the users field, it will store the current user automatically (unless of course you specify another default value).

For reference see Kirby’s documentation of the users field:
https://getkirby.com/docs/reference/panel/fields/users#default-values

<br>

## License

MIT