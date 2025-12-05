# Guestbook API Documentation

## Authentication

Semua endpoint API memerlukan API Key yang dikirim melalui header request:

```
X-API-KEY: ly1VskisCUDJyFeIIls9ndseQPDfVslk
```

## Base URL

```
https://api.gb.gutsylab.com
```

## Endpoints

### 1. Get All Guestbooks

**GET** `/api/guestbooks`

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "phone": "081234567890",
            "organization": "ABC Company",
            "purpose": "Business Meeting",
            "message": "Thank you for the meeting",
            "visit_date": "2025-12-05",
            "created_at": "2025-12-05T10:00:00.000000Z",
            "updated_at": "2025-12-05T10:00:00.000000Z"
        }
    ]
}
```

### 2. Get Guestbook Detail

**GET** `/api/guestbooks/{id}`

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "phone": "081234567890",
        "organization": "ABC Company",
        "purpose": "Business Meeting",
        "message": "Thank you for the meeting",
        "visit_date": "2025-12-05",
        "created_at": "2025-12-05T10:00:00.000000Z",
        "updated_at": "2025-12-05T10:00:00.000000Z"
    }
}
```

**Error Response (404):**
```json
{
    "success": false,
    "message": "Guest book entry not found"
}
```

### 3. Create Guestbook

**POST** `/api/guestbooks`

**Request Body:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "081234567890",
    "organization": "ABC Company",
    "purpose": "Business Meeting",
    "message": "Thank you for the meeting",
    "visit_date": "2025-12-05"
}
```

**Validation Rules:**
- `name`: required, string, max 255 characters
- `email`: required, valid email, max 255 characters
- `phone`: optional, string, max 20 characters
- `organization`: optional, string, max 255 characters
- `purpose`: required, string
- `message`: optional, string
- `visit_date`: required, valid date

**Response (201):**
```json
{
    "success": true,
    "message": "Guest book entry created successfully",
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "phone": "081234567890",
        "organization": "ABC Company",
        "purpose": "Business Meeting",
        "message": "Thank you for the meeting",
        "visit_date": "2025-12-05",
        "created_at": "2025-12-05T10:00:00.000000Z",
        "updated_at": "2025-12-05T10:00:00.000000Z"
    }
}
```

### 4. Update Guestbook

**PUT** `/api/guestbooks/{id}`

**Request Body:**
```json
{
    "name": "John Doe Updated",
    "email": "john.updated@example.com",
    "phone": "081234567891",
    "organization": "XYZ Company",
    "purpose": "Follow-up Meeting",
    "message": "Updated message",
    "visit_date": "2025-12-06"
}
```

**Note:** Semua field bersifat optional, hanya field yang dikirim yang akan diupdate.

**Response:**
```json
{
    "success": true,
    "message": "Guest book entry updated successfully",
    "data": {
        "id": 1,
        "name": "John Doe Updated",
        "email": "john.updated@example.com",
        "phone": "081234567891",
        "organization": "XYZ Company",
        "purpose": "Follow-up Meeting",
        "message": "Updated message",
        "visit_date": "2025-12-06",
        "created_at": "2025-12-05T10:00:00.000000Z",
        "updated_at": "2025-12-05T11:00:00.000000Z"
    }
}
```

**Error Response (404):**
```json
{
    "success": false,
    "message": "Guest book entry not found"
}
```

### 5. Delete Guestbook

**DELETE** `/api/guestbooks/{id}`

**Response:**
```json
{
    "success": true,
    "message": "Guest book entry deleted successfully"
}
```

**Error Response (404):**
```json
{
    "success": false,
    "message": "Guest book entry not found"
}
```

## Error Responses

### Invalid or Missing API Key (401)
```json
{
    "success": false,
    "message": "Invalid or missing API key"
}
```

### Validation Error (422)
```json
{
    "message": "The name field is required. (and 1 more error)",
    "errors": {
        "name": [
            "The name field is required."
        ],
        "email": [
            "The email field is required."
        ]
    }
}
```

## Setup

1. Copy `.env.example` ke `.env`
2. Set `API_KEY` di file `.env`:
   ```
   API_KEY=your-secret-api-key-here
   ```
3. Ganti dengan API key yang aman

## Testing dengan cURL

### Get All
```bash
curl -X GET http://localhost:8000/api/guestbooks \
  -H "X-API-KEY: your-secret-api-key-here"
```

### Get Detail
```bash
curl -X GET http://localhost:8000/api/guestbooks/1 \
  -H "X-API-KEY: your-secret-api-key-here"
```

### Create
```bash
curl -X POST http://localhost:8000/api/guestbooks \
  -H "X-API-KEY: your-secret-api-key-here" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "081234567890",
    "organization": "ABC Company",
    "purpose": "Business Meeting",
    "message": "Thank you",
    "visit_date": "2025-12-05"
  }'
```

### Update
```bash
curl -X PUT http://localhost:8000/api/guestbooks/1 \
  -H "X-API-KEY: your-secret-api-key-here" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe Updated"
  }'
```

### Delete
```bash
curl -X DELETE http://localhost:8000/api/guestbooks/1 \
  -H "X-API-KEY: your-secret-api-key-here"
```
