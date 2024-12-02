<!--EX 1 & 2-->

<?php
$student = [
    'last_name' => 'Dupont',
    'first_name' => 'Jean',
    'student_id' => '12345'
];
echo "Last Name: {$student['last_name']}, First Name: {$student['first_name']}, Student ID: {$student['student_id']}";

$student['grade'] = 15; 
$student['grade'] = 18; // Update grade
echo "Grade: {$student['grade']}";
?>

<!--EX 3 & 4-->

<?php
$items = [
    'Item1' => 10.5,
    'Item2' => 25.3,
    'Item3' => 7.8
];
foreach ($items as $item_name => $item_price) {
    echo "$item_name: $item_price €<br>";
}

$scores = [
    'Alice' => 15,
    'Bob' => 12,
    'Clara' => 18,
    'David' => 10,
    'Eve' => 14
];
$average = array_sum($scores) / count($scores);
echo "Average Score: $average";
?>

<!--EX 5-->

<?php
$countries = [
    'France' => 67000000,
    'Germany' => 83000000,
    'Italy' => 60000000
];
arsort($countries);
foreach ($countries as $country_name => $population) {
    echo "$country_name: $population inhabitants<br>";
}
?>


<!--EX 6 & 7 & 8-->

<form method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required><br>

    <label for="color">Favorite Color:</label>
    <select id="color" name="color" required>
        <option value="red">Red</option>
        <option value="green">Green</option>
        <option value="blue">Blue</option>
    </select><br>

    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $age = $_POST['age'];
    $color = htmlspecialchars($_POST['color']);

    // Age validation
    if (!is_numeric($age) || $age <= 0) {
        echo "Error: Age must be a positive integer greater than 0.";
    } else {
        echo "Welcome, $name! You are $age years old, and your favorite color is $color.";
    }
}
?>


<!--EX 9-->

<form method="GET">
    Number 1: <input type="number" name="num1"><br>
    Number 2: <input type="number" name="num2"><br>
    <button type="submit">Calculate</button>
</form>

<?php
if ($_GET) {
    $num1 = intval($_GET['num1']);
    $num2 = intval($_GET['num2']);
    echo "Sum: " . ($num1 + $num2);
}
?>


<!--EX 10-->

<form method="POST">
    Account Type:
    <select name="account_type">
        <option value="admin">Administrator</option>
        <option value="user">User</option>
    </select>
    <button type="submit">Submit</button>
</form>

<?php
if ($_POST) {
    $account_type = htmlspecialchars($_POST['account_type']);
    echo $account_type === 'admin' ? "Welcome, Administrator!" : "Welcome, Regular User!";
}
?>
