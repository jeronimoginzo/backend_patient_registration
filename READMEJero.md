
url

http://localhost:8080/api/

Api status:
Method: GET
URL: /status

Response: 
{
    "status": "API is working!"
}

Register new patient
Method: POST
URL: /register

Body JSON:

{
  "name": "Juan Perez",
  "email": "testa.test@email.com",
  "cellphone": "1234567890",
  "file_url":"www.url.imagenes.prueba"
}

Response:
Status: 201
User:
 {
        "id": 1,
        "name": "Juan Perez",
        "role": 2,
        "email": "testa.test@email.com",
        "cellphone": "1234567890",
        "file_url": "www.url.imagenes.prueba",
        "email_confirmation_sent": 1,
        "email_sent_on": "2024-12-04 21:56:08",
        "created_at": "2024-12-04T21:55:17.000000Z",
        "updated_at": "2024-12-04T21:56:08.000000Z"
    }

Get register list
Method: GET
URL: /list

Response:

[
    {
        "id": 1,
        "name": "Juan Perez",
        "role": 2,
        "email": "testa.test@email.com",
        "cellphone": "1234567890",
        "file_url": "www.url.imagenes.prueba",
        "email_confirmation_sent": 1,
        "email_sent_on": "2024-12-04 21:56:08",
        "created_at": "2024-12-04T21:55:17.000000Z",
        "updated_at": "2024-12-04T21:56:08.000000Z"
    },
    {
        "id": 2,
        "name": "Juan Perez",
        "role": 2,
        "email": "jexxxxxxo@xxxkkk.com",
        "cellphone": "1234567890",
        "file_url": "www.url.imagenes.prueba",
        "email_confirmation_sent": 1,
        "email_sent_on": "2024-12-04 21:58:42",
        "created_at": "2024-12-04T21:58:41.000000Z",
        "updated_at": "2024-12-04T21:58:42.000000Z"
    }
]
