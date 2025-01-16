# AI42 Core Module

## Overview

The AI42 Core module provides core functionality for AI42 Drupal sites. Currently, it focuses on automatically generating article titles using the Google Gemini API. This module leverages the "Key" module for secure API key management and ensures that article titles are automatically generated based on the article body content.

## Features

*   **Automatic Article Title Generation:** When a new article node is created, the module sends the article body content to the Google Gemini API to generate a suitable title.
*   **Google Gemini API Integration:** Uses the Google Gemini API to generate titles based on the article body content.
*   **Secure API Key Management:** Leverages the "Key" module to securely store and manage the Google Gemini API key.
*   **Hidden Title Field:** The title field is hidden on the node add and edit forms for the 'article' content type, ensuring that users do not manually enter a title.
*   **Prefilled Title Field:** The title field is prefilled with the word "auto" before being hidden, ensuring that the field is not empty when the form is submitted.
*   **Robust Error Handling:** Includes error handling and logging for API failures and other issues.
*   **Drupal Best Practices:** Follows Drupal best practices for module development, including using hooks, services, and the configuration API.

## Requirements

*   Drupal 10 or 11
*   Key module (for API key management)
*   A Google Gemini API key

## Installation

1.  **Install the Key module:** If you haven't already, install and enable the "Key" module.
2.  **Place the module files:** Place the `ai42core` module directory in your Drupal site's `modules` directory (e.g., `modules/ai42core`).
3.  **Enable the module:** Go to the "Extend" page in your Drupal admin interface and enable the "AI42 Core" module.
4.  **Configure a Key:** Go to the "Keys" configuration page (as shown in your screenshot) and create a new key for your Gemini API key. Make sure to use the machine name/ID `gemini` (or the ID you specify in the module code).
5.  **Enter the API Key:** Enter your Google Gemini API key in the key's value field.

## Configuration

1.  **Gemini API Key:** The Google Gemini API key is managed through the "Key" module. You need to create a key with the machine name/ID `gemini` (or the ID you specify in the module code) and enter your API key there.
2.  **Article Content Type:** The module is specifically designed to work with the 'article' content type.

## How It Works

1.  **Node Creation:** When a new article node is created, the `ai42core_entity_insert()` hook is triggered.
2.  **Body Retrieval:** The module retrieves the body content of the article.
3.  **Gemini API Call:** The module sends the body content to the Google Gemini API to generate a title.
4.  **Title Update:** If a title is successfully generated, the module updates the node's title.
5.  **Title Field Handling:** The title field is prefilled with "auto" and then hidden on the node add and edit forms using `hook_form_alter()`.
6.  **Title Pre-Save:** The `hook_entity_presave()` ensures that the title is set to "auto" if it's empty before the entity is saved.
7.  **Error Handling:** The module includes error handling and logging for API failures and other issues.

## Code Structure

*   **`ai42core.info.yml`:** Defines the module's metadata, dependencies, and core version requirements.
*   **`ai42core.module`:** Contains the main module logic, including the hook implementations and the Gemini API integration.
*   **`src/`:** Contains the module's PHP classes.

## Troubleshooting

*   **API Key Issues:**
    *   Ensure that the API key is correctly entered in the "Key" module.
    *   Verify that the key ID in the module code matches the key ID in the "Key" module.
*   **API Call Failures:**
    *   Check Drupal's logs for error messages related to the Gemini API call.
    *   Verify that your Drupal site can reach the Google Gemini API endpoint.
*   **Title Not Generated:**
    *   Check Drupal's logs for warning messages related to title generation failures.
    *   Ensure that the article body content is not empty.
*   **Database Errors:**
    *   If you encounter database errors related to the title field, ensure that the `hook_entity_presave()` is correctly implemented.

## Contributing

Contributions are welcome! If you find any bugs or have suggestions for improvements, please submit an issue or a pull request on the project's repository.

## License

This module is licensed under the [MIT License](LICENSE).

## Author

Weiming Chen