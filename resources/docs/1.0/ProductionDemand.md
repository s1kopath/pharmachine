# Production Demand Functions Documentation

This document outlines the functions available in the `ProductionDemandController` class.

## 1. `pd()`

**Description:**
Retrieves product demand data and related statistics for display.

**Parameters:**
None

**Return Type:**
`Illuminate\Contracts\View\View`

## 2. `createDemand(Request $request)`

**Description:**
Creates a new demand record based on the provided request data.

**Parameters:**

-   `$request` (`Illuminate\Http\Request`): HTTP request containing demand data.

**Return Type:**
`Illuminate\Http\RedirectResponse`

## 3. `changeStatus($id, $status)`

**Description:**
Changes the status of a demand record identified by its ID.

**Parameters:**

-   `$id` (`int`): ID of the demand record.
-   `$status` (`string`): New status for the demand record.

**Return Type:**
`Illuminate\Http\RedirectResponse`

## 4. `deleteStatus($id)`

**Description:**
Deletes a demand record identified by its ID.

**Parameters:**

-   `$id` (`int`): ID of the demand record to delete.

**Return Type:**
`Illuminate\Http\RedirectResponse`

## 5. `waitForConfirm($id)`

**Description:**
Displays the details of a demand record and related data while waiting for confirmation.

**Parameters:**

-   `$id` (`int`): ID of the demand record.

**Return Type:**
`Illuminate\Contracts\View\View`
