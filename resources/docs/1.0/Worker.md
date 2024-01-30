# Worker Functions Documentation

This document outlines the functions available in the `WorkerController` class.

## 1. `list()`

**Method Description**
This method retrieves a list of all workers and renders the worker view.

**Parameters**
None

**Returns**
`Illuminate\Contracts\View\View`

---

## 2. `create(Request $request)`

**Method Description**
This method handles the creation of a new worker and user account based on the submitted form data.

**Parameters**

-   `$request` (Request): The HTTP request object containing form data.

**Returns**

-   Redirect: Redirects back to the previous page with a success message upon successful worker creation.
-   Redirect with Error Message: Redirects back to the previous page with an error message if validation fails or email already exists.

---

## 3. `update($id)`

**Method Description**
This method renders the update worker form view.

**Parameters**

-   `$id` (integer): The ID of the worker to be updated.

**Returns**
`Illuminate\Contracts\View\View`

---

## 4. `saveUpdate(Request $request, $id)`

**Method Description**
This method handles the submission of the update worker form and updates the worker information.

**Parameters**

-   `$request` (Request): The HTTP request object containing form data.
-   `$id` (integer): The ID of the worker to be updated.

**Returns**
Redirect: Redirects to the worker list page with a success message upon successful update.

---

## 5. `delete($id)`

**Method Description**
This method deletes a worker and its associated user account.

**Parameters**

-   `$id` (integer): The ID of the worker to be deleted.

**Returns**

-   Redirect: Redirects back to the previous page with a success message upon successful deletion.
-   Redirect with Error Message: Redirects back to the previous page with an error message if deletion fails due to dependencies.

---

## 6. `workerProfile($id)`

**Method Description**
This method retrieves and renders the worker profile view.

**Parameters**

-   `$id` (integer): The ID of the worker.

**Returns**
`Illuminate\Contracts\View\View`

---

## 7. `searchWorker(Request $request)`

**Method Description**
This method handles the search functionality to filter workers by name.

**Parameters**

-   `$request` (Request): The HTTP request object containing search parameters.

**Returns**
`Illuminate\Contracts\View\View`
