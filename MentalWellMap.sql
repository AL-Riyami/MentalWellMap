CREATE DATABASE MentalWellMap;
USE MentalWellMap;

CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Email VARCHAR(100),
    Username VARCHAR(50),
    Password VARCHAR(100),
    PhoneNumber VARCHAR(15)
);

CREATE TABLE Articles (
    ArticleID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(100) NOT NULL,
    VideoSource VARCHAR(200),
    ReadMoreLink VARCHAR(200),
    ImageSource VARCHAR(200),
    Description TEXT
);

CREATE TABLE Reviews (
    ReviewID INT AUTO_INCREMENT PRIMARY KEY,
    ReviewerName VARCHAR(100),
    ReviewText TEXT,
    ReviewDate DATE,
);

INSERT INTO `users` (`FirstName`, `LastName`, `Email`, `UserName`, `Password`, `PhoneNumber`) VALUES 
    ('Alice', 'Johnson', 'alice@example.com', 'alicej', 'pass123', '9876543210'),
    ('Robert', 'Smith', 'robsmith@example.com', 'robsmith', 'securepass', '7865432109'),
    ('Emily', 'Brown', 'emily@example.com', 'emilyb', 'password456', '8765432109'),
    ('Michael', 'Williams', 'mike@example.com', 'mike123', 'mikepass', '9988776655'),
    ('Sophia', 'Garcia', 'sophia@example.com', 'sophiag', 'sophia123', '7894561230'),
    ('Daniel', 'Lee', 'daniel@example.com', 'daniell', 'danielpass', '9087654321'),
    ('Olivia', 'Martinez', 'olivia@example.com', 'oliviam', 'oliviapass', '6543210987');

INSERT INTO `articles`(`Title`, `VideoSource`, `ReadMoreLink`, `ImageSource`, `Description`) VALUES
    ('Understanding Stress and Coping Strategies', 'https://www.youtube.com/embed/ntfcfJ28eiU?si=ndLBJ63ZK0h470xj', 'article1.html', '', 'Understanding Stress: Learn the factors and effects of stress on mental and physical well-being. Coping Strategies: Discover effective techniques to manage stress and promote mental resilience.'),
    ('How to Deal with Depression', 'https://www.youtube.com/embed/Xu1FMCxoEFc?si=7xYoRznRhy0TcVDO', 'article2.html', '', 'In this full guide, you will learn what is depression, how it affects your mind and the consequences of it in your life, and finally how to manage and cure it.'),
    ('Mental Health and Your Life', '', 'article3.html', 'img/articl3-pic.jpg', 'This article defines mental health, talks about some tools to cure your mind and protect it, and discusses how your mental health affects your life.'),
    ('Understanding Anxiety Disorders', '', 'article4.html', 'img/article4-pic.jpg', 'Explore the various types of anxiety disorders and their impact on daily life. Learn effective coping mechanisms to manage anxiety.'),
    ('The Importance of Self-Care', 'https://www.youtube.com/embed/7KwE5I3Y9PM?si=4CQd77wdRgG5sM0U', 'article5.html', '', 'Discover why self-care is crucial for mental health and explore different self-care practices that you can incorporate into your routine.'),
    ('Healthy Relationships and Mental Well-being', '', 'article6.html', 'img/article6-pic.jpg', 'Learn about the connection between healthy relationships and mental well-being. Explore ways to build and maintain supportive relationships.'),
    ('Overcoming Burnout in a Fast-Paced World', 'https://www.youtube.com/embed/s72nW1rDBtc?si=8bYLl1uRTcOtIjK4', 'article7.html', '', 'Identify signs of burnout and learn strategies to prevent and overcome burnout in todays demanding environments.');

INSERT INTO `reviews` (`Name`, `ReviewText`, `ReviewDate`) VALUES
    ( 'Alice', 'This platform has been immensely helpful in my journey towards better mental health.', '2023-01-20'),
    ( 'Robert', 'The resources provided here are excellent and easy to access.', '2023-02-25'),
    ('Emily', 'I appreciate the diversity of content available. Very informative!', '2023-03-15'),
    ( 'Daniel', 'The guidance and support I found here significantly improved my mental well-being.', '2023-04-05'),
    ( 'Sophia', 'This platform has given me a better understanding of mental health issues.', '2023-05-10'),
    ('Olivia', 'I am grateful for the helpful resources available on this platform.', '2023-06-20'),
    ( 'Michael', 'The articles and videos here are exceptional. Highly recommended!', '2023-07-15');
