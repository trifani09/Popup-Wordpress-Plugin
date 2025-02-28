# Popup-Wordpress-Plugin

This plugin is an extension for WordPress that allows users to display pop-ups based on the page they are visiting. This plugin was developed using the WP Scaffold Plugin as a foundation and implements Object Oriented Programming (OOP).

Feature
- Uses OOP with PHP Namespaces, Traits, and Interfaces for optimal code structure.
- Implemented Singleton Pattern to ensure there is only one instance of the main class.
- Custom Post Type (CPT) & Custom Fields to save pop-up data without the help of additional plugins.
- Uses the WordPress REST API to display pop-ups with the /wp-json/artistudio/v1/popup endpoint.
- Uses SASS for more modular and efficient styling.
- Frontend uses Javascript (vanilla) to display pop-ups dynamically.
- API security can only be accessed by logged in users.

Instalasi
1. Clone Repository
    git clone https://github.com/trifani09/Popup-Wordpress-Plugin.git
2. Create db_popup_plugin
3. Run on terminal php -S localhost:port or http://localhost/popup-plugin/
4. Run for admin wordpress 
    link : http://localhost/popup-plugin/wp-admin/ ,
    username : admin,
    password : PopupPlugin09
