=== WooCommerce Filter Search ===
Contributors: pinchofcode, nicolamustone
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=paypal@pinchofcode.com&item_name=Donation+for+Pinch+Of+Code
Tags: woocommerce, search, excerpt, content, title, filter
Requires at least: 3.8
Tested up to: 4.2.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Change the search query behaviour searching only in the post/product title.

== Description ==

Change the search query behaviour searching only in the post/product title. You can add post types to the **not allowed** list using [this code](https://gist.github.com/SiR-DanieL/8ca1b1b33ab791836a59).

By default the unallowed post types are **product** and **shop_webhook**.

**NOTE**: This plugin will always search for products, but the keyword will be compared **only** with the product title.

= Usage =

Just activate the plugin.

= Support =
For any support request, please create a new issue [here](https://github.com/PinchOfCode/woocommerce-filter-search/issues).

**Note**: since the free nature of this plugin, the support may be discontinuous, but all the requests are checked and replied. We suggest to write on [GitHub](https://github.com/PinchOfCode/woocommerce-filter-search/issues) to get faster support.

= License =
Copyright (C) 2014 Pinch Of Code. All rights reserved.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

== Installation ==

= WP Installation =

1. Go to Plugins > Add New > Search
2. Type WooCommerce Filter Search in the search box and hit Enter
3. Click on the button Install and then activate the plugin

= Manual Installation =

1. Upload `woocommerce-filter-search` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. Payment Gateways admin page
2. Order detail admin page

== Changelog ==

= 1.0.2 =
* Fix: replaced deprecated like_escape with esc_like

= 1.0.1 =
* Fix: Bug in plugin logic

= 1.0.0 =
* First release
