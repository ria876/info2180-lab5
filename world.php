
<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = isset($_GET['query']) ? $_GET['query'] : '';
$stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
$stmt->execute(['country' => '%' . $country . '%']);

if ($_SERVER['REQUEST_METHOD'] == "GET"){

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>


<table>
    <tr>
        <th>Country Name</th>
        <th>Continent</th>
        <th>Independence Year</th>
        <th>Head of State</th>
    </tr>
    <?php foreach ($results as $row): ?>
        <tr>
            <td><?= $row['name']; ?></td>
            <td><?= $row['continent']; ?></td>
            <td><?= $row['independence_year']; ?></td>
            <td><?= $row['head_of_state']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>