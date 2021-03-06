CREATE TRIGGER TRG_PREVENT_VIEW_DROP
ON DATABASE
FOR	 
    DROP_VIEW
AS
BEGIN 
ROLLBACK TRANSACTION
END
BEGIN
INSERT INTO event_log(username,date_time, event_type, view_name) 
VALUES (CURRENT_USER,getdate(),'DROP_VIEW','VW_ALL_SHAPES')
END
BEGIN
RAISERROR (N'View dropping is prohibited!!! Rolling back transaction',15,1);  
END


--  DROP TRIGGER IF EXISTS TRG_PREVENT_VIEW_DROP ON DATABASE