CREATE VIEW Comments_view AS	  
SELECT 
      Comments.id AS id , 
      Comments.comment AS comment,
      Comments.auction_id AS auction_id,
      Comments.user_id AS user_id,
      Users.username AS user
	  FROM Comments, Auctions, Users
	  GROUP by id


CREATE VIEW Auctions_view AS
SELECT 
      Auctions.id AS id , 
      Auctions.title AS title, 
      Auctions.start_date AS start_date, 
      Auctions.end_date AS end_date, 
      Auctions.description AS description, 
      Auctions.start_price AS start_price, 
      Auctions.buy_price AS buy_price,
      Auctions.category_id AS category_id, 
      Auction_Images.url AS image,
      Categories.name AS category_name,
      Users.username AS user,
	  Users.id AS user_id
	  FROM Auctions, Categories, Auction_Images, Users
	  WHERE Auctions.user_id = Users.id
	  GROUP by id