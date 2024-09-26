<?php
// Function to fetch user data from the JSONPlaceholder API
function getUsers() {
    $url = "https://jsonplaceholder.typicode.com/users";
    $data = file_get_contents($url);
    return json_decode($data, true);
}

// Get the list of users
$users = getUsers();

// Output HTML
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">';

for ($i = 0; $i < count($users); $i++): 
    $user = $users[$i];
    $address = $user['address'];
    echo '<div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <h5 class="card-title">' . htmlspecialchars($user['name']) . '</h5>
                <p class="card-text">' . htmlspecialchars($user['email']) . '</p>
                <p>' . htmlspecialchars($address['street']) . '</p>
                <p>' . htmlspecialchars($address['suite']) . '</p>
                <p>' . htmlspecialchars($address['city']) . '</p>
                <p>' . htmlspecialchars($address['zipcode']) . '</p>
                <a href="#" class="btn btn-primary">Website</a>
            </div>
          </div>';
endfor;

echo '    </div>
</div>

</body>
</html>';
?>