```mermaid
erDiagram
    USER ||--o{ BOOKING : makes
    CAR  ||--o{ BOOKING : is_booked_in

    USER {
        int id PK
        varchar username
        varchar password
    }

    CAR {
        int id PK
        varchar mark
        varchar model
        varchar engine
        varchar fuel
        decimal price
        text image
        int year
        varchar transmission
        int seats
        text description
        varchar status
    }

    BOOKING {
        int id PK
        int user_id
        int car_id
        date start_date
        date end_date
        decimal total_price
        timestamp created_at
        varchar status
    }
