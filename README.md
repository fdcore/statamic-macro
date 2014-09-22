Macro
==============

Create small functions in template.

"Macros are comparable with functions in regular programming languages. They are useful to put often used HTML idioms into reusable elements to not repeat yourself." (c) Twig

Installing
----------
1. Drop the add-ons/macro folder into the /_add-ons/ folder.
2. Use in template.


Usage
-----

For example create macros "my_block":

```
{{ macro name="my_block" }}
  <div class="block">{{ text }}</div>
{{ /macro }}
```

Execute macros:

```
{{ macro:my_block text="It Works!" }}
```

You can use any params in execute macros.

Also you can use the tag pair.

```
{{ macro name="my_pair_block" }}
  <div class="block">
    <h2>{{ title }}</h2>
    <p>{{ content }}</p>
  </div>
{{ /macro }}
```

Use pair tag:

```
{{ macro:my_pair_block title="Cool" }}
    Very powerfull!  
{{ /macro:my_pair_block }}
```
