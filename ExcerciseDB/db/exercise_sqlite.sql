PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE cars (
car_id INTEGER PRIMARY KEY ASC,
make_id INTEGER,
yearmade INTEGER,
mileage INTEGER,
price REAL,
description TEXT);
INSERT INTO cars VALUES(1,5,2007,113688,13550.0,'Green Chrysler 300. Only one owner, very carefully maintained. Top of the line, and beautifully styled, this is an outstanding ride with great performance.');
INSERT INTO cars VALUES(2,2,2007,126570,7545.0,'Red Ford Focus. "Great bargain as a family car."');
INSERT INTO cars VALUES(3,12,2012,517,20755.0,'Demo model that''s hardly been out on the road, this red Chevrolet Cruze is just a dream, with just about every option you could ask for. Great fuel economy, too.');
INSERT INTO cars VALUES(4,16,2010,116626,10554.0,'Red Camry in good running condition. Sound electrics and bodywork. Clean interior, appears never to have been smoked in.');
INSERT INTO cars VALUES(5,7,2011,24694,26950.999999999999999,'Space grey BMW 3 series with beige leather interior. BMW Factory Certified with a 6 year/100,000 mile warranty from in-service date.');
INSERT INTO cars VALUES(6,11,2005,95496,8554.0000000000000002,'Black Jaguar S-Type in perfect working condition. Good electrics and bodywork. Low mileage. New tires recently fitted.');
INSERT INTO cars VALUES(7,5,2004,75500,6005.0000000000000001,'Black Sebring LX convertible. Very low mileage. Excellent ride. A must-see bargain.');
INSERT INTO cars VALUES(8,4,2001,100145,9550.0000000000000001,'Black SLK-Class convertible. Immaculate interior. Power top and power seats. Runs like new.');
INSERT INTO cars VALUES(9,2,1999,102500,4550.0000000000000001,'Metallic red Mustang convertible. Economy car, very easy on fuel. No negative history. No rust or damage on paintwork.');
INSERT INTO cars VALUES(10,16,2002,173658,6550.0000000000000001,'So much to like about this Silver Toyota 4Runner. Runs well, good paint, tires, nice sound system.');
INSERT INTO cars VALUES(11,3,2005,122250,11549.999999999999999,'Black Cadillac SRX. Only one owner. Beautiful SUV.');
INSERT INTO cars VALUES(12,17,2002,155500,4304.9999999999999998,'Silver Passat. Only one owner. Leather interior. Rare bargain.');
INSERT INTO cars VALUES(13,1,1952,46383,22054.999999999999999,'Burgundy Studebaker Roadster with newly rebuilt engine and wide whitewall tires. Three-speed manual transmission. Runs and drives amazingly.');
INSERT INTO cars VALUES(14,10,2006,124209,9119.9999999999999998,'White Santa Fe. Only one owner. Leather interior and bodywork are in great shape.');
INSERT INTO cars VALUES(15,10,2012,9811,24553.999999999999998,'Silver Genesis with beige leather and wood trim interior. Great handling and comfort. Low, low mileage. Luxury at an affordable price.');
INSERT INTO cars VALUES(16,14,2005,130500,7505.0000000000000001,'Five-speed manual black Civic. Super clean, with 6 CD changer. This one, you must see!');
INSERT INTO cars VALUES(17,15,2007,84947,14554.0,'Audi A4 Quattro. Gray with gray leather interior, and glass roof. Excellent value.');
INSERT INTO cars VALUES(18,6,1972,77600,28055.0,'Citroen D Super with 5 speed manual transmission in fantastic shape. Extremely well maintained, and has obviously been treasured by its owner. A real European classic.');
INSERT INTO cars VALUES(19,8,2012,19361,14552.999999999999999,'Yellow Fiat 500 POP. Immaculate interior and bodywork. Electrics in perfect order. Tires only slightly worn.');
INSERT INTO cars VALUES(20,12,2002,160550,4545.0,'Blue Impala LS with gray interior. Ideal economical vehicle with good gas mileage. Dependable engine, new tires. Price includes 6 month/8,500 mile warranty.');
INSERT INTO cars VALUES(21,9,2005,94995,8149.9999999999999996,'Gold Pontiac Bonneville with low mileage. Great condition.');
INSERT INTO cars VALUES(22,5,2006,102300,7105.0,'Green Town & Country sports van.');
INSERT INTO cars VALUES(23,8,2012,5238,16050.0,'Pearl white Fiat 500 sport hatchback. Power glass sunroof and power windows. Only one owner.');
INSERT INTO cars VALUES(24,17,2005,70388,14054.999999999999999,'Shadow blue Touareg in excellent condition. Heated leather seats, sun roof, and navigation. Really low mileage. ');
INSERT INTO cars VALUES(25,13,2012,35000,15549.999999999999999,'Tan Altima. Low mileage. Excellent condition.');
INSERT INTO cars VALUES(26,2,2004,108694,10979.999999999999999,'Top of the line black Expedition XLT 5.4 liter 4WD with every conceivable option. A truly exceptional SUV.');
INSERT INTO cars VALUES(27,2,2005,123059,8000.0,'Blue Ford Escape. Excellent condition. A real bargain.');
INSERT INTO cars VALUES(28,13,2010,32791,20504.999999999999999,'Red Pathfinder 4WD. Only one owner. Nicely equipped with just about every feature you could want, including third-row seats.');
INSERT INTO cars VALUES(29,14,2002,124334,6004.0,'Silver Accord with sunroof, CD player, and all new tires. Excellent condition.');
INSERT INTO cars VALUES(30,14,2011,27345,13999.999999999999999,'Dark gray Civic. Only one owner, very low mileage. Great fuel economy.');
INSERT INTO cars VALUES(31,12,2011,34256,12000.0,'Dark gray Malibu. Interior and bodywork in good condition. Low mileage.');
INSERT INTO cars VALUES(32,15,2003,93494,10000.0,'Silver Audi A6 with tan interior. Two previous owners. Mechanically sound and good bodywork. New tires.');
INSERT INTO cars VALUES(33,3,2005,139534,11504.999999999999999,'Pearl white Cadillac SRX. Electrics, engine, and bodywork all in excellent condition. Only one owner. Tires have about 3/4 of their life span left.');
INSERT INTO cars VALUES(34,7,2011,33784,25904.000000000000001,'White 3 Series 328i. Low mileage. Bodywork in mint condition. AM/FM stereo, trip computer, power sunroof.');
INSERT INTO cars VALUES(35,5,2012,7834,16559.999999999999999,'White Chrysler 200 with black interior. Exceptionally low mileage ');
CREATE TABLE makes (
make_id INTEGER PRIMARY KEY ASC,
make TEXT);
INSERT INTO makes VALUES(1,'Studebaker');
INSERT INTO makes VALUES(2,'Ford');
INSERT INTO makes VALUES(3,'Cadillac');
INSERT INTO makes VALUES(4,'Mercedes Benz');
INSERT INTO makes VALUES(5,'Chrysler');
INSERT INTO makes VALUES(6,'Citroen');
INSERT INTO makes VALUES(7,'BMW');
INSERT INTO makes VALUES(8,'Fiat');
INSERT INTO makes VALUES(9,'Pontiac');
INSERT INTO makes VALUES(10,'Hyundai');
INSERT INTO makes VALUES(11,'Jaguar');
INSERT INTO makes VALUES(12,'Chevrolet');
INSERT INTO makes VALUES(13,'Nissan');
INSERT INTO makes VALUES(14,'Honda');
INSERT INTO makes VALUES(15,'Audi');
INSERT INTO makes VALUES(16,'Toyota');
INSERT INTO makes VALUES(17,'Volkswagen');
CREATE TABLE savings (
id Integer primary key asc,
name TEXT,
balance REAL);
INSERT INTO savings VALUES(1,'John White',0.0);
INSERT INTO savings VALUES(2,'Jane Black',2000.0);
CREATE TABLE names (
id integer primary key asc,
name text,
meaning text,
gender text);
INSERT INTO names VALUES(1,'Alice','noble, light','girl');
INSERT INTO names VALUES(2,'Aubrey','ruler of elves','unisex');
INSERT INTO names VALUES(3,'Harry','power, ruler','boy');
INSERT INTO names VALUES(4,'Isabella','devoted to God','girl');
INSERT INTO names VALUES(5,'Jack','God is gracious','boy');
INSERT INTO names VALUES(6,'Jesse','gift','unisex');
INSERT INTO names VALUES(7,'Leslie','garden of hollies','unisex');
INSERT INTO names VALUES(8,'Oliver','olive tree','boy');
INSERT INTO names VALUES(9,'Oscar','spear of the gods','boy');
INSERT INTO names VALUES(10,'Sophia','wisdom','girl');
COMMIT;
