CREATE TABLE IF NOT EXISTS about_page (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image_url VARCHAR(255),
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert initial content
INSERT INTO about_page (section, title, content, display_order) VALUES
('history', 'Our History', 'Candon City, officially the City of Candon, is a 3rd class component city in the province of Ilocos Sur, Philippines. According to the 2020 census, it has a population of 61,432 people.

The city was founded in 1780 and was officially converted into a city on March 28, 2001. It is known as the "Tobacco Capital of the Philippines" due to its large tobacco industry.', 1),
('vision', 'Our Vision', 'Candon City envisions itself as a progressive, globally competitive, and sustainable city with empowered and resilient communities living in a healthy and peaceful environment.', 2),
('mission', 'Our Mission', 'To provide quality services and implement programs that promote economic growth, social development, and environmental protection through good governance and active community participation.', 3); 