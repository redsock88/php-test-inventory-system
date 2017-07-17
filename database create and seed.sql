CREATE TABLE IF NOT EXISTS `test`.`Garments` (
  `garmentID` INT NULL,
  `type` VARCHAR(45) NULL,
  `size` VARCHAR(45) NULL,
  `color` VARCHAR(45) NULL,
  `timePeriod` VARCHAR(45) NULL,
  `createdDate` DATE NULL,
  `checkoutDate` DATE NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`garmentID`),
  UNIQUE INDEX `garmentID_UNIQUE` (`garmentID` ASC))
ENGINE = InnoDB;

insert into`test`.`Garments`
values (10000, 'Shirt', 'Large', 'Red', 'Modern', current_date(), null, 'In'),
(10001, 'Shirt', 'Medium', 'Red', 'Modern', current_date(), null, 'In'),
(10002, 'Shirt', 'Large', 'Blue', 'Modern', current_date(), null, 'In'),
(10003, 'Shirt', 'Large', 'Red', 'Modern', '2008-07-04', null, 'In'),
(10004, 'Shirt', 'Large', 'Red', 'Modern', current_date(), current_date(), 'Out'),
(10005, 'Shirt', 'Small', 'Red', 'Modern', current_date(), current_date(), 'Out'),
(10006, 'Pants', 'Large', 'Red', 'Modern', current_date(), null, 'In'),
(10007, 'Pants', 'Medium', 'Red', 'Modern', current_date(), null, 'In'),
(10008, 'Pants', 'Large', 'Blue', 'Modern', current_date(), null, 'In'),
(10009, 'Pants', 'Large', 'Red', 'Modern', '2008-07-04', null, 'In'),
(10010, 'Pants', 'Large', 'Red', 'Modern', current_date(), current_date(), 'Out'),
(10011, 'Pants', 'Small', 'Red', 'Modern', current_date(), current_date(), 'Out'),
(10012, 'Shirt', 'Large', 'Red', 'Colonial', current_date(), null, 'In'),
(10013, 'Shirt', 'Medium', 'Red', 'Colonial', current_date(), null, 'In'),
(10014, 'Shirt', 'Large', 'Blue', 'Colonial', current_date(), null, 'In'),
(10015, 'Shirt', 'Large', 'Red', 'Colonial', '2008-07-04', null, 'In'),
(10016, 'Shirt', 'Large', 'Red', 'Colonial', current_date(), current_date(), 'Out'),
(10017, 'Shirt', 'Small', 'Red', 'Colonial', current_date(), current_date(), 'Out'),
(10018, 'Pants', 'Large', 'Red', 'Colonial', current_date(), null, 'In'),
(10019, 'Pants', 'Medium', 'Red', 'Colonial', current_date(), null, 'In'),
(10020, 'Pants', 'Large', 'Blue', 'Colonial', current_date(), null, 'In'),
(10021, 'Pants', 'Large', 'Red', 'Colonial', '2008-07-04', null, 'In'),
(10022, 'Pants', 'Large', 'Red', 'Colonial', current_date(), current_date(), 'Out'),
(10023, 'Pants', 'Small', 'Red', 'Colonial', current_date(), current_date(), 'Out');
commit;