
--
-- TABLE: Student
-- 
--  

CREATE TABLE Student (
  Name char(20) DEFAULT Null,
  S_ID int(20) unsigned NOT NULL  DEFAULT Null,
  P_ID_Foreign int(20) unsigned DEFAULT Null
);

-- 
ALTER TABLE Student ADD CONSTRAINT new_unique_constraint PRIMARY KEY (S_ID);

CREATE INDEX Professor_P_ID_index  ON Student(P_ID);

-- 
ALTER TABLE Student ADD CONSTRAINT new_fkey_constraint FOREIGN KEY (P_ID_Foreign) REFERENCES Professor(P_ID) ON UPDATE NO ACTION ON DELETE NO ACTION;

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
