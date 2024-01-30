# User Functions Documentation

This document outlines the functions available in the `UserController` class.

## 1. `showLoginForm()`

**Method Description:**
This method renders the login form view.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 2. `showRegistrationForm()`

**Method Description:**
This method renders the registration form view.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 3. `forgetPasswordForm()`

**Method Description:**
This method renders the forget password form view.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 4. `forgetFormSubmit(Request $request)`

**Method Description:**
This method handles the submission of forget password form data and sends reset password link to the user's email.

**Parameters:**

-   `$request` (Request): The HTTP request object containing form data.

**Returns:**

-   Redirect: Redirects back to the previous page with a success message if email is found.
-   Redirect with Error Message: Redirects back to the previous page with an error message if email is not found.

---

## 5. `showResetForm($p_token, $p_email)`

**Method Description:**
This method renders the reset password form view if the reset password link is valid and not expired.

**Parameters:**

-   `$p_token` (string): The token for resetting the password.
-   `$p_email` (string): The email address associated with the user account.

**Returns:**

-   View: Renders the reset password form view if the link is valid and not expired.
-   Redirect with Error Message: Redirects to the login form with an error message if the link is expired.

---

## 6. `submitPassword(Request $request)`

**Method Description:**
This method handles the submission of the reset password form and updates the user's password.

**Parameters:**

-   `$request` (Request): The HTTP request object containing form data.

**Returns:**

-   Redirect: Redirects to the login form with a success message upon successful password update.

---

## 7. `registration(Request $request)`

**Method Description:**
This method handles the submission of the registration form and creates a new user account.

**Parameters:**

-   `$request` (Request): The HTTP request object containing form data.

**Returns:**

-   Redirect: Redirects to the login form with a success message upon successful user registration.

---

## 8. `login(Request $request)`

**Method Description:**
This method handles user authentication and login.

**Parameters:**

-   `$request` (Request): The HTTP request object containing form data.

**Returns:**

-   Redirect: Redirects to the appropriate dashboard upon successful login based on the user's role.
-   Redirect with Error Message: Redirects back to the login form with an error message if the credentials are invalid.

---

## 9. `logout()`

**Method Description:**
This method logs out the authenticated user.

**Parameters:**
None

**Returns:**
Redirect: Redirects to the login form with a success message upon successful logout.
