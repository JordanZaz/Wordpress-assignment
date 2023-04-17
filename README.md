# WordPress Plugin and Theme Development Assignment

This GitHub repository contains the solution for a WordPress plugin and theme development assignment. The task involves setting up two instances of WordPress, developing a custom theme, a plugin that exposes a secured API and a Gutenberg block that calls the API.

The first step is to set up two instances of WordPress using either the default WordPress Docker image or the one provided in the repository. The provided image is built using the Bedrock version of WordPress for added security.

The next step is to develop a custom WordPress theme that includes the header of ibleducation.com on both desktop and mobile devices. This theme should be installed on both WordPress environments.

The next requirement is to create a plugin that exposes an API that is secured behind an OAuth2 layer. The plugin should take a single parameter called "greeting" and store it in its database. The plugin should also display the greeting on the WordPress Admin screen. This plugin should be installed on both WordPress environments.

Finally, a Gutenberg block needs to be developed that calls the API of one WordPress environment with a custom greeting. The block should be installed on one WordPress environment, and when used, it should call the API of the other WordPress environment to display the greeting.

## Instructions

To run the code, follow these steps:

Clone this repository and navigate to the project directory.
Make sure to npm install, npm run build.
Set up two instances of WordPress using the provided Docker image or the default WordPress Docker image.
Activate the custom WordPress theme and install it on both WordPress environments.
Install the plugin that exposes the secured API and install it on both WordPress environments.
The Gutenberg block that calls the API of one WordPress environment and install it on one WordPress environment.
Test the Gutenberg block to ensure that it calls the API of the other WordPress environment and displays the greeting.

## Resources

The following resources were used to develop this solution:

WordPress documentation: https://wordpress.org/support/

Gutenberg documentation: https://developer.wordpress.org/block-editor/

OAuth2 documentation: https://oauth.net/2/

## Credits

This assignment was created by IBL Education as part of their WordPress plugin and theme development course.
