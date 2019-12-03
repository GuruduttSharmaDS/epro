-- Set defualt Null
ALTER TABLE `fp_users` 
    CHANGE `work_experience` `work_experience` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL, 
    CHANGE `non_availability_dates` `non_availability_dates` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL, 
    CHANGE `available_pincodes` `available_pincodes` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL, 
    CHANGE `available_cities` `available_cities` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;
