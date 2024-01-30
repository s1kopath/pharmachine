# Admin Stock Functions Documentation

This document outlines the functions available in the `Admin/StockController` class.

## 1. `sto()`

**Method Description:**
This method retrieves warehouse stock data and renders the stock view.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 2. `checkStockRecord($id)`

**Method Description:**
This method checks the status of a specific stock record and retrieves related information.

**Parameters:**

-   `$id` (integer): The ID of the stock record.

**Returns:**
`Illuminate\Contracts\View\View`

---

## 3. `deleteStock($id)`

**Method Description:**

This method deletes a stock record from the warehouse.

**Parameters:**

-   `$id` (integer): The ID of the stock record to be deleted.

**Return**

Redirect: Redirects back to the previous page with a success message upon successful deletion.

---

## 4. `searchStock(Request $request)`

**Method Description:**

This method searches for warehouse stock records based on the provided search query.

**Parameters:**

-   `$request` (Request): The HTTP request object containing the search query.

**Returns:**

-   View: Renders the stock view with the filtered stock data if search query is provided.
-   View: Renders the stock view with all stock data if search query is null.

---

# Worker Stock Functions Documentation

This document outlines the functions available in the `Worker/StockController` class.

## 1. `showStock()`

**Method Description:**
This method retrieves and displays the warehouse stock status page.

**Parameters:**
None

**Returns:**
`Illuminate\Contracts\View\View`

---

## 2. `deliver($id)`

**Method Description:**
This method updates the status of a warehouse item to "Delivered" and handles the associated manufacturing and demand records.

**Parameters:**

-   `$id` (integer): The ID of the warehouse item.

**Returns:**
Redirect: Redirects back to the warehouse stock status page with a success message indicating the order is delivered successfully.
