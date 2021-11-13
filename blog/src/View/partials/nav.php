<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="?action=">BLOG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php if(isset($_SESSION['email'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="?action=logout">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=createPost">Create Post</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link active"  href="?action=login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=register">Register</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>