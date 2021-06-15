-- https://biotixpro.net/checkout/


CREATE TABLE `tbl_visitor_orders` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `payment_method` int NOT NULL,
  `bank_wire_image_proof` varchar(50) NOT NULL COMMENT '1''=>bank wire(manual),''2''=>paystack',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


ALTER TABLE `tbl_visitor_orders`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tbl_visitor_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;