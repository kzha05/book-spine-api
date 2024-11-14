
# Book Cover API

Welcome to the **Book Cover API**, a simple and efficient service for fetching book cover images. Whether you need a random cover or a specific one, our API provides flexible options to suit your needs.

## Table of Contents

- [Features](#features)
- [Getting Started](#getting-started)
- [API Endments](#api-endpoints)
  - [Base URL](#base-url)
  - [Query Parameters](#query-parameters)
- [Usage Examples](#usage-examples)
  - [Fetch a Random Book Cover](#fetch-a-random-book-cover)
  - [Fetch a Specific Book Cover by Index](#fetch-a-specific-book-cover-by-index)
  - [Fetch Book Cover Image Directly](#fetch-book-cover-image-directly)
- [Error Handling](#error-handling)
- [Available Covers](#available-covers)
- [License](#license)
- [Contact](#contact)

## Features

- **Random Cover Retrieval:** Get a random book cover from a collection of eight unique designs.
- **Specific Cover Selection:** Choose a specific cover by its index.
- **Direct Image Access:** Retrieve the cover image directly in `webp` format.
- **Metadata Support:** Obtain additional information such as image URL, width, and height.

## Getting Started

To start using the Book Cover API, simply make HTTP GET requests to the API endpoints as described below. No authentication or API keys are required.

## API Endpoints

### Base URL

```
https://kzha.nl/book-spine-api
```

### Query Parameters

- **`index`** _(optional)_:  
  Specify the index of the cover to retrieve. Accepts integer values from `0` to `7`.  
  **Example:** `index=2`  
  **Error Response:** If an invalid index is provided (e.g., out of range), the API returns:
  ```json
  {
    "error": "Invalid index"
  }
  ```

- **`image_only`** _(optional)_:  
  When set to `true`, the API returns the cover image directly as a `webp` file, bypassing the JSON response.  
  **Example:** `image_only=true`  
  **Default Behavior:** If omitted or set to `false`, the response includes JSON metadata with the image's URL, width, and height.

## Usage Examples

### Fetch a Random Book Cover

Retrieve a random book cover along with its metadata.

**Request:**
```
https://kzha.nl/book-spine-api
```

**Response:**
```json
{
  "cover": "https://kzha.nl/book-spine-api/covers/cover-1.webp",
  "width": 800,
  "height": 1200
}
```

### Fetch a Specific Book Cover by Index

Retrieve a specific book cover by its index.

**Request:**
```
https://kzha.nl/book-spine-api?index=2
```

**Response:**
```json
{
  "cover": "https://kzha.nl/book-spine-api/covers/cover2.webp",
  "width": 800,
  "height": 1200
}
```

**Error Response (Invalid Index):**
```json
{
  "error": "Invalid index"
}
```

### Fetch Book Cover Image Directly

Retrieve the book cover image directly in `webp` format without any metadata.

**Request:**
```
https://kzha.nl/book-spine-api?image_only=true
```

**Response:**
- The response will be the `webp` image file of the randomly selected book cover.

## Error Handling

The API provides clear error messages for invalid requests. For example, if an invalid `index` is provided, the response will be:

```json
{
  "error": "Invalid index"
}
```

Ensure that the `index` parameter is within the valid range (`0` to `7`) to avoid errors.

## Available Covers

There are eight book covers available, indexed from `0` to `7`. Below is a list of available covers:

| Index | Cover Image URL                                                |
|-------|----------------------------------------------------------------|
| 0     | [Cover 0](https://kzha.nl/book-spine-api/covers/cover0.webp)                |
| 1     | [Cover 1](https://kzha.nl/book-spine-api/covers/cover1.webp)                |
| 2     | [Cover 2](https://kzha.nl/book-spine-api/covers/cover2.webp)                |
| 3     | [Cover 3](https://kzha.nl/book-spine-api/covers/cover3.webp) |
| 4     | [Cover 4](https://kzha.nl/book-spine-api/covers/cover4.webp)                |
| 5     | [Cover 5](https://kzha.nl/book-spine-api/covers/cover5.webp)                |
| 6     | [Cover 6](https://kzha.nl/book-spine-api/covers/cover6.webp)                |
| 7     | [Cover 7](https://kzha.nl/book-spine-api/covers/cover7.webp)                |

## License

This project is licensed under a custom [Private Repository License](LICENSE).

## Contact

For any questions, issues, or contributions, please contact [d.h.jawalapersad@gmail.com](mailto:d.h.jawalapersad@gmail.com).
