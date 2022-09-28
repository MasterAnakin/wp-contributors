# Contributors plugin

Allows users to add contributors to posts

## Contents

The WordPress Plugin Boilerplate includes the following files:

* `.gitignore`. Used to exclude certain files from the repository.
* `README.md`. The file that you’re currently reading.
* `vendor` directory that contains files for running PHPUnit tests
* `bin` directory that contains file for running PHPUnit tests
* `includes` directory that contains classes for core functions of the plugin
* `public/css` directory that contains CSS for the plugin
* `tests` directory that contains PHPUnit tests
* `uninstall.php`. File used for uninstalling the plugin.
* `wp-contributors.php`. Core plugin file that pulls in classess.

## Features

Allows users to add contributors to posts. When you navigate to post admin area, on the right sidebar you will be able to see Contributors option. All administrators, editors and authors will be listed there with checkbox next to the name. User can check contributors and they will be listed with name, gravatar image and link under wp-content.

## Installation

Upload the .zip file and activate the plugin. Once there, you are ready to go.Plugin is not tested for multisites.

## License

The WordPress Plugin Boilerplate is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.
> This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
> You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
A copy of the license is included in the root of the plugin’s directory. The file is named `LICENSE`.

## Important Notes

Plugin is not tested for multisites. Plugin will work only for Post type.

### Licensing

The Contributors plugin is licensed under the GPL v2 or later; however, if you opt to use third-party code that is not compatible with v2, then you may need to switch to using code that is GPL v3 compatible.

### Includes

Note that if you include your own classes, they should go to:

* `wp-contributors/includes` is where functionality shared between the admin area and the public-facing parts of the site reside

# Credits

WP Contributors plugin was completed in 2022 by [Milos Milosevic](https://mmilosevic.com/)

## Documentation, FAQs, and More

For all questions email: milosmilosevic87@icloud.com