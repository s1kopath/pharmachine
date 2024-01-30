# Production Planning Functions Documentation

This document outlines the functions available in the `ProductionPlanningController` class.

## 1. `pp()`

**Method Description:**
This method retrieves manufacturing orders and renders the production planning view.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 2. `createForm($id)`

**Method Description:**
This method retrieves information necessary for creating a manufacturing order form and renders the form view.

**Parameters:**

-   `$id` (integer): The ID of the demand for which a manufacturing order is being created.

**Returns:**
`Illuminate\Contracts\View\View`

---

## 3. `createManufacturingOrder(Request $request)`

**Method Description:**
This method handles the creation of a manufacturing order based on the submitted form data.

**Parameters:**

-   `$request` (Request): The HTTP request object containing form data.

**Returns:**

-   Redirect: Redirects to the production planning dashboard upon successful creation of a manufacturing order.
-   Redirect with Error Message: Redirects back to the form with an error message if information is missing or workers/workstations are unavailable.

---

## 4. `checkProductionStatus($id)`

**Method Description:**
This method retrieves and displays the status of a specific manufacturing order.

**Parameters:**

-   `$id` (integer): The ID of the manufacturing order.

**Returns:**
`Illuminate\Contracts\View\View`

---

## 5. `deleteProductionStatus($id)`

**Method Description:**
This method deletes a manufacturing order and its associated warehouse record.

**Parameters:**

-   `$id` (integer): The ID of the manufacturing order to be deleted.

**Returns:**

-   Redirect: Redirects back to the previous page with a success message upon successful deletion.
-   Redirect with Error Message: Redirects back to the previous page with an error message if deletion fails due to dependencies.
