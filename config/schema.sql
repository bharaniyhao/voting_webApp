-- Create the 'joy_model_challenge_votes' table
CREATE TABLE IF NOT EXISTS joy_model_challenge_votes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  candidate VARCHAR(255) NOT NULL,
  points INT NOT NULL DEFAULT 0,
  transaction_id VARCHAR(255) NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the 'miss_agriculture_votes' table
CREATE TABLE IF NOT EXISTS miss_agriculture_votes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  candidate VARCHAR(255) NOT NULL,
  points INT NOT NULL DEFAULT 0,
  transaction_id VARCHAR(255) NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
