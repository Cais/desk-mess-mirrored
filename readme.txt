=== Desk Mess Mirrored Readme (readme.txt) ===
= Last Updated July 16, 2011 =
* This file was introduced with version 1.7 of Desk Mess Mirrored and will be maintained with future releases. The following information may be found and/or updated as needed:
* This file was renamed to the more standard readme.txt 2010 August 27.

== Contents ==
* Basic FAQ
* Notes
* TODO items
* changelog.txt extended details
* Review Tickets

== Basic FAQ ==
= Q: Does the theme support multi-level, or drop-down menus? =
A: Yes, as of version 1.8; with significant improvements in version 1.8.7!

= Q: Why does a second "Home" tab appear in the menu? =
A: The theme programmatically creates a "Home" link in the default menu if the reader goes to a page that is not considered the 'home' or 'front page' of the site as set under: Settings | Reading > Front page displays > A static page: Front page.
It is recommended to not use a page titled "Home" due to this (see TODO below).

= Q: Why does the tack above the widget not appear sometimes? =
A: The easiest solution to this issue is to either insure there is always a title used for every widget; if you wish to not have any text in that particular widget using a `space` (`&nbsp;`) will work very well.
Also to note, if you use the escape sequence `&nbsp;` you may notice the widget title is empty afterward. `&nbsp;` (without the backticks) is a `non-breaking space` and appears as such.

= Q: How do I use the new BNS Dynamic Copyright function? =
A: The function now accepts four (4) parameters. Leaving the function as is will produce the copyright statement as it was produced in version prior to 1.8.5
Using the following parameters you can change the copyright statment accordingly:
- start: This is generally the primary statement of copyright including whatever license you may choose to use
- copy_years: This is the years dynamically calculated from published posts
- url: The default will point back to the 'home' page of the website using the website's title as the anchor text
- end: A closing statement, such as the default, All Rights Reserved.
It is also recommended to use this functionality in a Child-Theme versus modifying the original Theme template file(s).

== Notes ==
* Always use a title in every widget or the push-pin top of the widget box will not resolve correctly, even a single space will work.
* add_custom_image_header() is not implemented as it will not handle multiple header images; in the case of this theme, there are three (3) being used in the header.

== TODO ==
= Short Term Goals =
*[x] Ticket 418: meta information generator is handled by wordpress this should be removed in the header.php
*[x] Address spacing issue for comment from fields (user not logged in)
*[x] Ticket 418: sticky tab menubar not handling children or grandchildren
*[x] Ticket 418: Review and re-work graphics use for menu items to display drop-down or multi-level menus (long-term)
*[x] Review `editor-style.css` file, address image alignments
*[x] Clean up new functionality of `bns_dynamic_copyright`
*[ ] Review / Update 404.php page
*[ ] Review obviousness of comment link (read: balloon)
*[x] Move supported browsers minimum to LTE IE7 ... NB: Theme is only tested and supported in current browsers as noted in the changelog file.
*[ ] Review adding 'category.php' template back into theme files (also consider 'tag.php', 'date.php' etc.)

= Long Term Goals =
*[-] Correct widget no title / no image issue ... may not have a solution; use a `space` in the title as a work-around.
*[ ] Review second "Home" page scenarios for possible solutions
*[ ] Clean up i18n strings for better translation ... or, remove internationalization altogether?!
*[-] Theme Options? (Not likely.)

== Changelog.txt ==
* see changelog.txt for brief details

== Review Tickets ==
* http://themes.trac.wordpress.org/ticket/418
* http://themes.trac.wordpress.org/ticket/1016
* http://themes.trac.wordpress.org/ticket/1027
* http://themes.trac.wordpress.org/ticket/1935
* http://themes.trac.wordpress.org/ticket/1946
* http://themes.trac.wordpress.org/ticket/3196
* http://themes.trac.wordpress.org/ticket/4108
* http://themes.trac.wordpress.org/ticket/4206
* http://themes.trac.wordpress.org/ticket/4322
* http://themes.trac.wordpress.org/ticket/4549
* http://themes.trac.wordpress.org/ticket/4556 - version 1.9