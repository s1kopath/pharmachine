# Admin Reports Functions Documentation

This document outlines the functions available in the `Admin/ReportsController` class.

## 1. `rep()`

**Method Description:**
This method initializes the reports view with the title and search parameters.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 2. `generate(Request $request)`

**Method Description:**
This method generates reports based on the specified date range.

**Parameters:**

-   `$request` (Request): The HTTP request object containing the start and end dates.

**Returns:**

-   View: Renders the reports view with the generated data if valid date range is provided.
-   Redirect with Error Message: Redirects back to the previous page with an error message if invalid date range is provided or start/end date is not selected.

# Worker Reporting Functions Documentation

This document outlines the functions available in the `Worker/ReportingController` class.

## 1. `showReporting()`

**Method Description:**
This method retrieves and displays the production reporting page for the authenticated worker.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 2. `productionUpdate($id, $demand_id, $status, $demandStatus)`

**Method Description:**
This method updates the production status of a manufacturing order and its associated demand.

**Parameters:**

-   `$id` (integer): The ID of the manufacturing order.
-   `$demand_id` (integer): The ID of the associated demand.
-   `$status` (string): The new status for the manufacturing order.
-   `$demandStatus` (string): The new status for the associated demand.

**Returns:**

-   Redirect: Redirects back to the production reporting page with an error message if the production start date is in the future.
-   Redirect: Redirects back to the production reporting page with a success message if the production status is updated successfully.

---

## 3. `damageReport(Request $request, $id)`

**Method Description:**
This method reports a workstation as damaged and pauses production.

**Parameters:**

-   `$request` (Request): The HTTP request object containing the damage report note.
-   `$id` (integer): The ID of the manufacturing order.

**Returns:**

-   Redirect: Redirects back to the production reporting page with a danger message indicating the workstation is reported as damaged.
