=== Desk Mess Mirrored Readme (readme.txt) ===
* Last revised March 1, 2012
* This file was introduced with version 1.7 of Desk Mess Mirrored and will be maintained with future releases.
* This file was renamed to the more standard readme.txt August 27, 2010.

== Contents ==
* Licensing
* Screenshots
* Basic FAQ
* Notes
* TODO items
* Changelog
* Review Tickets

== Licensing ==
All theme items are licensed under the GNU General Public License v2; or, as the case may be, individually noted.
This may not be construed as overriding any item with a previously applied license, stated or not, which will take precedence.

== Screenshots ==
2. screenshot-2.png - Description: No Menu
3. screenshot-3.png - Description: Live at BuyNowShop.com
4. screenshot-4.png - Description: Showcasing the drop-down menu with mutliple levels

== Basic FAQ ==
= Q: Why is there a >>Page Link<< at the bottom of my pages? Can I hide it?
A: The idea is to provide an easy to copy permalink for the article so readers can more easily share the page with others. You can hide this text by adding `div.page-shortlink{ display:none; }` to your stylesheet.

= Q: Where did my conversation balloons go? =
A: The conversation balloons now only show based on the following criteria:

1. The post is not password protected; and,
2. Comments are open *or* at least one (1) comment has been made on the post.

Also to note, post meta text has been added to indicate the post comment status.

= Q: Does the theme support multi-level, or drop-down menus? =
A: Yes, as of version 1.8; with significant improvements in version 1.8.7!

= Q: Why does the tack above the widget not appear sometimes? =
RESOLVED: As of version 2.0.1 this issue has been corrected. If the widget title is empty the `dmm_widget_title` function will automagically use a space for the title and the tack will be displayed.
A: The easiest solution to this issue is to either insure there is always a title used for every widget; if you wish to not have any text in that particular widget using a `space` (`&nbsp;`) will work very well.
Also to note, if you use the escape sequence `&nbsp;` you may notice the widget title is empty afterward. `&nbsp;` is a `non-breaking space` and appears as such.

= Q: How do I use the new DMM Dynamic Copyright function? =
A: The function now accepts four (4) parameters. Leaving the function as is will produce the copyright statement as it was produced in version prior to 1.8.5
Using the following parameters you can change the copyright statement accordingly:
- start: This is generally the primary statement of copyright including whatever license you may choose to use
- copy_years: This is the years dynamically calculated from published posts
- url: The default will point back to the 'home' page of the website using the website title as the anchor text
- end: A closing statement, such as the default, All Rights Reserved.
It is also recommended to use this functionality in a Child-Theme versus modifying the original Theme template file(s).

== Notes ==
* Resolved in v2.0.1 - Always use a title in every widget or the push-pin top of the widget box will not resolve correctly, even a single space will work.
* add_custom_image_header() is not implemented as it will not handle multiple header images; in the case of this theme, there are three (3) being used in the header.
* It is recommended to not have an excessive quantity of menu items, for example a quantity causing the top menu to exceed two lines, may obscure the post title in some views

== TODO ==
= Short Term Goals =
* [x] Ticket 418: meta information generator is handled by wordpress this should be removed in the header.php
* [x] Address spacing issue for comment from fields (user not logged in)
* [x] Ticket 418: sticky tab menu bar not handling children or grandchildren
* [x] Ticket 418: Review and re-work graphics use for menu items to display drop-down or multi-level menus (long-term)
* [x] Review `editor-style.css` file, address image alignments
* [x] Clean up new functionality of `dmm_dynamic_copyright`
* [x] Move supported browsers minimum to LTE IE7 ... NB: Theme is only tested and supported in current browsers as noted in the changelog file.

= Long Term Goals =
* [x] Corrected widget title empty issue - see `DMM Widget Title` in functions.php
* [x] Review second "Home" page scenarios for possible solutions
* [-] Theme Options? Not likely.

== Changelog ==
* see changelog.txt for additional details

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
* http://themes.trac.wordpress.org/ticket/5877 - version 1.9.1
* http://themes.trac.wordpress.org/ticket/6174 - version 2.0
* http://themes.trac.wordpress.org/ticket/6552 - version 2.0.1
* http://themes.trac.wordpress.org/ticket/6735 - version 2.0.2