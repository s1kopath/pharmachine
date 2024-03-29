# Admin Workstation Functions Documentation

This document outlines the functions available in the `Admin/WorkstationController` class.

## 1. `ws()`

**Method Description:**
This method retrieves available workstations and associated repair problems, then renders the workstation view.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 2. `createWorkstation(Request $request)`

**Method Description:**
This method handles the creation of a new workstation based on the submitted form data.

**Parameters:**

-   `$request` (Request): The HTTP request object containing form data.

**Returns:**

-   Redirect: Redirects back to the previous page with a success message upon successful workstation creation.
-   Redirect with Error Message: Redirects back to the previous page with an error message if validation fails.

---

## 3. `completedUpdate($id, $status)`

**Method Description:**
This method updates the status of a workstation to indicate completion or readiness for production.

**Parameters:**

-   `$id` (integer): The ID of the workstation to be updated.
-   `$status` (string): The status to be updated.

**Returns:**

-   Redirect: Redirects back to the previous page with a success message upon successful update.
-   Redirect with Error Message: Redirects back to the previous page with an error message if the workstation is in production.

---

## 4. `deleteWorkstation($id)`

**Method Description:**
This method deletes a workstation.

**Parameters:**

-   `$id` (integer): The ID of the workstation to be deleted.

**Returns:**

-   Redirect: Redirects back to the previous page with a success message upon successful deletion.
-   Redirect with Error Message: Redirects back to the previous page with an error message if deletion fails due to dependencies.

---

## 5. `requestRepair($id)`

**Method Description:**
This method requests repair for a malfunctioning workstation and notifies the technician via email.

**Parameters:**

-   `$id` (integer): The ID of the workstation to be repaired.

**Returns:**

-   Redirect: Redirects back to the previous page with a success message upon successful request for repair.

---

## 6. `searchWorkstation(Request $request)`

**Method Description:**
This method handles the search functionality to filter workstations by name.

**Parameters:**

-   `$request` (Request): The HTTP request object containing search parameters.

**Returns:**
`Illuminate\Contracts\View\View`

---

# Worker Workstation Functions Documentation

This document outlines the functions available in the `Worker/WorkstationController` class.

## 1. `showWorkstation()`

**Method Description:**
This method retrieves and displays the workstation status page.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 2. `repairWorkstation($id)`

**Method Description:**
This method updates the status of a workstation to "Occupied" and resumes production for the associated manufacturing order if it was previously paused due to workstation repair.

**Parameters:**

-   `$id` (integer): The ID of the workstation.

**Returns:**
Redirect: Redirects back to the workstation status page with a success message indicating that the workstation is reported successfully repaired by the technician.
