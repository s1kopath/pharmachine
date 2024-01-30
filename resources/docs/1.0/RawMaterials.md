# Raw Materials

## `raw()`

### Method Description
This method retrieves raw materials and vendors information and renders the raw materials view.

### Parameters
None

### Returns
View

---

## `createVendor(Request $request)`

### Method Description
This method creates a new vendor based on the submitted form data.

### Parameters
- `$request` (Request): The HTTP request object containing form data.

### Returns
- Redirect: Redirects back to the previous page with a success message upon successful vendor creation.
- Redirect with Error Message: Redirects back to the previous page with an error message if validation fails or vendor already exists.

---

## `deleteVendor($id)`

### Method Description
This method deletes a vendor.

### Parameters
- `$id` (integer): The ID of the vendor to be deleted.

### Returns
- Redirect: Redirects back to the previous page with a success message upon successful deletion.
- Redirect with Error Message: Redirects back to the previous page with an error message if deletion fails due to dependencies.

---

## `createOrder(Request $request)`

### Method Description
This method creates a new material order based on the submitted form data.

### Parameters
- `$request` (Request): The HTTP request object containing form data.

### Returns
- Redirect: Redirects back to the previous page with a success message upon successful order creation.
- Redirect with Error Message: Redirects back to the previous page with an error message if validation fails.

---

## `updateOrder($id)`

### Method Description
This method prepares to place an order for a specific material.

### Parameters
- `$id` (integer): The ID of the material for which an order is being placed.

### Returns
View

---

## `sendOrder(Request $request, $id)`

### Method Description
This method sends the order for a specific material.

### Parameters
- `$request` (Request): The HTTP request object containing form data.
- `$id` (integer): The ID of the material for which an order is being sent.

### Returns
- Redirect: Redirects to the raw materials dashboard with a success message upon successful order placement.

---

## `materialDelete($id)`

### Method Description
This method deletes a material.

### Parameters
- `$id` (integer): The ID of the material to be deleted.

### Returns
- Redirect: Redirects back to the previous page with a success message upon successful deletion.
- Redirect with Error Message: Redirects back to the previous page with an error message if deletion fails due to dependencies or material status.

