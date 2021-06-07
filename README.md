# createdon

Simple Kirby 3 Plugin to store date and time when the page was created ("created on") with optional parent page.

## Why?

My use case is a website project with a database-like content section. All child pages in the folder „database“ (and their children) form data-base entries. Some of these pages need the date and time of creation stored automatically. This is why you can optionally set a parent-page.

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

## Options

Use the following options in your `config.php`:


```php
'hherold.timestamp' => [
  'enabled' => true,                // default: false
  'parent' => 'database/whatever'   // default: false
]
```

___enabled___
<br>
enables/disables the plugin

___parent___
<br>
Use `parent` if you want to restrict timestamp function to children of a specific parent. The option expects the slug of the parent.
<br>
*Be careful* if you change the actual slug of the parent-page you need to set the new slug here accordingly.



## Blueprint

The plugin stores date and time in a field called „timestamp“ and uses the function `date('Y-m-d H:i:s‘)`.

In your blueprint, best way to output would be a disabled date field:


```yaml
timestamp:
 label   : Page created at
 type    : date
 display : DD.MM.YYYY
 time    : true
 disabled: true
 width   : 1/2
```



## Hooks

The plugin listens to these Kirby hooks:

`page.create:after`
<br>
`page.duplicate:after`



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


## License

MIT