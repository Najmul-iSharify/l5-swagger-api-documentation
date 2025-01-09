## API Documentation for Categories Management

This API allows developers to manage categories within the application. The following endpoints enable operations like creating, updating, deleting, and retrieving categories.

### Base URL

```
/api/categories
```

### Endpoints Overview

#### 1. **Get List of Categories**

-   **Endpoint**: `/api/categories`
-   **Method**: `GET`
-   **Description**: Retrieves a list of all categories.

**Response (200 OK)**:

```json
[
    {
        "id": 1,
        "name": "Electronics",
        "description": "Category for electronic products"
    },
    {
        "id": 2,
        "name": "Clothing",
        "description": "Apparel and garments"
    }
]
```

#### 2. **Create a New Category**

-   **Endpoint**: `/api/categories`
-   **Method**: `POST`
-   **Description**: Creates a new category in the system.

**Request Body**:

-   `name` (string): The name of the category (required).
-   `description` (string): A brief description of the category (required).

**Example**:

```json
{
    "name": "Clothing",
    "description": "Apparel and garments"
}
```

**Response (201 Created)**:

```json
{
    "status": "success",
    "message": "Category created",
    "data": {
        "id": 16,
        "name": "Clothing",
        "description": "Apparel and garments",
        "created_at": "2025-01-09T06:51:07.000000Z",
        "updated_at": "2025-01-09T06:51:07.000000Z"
    }
}
```

**Response (422 Unprocessable Entity)**: In case of validation errors.

```json
{
    "message": "The name field is required.",
    "errors": {
        "name": ["The name field is required."],
        "description": ["The description field is required."]
    }
}
```

#### 3. **Get Category by ID**

-   **Endpoint**: `/api/categories/{id}`
-   **Method**: `GET`
-   **Description**: Retrieves a single category by its ID.

**Path Parameter**:

-   `id` (integer): The ID of the category to retrieve.

**Response (200 OK)**:

```json
{
    "id": 1,
    "name": "Clothing",
    "description": "Apparel and garments"
}
```

**Response (404 Not Found)**: If the category with the given ID does not exist.

#### 4. **Update a Category**

-   **Endpoint**: `/api/categories/{id}`
-   **Method**: `PUT`
-   **Description**: Updates an existing category by its ID.

**Path Parameter**:

-   `id` (integer): The ID of the category to update.

**Request Body**:

-   `name` (string): The updated name of the category (required).
-   `description` (string): The updated description of the category (required).

**Example**:

```json
{
    "name": "Updated Category",
    "description": "Updated description"
}
```

**Response (200 OK)**:

```json
{
    "id": 1,
    "name": "Updated Category",
    "description": "Updated description",
    "created_at": "2025-01-08T11:25:06.000000Z",
    "updated_at": "2025-01-09T06:56:20.000000Z"
}
```

#### 5. **Delete a Category**

-   **Endpoint**: `/api/categories/{id}`
-   **Method**: `DELETE`
-   **Description**: Deletes a category by its ID.

**Path Parameter**:

-   `id` (integer): The ID of the category to delete.

**Response (204 No Content)**: If the category is successfully deleted.

**Response (404 Not Found)**: If the category with the given ID does not exist.

---

### Notes

-   **Authentication**: You may need to implement an authentication mechanism (such as API tokens) depending on your app's security requirements. Ensure to include a valid token in the request headers if authentication is required.
-   **Error Handling**: All endpoints return appropriate status codes and error messages in case of validation issues or failures.
-   **Data Formats**: The API expects and returns data in `application/json` format. For file uploads, use `multipart/form-data` as specified in the `POST` and `PUT` methods.

---

### Swagger Integration

This API follows the Swagger standards and can be used with tools like Swagger UI to interact with it. The `CategoryPath` class in the code includes annotations that generate the relevant Swagger documentation for each endpoint.
