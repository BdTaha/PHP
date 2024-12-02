<!--EX 1 & 2-->

<?php
$studentsData = [
    'Sophia' => ['Algebra' => 15, 'Physics' => 14],
    'Max' => ['Algebra' => 10, 'Physics' => 12],
];

foreach ($studentsData as $studentName => $scores) {
    $averageScore = array_sum($scores) / count($scores);
    echo "$studentName: $averageScore<br>";
}
?>



<!--EX 3-->

<form method="POST">
    Email Address: <input type="email" name="user_email" required><br>
    Password: <input type="password" name="user_password" required><br>
    <button type="submit">Log In</button>
</form>

<?php
$loginData = [
    'sophia@example.com' => 'pass123',
    'max@example.com' => 'pass456',
];

if ($_POST) {
    $inputEmail = $_POST['user_email'];
    $inputPassword = $_POST['user_password'];

    if (isset($loginData[$inputEmail]) && $loginData[$inputEmail] === $inputPassword) {
        echo "Welcome, $inputEmail! You are successfully logged in.";
    } else {
        echo "Incorrect email or password.";
    }
}
?>



<!--EX 4-->

<?php
$cityTemperatures = ['Rome' => 28, 'Berlin' => 20, 'Madrid' => 33];
arsort($cityTemperatures);
$warmestCity = key($cityTemperatures);

echo "The warmest city is $warmestCity with a temperature of {$cityTemperatures[$warmestCity]}°C.";
?>



<!--EX 5-->

<form method="POST">
    Leave a Comment: <textarea name="user_comment" required></textarea>
    <button type="submit">Submit</button>
</form>

<?php
$feedback = [];
if ($_POST) {
    $submittedComment = htmlspecialchars($_POST['user_comment']);
    $feedback[] = ['content' => $submittedComment, 'timestamp' => date('Y-m-d H:i:s')];
}

foreach ($feedback as $entry) {
    echo "{$entry['content']} ({$entry['timestamp']})<br>";
}
?>


<!--EX 6-->

<?php
$cities = ['Rome' => 28, 'Berlin' => 20, 'Madrid' => 33];
arsort($cities);
$warmestPlace = key($cities);
echo "The warmest location is $warmestPlace with a temperature of {$cities[$warmestPlace]}°C.";
?>



<!--EX 7-->

<form method="POST" enctype="multipart/form-data">
    Upload CSV File: <input type="file" name="csv_file" required>
    <button type="submit">Upload</button>
</form>

<?php
if ($_FILES) {
    $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');
    $productList = [];

    while (($row = fgetcsv($csvFile)) !== false) {
        $productList[] = ['name' => $row[0], 'price' => $row[1], 'quantity' => $row[2]];
    }
    fclose($csvFile);

    echo "<table>";
    foreach ($productList as $product) {
        echo "<tr><td>{$product['name']}</td><td>{$product['price']} €</td><td>{$product['quantity']}</td></tr>";
    }
    echo "</table>";
}
?>



<!--EX 8-->

<form method="POST">
    <label>
        <input type="checkbox" name="items[]" value="Item 1"> Item 1 - 10 €
    </label><br>
    <label>
        <input type="checkbox" name="items[]" value="Item 2"> Item 2 - 15 €
    </label><br>
    <label>
        <input type="checkbox" name="items[]" value="Item 3"> Item 3 - 20 €
    </label><br>
    <button type="submit">Submit</button>
</form>

<?php
$itemPrices = [
    "Item 1" => 10,
    "Item 2" => 15,
    "Item 3" => 20,
];

if ($_POST) {
    $chosenItems = $_POST['items'];
    $totalCost = 0;

    echo "<h2>Selected Items:</h2>";
    foreach ($chosenItems as $item) {
        if (isset($itemPrices[$item])) {
            echo "- $item: {$itemPrices[$item]} €<br>";
            $totalCost += $itemPrices[$item];
        }
    }
    echo "<h3>Total: $totalCost €</h3>";
} else {
    echo "<p>No items selected.</p>";
}
?>


<!--EX 9-->

<?php
$participants = [
    'Sophia' => ['Algebra' => 15, 'Physics' => 14],
    'Max' => ['Algebra' => 10, 'Physics' => 12],
];

foreach ($participants as $participantName => $grades) {
    $averageGrade = array_sum($grades) / count($grades);
    echo "$participantName: $averageGrade<br>";
}
?>



<!--EX 10-->

$usersList = [
    ['id' => 1, 'name' => 'Sophia'],
    ['id' => 2, 'name' => 'Max'],
];

<form method="POST">
    Action:
    <select name="task">
        <option value="add">Add</option>
        <option value="update">Update</option>
        <option value="delete">Delete</option>
    </select><br>
    Name: <input type="text" name="user_name">
    ID (for update/delete): <input type="number" name="user_id">
    <button type="submit">Submit</button>
</form>

<?php
if ($_POST) {
    $task = $_POST['task'];
    if ($task === 'add') {
        $usersList[] = ['id' => count($usersList) + 1, 'name' => $_POST['user_name']];
    } elseif ($task === 'update') {
        foreach ($usersList as &$user) {
            if ($user['id'] == $_POST['user_id']) {
                $user['name'] = $_POST['user_name'];
                break;
            }
        }
    } elseif ($task === 'delete') {
        $usersList = array_filter($usersList, fn($user) => $user['id'] != $_POST['user_id']);
    }
}
?>
