Macro
=====

Create small functions in template. Simple but powerful plugin!

"Macros are comparable with functions in regular programming languages. They are useful to put often used HTML idioms into reusable elements to not repeat yourself." (c) Twig

Installing
----------
1. Drop the **\_add-ons/macro** folder into the **/\_add-ons/** folder.
2. Use in template.


Usage
-----

### For example create macros **"my_block"**:

```html
{{ macro name="my_block" }}
  <div class="block">{{ text }}</div>
{{ /macro }}
```

### Execute macros {{ macro:* }}:

```
{{ macro:my_block text="It Works!" }}
```

You can use any params in execute macros.

Also you can use the tag pair.

```html
{{ macro name="my_pair_block" }}
  <div class="block">
    <h2>{{ title }}</h2>
    <p>{{ content }}</p>
  </div>
{{ /macro }}
```

If macros is not created, then tag `{{ macro:* }}` return content in pair tag.

### Use pair tag:

```
{{ macro:my_pair_block title="Cool" }}
    Very powerful!
{{ /macro:my_pair_block }}
```
Set parameter use_context to «true» if you need use global tags scope.

```html
{{ macro:my_pair_block use_context=«»true }}
    <h1>{{ title }}</h1>
		<p>{{ content }}</p>
{{ /macro:my_pair_block }}
```


Macros in partials
------------------

You can put your macros in partials file. For access macros in partials, just use default tag **{{ theme:partial }}**.

For example, macros in file **partials/macros.html**.

```
{{ theme:partial src="macros" }}
{{ macro:company active="{ segment_1 }" }}
```

From template to layout
-----------------------

Sometimes it is necessary to send data from remplate to the layout.

### Example:

**In Layout default.html**

```html
{{ macro:head_meta }}
  <meta name="description" content="My cool example site."/>
{{ /macro:head_meta }}
```

**In template post.html**

```html
{{ macro name="head_meta" }}
<meta property="og:title" content="{{ title }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url }}" />
<meta property="og:image" content="{{ poster }}" />
<meta property="og:description" content="{{ content }}" />
{{ /macro }}
```
