=== All Bootstrap Blocks ===
Contributors: areoimiles
Tags: Bootstrap, Bootstrap Blocks, Bootstrap 5, Gutenberg, Gutenberg Blocks, Blocks, Layout Blocks
Requires at least: 5
Tested up to: 6.0
Requires PHP: 7
Stable tag: 1.2.5
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create fully responsive Bootstrap 5 page layouts. 37 free blocks including containers, rows, columns, modals, accordions, cards, buttons and much more.

== Description ==

== All Bootstrap Blocks is 100% free ==

Introducing All Bootstrap Blocks. The fastest and most simple way to create fully responsive Bootstrap 5 layouts directly in the WordPress editor with a live preview! Plus we've included blocks for all of the Bootstrap components, including modals, accordions, cards and much more.

It's time for **[All Bootstrap Blocks](https://areoi.io/all-bootstrap-blocks/?utm_source=wp-repo&utm_medium=link&utm_campaign=readme)**.

== Quick and easy Bootstrap customisation ==

All Bootstrap Blocks automatically includes both the Bootstrap CSS and JS, and provides a simple to use interface for managing all of your Bootstrap settings... without coding. Easily setup your colours, fonts, spacing and everything else. If you want more control over Bootstrap you can simply turn this feature off and include your own Bootstrap files.

