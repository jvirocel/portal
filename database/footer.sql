-- Create footer table
CREATE TABLE IF NOT EXISTS footer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section VARCHAR(50) NOT NULL,
    title VARCHAR(100) NOT NULL,
    content TEXT,
    link VARCHAR(255),
    icon VARCHAR(50),
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default footer data
INSERT INTO footer (section, title, content, link, icon, display_order) VALUES
('contact', 'Address', 'City Hall, Candon City, Ilocos Sur', NULL, 'fa-map-marker-alt', 1),
('contact', 'Phone', '(077) 674-0001', 'tel:+63776740001', 'fa-phone', 2),
('contact', 'Email', 'info@candoncity.gov.ph', 'mailto:info@candoncity.gov.ph', 'fa-envelope', 3),
('quick_links', 'Home', NULL, '/', 'fa-home', 1),
('quick_links', 'About Us', NULL, '/about', 'fa-info-circle', 2),
('quick_links', 'Services', NULL, '/services', 'fa-cogs', 3),
('quick_links', 'News', NULL, '/news', 'fa-newspaper', 4),
('quick_links', 'Contact', NULL, '/contact', 'fa-envelope', 5),
('social', 'Facebook', NULL, 'https://facebook.com/candoncity', 'fa-facebook', 1),
('social', 'Twitter', NULL, 'https://twitter.com/candoncity', 'fa-twitter', 2),
('social', 'Instagram', NULL, 'https://instagram.com/candoncity', 'fa-instagram', 3); 