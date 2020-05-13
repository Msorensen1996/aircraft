# Remove any previously-created database.
DROP DATABASE IF EXISTS aircraft;

# Create the new database.
CREATE DATABASE aircraft;

# Use the newly created database.
USE aircraft;

# TODO: Create the pilots table, containing: pilot_id, first_name, last_name, phone, and email.
CREATE TABLE pilots (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(50),
    first_name VARCHAR(50),
    phone CHAR(14),
    email VARCHAR(50)
);

# TODO: Create the aircraft table, containing: aircraft_id, pilot_id, registration_number, and model.
# Create a foreign key constraint with a trigger such that when a user deletes a pilot, all
# associated aircraft are also deleted.
# Refer to the presentation or page 199 in the textbook for syntax examples
CREATE TABLE aircraft(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pilot_id INT NOT NULL,
    registration_number CHAR(5),
    model VARCHAR(50),
    FOREIGN KEY (pilot_id) REFERENCES pilots (id) ON DELETE CASCADE
);