Check out all of the **[available customisations](https://areoi.io/all-bootstrap-blocks/features/customisations/?utm_source=wp-repo&utm_medium=link&utm_campaign=readme).**

== Fully responsive layout blocks with live preview ==

Build responsive, mobile-first layouts directly in the WordPress editor with a live preview. All layout blocks allow you to set device specific settings across 6 different breakpoints and include all of the Bootstrap settings like alignment, ordering and much more without needing to write a single line of code.

Check out all of the **[available layout blocks](https://areoi.io/all-bootstrap-blocks/features/layout/?utm_source=wp-repo&utm_medium=link&utm_campaign=readme).**

= 6 responsive layout blocks =

- **Strip**.
- **Container**.
- **Row**.
- **Column**.
- **Column Break**.
- **Div**.

== 20+ Bootstrap component blocks ==

We've created blocks for all of the Bootstrap components from accordions and modals to buttons and cards. All blocks preview directly in the block editor, work seamlessly with other WordPress blocks and have loads of options so you can tailor them to your needs. 

Check out all of the **[available components](https://areoi.io/all-bootstrap-blocks/features/components/?utm_source=wp-repo&utm_medium=link&utm_campaign=readme).**

= 20+ component blocks =

- **Accordion**.
- **Alert**.
- **Breadcrumb**.
- **Button**.
- **Button group**.
- **Card**.
- **Card group**.
- **Carousel**.
- **Collapsible content**.
- **List group**.
- **Modal**.
- **Navs & tabs**.
- **Offcanvas**.
- **Progress bar**.
- **Spinner**.
- **Toast**.
- **+ much more**

== **NEW** 1,600+ Bootstrap icons ==

We've created a NEW icon block that provides access to over 1,600 high quality Bootstrap icons with the ability to add them directly in to the block editor.

Check out all of the **[available icons](https://icons.getbootstrap.com/).**

== **NEW** 5 prebuilt layout blocks (BETA) ==

We've just released 5 prebuilt layout blocks so you can create full pages in seconds. Under the hood all of these blocks utilise the functionlaity that Bootstrap provides and make it easy to overlay your own styles to make them unique.

= 5 prebuilt strip blocks =

- **Banner**.
- **Content with Media**.
- **Content Grid**.
- **Post Grid**.
- **Media Grid**.

== Full documentation available ==

We have pulled together full, in-depth documentation explaining how to use every one of our custom blocks. 

You can read the **[full documentation here](https://areoi.io/all-bootstrap-blocks/documentation/?utm_source=wp-repo&utm_medium=link&utm_campaign=readme).**

If you have any questions or are unsure about how something works then please don't hesitate to reach out to us on our **[support forum here](https://wordpress.org/support/plugin/all-bootstrap-blocks/).**

== Screenshots ==
1. Automatically include Bootstrap or include your own version
2. Manage all of your Bootstrap settings in the dashboard
3. Create responsive layouts directly in the editor
4. Choose from over 20 component blocks (Carousels)
5. Choose from over 20 component blocks (Modals)
7. Choose from over 20 component blocks (Accordions)

== Installation ==
1. Upload the `all-bootstrap-blocks` directory into the `/wp-content/plugins/` directory
1. Activate the plugin through the `Plugins` menu in WordPress
1. Start adding blocks

== Frequently Asked Questions ==

= Which versions of Bootstrap are supported?  =

All Bootstrap Blocks supports Bootstrap version 5.

= Is Bootstrap included? =

Bootstrap is included. However you have the ability to switch this off in your WordPress dashboard if you would like to include your own version of Bootstrap. [Read the documentation here](https://areoi.io/all-bootstrap-blocks/documentation/getting-started/settings/?utm_source=wp-repo&utm_medium=link&utm_campaign=readme). 

= Do you want to suggest a feature or report a bug? =

[Please add any feature requests or bugs within the support section.](https://wordpress.org/support/plugin/all-bootstrap-blocks/)

== Changelog ==

= 1.2.5 =
* FIX: ScssPHP conflicting with other plugins
* FEATURE: Added Reset All to Bootstrap settings

= 1.2.4 =
* FIX: Forcing max-width to 100% on all WordPress blocks
* FEATURE: Added icons to buttons

= 1.2.3 =
* FIX: Open in new tab not working on a number of blocks
* Fix: Carousel doesn't auto scroll

= 1.2.2 =
* FEATURE: Enabled exporting and importing All Bootstrap Blocks settings
* UPDATE: Made compatible with WPML translator
* FIX: PHP notice displaying on 404 page
* FIX: Updated default value to array for post grid > post_ids
* FIX: Removed additional class being added to post grid block

= 1.2.1 =
* UPDATE: Allow up to 6 columns on post grid / content grid 
* FIX: Change card sizes to use min-height instead of height
* FIX: Make sure prepend title overlays any backgrounds that are added
* FIX: Post grid has rogue </div> which is closing page up
* FIX: Changing banner size doesn't update size on the front end
* FIX: Pagination not working - doesn't go to page 2 etc
* FIX: Include max_execution time in compiling of Bootstrap to make sure there is enough time to finish ini_set('max_execution_time', '300');
* UPDATE: Update media grid to use php to render front end view and make sure it matches formatting in Builder
* FIX: Change screenshot for icon block and add screenshot for media grid
* UPDATE: Allow images to be cover or inline - media grid / content grid
* UPDATE: Allow height to be set if inline selected - media grid / content grid
* UPDATE: Allow selection of custom post types within post grid
* UPDATE: Allow max height and width on media images and content grid images
* UPDATE: Add Extra small to media size for content grid images container
* FIX: Content grid not going the full width

= 1.2.0 =
* FEATURE: Added icon block
* FEATURE: Added strip blocks (in beta)

= 1.1.2 =
* FIX: Size option missing from modal block

= 1.1.1 =
* FIX: Auto complete Bootstrap classes not working within sub directory setup

= 1.1.0 =
* FEATURE: Added quick search for Bootstrap classes above additional classes field
* FEATURE: Enabled control over where All Bootstrap Blocks css gets added to page
* FEATURE: Added custom icons to each block
* FEATURE: Enabled using theme.json to populate Bootstrap settings
* FEATURE: Enabled block templates to be overridden in theme

= 1.0.5 =
* FIX: Accented characters formatting incorrectly within the carousel block

= 1.0.4 =
* FIX: AREOI specific classes impacting other theme styles

= 1.0.3 =
* FIX: Background colour not showing when not using included Bootstraps
* FIX: Background videos not auto playing if they have sound
* FIX: Colour not pre-selected for background
* FIX: Not able to click the bottom block within a column

= 1.0.2 =
* When upgrdaing the plugin to a new version the compiled scss was being changed. We have added in functionality to re compile all bootstrap files after upgrade.

= 1.0.1 =
* With the option to hide the core button and column blocks, blocks from other plugins were being hidden. We have updated the functionality to only excluded the selected blocks and made sure no other plugins are impacted by our code.