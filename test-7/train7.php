<!DOCTYPE html>
<html lang="en">

<head>
  <title>Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>    
<p>題目: sql 語法練習</p>
<p>目的: 練習 sql 語言</p>

<p>1.請取出本月 A 店家的總營業額</p>

SELECT SUM(orders.num*items.price) , SUM(orders.num) , items.price FROM `orders` 
LEFT JOIN items on items.id=orders.p_id 
WHERE p_id in (SELECT items.id FROM items LEFT JOIN store on items.store_id=store.id WHERE store.id = 1 ) 

<p>2.請取出 A 業務, A 店家, 上個月的 各品項銷售額</p>
SELECT * FROM `orders` WHERE 
    p_id in (
        SELECT items.id FROM items 
        LEFT JOIN store on items.store_id=store.id WHERE store.id=2 
    ) AND PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( `create_time`, '%Y%m' ) ) =1

<p>3.請取出 A 客人, 在 A店家, 本月 消費品項名稱</p>

SELECT * FROM `orders` WHERE 
    DATE_FORMAT( `create_time`, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' ) 
    AND `c_id` = 1 ORDER BY `orders`.`create_time` ASC

<p>4.請用 insert into select 增加 B 業務 在 上月25日至28日 的訂單</p>

INSERT INTO orders (`p_id`, `num`, `money`, `c_id`, `status`, `create_time`, `update_time`) 
SELECT `p_id`, `num`, `money`, `c_id`, `status`, `create_time`, `update_time` FROM `orders` WHERE 
    p_id in (
        SELECT items.id  FROM items 
            LEFT JOIN store on items.store_id=store.id 
            WHERE store.id  in (8,9,10)
    ) AND `create_time` >= '2018-04-25' AND `create_time` <= '2018-04-28'

<p> 5.請刪除 步驟 4. 新增的 order.</p>

DELETE FROM `orders` WHERE id IN (
    select aid from (
    SELECT id as aid FROM 
        `orders` WHERE p_id in ( 
            SELECT items.id FROM items 
            LEFT JOIN store on items.store_id=store.id 
            WHERE store.id in (8,9,10) ) 
                AND `create_time` >= '2018-04-25' 
                AND `create_time` <= '2018-04-28' 
                GROUP BY `p_id`,`num`,`c_id`,`status`,`create_time`
    ) as a 
)

<p>6.請將 本月 A客人 1日的消費 改為上個月 30 日的消費</p>

UPDATE `orders` SET `create_time`='2018-04-30' WHERE  `create_time` like '2018-05-01%' AND `c_id`=1






