
ALTER TABLE comments  add CONSTRAINT fr_Cmnt_Item 
FOREIGN key(Item_id_cmnt) REFERENCES items (ItemID ) 
on DELETE CASCADE 
on UPDATE CASCADE 

ALTER TABLE comments add CONSTRAINT fk_User_comnt 
FOREIGN KEY(User_id_cmnt ) REFERENCES users(UserID) 
on DELETE CASCADE on UPDATE CASCADE