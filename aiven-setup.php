<?php
$host = "thought-flow-thoughtflow.e.aivencloud.com";
$port = 27690;
$user = "avnadmin";
$pass = "AVNS_sPIYwL5Dljh5gYP7_fp";
$db = "defaultdb";

// Initialize connection with SSL
$conn = mysqli_init();
$conn->ssl_set(NULL, NULL, NULL, NULL, NULL);

if (!$conn->real_connect($host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("❌ Connection failed: " . mysqli_connect_error());
}

echo "✅ Connected to Aiven MySQL!<br><br>";

// Create table
$createTable = "CREATE TABLE IF NOT EXISTS blogs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  author VARCHAR(100),
  excerpt TEXT,
  content TEXT,
  category VARCHAR(100),
  read_time INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    echo "✅ Table 'blogs' created successfully!<br><br>";
} else {
    die("❌ Error creating table: " . $conn->error);
}

// Insert sample data
$insertData = "INSERT INTO blogs (title, author, excerpt, content, category, read_time) VALUES
('The Rise of AI in Everyday Life', 'Amine Z.', 'AI is no longer science fiction — it's in our phones, cars, and even our homes.', 'Artificial intelligence has transformed how we live and work. From voice assistants to smart recommendations, the technology is becoming more integrated into daily routines.', 'Technology', 7),
('Mastering CSS Grid Layout', 'Sara B.', 'A step-by-step guide to mastering modern CSS grid systems.', 'CSS Grid Layout allows developers to create complex and responsive layouts easily. This guide explores practical examples and best practices.', 'Design', 5),
('Building Scalable APIs with PHP', 'Yacine H.', 'Learn how to structure and optimize your PHP APIs for better scalability.', 'A scalable API is one that grows with your users. Here's how to plan endpoints, manage databases, and keep performance high.', 'Engineering', 8),
('The Psychology of Good UX Design', 'Ines M.', 'UX is not just about visuals — it's about understanding human behavior.', 'To build effective digital experiences, designers must first understand how people think, act, and make decisions.', 'UX Research', 6),
('Why You Should Start Blogging as a Developer', 'Omar L.', 'Sharing your knowledge online can open doors to new opportunities.', 'Many developers underestimate the power of personal branding. A technical blog can help you connect, teach, and grow professionally.', 'Writing', 4),
('The Future of Web Performance', 'Lina K.', 'Faster websites are not a luxury — they're a necessity.', 'With Google's Core Web Vitals, web performance directly impacts SEO and user experience. Learn how to optimize your site effectively.', 'Technology', 9),
('Intro to Machine Learning', 'Houssam T.', 'A friendly introduction to the basics of machine learning.', 'Machine learning is about teaching computers to learn patterns from data. This post explains the key concepts simply and clearly.', 'Technology', 10),
('Writing Clean Code in 2025', 'Nassim E.', 'Clean code isn't just for looks — it's about maintainability and collaboration.', 'In this article, we break down how naming conventions, structure, and refactoring lead to long-term project success.', 'Engineering', 5),
('The Secret Power of Color in Design', 'Meriem D.', 'Colors influence emotions, actions, and decisions.', 'Color psychology plays a major role in UX. The right palette can make your users feel confident, calm, or excited.', 'Design', 3),
('5 Habits of Productive Developers', 'Sofiane R.', 'Productivity isn't about doing more — it's about doing better.', 'Learn how to manage your time, minimize distractions, and focus on what truly matters in your coding workflow.', 'Productivity', 6),
('Understanding Databases for Beginners', 'Salim J.', 'Databases are the backbone of most modern applications.', 'If you've ever wondered how apps store and retrieve information, this beginner's guide to databases is for you.', 'Engineering', 4),
('Top 10 VSCode Extensions for Developers', 'Kenza A.', 'Boost your coding efficiency with these must-have VSCode extensions.', 'VSCode's ecosystem offers endless productivity enhancements — here are our top 10 picks.', 'Productivity', 2),
('The Art of Writing Engaging Blog Posts', 'Yasmine S.', 'Writing that keeps readers hooked from start to finish.', 'From storytelling techniques to formatting tips, learn how to write blogs that people actually read.', 'Writing', 5),
('How to Build a Personal Portfolio', 'Reda B.', 'Your portfolio is your digital identity — make it shine.', 'A well-designed portfolio highlights your skills and helps you land clients or jobs. Here's how to build one.', 'Design', 7),
('Debugging Like a Pro', 'Adel F.', 'Debugging doesn't have to be frustrating if you approach it strategically.', 'We share proven debugging techniques that save time and sanity when tracking down errors.', 'Engineering', 3),
('The Role of Accessibility in Web Design', 'Ikram L.', 'Accessibility is not optional — it's essential.', 'Designing for everyone means building inclusive interfaces. Learn key accessibility principles every designer should follow.', 'UX Research', 8),
('From Idea to Launch: Building Your First App', 'Yassine G.', 'How to turn your concept into a working app.', 'This guide walks you through planning, designing, developing, and launching your first mobile or web application.', 'Technology', 9),
('How to Stay Motivated as a Developer', 'Amal N.', 'Motivation comes and goes — here's how to keep coding consistently.', 'Every developer faces burnout. Here's how to overcome mental blocks and rediscover the joy of coding.', 'Productivity', 6),
('Typography Rules Every Designer Should Know', 'Lydia Z.', 'Typography defines how your content feels and flows.', 'Fonts are not just decorative — they communicate tone, hierarchy, and personality. Learn the essentials of good typography.', 'Design', 4),
('What Makes a Great Backend Developer', 'Nabil C.', 'Backend development is about more than just databases.', 'Scalability, reliability, and architecture are the cornerstones of great backend systems. This article breaks them down.', 'Engineering', 7),
('The Evolution of the Internet', 'Khaled M.', 'From dial-up to fiber — a quick journey through internet history.', 'The internet has evolved drastically over the past 30 years. Let's look back at its milestones.', 'Technology', 5),
('Design Thinking Explained', 'Sara B.', 'Design Thinking isn't just for designers.', 'This problem-solving approach can improve creativity and innovation across any field.', 'UX Research', 6),
('Becoming a Better Writer in Tech', 'Rania E.', 'Writing is a developer's secret weapon.', 'Clear documentation, proposals, and blog posts make you stand out. Learn how to write better as a tech professional.', 'Writing', 4),
('Microinteractions in UX', 'Walid T.', 'Small details make a huge impact.', 'From button animations to hover effects, microinteractions improve user engagement and satisfaction.', 'UX Research', 3),
('The Importance of Version Control', 'Hakim S.', 'Version control saves developers from chaos.', 'Git and other tools allow for safer collaboration and rollback when things go wrong.', 'Engineering', 8),
('How AI is Transforming Design', 'Amina D.', 'AI is changing how designers create and collaborate.', 'With AI tools, designers can automate repetitive tasks and focus on creativity and strategy.', 'Design', 9),
('Daily Habits of Successful Engineers', 'Yacine B.', 'Success is a product of consistent habits.', 'From learning continuously to mentoring others, these are the daily habits top engineers follow.', 'Productivity', 5),
('How to Build REST APIs in PHP', 'Zaki M.', 'A practical introduction to building APIs using PHP and MySQL.', 'This article covers endpoints, HTTP methods, and best practices for building RESTful APIs.', 'Engineering', 7),
('Balancing Creativity and Logic in Development', 'Hichem L.', 'Coding is both art and science.', 'Discover how to combine creativity with logic to build better software and solve complex problems.', 'Technology', 10)";

if ($conn->query($insertData) === TRUE) {
    echo "✅ Sample data inserted successfully!<br><br>";
    echo "<strong>🎉 Database setup complete!</strong><br>";
    echo "You can now delete this file.";
} else {
    echo "❌ Error inserting data: " . $conn->error;
}

$conn->close();
?>
