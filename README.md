# Login System README

This README provides a comprehensive guide to the PHP code for a basic yet robust login system.

## Overview

The provided PHP code implements a straightforward login system where users are prompted to enter their email address and password. Upon submission, the code validates the input and cross-references it with a predefined set of credentials stored in a SQLite database. Successful authentication redirects the user to a main page (`main.php`), while any errors prompt appropriate error messages.

## Files Included

1. `index.php`: Contains the primary login form.
2. `header.php` and `footer.php`: Include the header and footer sections of the webpage, ensuring consistent styling and structure.
3. `main.php`: Represents the main page users are redirected to post-login.

## Functionality

### Validation and Error Handling

- The code efficiently validates form data, displaying a warning message if any required field is empty.

### Database Interaction

- Login credentials undergo verification against entries stored in a SQLite database (`admin.db`), with database interaction handled seamlessly via PHP's SQLite3 extension.

### Session Management

- Upon successful authentication, the user's email address is stored in a session variable (`$_SESSION['email']`), ensuring persistent authentication across multiple requests.

## Installation and Setup

1. **Database Configuration**: Ensure proper configuration of the SQLite database (`admin.db`).
2. **Web Server Configuration**: Deploy PHP files to a web server with PHP support enabled.
3. **Access Control**: Modify the PHP code to specify the correct email address and hashed password for authentication.

## Usage

1. Access the login page (`index.php`) via a web browser.
2. Enter valid credentials (email and password) into the login form.
3. Click "Login" to submit the form.
4. Upon successful authentication, you'll be redirected to the main page (`main.php`).

## Contributing

Contributions to this project are welcomed. To contribute, fork the repository, make your changes, and submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE), granting freedom to use, modify, and distribute the code for both commercial and non-commercial purposes. Refer to the [LICENSE](LICENSE) file for detailed information.
