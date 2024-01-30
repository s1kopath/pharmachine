# Admin Profile Functions Documentation

This document outlines the functions available in the `Admin/ProfileController` class.

## 1. `showAdminProfile()`

**Method Description:**This method retrieves and displays the user profile page for the admin.

**Parameters:\*\***
None

**Returns:**:\*\*
View

---

# Worker Profile Functions Decumentation

This document outlines the functions available in the `Worker/ProfileController` class.

## 1. `showUserProfile()`

**Method Description:**
This method retrieves and displays the user profile page for the authenticated user.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 2. `updatePassword(Request $request)`

**Method Description:**
This method handles the updating of the user's password.

**Parameters:**

-   `$request` (Request): The HTTP request object containing the current and new passwords.

**Returns:**

-   Redirect: Redirects back to the user profile page with an error message if the current password does not match or the new password matches the old one.
-   Redirect: Redirects back to the user profile page with a success message if the password is updated successfully.

---

## 3. `editProfile($id)`

**Method Description:**
This method renders the profile editing form for the authenticated user.

**Parameters:**

-   `$id` (integer): The ID of the authenticated user.

**Returns:**
`Illuminate\Contracts\View\View`

---

## 4. `updateProfile(Request $request, $id)`

**Method Description:**
This method handles the updating of the user's profile information.

**Parameters:**

-   `$request` (Request): The HTTP request object containing the updated profile information.
-   `$id` (integer): The ID of the authenticated user.

**Returns:**

-   Redirect: Redirects back to the user profile page with a success message if the profile is updated successfully.
