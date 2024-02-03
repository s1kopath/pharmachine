# Raw Materials Functions Documentation

This document outlines the functions available in the `RawMaterialsController` class.

## 1. `raw()`

**Method Description:**
This method retrieves raw materials and vendors information and renders the raw materials view.

**Parameters:**
none

**Returns:**
`Illuminate\Contracts\View\View`

---

## 2. `createVendor(Request $request)`

**Method Description:**
This method creates a new vendor based on the submitted form data.

**Parameters:**

-   `$request` (Request): The HTTP request object containing form data.

**Returns:**

-   Redirect: Redirects back to the previous page with a success message upon successful vendor creation.
-   Redirect with Error Message: Redirects back to the previous page with an error message if validation fails or vendor already exists.

---

## 3. `deleteVendor($id)`

**Method Description:**
This method deletes a vendor.

**Parameters:**

-   `$id` (integer): The ID of the vendor to be deleted.

**Returns:**

-   Redirect: Redirects back to the previous page with a success message upon successful deletion.
-   Redirect with Error Message: Redirects back to the previous page with an error message if deletion fails due to dependencies.

---

## 4. `createOrder(Request $request)`

**Method Description:**
This method creates a new material order based on the submitted form data.

**Parameters:**

-   `$request` (Request): The HTTP request object containing form data.

**Returns:**

-   Redirect: Redirects back to the previous page with a success message upon successful order creation.
-   Redirect with Error Message: Redirects back to the previous page with an error message if validation fails.

---

## 5. `updateOrder($id)`

**Method Description:**
This method prepares to place an order for a specific material.

**Parameters:**

-   `$id` (integer): The ID of the material for which an order is being placed.

**Returns:**View

---

## 6. `sendOrder(Request $request, $id)`

**Method Description:**
This method sends the order for a specific material.

**Parameters:**

-   `$request` (Request): The HTTP request object containing form data.
-   `$id` (integer): The ID of the material for which an order is being sent.

**Returns:**

-   Redirect: Redirects to the raw materials dashboard with a success message upon successful order placement.

---

## 7. `materialDelete($id)`

**Method Description:**
This method deletes a material.

**Parameters:**

-   `$id` (integer): The ID of the material to be deleted.

**Returns:**

-   Redirect: Redirects back to the previous page with a success message upon successful deletion.
-   Redirect with Error Message: Redirects back to the previous page with an error message if deletion fails due to dependencies or material status.
