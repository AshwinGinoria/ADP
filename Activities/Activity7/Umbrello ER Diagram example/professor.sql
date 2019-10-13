
--
-- TABLE: Professor
-- 
--  

CREATE TABLE Professor (
  Name char(20) DEFAULT Null,
  P_ID int(20) unsigned NOT NULL  DEFAULT NULL,
  S_ID_Foreign int unsigned DEFAULT Null
);

-- 
ALTER TABLE Professor ADD CONSTRAINT new_unique_constraint PRIMARY KEY (P_ID);

CREATE INDEX Student_index  ON Professor();

-- 
ALTER TABLE Professor ADD CONSTRAINT new_fkey_constraint FOREIGN KEY () REFERENCES Student() ON UPDATE NO ACTION ON DELETE NO ACTION;

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
