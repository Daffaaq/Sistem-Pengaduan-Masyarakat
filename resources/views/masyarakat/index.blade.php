<!DOCTYPE html>
<html>

<head>
    <title>Complaint Form</title>
    <link href="/css/complaints.css" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <!-- Add your sidebar content here -->
        <h3>Sidebar Content</h3>
        <ul>
            <li><a href="#">Menu Item 1</a></li>
            <li><a href="#">Menu Item 2</a></li>
            <li><a href="#">Menu Item 3</a></li>
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
        </ul>
    </div>
    
    <div class="content">
        <div class="complaint-container">
            <h2>Complaint Form</h2>
            {{-- <form method="POST" action="{{ route('submit_complaint') }}"> --}}
                @csrf
                <!-- Add the form fields for complaints here -->
                <input type="text" id="title" name="title" placeholder="Title" required>
                <textarea id="description" name="description" placeholder="Description" required></textarea>
                <label for="image" id="image-label">Choose an optional image:</label>
                <div class="file-input">
                    <input type="file" id="image" name="image">
                    <button type="button" id="image-button">Select Image</button>
                </div>
                <button type="submit" id="submit-button">Submit</button>
            </form>
        </div>
    </div>

    <script src="/js/complaints.js"></script>
</body>

</html>
