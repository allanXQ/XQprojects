DROP TABLE IF EXISTS event_log
CREATE TABLE event_log(
    username VARCHAR(20),
    date_time VARCHAR,
    event_type VARCHAR(20),
    view_name VARCHAR(20)
)