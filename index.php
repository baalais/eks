<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <div class="header">
        <img src="http://localhost/eks/eks/logo-big.png" alt="Logo">
    </div>

    <div class="form-section">
        <form id="guestbookForm" action="process.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <span class="error" id="nameError"></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <span class="error" id="emailError"></span>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <span class="error" id="messageError"></span>
            </div>

            <button type="button" onclick="validateAndSubmit()">Submit</button>
        </form>
    </div>

    <div class="filter-section">
        <div class="search-form">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search">
        </div>

        <div class="sort-form">
            <label for="sortColumn">Sort by:</label>
            <select id="sortColumn" name="sortColumn">
                <option value="Timestamp">Date Added</option>
                <option value="Name">Name</option>
            </select>

            <label for="sortOrder">Sort order:</label>
            <select id="sortOrder" name="sortOrder">
                <option value="DESC">Descending</option>
                <option value="ASC">Ascending</option>
            </select>
        </div>

        <button type="button" onclick="applyFilters()">Apply Filters</button>
    </div>

    <div class="entries-section" id="entriesList">
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="script.js"></script>

<script>
    function validateAndSubmit() {
        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();

        $('.error').text('');

        if (name.trim() === '') {
            $('#nameError').text('Name is required');
            return;
        }

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $('#emailError').text('Invalid email address');
            return;
        }

        if (message.trim() === '') {
            $('#messageError').text('Message is required');
            return;
        }

        $('#guestbookForm').submit();
    }

    $('#name').on('input', function() {
        $('#nameError').text('');
    });

    $('#email').on('input', function() {
        $('#emailError').text('');
    });

    $('#message').on('input', function() {
        $('#messageError').text('');
    });
</script>

</body>
</html>
