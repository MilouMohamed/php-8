ALTER TABLE comments  add CONSTRAINT fr_Cmnt_Item FOREIGN key(Item_id_cmnt) REFERENCES items (ItemID ) 
on DELETE CASCADE 
on UPDATE CASCADE 