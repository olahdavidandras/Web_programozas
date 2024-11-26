<?php

$json = '[
    {
        "title": "The Catcher in the Rye",
        "author": "J.D. Salinger",
        "publication_year": 1951,
        "category": "Fiction"
    },
    {
        "title": "To Kill a Mockingbird",
        "author": "Harper Lee",
        "publication_year": 1960,
        "category": "Fiction"
    },
    {
        "title": "1984",
        "author": "George Orwell",
        "publication_year": 1949,
        "category": "Dystopian"
    },
    {
        "title": "The Great Gatsby",
        "author": "F. Scott Fitzgerald",
        "publication_year": 1925,
        "category": "Fiction"
    },
    {
        "title": "Brave New World",
        "author": "Aldous Huxley",
        "publication_year": 1932,
        "category": "Dystopian"
    }
]';

$array = json_decode($json, true);

$categoryBooks = [];

foreach ($array as $book) {
    $category = $book['category'];
    if (!isset($categoryBooks[$category])) {
        $categoryBooks[$category] = [];
    }
    $categoryBooks[$category][] = $book;
}

echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse; width: 100%;'>";
foreach ($categoryBooks as $category => $books) {
    echo "<tr style='background-color: #f0f0f0;'><th colspan='3'>$category</th></tr>";
    echo "<tr><th>Title</th><th>Author</th><th>Publication Year</th></tr>";
    foreach ($books as $book) {
        echo "<tr>";
        echo "<td>" . $book['title'] . "</td>";
        echo "<td>" . $book['author'] . "</td>";
        echo "<td>" . $book['publication_year'] . "</td>";
        echo "</tr>";
    }
}
echo "</table>";

?>
